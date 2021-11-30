   
<!-- Mainly scripts -->
<script src="<?= site_url('assets/js/jquery-3.1.1.min.js') ?>"></script>
<script src="<?= site_url('assets/js/popper.min.js') ?>"></script>
<script src="<?= site_url('assets/js/bootstrap.js') ?>"></script>
<script src="<?= site_url('assets/js/plugins/metisMenu/jquery.metisMenu.js') ?>"></script>
<script src="<?= site_url('assets/js/plugins/slimscroll/jquery.slimscroll.min.js') ?>"></script>

<!-- Custom and plugin javascript -->
<script src="<?= site_url('assets/js/inspinia.js') ?>"></script>
<script src="<?= site_url('assets/js/plugins/pace/pace.min.js') ?>"></script>

<script>
    var active = '<?= $this->uri->segment(1) ?>';
    $('[data-name="'+active+'"]').addClass('active');

    var sub = $('[data-name="'+active+'"]').attr('data-type');
    if (sub == 'sub') {
        $('[data-name="'+active+'"]').addClass('active in');
    }

</script>

</body>
</html>
