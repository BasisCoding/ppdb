    <!-- Mainly scripts -->
    <script src="<?= site_url('assets/js/jquery-3.1.1.min.js') ?>"></script>
    <script src="<?= site_url('assets/js/popper.min.js') ?>"></script>
    <script src="<?= site_url('assets/js/bootstrap.js') ?>"></script>
    <script src="<?= site_url('assets/js/plugins/metisMenu/jquery.metisMenu.js') ?>"></script>
    <script src="<?= site_url('assets/js/plugins/slimscroll/jquery.slimscroll.min.js') ?>"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?= site_url('assets/js/inspinia.js') ?>"></script>
    <script src="<?= site_url('assets/js/plugins/pace/pace.min.js') ?>"></script>
    <script src="<?= site_url('assets/js/plugins/wow/wow.min.js') ?>"></script>


    <script>

        $(document).ready(function () {

            $('body').scrollspy({
                target: '#navbar',
                offset: 80
            });

            // Page scrolling feature
            $('a.page-scroll').bind('click', function(event) {
                var link = $(this);
                $('html, body').stop().animate({
                    scrollTop: $(link.attr('href')).offset().top - 50
                }, 500);
                event.preventDefault();
                $("#navbar").collapse('hide');
            });
        });

        var cbpAnimatedHeader = (function() {
            var docElem = document.documentElement,
            header = document.querySelector( '.navbar-default' ),
            didScroll = false,
            changeHeaderOn = 200;
            function init() {
                window.addEventListener( 'scroll', function( event ) {
                    if( !didScroll ) {
                        didScroll = true;
                        setTimeout( scrollPage, 250 );
                    }
                }, false );
            }
            function scrollPage() {
                var sy = scrollY();
                if ( sy >= changeHeaderOn ) {
                    $(header).addClass('navbar-scroll')
                }
                else {
                    $(header).removeClass('navbar-scroll')
                }
                didScroll = false;
            }
            function scrollY() {
                return window.pageYOffset || docElem.scrollTop;
            }
            init();

        })();

    // Activate WOW.js plugin for animation on scrol
    new WOW().init();

</script>