$(function() {
    var new_paragraphs = $('#new_paragraphs');
    var input_count_paragraphs = $('#count_paragraphs');
    var additional_paragraphs = $('#additional_paragraphs');

    var count_paragraphs = input_count_paragraphs.val();
    new_paragraphs.on('click', function (event) {
        event.preventDefault();
        count_paragraphs++;

        additional_paragraphs.find('.card-body').append(
            "<div class='item_additional_"+count_paragraphs+" col-md-6'>"+
                "<div class='form-group'>"+
                    "<label for='title_"+count_paragraphs+"' class='col-form-label'>"+
                        "Titulo"+
                        "<a href='#' class='m-l-10 text-danger remov_paragraph_"+count_paragraphs+"'>Remover parágrafo</a>"+
                    "</label>"+
                    "<input id='title_"+count_paragraphs+"' name='additional_paragraphs["+count_paragraphs+"][title]' class='form-control'>"+
                "</div>"+
                "<div class='form-group'>"+
                    "<label for='description_"+count_paragraphs+"' class='col-form-label'>"+
                        "Descrição"+
                    "</label>"+
                    "<textarea id='description_"+count_paragraphs+"' name='additional_paragraphs["+count_paragraphs+"][description]' class='form-control elm1' rows='4'></textarea>"+
                "</div>"+
            "</div>"
        );

        var remov_btn = $('.remov_paragraph_'+count_paragraphs);
        removeParagraph(remov_btn, count_paragraphs);
    });


    var items_paragraphs = $('.items_paragraphs');
    if (items_paragraphs.length > 0) {
        items_paragraphs.each(function (index, item_paragraph) {
            item_paragraph = $(this);
            var data_count_paragraphs = item_paragraph.data('count_paragraphs');

            var remov_btn = $('.remov_paragraph_'+data_count_paragraphs);
            removeParagraph(remov_btn, data_count_paragraphs);
        });
    }

    function removeParagraph(remov_btn, count_paragraphs)
    {
        remov_btn.on('click', function(event) {
            event.preventDefault();
            $('.item_additional_'+count_paragraphs).remove();
        });
    }
});