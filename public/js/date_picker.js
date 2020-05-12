$(function(){


    var daysOfWeek = ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb'];
	var monthNames = [
        'Janeiro',
        'Fevereiro',
        'Março',
        'Abril',
        'Maio',
        'Junho',
        'Julho',
        'Agosto',
        'Setembro',
        'Outubro',
        'Novembro',
        'Dezembro'
    ];

    var date_purchase_date = $('.date_purchase_date');
	if (date_purchase_date.length > 0) {
		date_purchase_date.daterangepicker({
		    // singleDatePicker: true,
		    autoUpdateInput: false,
		    // autoApply: true,
		    // timePicker: true,
		    locale: {
		        format: 'YYYY/MM/DD',
		        applyLabel: "Aplicar",
		        cancelLabel: "Cancelar",
		        fromLabel: "De",
		        toLabel: "Até",
		        daysOfWeek: daysOfWeek,
		        monthNames: monthNames,
		    },
		    timePickerIncrement: 5,
		    timePicker24Hour: true,
		    buttonClasses: ['btn', 'btn-sm'],
		    cancelClass: 'btn-danger',
		    applyClass: 'btn-primary',
		});

		btnApply(date_purchase_date);
		btnCancel(date_purchase_date);
	}
	
	var date_created_at = $('.date_created_at');
	if (date_created_at.length > 0) {
		date_created_at.daterangepicker({
		    // singleDatePicker: true,
		    autoUpdateInput: false,
		    // autoApply: true,
		    // timePicker: true,
		    locale: {
		        format: 'YYYY/MM/DD',
		        applyLabel: "Aplicar",
		        cancelLabel: "Cancelar",
		        fromLabel: "De",
		        toLabel: "Até",
		        daysOfWeek: daysOfWeek,
		        monthNames: monthNames,
		    },
		    timePickerIncrement: 5,
		    timePicker24Hour: true,
		    buttonClasses: ['btn', 'btn-sm'],
		    cancelClass: 'btn-danger',
		    applyClass: 'btn-primary',
		});

		btnApply(date_created_at);
		btnCancel(date_created_at);
	}
	
	var date_promotion_period = $('.date_promotion_period');
	if (date_promotion_period.length > 0) {
		date_promotion_period.daterangepicker({
		    // singleDatePicker: true,
		    autoUpdateInput: false,
		    // autoApply: true,
		    // timePicker: true,
		    locale: {
		        format: 'YYYY/MM/DD',
		        applyLabel: "Aplicar",
		        cancelLabel: "Cancelar",
		        fromLabel: "De",
		        toLabel: "Até",
		        daysOfWeek: daysOfWeek,
		        monthNames: monthNames,
		    },
		    timePickerIncrement: 5,
		    timePicker24Hour: true,
		    buttonClasses: ['btn', 'btn-sm'],
		    cancelClass: 'btn-danger',
		    applyClass: 'btn-primary',
		});

		btnApply(date_promotion_period);
		btnCancel(date_promotion_period);
	}


    function btnApply(date)
	{
		date.on('apply.daterangepicker', function(ev, picker) {
			date.val(
				picker.startDate.format('YYYY/MM/DD')
				+' - '+
				picker.endDate.format('YYYY/MM/DD')
			);
		});
	}
	function btnCancel(date)
	{
		date.on('cancel.daterangepicker', function(ev, picker) {
		  date.val('');
		});
	}
});