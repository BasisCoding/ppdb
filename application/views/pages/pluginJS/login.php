<!-- Ladda -->
<script src="<?= site_url('assets/js/plugins/ladda/spin.min.js') ?>"></script>
<script src="<?= site_url('assets/js/plugins/ladda/ladda.min.js') ?>"></script>
<script src="<?= site_url('assets/js/plugins/ladda/ladda.jquery.min.js') ?>"></script>

<script type="text/javascript">
	var loading = $( '.ladda-button' ).ladda();

	$(document).ready(function() {
		$('#form-login').on('submit', function() {
			$.ajax({
				url: '<?= base_url('login/process') ?>',
				type: 'POST',
				dataType: 'JSON',
				data: $(this).serialize(),
				beforeSend: function () {
					loading.ladda('start');				
				},
				success: function(response) {
					loading.ladda('stop');				
					notification(response.type, response.message);

					setTimeout(function() {
						window.location.href = response.redirect;
					}, 1500);
				}
			});

			return false;
		});
	});
</script>