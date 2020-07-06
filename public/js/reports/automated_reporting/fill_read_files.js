$(function() {
    var file_read = $(".file_read");
    var btn_generate_report = $('.btn_generate_report');
    var form_generate_report = $('#form_generate_report');
    var form_get_subtopic_status = $('#form_get_subtopic_status');
    var form_update_subtopic_status = $('#form_update_subtopic_status');

    if (file_read.length > 0) {
        var data = {};

        // SEPARANDO ARQUIVOS
        file_read.each(function(index, file) {
            file = $(this);
            var file_name = file.attr('data-file-name');
            data[file_name] = {};

            // SEPARANDO SESSAO DO ARQUIVO
            var sectionTable = file.find(".sectionTable");
            sectionTable.each(function(index, section) {
                section = $(this);
                
                // SEPARANDO TOPICOS
                var checkNameBlue = section.find(".checkNameBlue");
                checkNameBlue.each(function(index, checkName) {
                    checkName = $(this);
                    var name_checkName = checkName.find('b').text();
                    data[file_name][name_checkName] = [];

                    // SEPARANDO RESPOSTAS POR TOPICO
                    var span = checkName.siblings('span');
                    span.each(function(index, span) {
                        var span = $(this);
                        var b = span.next('b');
                        
                        if (span.find('b').text().length != 0) {
                            data[file_name][name_checkName][index] = [
                                span.find('b').text(),
                                b.find('span').text()
                            ];
                        } else {
                            data[file_name][name_checkName][index] = [span.html()];
                        }
                        // return false;
                    }); 
                    // return false;
                });
                // return false;
            });
            // return false;
        });

        // PREENCHENDO CONTEUDO HTML
        $.each(data, function (name_file, topics) {
            var div_file = $('#'+name_file);
            var count = 0;

            var div_inserted_file = $("div[data-file-name='"+name_file+"']");
            var equipment_name = div_inserted_file.find(".hostnameTeal").text();

            $.each(topics, function (name_topic, data_topic) {
                var topic_path = convertToSlug(name_file+"_"+name_topic);

                var card_body = div_file.find('.card-body');
                card_body.append(
                    "<div class='col-md-12'>"+
                        "<h4 class='header-title m-t-0 mb-0'>"+name_topic+"</h4>"+

                        "<div class='row "+topic_path+" m-b-10'></div>"+
                    "</div>"
                );

                $.each(data_topic, function (key, responses) {
                    var div_body_file = card_body.find('.'+topic_path);
                    var class_color = getClassColor(responses[1]);
                    var subtopic_path = convertToSlug(name_file+"_"+name_topic+"_"+responses[0]);
                    count++;

                    var path_input_name = "subtopics_errors["+equipment_name+"]["+name_topic+"]["+responses[0]+"]";
                    if (responses.length > 1) {
                        div_body_file.append(
                            "<div class='col-md-12 "+subtopic_path+"'>"+
                                "<p class='font-bold mb-0 font-12'>"+
                                    responses[0].replace('- ', '')+
                                    "<span class='text-"+class_color+" pull-right'>"+responses[1]+"</span>"+
                                "</p>"+

                                "<div class='checkbox checkbox-"+class_color+" pl-0 pull-right'>"+
                                    "<input id='"+name_file+"check_"+count+"' class='check_"+convertToSlug(name_topic)+" input_check' data-status='"+responses[1]+"' type='checkbox'>"+
                                    "<label for='"+name_file+"check_"+count+"'>Adicionar ao relatorio</label>"+
                                "</div>"+

                                "<input type='hidden' id='"+name_file+"status_"+count+"' disabled name='"+path_input_name+"[0]' value='"+responses[1]+"'>"+

                                "<div class='progress progress-bar-"+class_color+"-alt progress-sm m-b-5 width-100'>"+
                                    "<div class='progress-bar progress-bar-"+class_color+" wow' role='progressbar' aria-valuenow='100' aria-valuemin='0' aria-valuemax='100' style='width: 0%; visibility: visible;'>"+
                                    "</div>"+
                                "</div>"+
                            "</div>"
                        );

                        EnableOrDisableInputs(name_file, count, path_input_name);

                        TakeErrorToSpecificArea(name_file, count, name_topic);
                    } else {
                        // TRAZ TEXTO DE ERRO
                        var last_item = div_body_file.find('.col-md-12').last();

                        if (last_item.find('.msg_error').length == 0) {
                            last_item.find('p').append("<p class='font-10 msg_error m-b-5'></p>");
                        }
                        // console.log(last_item.find('.msg_error'));
                        last_item.find('.msg_error').append(
                            "<p class='m-b-5'>"+responses[0]+"</p>"
                        );
                    }
                    // return false;
                });
                // return false;
            });
            // return false;
        });
        AutoSelectionSpecificSubtopics();
        activeLink(btn_generate_report);


        
        function EnableOrDisableInputs(name_file, count, path_input_name)
        {
            var input_check = $("input[id="+name_file+"check_"+count+"]");
            var input_status = $("input[id="+name_file+"status_"+count+"]");
            var subtopic_div = input_check.closest('.col-md-12');
            
            input_check.on('click', function() {
                if (input_check.prop('checked')) {
                    if (subtopic_div.find('p.msg_error').length) {
                        var errors_p = subtopic_div.find('p.msg_error').find('p');
                        errors_p.each(function (index, p) {
                            p = $(this);
                            
                            subtopic_div.append(
                                "<input type='hidden' class='"+name_file+"descr_"+count+"' name='"+path_input_name+"[1]["+index+"]' value='"+p.html()+"'>"
                            );
                        });
                    }

                    enableInput(input_status);
                } else {
                    disableInput(input_status);
                    $("input[class="+name_file+"descr_"+count+"]").remove();
                }
            });
        }

        function TakeErrorToSpecificArea(name_file, count, name_topic) {
            var input_check = $("input[id="+name_file+"check_"+count+"]");
            var topics_marked = $("#topics_marked");

            input_check.on('click', function() {
                if (input_check.prop('checked')) { // ESCREVER DIV
                    var form_get_topic = $('#form_get_topic');
                    var _token = form_get_topic.find("input[name='_token']").val();
                    $.post(form_get_topic.attr('action'), {
                        _token: _token,
                        topic: name_topic,
                    }, function (data, textStatus, jqXHR) {
                    }).done(function(data) {
                        
                        if ($('#div_topic_marked_'+data['name_slug']).length == 0) {
                            topics_marked.find('.card-body').append(
                                "<div id='div_topic_marked_"+data['name_slug']+"' class='col-md-12 m-b-10'>"+
                                    "<label for='' class='col-form-label pt-0'>"+
                                        data['name']+
                                        "<i class='m-l-5 text-primary fa fa-spin fa-circle-o-notch hide'></i>"+
                                        "<span class='m-l-5 text-success hide'>Atualizado!</span>"+
                                        "<span class='m-l-5 text-danger hide'>Erro ao atualizar</span>"+
                                    "</label>"+

                                    "<textarea id='' name='topics_errors["+data['name']+"]' class='form-control' rows='3'>"+
                                        (data['description'] != null ? data['description'] : 'Tópico sem descrição registrada')+
                                    "</textarea>"+
                                "</div>"
                            );
                            updateDescriptionTopic(data['name_slug']);
                        }
                    });
                } else { // APAGAR DIV
                    var check_topic = $(".check_"+convertToSlug(name_topic)+":checkbox:checked");
                    
                    if (check_topic.length == 0) {
                        $('#div_topic_marked_'+convertToSlug(name_topic)).remove();
                    }
                }
            });
        }

        function AutoSelectionSpecificSubtopics() {
            var inputs_checks = $("input.input_check");
            
            inputs_checks.each(function (index, input) {
                input = $(this);
                var status = input.attr('data-status');
                
                if (status == 'WARNING' ||
                    status == 'INFO' ||
                    status == 'ERROR') {

                    input.click();
                }
            });
        }





        // Ajax
        function updateDescriptionTopic(name_topic) {
            var div_topic = $('#div_topic_marked_'+name_topic);
            var textarea = div_topic.find('textarea');

            textarea.on('focusout', function() {
                div_topic.find("i.text-primary").removeClass('hide');

                var form_update_topic = $('#form_update_topic');
                var _token = form_update_topic.find("input[name='_token']").val();
                $.post(form_update_topic.attr('action'), {
                    _token: _token,
                    topic: name_topic,
                    description: textarea.val()
                }, function (data, textStatus, jqXHR) {
                }).always(function() {
                    div_topic.find("i.text-primary").addClass('hide');
                }).done(function(data) {

                    if (data) {
                        div_topic.find("span.text-success").removeClass('hide');
                    } else {
                        div_topic.find("span.text-danger").removeClass('hide');
                    }
                });
            });
        }
        // Ajax

        function enableInput(input)
        {
            input.removeAttr('disabled');
        }
        function disableInput(input) {
            input.attr('disabled', 'true');
        }

        function getClassColor(value) {
            if (value == 'OK') {
                return 'success';
            } else if (value == 'WARNING' || value == 'ERROR') {
                return 'danger';
            } else {
                return 'warning';
            }
        }
        function convertToSlug(text) {
            return text
                .toLowerCase()
                .replace(/ /g,'-')
                .replace(/[^\w-]+/g,'');
        }
        function activeLink(item) {
            item.removeClass('disabled');
        }
    }
});