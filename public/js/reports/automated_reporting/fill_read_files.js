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
                            data[file_name][name_checkName][index] = [span.text()];
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

            $.each(topics, function (name_topic, topic) {
                var path_body_file = convertToSlug(name_file+"_"+name_topic);

                var card_body = div_file.find('.card-body');
                card_body.append(
                    "<div class='col-md-12'>"+
                        "<h4 class='header-title m-t-0 mb-0'>"+name_topic+"</h4>"+

                        "<div class='row "+path_body_file+" m-b-10'></div>"+
                    "</div>"
                );

                $.each(topic, function (key, responses) {
                    var div_body_file = card_body.find('.'+path_body_file);
                    var class_color = getClassColor(responses[1]);
                    count++;

                    if (responses.length > 1) {
                        // div_body_file.append('<span>T</span>');
                        div_body_file.append(
                            "<div class='col-md-12'>"+
                                "<p class='font-bold mb-0 font-12'>"+
                                    responses[0].replace('- ', '')+
                                    "<span class='text-"+class_color+" pull-right'>"+responses[1]+"</span>"+
                                "</p>"+

                                "<div class='checkbox checkbox-"+class_color+" pl-0 pull-right'>"+
                                    "<input id='"+name_file+"check_"+count+"' type='checkbox'>"+
                                    "<label for='"+name_file+"check_"+count+"'>Adicionar ao relatorio</label>"+
                                "</div>"+

                                "<div id='div_"+name_file+"_"+count+"' class='m-b-10 hide'>"+
                                    "<label for='"+name_file+"text_"+count+"' class='col-form-label pt-0'>"+
                                        "Texto a ser adicionado ao relatório"+
                                        "<i class='m-l-5 text-primary fa fa-spin fa-circle-o-notch hide'></i>"+
                                        "<span class='m-l-5 text-success hide'>Atualizado!</span>"+
                                        "<span class='m-l-5 text-danger hide'>Erro ao atualizar</span>"+
                                    "</label>"+
                                    "<input type='hidden' id='"+name_file+"hidden_"+count+"' disabled name='data["+equipment_name+"]["+name_topic+"]["+responses[0]+"][0]' value='"+responses[1]+"'>"+
                                    "<textarea id='"+name_file+"text_"+count+"' disabled name='data["+equipment_name+"]["+name_topic+"]["+responses[0]+"][1]' class='form-control' rows='2'></textarea>"+
                                "</div>"+

                                "<div class='progress progress-bar-"+class_color+"-alt progress-sm m-b-5 width-100'>"+
                                    "<div class='progress-bar progress-bar-"+class_color+" wow' role='progressbar' aria-valuenow='100' aria-valuemin='0' aria-valuemax='100' style='width: 0%; visibility: visible;'>"+
                                    "</div>"+
                                "</div>"+
                            "</div>"
                        );

                        showOrHideDivTextSubtopic(name_file, count);
                        getDescriptionSubtopic(name_file, count, responses[0], responses[1]);
                        updateDescriptionSubtopic(name_file, count, responses[0], responses[1]);
                    } else {
                        // TRAZ TEXTO DE ERRO
                        // var last_item = div_body_file.find('.col-md-12').last();

                        // if (last_item.find('.msg_error').length == 0) {
                        //     last_item.find('p').append("<p class='font-10 msg_error m-b-5'></p>");
                        // }
                        // // console.log(last_item.find('.msg_error'));
                        // last_item.find('.msg_error').append(
                        //     responses[0]+"<br>"
                        // );
                    }
                    // return false;
                });
                // return false;
            });
            // return false;
        });
        activeLink(btn_generate_report);



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

        function showOrHideDivTextSubtopic(name_file, count)
        {
            var input_check = $("input[id="+name_file+"check_"+count+"]");
            var div_name_file = $("#div_"+name_file+"_"+count+"");

            var input_hidden = $("input[id="+name_file+"hidden_"+count+"]");
            var textarea = $("textarea[id="+name_file+"text_"+count+"]");

            input_check.on('click', function() {
                
                if (input_check.prop('checked')) {
                    div_name_file.removeClass('hide');
                    enableInput(input_hidden);
                    enableInput(textarea);
                } else {
                    div_name_file.addClass('hide');
                    disableInput(input_hidden);
                    disableInput(textarea);
                }
            });
        }

        function enableInput(input)
        {
            input.removeAttr('disabled');
        }
        function disableInput(input) {
            input.attr('disabled', 'true');
        }

        // Ajax
        function getDescriptionSubtopic(name_file, count, subtopic, response) {
            subtopic = subtopic.replace('- ', '');
            
            var textarea = $("textarea[id="+name_file+"text_"+count+"]");
            var input = $("input[id="+name_file+"check_"+count+"]")
            input.on('click', function() {
                if (input.prop('checked')) {

                    var _token = form_get_subtopic_status.find("input[name='_token']").val();
                    $.post(form_get_subtopic_status.attr('action'), {
                        _token: _token,
                        subtopic: subtopic,
                        status: response
                    }, function (data, textStatus, jqXHR) {
                    }).done(function(data) {
                        if (data.description != null) {
                            textarea.val(data.description);
                        } else {
                            textarea.val('Não possui descrição, escreva aqui uma descrição para este tópico');
                        }
                    });
                }
            });
        }
        function updateDescriptionSubtopic(name_file, count, subtopic, response) {
            var textarea = $("textarea[id="+name_file+"text_"+count+"]");
            var div = $("div[id=div_"+name_file+"_"+count+"]");

            textarea.on('focusout', function() {
                div.find("i.text-primary").removeClass('hide');

                var _token = form_update_subtopic_status.find("input[name='_token']").val();
                $.post(form_update_subtopic_status.attr('action'), {
                    _token: _token,
                    subtopic: subtopic,
                    status: response,
                    description: textarea.val()
                }, function (data, textStatus, jqXHR) {
                    div.find("i.text-primary").addClass('hide');
                }).done(function(data) {

                    if (data) {
                        div.find("span.text-success").removeClass('hide');
                    } else {
                        div.find("span.text-danger").removeClass('hide');
                    }
                });
            });
        }
        // Ajax
    }
});