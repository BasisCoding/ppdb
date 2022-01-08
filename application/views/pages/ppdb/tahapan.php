<div class="wrapper wrapper-content  animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
			<ul class="sortable-list connectList agile-list" id="list-tahapan">
			</ul>
        </div>
    </div>
</div>

<div class="modal inmodal" id="modal-create" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated flipInY">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">TAMBAH DATA</h4>
                <small class="font-bold">Formulir ini digunakan untuk menambah tahapan.</small>
            </div>
            <div class="modal-body">
                <form id="form-create" role="form" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="tahun_ajaran_id">

                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label>Judul Tahapan</label>
								<input type="text" class="form-control" name="judul" placeholder="">
                            </div>
                        </div>

						<div class="col-md">
							<div class="form-group">
								<label for="">Urutan Ke</label>
								<input type="number" class="form-control" name="sequence" min="1">
							</div>
						</div>
                    </div>

					<div class="row">
						<div class="col-md">
							<textarea name="deskripsi" id="deskripsi" class="deskripsi"></textarea>
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
                                <label>Judul Tahapan</label>
								<input type="text" class="form-control" name="judul_update" placeholder="">
                            </div>
                        </div>

                    </div>

					<div class="row">
						<div class="col-md">
							<textarea name="deskripsi_update" id="deskripsi" class="deskripsi"></textarea>
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
