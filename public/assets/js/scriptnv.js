document.documentElement.className = 'js';
/*! jQuery Migrate v1.4.1 | (c) jQuery Foundation and other contributors | jquery.org/license */
"undefined" == typeof jQuery.migrateMute && (jQuery.migrateMute = !0),



(function($) {
    $(document).ready(function() {

       

        if ($('.tablecol_priceblock').length > 0) {
            $('.tablecol_priceblock').closest('.sg-offertable').addClass('sg-offertable-priced')
        }
        if ($('.sg-offertable').length > 0) {
            $('.sg-offertable').each(function() {
                sg_set_table_button_disabled($(this))
            })
        }
        function sg_set_table_button_disabled($offertable) {
            var container = $offertable;
            var current_index = container.find('.sg-offertable-ms-current').index();
            var max_index = container.find('.sg-offertable-mobileswitcher_item').length;
            if ($(window).width() > 575) {
                max_index = max_index - 1
            }
            if ($(window).width() > 767) {
                max_index = max_index - 1
            }
            if ($(window).width() > 1023) {
                max_index = max_index - 1
            }
            if (current_index === 1 && !($(this).hasClass('sg-offertable-mobileswitcher_next') && current_index === max_index)) {
                container.find('.sg-offertable-mobileswitcher_prev').addClass('disabled')
            } else {
                container.find('.sg-offertable-mobileswitcher_prev.disabled').removeClass('disabled')
            }
            if (current_index === max_index) {
                container.find('.sg-offertable-mobileswitcher_next').addClass('disabled')
            } else {
                container.find('.sg-offertable-mobileswitcher_next.disabled').removeClass('disabled')
            }
        }
        $('.sg-offertable-mobileswitcher_button').click(function() {
            var container = $(this).closest('.sg-offertable');
            var current_index = $(this).closest('.sg-offertable-mobileswitcher').find('.sg-offertable-ms-current').index();
            var max_index = $(this).closest('.sg-offertable-mobileswitcher').find('.sg-offertable-mobileswitcher_item').length;
            if ($(window).width() > 575) {
                max_index = max_index - 1
            }
            if ($(window).width() > 767) {
                max_index = max_index - 1
            }
            if ($(window).width() > 1023) {
                max_index = max_index - 1
            }
            if ($(this).hasClass('sg-offertable-mobileswitcher_prev')) {
                var next_index = current_index - 1
            } else if ($(this).hasClass('sg-offertable-mobileswitcher_next')) {
                var next_index = current_index + 1
            }
            if (!($(this).hasClass('sg-offertable-mobileswitcher_prev') && current_index === 1) && !($(this).hasClass('sg-offertable-mobileswitcher_next') && current_index === max_index)) {
                container.find('tr td').removeClass('sg-offertable-ms-current');
                container.find('thead th').removeClass('sg-offertable-ms-current');
                container.find('thead th:nth-of-type(' + (next_index + 1) + ')').addClass('sg-offertable-ms-current');
                container.find('tr td:nth-of-type(' + next_index + ')').addClass('sg-offertable-ms-current');
                container.find('.sg-offertable-mobileswitcher .sg-offertable-mobileswitcher_item').removeClass('sg-offertable-ms-current');
                container.find('.sg-offertable-mobileswitcher .sg-offertable-mobileswitcher_item:nth-of-type(' + next_index + ')').addClass('sg-offertable-ms-current')
            }
            sg_set_table_button_disabled(container)
        });

       
    })
}
)(jQuery);
var job_manager_select2_args = {
    "width": "100%"
};