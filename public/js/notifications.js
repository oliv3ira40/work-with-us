$(function()
{
	var config_notifications = $("#config_notifications");
	
	if (config_notifications.text().length > 0)
	{
		var defined_type = config_notifications.attr('data-type');
		
		Command: toastr[defined_type](config_notifications.text())

		toastr.options = {
		"closeButton": false,
		"debug": false,
		"newestOnTop": false,
		"progressBar": false,
		"positionClass": "toast-top-right",
		"preventDuplicates": false,
		"onclick": null,
		"showDuration": "200",
		"hideDuration": "1000",
		"timeOut": "8000",
		"extendedTimeOut": "4000",
		"showEasing": "linear",
		"hideEasing": "linear",
		"showMethod": "fadeIn",
		"hideMethod": "fadeOut"
		}
	}

});