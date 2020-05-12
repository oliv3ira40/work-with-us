$(function()
{
    var div_btn_dark_mode = $('.div-btn-dark-mode');
    var form_update_dark_mode = $('#update_dark_mode');

    if (div_btn_dark_mode.length) {
        var label_dark_mode = $('#label-dark-mode');
        var span_dark_mode = div_btn_dark_mode.find('span');

        label_dark_mode.on('click', function()
        {
            form_update_dark_mode.submit();
        });
        span_dark_mode.on('click', function()
        {
            form_update_dark_mode.submit();
        });
    }
});