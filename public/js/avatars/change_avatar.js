$(function()
{
    var avatars = $('.avatar');
    
    if (avatars.length) {
        var input_avatar_id = $('#input_avatar_id');
        
        avatars.each(function(index, avatar)
        {
            avatar = $(this);

            avatar.on('click', function()
            {

                removeSelections();
                selectAvatar(avatar);
                input_avatar_id.val(avatar.attr('data-avatar_id'));
            });
        });
        
        
        
        
        function selectAvatar(element)
        {
            element.addClass('select_avatar');
        }
    
        function removeSelections()
        {
            avatars.removeClass('select_avatar');
        }
    }
});