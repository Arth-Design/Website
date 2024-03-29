(function ($) {
	"use strict";
	
	$(document).ready(function () {
		edgtfInitSelectChange();
		edgtfInitRadioChange();
	});
	
	function edgtfInitSelectChange() {
		$(document).on('change', 'select.dependence', function () {
			var valueSelected = this.value.replace(/ /g, '');
			$($(this).data('hide-' + valueSelected)).fadeOut();
			$($(this).data('show-' + valueSelected)).fadeIn();
		});
	}
	
	function edgtfInitRadioChange() {
		$(document).on('change', 'input[type="radio"].dependence', function () {
			var dataHide = $(this).data('hide');
			var dataShow = $(this).data('show');
			var elementsToShow = '';
			if (typeof (dataHide) !== 'undefined' && dataHide !== '') {
				elementsToHide = dataHide.split(',');
				$.each(elementsToHide, function (index, value) {
					$(value).fadeOut();
				});
			}
			
			if (typeof (dataShow) !== 'undefined' && dataShow !== '') {
				elementsToShow = dataShow.split(',');
				$.each(elementsToShow, function (index, value) {
					$(value).fadeIn();
				});
			}
		});
	}
	
})(jQuery);