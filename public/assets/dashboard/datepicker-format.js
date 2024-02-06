'use strict';

(function() {
    var bsDatepickerBasic = $('#bs-datepicker-basic'),
    bsDatepickerFormat = $('#bs-datepicker-format'),
    bsDatepickerRange = $('#bs-datepicker-daterange'),
    bsDatepickerDisabledDays = $('#bs-datepicker-disabled-days'),
    bsDatepickerMultidate = $('#bs-datepicker-multidate'),
    bsDatepickerOptions = $('#bs-datepicker-options'),
    bsDatepickerAutoclose = $('#bs-datepicker-autoclose'),
    bsDatepickerInlinedate = $('#bs-datepicker-inline');
    
    // Format
    if (bsDatepickerFormat.length) {
        bsDatepickerFormat.datepicker({
            todayHighlight: true,
            format: 'yyyy/mm/dd',
            orientation: isRtl ? 'auto right' : 'auto left'
        });
    }
    
})();