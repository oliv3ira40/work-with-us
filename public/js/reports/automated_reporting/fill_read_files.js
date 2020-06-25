$(function() {
    var file_read = $(".file_read");
    var btn_generate_report = $('.btn_generate_report');
    var form_generate_report = $('#form_generate_report');

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
            // console.log(name_file);
            
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

                    if (responses.length > 1) {
                        // div_body_file.append('<span>T</span>');
                        div_body_file.append(
                            "<div class='col-md-12'>"+
                                "<p class='font-600 mb-0 font-10'>"+
                                    responses[0].replace('- ', '')+
                                    "<span class='text-"+class_color+" pull-right'>"+responses[1]+"</span>"+
                                "</p>"+
                                "<div class='progress progress-bar-"+class_color+"-alt progress-sm m-b-5'>"+
                                    "<div class='progress-bar progress-bar-"+class_color+" wow' role='progressbar' aria-valuenow='100' aria-valuemin='0' aria-valuemax='100' style='width: 0%; visibility: visible;'>"+
                                    "</div>"+
                                "</div>"+
                            "</div>"
                        );
                    } else {
                        // TRAZ TEXTO DE ERRO
                        // var last_item = div_body_file.find('.col-md-12').last();

                        // if (last_item.find('.msg_error').length == 0) {
                        //     last_item.find('p').append("<p class='font-10 msg_error mb-0'></p>");
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



        // CRIANDO INPUTS DO FORMULARIO
        form_generate_report.append("<input type='hidden' name='data'>");
        $.each(data, function (name_file, topics) {
            // console.log(name_file, topics);
            form_generate_report.append("<input type='hidden' name='data["+name_file+"]'>");
            
            $.each(topics, function (name_topic, topic) {
                // console.log(name_topic, topic);
                form_generate_report.append("<input type='hidden' name='data["+name_file+"]["+name_topic+"]'>");
                
                $.each(topic, function (key, responses) {
                    // console.log(responses);
                    if (responses.length > 1) {
                        form_generate_report.append("<input type='hidden' name='data["+name_file+"]["+name_topic+"]["+responses[0]+"]' value='"+responses[1]+"'>");
                    } else {
                        form_generate_report.append("<input type='hidden' name='data["+name_file+"]["+name_topic+"][text][]' value='"+responses[0]+"'>");
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
            } else if (value == 'WARNING') {
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