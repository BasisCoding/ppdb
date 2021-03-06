<div class="wrapper wrapper-content  animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-flush nowrap" id="table-pengajar">
                            <thead>
                                <tr>
                                    <th>Action</th>
                                    <th>NIK</th>
                                    <th>Nama Lengkap</th>
                                    <th>Tempat Lahir</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Agama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal inmodal" id="modal-view" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated flipInY">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <img width="100" height="100" src="<?= site_url('assets/img/users/default.png') ?>" alt="img_users" id="foto_detail">
				<h4 class="modal-title" id="nama_lengkap_detail"></h4>
            </div>
            <div class="modal-body">
                <div class="row">
					<div class="col-md">
						<label for="">Username</label>
						<span id="username_detail"></span>
					</div>

					<div class="col-md">
						<label for="">Email</label>
						<span id="email_detail"></span>
					</div>
				</div>

				<div class="row">
					<div class="col-md">
						<label for="">NIK</label>
						<span id="nik_detail"></span>
					</div>
				</div>

				<div class="row">
					<div class="col-md">
						<label for="">Tempat Lahir</label>
						<span id="tempat_lahir_detail"></span>
					</div>

					<div class="col-md">
						<label for="">Tanggal Lahir</label>
						<span id="tanggal_lahir_detail"></span>
					</div>
				</div>

				<div class="row">
					<div class="col-md">
						<label for="">Jenis Kelamin</label>
						<span id="jenis_kelamin_detail"></span>
					</div>

					<div class="col-md">
						<label for="">Agama</label>
						<span id="agama_detail"></span>
					</div>
				</div>

				<div class="row">
					<div class="col-md">
						<label for="">Pendidikan</label>
						<span id="pendidikan_detail"></span>
					</div>

					<div class="col-md">
						<label for="">Status</label>
						<span id="status_detail"></span>
					</div>
				</div>
            </div>
        </div>
    </div>
</div>

<div class="modal inmodal" id="modal-create" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated flipInY">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">TAMBAH DATA</h4>
                <small class="font-bold">Formulir ini digunakan untuk menambah data penduduk.</small>
            </div>
            <div class="modal-body">
                <form id="form-create" role="form" method="POST" enctype="multipart/form-data">

                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label>Username</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="username" placeholder="">
                                    <div class="input-group-append">
                                        <span class="input-group-addon">
                                            <input type="checkbox" name="username_default" title="Default NIK">
                                        </span>
                                    </div>
                                </div>
                                <small>Jika </small> &#9745; <small> maka NIK adalah username</small>
                            </div>
                        </div>

                        <div class="col-md">
                            <div class="form-group">
                                <label>Password</label>
                                <div class="input-group">
                                    <input type="text" name="password" class="form-control">
                                    <div class="input-group-append">
                                        <span class="input-group-addon">
                                            <input type="checkbox" name="password_default" title="Default Tanggal Lahir">
                                        </span>
                                    </div>
                                </div>
                                <small>Jika </small> &#9745; <small> maka Password adalah tanggal lahir</small>
                            </div>
                        </div>
                    </div>

                    <div class="row">
						<div class="col-md">
							<div class="form-group">
								<label for="email">Email</label>
								<input type="email" class="form-control" name="email">
							</div>
						</div>
					</div>

                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label>NIK</label>
                                <input type="text" class="form-control" name="nik" data-mask="9999999999999999" placeholder="">
                            </div>
                        </div>

                        <div class="col-md">
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" name="nama_lengkap" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label>Tempat Lahir</label>
                                <input type="text" class="form-control" name="tempat_lahir" placeholder="">
                            </div>
                        </div>

                        <div class="col-md">
                            <div class="form-group">
                                <label>Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <select class="form-control chosen-select" name="jenis_kelamin">
                                    <option value="Pria">Pria</option>
                                    <option value="Wanita">Wanita</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md">
                            <div class="form-group">
                                <label>Agama</label>
                                <select class="form-control chosen-select" name="agama">
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen">Kristen</option>
                                    <option value="Katholik">Katholik</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Budha">Budha</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Pendidikan</label>
                                <select class="form-control chosen-select" name="pendidikan">
                                    <option value="TIDAK / BELUM SEKOLAH">TIDAK / BELUM SEKOLAH</option>
                                    <option value="BELUM TAMAT SD / SEDERAJAT">BELUM TAMAT SD / SEDERAJAT</option>
                                    <option value="TAMAT SD / SEDERAJAT">TAMAT SD / SEDERAJAT</option>
                                    <option value="SLTP / SEDERAJAT">SLTP / SEDERAJAT</option>
                                    <option value="SLTA / SEDERAJAT">SLTA / SEDERAJAT</option>
                                    <option value="DIPLOMA IV/ STRATA I">DIPLOMA IV/ STRATA I</option>
                                    <option value="DIPLOMA I / II">DIPLOMA I / II</option>
                                    <option value="AKADEMI/ DIPLOMA III/S. MUDA">AKADEMI/ DIPLOMA III/S. MUDA</option>
                                    <option value="STRATA II">STRATA II</option>
                                    <option value="STRATA III">STRATA III</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md">
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control chosen-select" name="status">
                                    <option value="1">Aktif</option>
                                    <option value="0">Tidak Aktif</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                <button type="submit" id="btn-create" class="btn btn-primary" form="form-create">Save</button>
            </div>
        </div>
    </div>
</div>

<div class="modal inmodal" id="modal-update" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated flipInY">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title">UPDATE DATA</h4>
                <small class="font-bold">Formulir ini digunakan untuk mengubah data pengajar.</small>
            </div>
            <div class="modal-body">
                <form id="form-update" role="form" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id">
                    <input type="hidden" name="user_id">
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label>Username</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="username_update" placeholder="">
                                    <div class="input-group-append">
                                        <span class="input-group-addon">
                                            <input type="checkbox" name="username_lama" title="Ubah Username">
                                        </span>
                                    </div>
                                </div>
                                <small>Hilangkan centang</small> &#9745; <small>untuk ubah Username</small>
                            </div>
                        </div>
                    </div>

                    <div class="row">
						<div class="col-md">
							<div class="form-group">
								<label for="email">Email</label>
								<input type="email" class="form-control" name="email_update">
							</div>
						</div>
					</div>

                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label>NIK</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="nik_update" data-mask="9999999999999999" placeholder="">
                                    <div class="input-group-append">
                                        <span class="input-group-addon">
                                            <input type="checkbox" name="nik_lama" title="Ubah NIK">
                                        </span>
                                    </div>
                                </div>
                                <small>Hilangkan centang</small> &#9745; <small>untuk ubah NIK</small>
                            </div>
                        </div>

                        <div class="col-md">
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" name="nama_lengkap_update" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label>Tempat Lahir</label>
                                <input type="text" class="form-control" name="tempat_lahir_update" placeholder="">
                            </div>
                        </div>

                        <div class="col-md">
                            <div class="form-group">
                                <label>Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir_update" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <select class="form-control chosen-select" name="jenis_kelamin_update">
                                    <option value="Pria">Pria</option>
                                    <option value="Wanita">Wanita</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md">
                            <div class="form-group">
                                <label>Agama</label>
                                <select class="form-control chosen-select" name="agama_update">
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen">Kristen</option>
                                    <option value="Katholik">Katholik</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Budha">Budha</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Pendidikan</label>
                                <select class="form-control chosen-select" name="pendidikan_update">
                                    <option value="TIDAK / BELUM SEKOLAH">TIDAK / BELUM SEKOLAH</option>
                                    <option value="BELUM TAMAT SD / SEDERAJAT">BELUM TAMAT SD / SEDERAJAT</option>
                                    <option value="TAMAT SD / SEDERAJAT">TAMAT SD / SEDERAJAT</option>
                                    <option value="SLTP / SEDERAJAT">SLTP / SEDERAJAT</option>
                                    <option value="SLTA / SEDERAJAT">SLTA / SEDERAJAT</option>
                                    <option value="DIPLOMA IV/ STRATA I">DIPLOMA IV/ STRATA I</option>
                                    <option value="DIPLOMA I / II">DIPLOMA I / II</option>
                                    <option value="AKADEMI/ DIPLOMA III/S. MUDA">AKADEMI/ DIPLOMA III/S. MUDA</option>
                                    <option value="STRATA II">STRATA II</option>
                                    <option value="STRATA III">STRATA III</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md">
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control chosen-select" name="status_update">
                                    <option value="1">Aktif</option>
                                    <option value="0">Tidak Aktif</option>
                                </select>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                <button type="submit" id="btn-update" class="btn btn-primary" form="form-update">Update</button>
            </div>
        </div>
    </div>
</div>
