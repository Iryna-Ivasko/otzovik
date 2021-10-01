// require jquery.min.js

// require what-input.min.js

// Core Foundation files
//=require foundation.core.min.js
//=require foundation.util.*.min.js

// require foundation.dropdown.min.js
// require foundation.responsiveMenu.min.js
// require foundation.responsiveToggle.min.js
// require foundation.toggler.min.js
// require foundation.offcanvas.min.js
//
// to inlude foundation plugins add "=" sign below
//
// require foundation.abide.min.js
// require foundation.accordion.min.js
// require foundation.accordionMenu.min.js
// require foundation.drilldown.min.js
// require foundation.dropdownMenu.min.js
// require foundation.equalizer.min.js
// require foundation.interchange.min.js
// require foundation.magellan.min.js

// require foundation.reveal.min.js
// require foundation.slider.min.js
// require foundation.sticky.min.js
// require foundation.tabs.min.js
// require foundation.tooltip.min.js
// require foundation.zf.responsiveAccordionTabs.min.js

// require slick.min.js
//
// Google Map ACF functions
// require components/map.js

;
(function ($) {
    // init Foundation
    $(document).foundation();

    //function for campaigns breadcrumb
    function changeBreadcrumb() {
        let parentTitle = $('.js-category-input:checked').attr('parent-title'),
            childrenTitle = $('.js-category-input:checked').attr('children-title'),
            path = `${parentTitle ? ' / ' + parentTitle : ''}${childrenTitle ? ' / ' + childrenTitle : ''}`;
        $('.js-breadcrumbs-path').text(path);
    }

    // function for ajax filter campaings
    function ajaxFilterAction(currentPage = 1, searchText = '') {
        let filter = $('.js-filter'), //first page as default
            searchFormInput = $('.js-search-form').find('.js-search-field');

        searchText = searchFormInput ? searchFormInput.val() : searchText;
        let searchData = searchText ? '&searchText=' + searchText : ''; // if has search text
        $.ajax({
            url: filter.attr('action'),
            data: filter.serialize() + '&currentPage=' + currentPage + searchData, // form data
            type: filter.attr('method'), // POST
            beforeSend: function (xhr) {
                $('.js-spinner').show(); // show spinner
            },
            success: function (data) {
                $('.js-spinner').hide(); // hide spinner
                searchText ? $('.js-clear-search').show() : $('.js-clear-search').hide(); // show clear search if searchText not empty
                changeBreadcrumb();// change breadcrumb path
                $('.js-response').html(data); // insert data
            }
        });
    }

    $(document).ready(function () {
        //first loading of campaigns
        ajaxFilterAction();

        $('.js-filter').change(function () {
            //reloading campaigns on form change
            ajaxFilterAction();
        });

        $('.js-search-submit').on('click', function () {
            let searchText = $('.js-search-form').find('.js-search-field').val();
            //reloading campaigns on search submin
            if (searchText) {
                ajaxFilterAction(1, searchText);
            }
        });

        $('.js-clear-search').on('click', function () {
            //clear search form input value and reload campaigns
            $('.js-search-form').find('.js-search-field').val('');
            ajaxFilterAction();

        });

        $('.js-campaigns-wrapper').on('click', function (e) {
            let eventTarget = $(e.target);
            if (eventTarget.hasClass('js-campaign-link')) {
                // redirect to clicked link
                location.href = eventTarget.attr('href');
            }
            if (eventTarget.hasClass('js-pag-btn')) {
                let currentPage = eventTarget.attr('will-be-current');
                //reloading campaigns on pagination
                ajaxFilterAction(currentPage);
            }
        });

        $('.js-toggle-filter').on('click', function () {
            $(this).toggleClass('opened');
            $('.js-filter').toggleClass('active');

        });
    });

    $(window).load(function () {

    });

    $(window).on('resize', function () {

    });


})(jQuery);



















