$(function()
{
    var check_update_password = $('#check_update_password');
    var div_update_password = $('#div_update_password');

    if (check_update_password.length) {
        check_update_password.on('change', function()
        {
            if (check_update_password.prop('checked')) {
                showDiv(div_update_password);
            } else{
                hideDiv(div_update_password);

                div_update_password.find('input').val('');
            }
        });
    
        function showDiv(element)
        {
            element.fadeIn('1500');
        }
        function hideDiv(element)
        {
            element.fadeOut('1500');
        }
    }
});