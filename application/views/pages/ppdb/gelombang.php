<div class="wrapper wrapper-content  animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-flush nowrap" id="table-gelombang">
                            <thead>
                                <tr>
                                    <th>Action</th>
                                    <th>Nama Gelombang</th>
                                    <th>Tanggal Mulai</th>
                                    <th>Tanggal Selesai</th>
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
					<input type="hidden" name="tahun_ajaran_id">

                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label>Nama Gelombang</label>
								<input type="text" class="form-control" name="nama_gelombang" placeholder="">
                            </div>
                        </div>
                    </div>

					<div class="row">
						<div class="col-md">
							<div class="form-group">
								<label>Start Date</label>
								<input type="date" class="form-control" name="start_date">
							</div>
						</div>

						<div class="col-md">
							<div class="form-group">
								<label>End Date</label>
								<input type="date" class="form-control" name="end_date">
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
                <small class="font-bold">Formulir ini digunakan untuk mengubah gelombang.</small>
            </div>
            <div class="modal-body">
                <form id="form-update" role="form" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id_update">
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label>Nama Gelombang</label>
								<input type="text" class="form-control" name="nama_gelombang_update" placeholder="">
                            </div>
                        </div>
                    </div>

					<div class="row">
						<div class="col-md">
							<div class="form-group">
								<label>Tanggal Mulai</label>
								<input type="date" class="form-control" name="start_date_update">
							</div>
						</div>

						<div class="col-md">
							<div class="form-group">
								<label>Tanggal Selesai</label>
								<input type="date" class="form-control" name="end_date_update">
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
