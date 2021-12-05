<div class="wrapper wrapper-content  animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-flush nowrap" id="table-penduduk">
                            <thead>
                                <tr>
                                    <th>Action</th>
                                    <th>NIK</th>
                                    <th>Nama Lengkap</th>
                                    <th>Tempat, Tgl Lahir</th>
                                    <th>Agama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Status Menikah</th>
                                    <th>Status Hidup</th>
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
                        <div class="col-md">
                            <div class="form-group">
                                <label>Status Hidup</label>
                                <select class="form-control chosen-select" name="status_hidup">
                                    <option value="Hidup">Hidup</option>
                                    <option value="Meninggal">Meninggal</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md">
                            <div class="form-group">
                                <label>Status Pernikahan</label>
                                <select class="form-control chosen-select" name="status_pernikahan">
                                    <option value="Menikah">Menikah</option>
                                    <option value="Belum Menikah">Belum Menikah</option>
                                    <option value="Janda">Janda</option>
                                    <option value="Duda">Duda</option>
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