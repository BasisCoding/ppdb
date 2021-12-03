<div class="wrapper wrapper-content  animated fadeInRight">
	<form id="form-config" class="row" method="POST" enctype="multipart/form-data">
		<div class="col-md-8">
			<div class="ibox">
				<div class="ibox-title">
					<h3>Data Konfigurasi</h3>
				</div>

				<div class="ibox-content">
					<div class="form-group  row">
						<label class="col-sm-2 col-form-label">Nama Aplikasi</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="app_name" placeholder="Sistem Informasi ....">
						</div>
					</div>

					<div class="form-group  row">
						<label class="col-sm-2 col-form-label">Slug Aplikasi</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="app_name_slug" placeholder="SILINK">
						</div>
					</div>

					<div class="row">
						<div class="col-md-3">
							<div class="form-group  row">
								<label class="col-sm-4 col-form-label">RT</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" name="rt">
								</div>
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group  row">
								<label class="col-sm-4 col-form-label">RW</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" name="rw">
								</div>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group  row">
								<label class="col-sm-4 col-form-label">Kode POS</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" name="kode_pos">
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group  row">
								<label class="col-sm-3 col-form-label">Provinsi</label>
								<div class="col-sm-9">
									<select class="chosen-select" id="prov" name="provinsi">

									</select>
								</div>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group  row">
								<label class="col-sm-3 col-form-label">Kabupaten</label>
								<div class="col-sm-9">
									<select class="chosen-select" id="kota" name="kota">
									</select>
								</div>
							</div>
						</div>

					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group  row">
								<label class="col-sm-3 col-form-label">Kecamatan</label>
								<div class="col-sm-9">
									<select class="chosen-select" id="kec" name="kecamatan">
									</select>
								</div>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group  row">
								<label class="col-sm-3 col-form-label">Kelurahan</label>
								<div class="col-sm-9">
									<select class="chosen-select" id="kel" name="kelurahan">

									</select>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group  row">
								<label class="col-sm-3 col-form-label">Lattitude</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="lattitude">
								</div>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group  row">
								<label class="col-sm-3 col-form-label">Longitude</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="longitude">
								</div>
							</div>
						</div>
					</div>

					<div class="form-group  row">
						<label class="col-sm-3 col-form-label">Email</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" placeholder="abc@gmail.com" name="email">
						</div>
					</div>

					<div class="form-group  row">
						<label class="col-sm-3 col-form-label">Website</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" placeholder="https://silink.example.com" name="website">
						</div>
					</div>

				</div>
			</div>
		</div>

		<div class="col-md-4">
			<div class="ibox">
				<div class="ibox-title">
					<div class="row">
						<div class="col-sm">
							<h3>Logo</h3>
						</div>

						<div class="col-sm">
							<?php
							if (_LOGO != "") {?>
								<img width="80" height="30" class="img-fluid" src="<?= site_url('assets/images/'._LOGO) ?>">
							<?php } ?>
						</div>
					</div>
				</div>
				<div class="ibox-content">
					<div id="logo-preview"></div>
					<div class="form-group form-group-logo">
						<input type="file" name="logo" class="filepond satu" data-allow-reorder="true" data-max-file-size="3MB">
					</div>
				</div>
			</div>

			<div class="ibox">
				<div class="ibox-title">
					<div class="row">
						<div class="col-sm">
							<h3>Logo</h3>
						</div>

						<div class="col-sm">
							<?php
							if (_APP_ICON != "") {?>
								<img width="30" height="5" class="img-fluid" src="<?= site_url('assets/images/'._APP_ICON) ?>">
							<?php } ?>
						</div>
					</div>
				</div>
				<div class="ibox-content">
					<div id="icon-preview"></div>
					<div class="form-group form-group-icon">
						<input type="file" name="icon" class="filepond satu" data-allow-reorder="true" data-max-file-size="3MB">
					</div>
				</div>
			</div>
		</div>
	</form>
</div>