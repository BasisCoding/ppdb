<div class="wrapper wrapper-content  animated fadeInRight">
	<div class="row">
		<div class="col-md-8">
			<div class="ibox">
				<div class="ibox-title">
					<h3>Data Konfigurasi</h3>
				</div>
				
				<div class="ibox-content">
					<form id="form-config">
						<div class="form-group  row">
							<label class="col-sm-2 col-form-label">Nama Aplikasi</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" placeholder="Sistem Informasi ....">
							</div>
						</div>

						<div class="form-group  row">
							<label class="col-sm-2 col-form-label">Slug Aplikasi</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" placeholder="SILINK">
							</div>
						</div>

						<div class="row">
							<div class="col-md-3">
								<div class="form-group  row">
									<label class="col-sm-4 col-form-label">RT</label>
									<div class="col-sm-7">
										<input type="text" class="form-control">
									</div>
								</div>
							</div>

							<div class="col-md-3">
								<div class="form-group  row">
									<label class="col-sm-4 col-form-label">RW</label>
									<div class="col-sm-7">
										<input type="text" class="form-control">
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group  row">
									<label class="col-sm-4 col-form-label">Kode POS</label>
									<div class="col-sm-8">
										<input type="text" class="form-control">
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group  row">
									<label class="col-sm-3 col-form-label">Provinsi</label>
									<div class="col-sm-9">
										<select class="chosen-select" id="prov">
											
										</select>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group  row">
									<label class="col-sm-3 col-form-label">Kabupaten</label>
									<div class="col-sm-9">
										<select class="chosen-select" id="kota">
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
										<select class="chosen-select" id="kec">
										</select>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group  row">
									<label class="col-sm-3 col-form-label">Kelurahan</label>
									<div class="col-sm-9">
										<select class="chosen-select" id="kel">
											
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
										<input type="text" class="form-control">
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group  row">
									<label class="col-sm-3 col-form-label">Longitude</label>
									<div class="col-sm-9">
										<input type="text" class="form-control">
									</div>
								</div>
							</div>
						</div>

						<div class="form-group  row">
							<label class="col-sm-3 col-form-label">Email</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" placeholder="abc@gmail.com">
							</div>
						</div>

						<div class="form-group  row">
							<label class="col-sm-3 col-form-label">Website</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" placeholder="https://silink.example.com">
							</div>
						</div>

					</form>
				</div>
			</div>
		</div>

		<div class="col-md-4">
			<div class="ibox">
				<div class="ibox-content">
					<div class="form-group">
						<label>Logo</label>
						<input type="file" name="logo" class="filepond satu" data-allow-reorder="true" data-max-file-size="3MB">
					</div>
					<div class="form-group">
						<label>Icon</label>
						<input type="file" name="icon" class="filepond satu" data-allow-reorder="true" data-max-file-size="3MB">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>