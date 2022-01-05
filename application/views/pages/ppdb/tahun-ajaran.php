<div class="wrapper wrapper-content  animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-flush nowrap" id="table-tahun">
                            <thead>
                                <tr>
                                    <th>Action</th>
                                    <th>Tahun Ajaran</th>
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

<div class="modal inmodal" id="modal-create" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated flipInY">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">TAMBAH DATA</h4>
                <small class="font-bold">Formulir ini digunakan untuk menambah tahun ajaran.</small>
            </div>
            <div class="modal-body">
                <form id="form-create" role="form" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label>Tahun Ajaran</label>
								<input type="text" class="form-control tahun" name="tahun" placeholder="">
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
    <div class="modal-dialog modal-lg">
        <div class="modal-content animated flipInY">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title">UPDATE DATA</h4>
                <small class="font-bold">Formulir ini digunakan untuk mengubah tahun ajaran.</small>
            </div>
            <div class="modal-body">
                <form id="form-update" role="form" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id_update">
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label>Tahun Ajaran</label>
								<input type="text" class="form-control" name="tahun_update" placeholder="">
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
