$(function() {

    var schooling_available_id = $('#schooling_available_id');
    if (schooling_available_id.length) {
        
        schooling_available_id.on('change', function() {
            var selected_option = schooling_available_id.find('option:selected');
            var compound_register = selected_option.attr('data-compound_register');
            var div_compound_register = $('.div_compound_register');

            if (compound_register != 0) {
                div_compound_register.css('display', 'block');
            } else {
                div_compound_register.css('display', 'none');
            }
        });

    }
});