$(document).ready(function () {


    //----------------------------------------
    // side bar toggling
    //----------------------------------------
    var jBody = $('body');
    var jSidebar = $('#body-sidebar'); // the sidebar

    $('#header-navbar-toggler').on('click', function () {
        if (jBody.hasClass("sidebar-show")) {
            jBody.removeClass('sidebar-show');
            jBody.addClass('sidebar-hide');
        } else if (jBody.hasClass("sidebar-hide")) {
            jBody.removeClass('sidebar-hide');
            jBody.addClass('sidebar-show');
        } else {
            // default behaviour, if small screen, we show the sidebar, if large screen, we hide the sidebar
            var isSmallScreen = true;
            var marginLeft = parseInt(jSidebar.css('margin-left'));
            if (0 === marginLeft) {
                isSmallScreen = false;
            }

            if (true === isSmallScreen) {
                jBody.addClass('sidebar-show');
            } else {
                jBody.addClass('sidebar-hide');
            }
        }
        return false;
    });


    var jToolBox = $('#aside-toolbox');
    $("#aside-toolbox-toggler").on('click', function () {
        jToolBox.toggleClass('show');
        return false;
    });

    jToolBox.find('[name="zero_change_theme_color"]').on('change', function () {
        var theme = $(this).val();
        if ('light' === theme) {
            jBody.addClass('skin-light');
        } else {
            jBody.removeClass('skin-light');
        }
        Cookies.set('zero_admin_theme', theme, {
            expires: 7
        });
    });


    // init theme
    var currentTheme = Cookies.get('zero_admin_theme');
    if ('light' === currentTheme) {
        $('#zeroadmin-skin-light').prop('checked', true);
        jBody.addClass('skin-light');
    } else {
        $('#zeroadmin-skin-default').prop('checked', true);
    }


    //----------------------------------------
    // popovers & tooltips & toasts
    //----------------------------------------
    $(function () {
        $('[data-toggle="popover"]').popover();
        $('[data-toggle="tooltip"]').tooltip();
    })
});