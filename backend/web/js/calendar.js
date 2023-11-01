jQuery(document).ready(function(){
   jQuery('.datetimepicker').datepicker({
		timepicker: true,
		range: true,
		multipleDates: true,
		multipleDatesSeparator: " - "
    });

    jQuery('#timesheet-time_from, #timesheet-time_to').datetimepicker({
		datepicker:false,
		format: "H:i",
	});

    $('#timesheet-time_from').val('08:00');
    $('#timesheet-time_to').val('17:00');
});

(function () {    
    'use strict';
    // ------------------------------------------------------- //
    // Calendar
    // ------------------------------------------------------ //
	jQuery(function() {
		// page is ready
		jQuery('#calendar').fullCalendar({
			closeText: "Đóng",
			prevText: "Trước",
			nextText: "Sau",
			currentText: "Hôm nay",
			monthNames: ['Tháng Một', 'Tháng Hai', 'Tháng Ba', 'Tháng Tư', 'Tháng Năm', 'Tháng Sáu','Tháng Bảy', 'Tháng Tám', 'Tháng Chín', 'Tháng Mười', 'Tháng Mười Một', 'Tháng Mười Hai'],
			monthNamesShort: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6','Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
			dayNames: ["Chủ nhật", "Thứ hai", "Thứ ba", "Thứ tư", "Thứ năm", "Thứ sáu", "Thứ bảy"],
			dayNamesShort: ["CN", "Hai", "Ba", "Tư", "Năm", "Sáu", "Bảy"],
			dayNamesMin: ["CN", "T2", "T3", "T4", "T5", "T6", "T7"],
			weekHeader: "Tuần",
			dateFormat: "dd/mm/yy",
			firstDay: 1,
			isRTL: false,
			showMonthAfterYear: false,
			yearSuffix: "",
			themeSystem: 'bootstrap4',
			// emphasizes business hours
			businessHours: false,
			defaultView: 'month',
			buttonText: {
				today:    'Hôm nay',
				month:    'Tháng',
				week:     'Tuần',
				day:      'Ngày',
				list:     'Danh sách'
			},
			// event dragging & resizing
			editable: true,
			// header
			header: {
				left: 'title',
				center: 'month,agendaWeek,agendaDay',
				right: 'today prev,next'
			},
			events: window.data_day,
			eventRender: function(event, element) {
				if(event.icon){
					element.find(".fc-title").prepend("<i class='fa fa-clock-o'></i>");
				}
			  },
			dayClick: function(date, jsEvent, view) {
				$('#timesheet-date').val(date.format());
				$('#timesheet-date_submitted').val(date.format());
				jQuery('#modal-view-event-add').modal();
			},
			eventClick: function(event, jsEvent, view) {
				console.log(event)
		        jQuery('.event-icon').html("<i class='fa fa-clock-o'></i>");
				jQuery('.event-title').html('Start time: '+ event.title+ ' End time: '+ event.icon);
				jQuery('.event-body').html(event.description);
				jQuery('.eventUrl').attr('href', event.url);
				jQuery('#modal-view-event').modal();
			},
			weekends: true, 
		})
	});
  
})(jQuery);