<script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>

<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
<script src="https://unpkg.com/filepond/dist/filepond.js"></script>
<!-- Chosen -->
<script src="<?= site_url('assets/js/plugins/chosen/chosen.jquery.js') ?>"></script>
<script type="text/javascript">
    var btn_act = '<button class="btn btn-primary" id="btn_update">Update Konfigurasi</button>';
    $('#form-config :input').prop('disabled', true).trigger("chosen:updated");
    $('.title-action').html(btn_act);
    $('.chosen-select').chosen({width: "100%"});
    // Register any plugins

    FilePond.registerPlugin(FilePondPluginImagePreview);
    FilePond.registerPlugin(FilePondPluginFileValidateType);

    $(document).ready(function() {
        get();
        function get() {
            $.getJSON('<?= base_url('config/store') ?>', function(json, textStatus) {
                $('[name="app_name"]').val(json.app_name);
                $('[name="app_name_slug"]').val(json.app_name_slug);
                $('[name="rt"]').val(json.rt);
                $('[name="rw"]').val(json.rw);
                $('[name="kode_pos"]').val(json.kode_pos);
                $('[name="lattitude"]').val(json.lattitude);
                $('[name="longitude"]').val(json.longitude);
                $('[name="email"]').val(json.email);
                $('[name="website"]').val(json.website);
                set_select(json.provinsi, json.kota, json.kecamatan, json.kelurahan);
            });
        }

        function set_select(prov, kota, kec, kel) {
            setTimeout(function() {
                $('#prov').val(prov).trigger('change');
                $('#prov').trigger('chosen:updated');
                setTimeout(function() {
                    $('#kota').val(kota).trigger('change');
                    $('#kota').trigger('chosen:updated');
                    setTimeout(function() {
                        $('#kec').val(kec).trigger('change');
                        $('#kec').trigger('chosen:updated');
                        setTimeout(function() {
                            $('#kel').val(kel).trigger('change');
                            $('#kel').trigger('chosen:updated');
                        }, 900);
                    }, 800);
                }, 700);
            }, 600);

        }

        // Wilayah API
        $.getJSON('https://basiscoding.github.io/api-wilayah-indonesia/api/provinces.json', function(json, textStatus) {

            var provinsi = $('#prov');
            provinsi.empty();
            $.each(json, function(i, prov) {
                var id = prov.id;
                var name = prov.name;
                provinsi.append('<option value="'+id+'">'+name+'</option>');
            });

            provinsi.trigger("chosen:updated");

        });

        function tampilKota(idProv) {
            var kota = $('#kota');
            kota.empty();

            $.getJSON('https://basiscoding.github.io/api-wilayah-indonesia/api/regencies/'+idProv+'.json', function(json, textStatus) {

                $.each(json, function(i, kt) {
                    var id = kt.id;
                    var name = kt.name;
                    kota.append('<option value="'+id+'">'+name+'</option>');
                });

                kota.trigger("chosen:updated");

            });

        }

        function tampilKecamatan(idKota) {
            var kec = $('#kec');
            kec.empty();

            $.getJSON('https://basiscoding.github.io/api-wilayah-indonesia/api/districts/'+idKota+'.json', function(json, textStatus) {

                $.each(json, function(i, kc) {
                    var id = kc.id;
                    var name = kc.name;
                    kec.append('<option value="'+id+'">'+name+'</option>');
                });

                kec.trigger("chosen:updated");

            });

        }

        function tampilKelurahan(idKec) {
            var kel = $('#kel');
            kel.empty();

            $.getJSON('https://basiscoding.github.io/api-wilayah-indonesia/api/villages/'+idKec+'.json', function(json, textStatus) {

                $.each(json, function(i, kl) {
                    var id = kl.id;
                    var name = kl.name;
                    kel.append('<option value="'+id+'">'+name+'</option>');
                });

                kel.trigger("chosen:updated");

            });

        }


        $('body').on('change', '#prov', function() {
            var idProv = $(this).val();
            tampilKota(idProv);
        });

        $('body').on('change', '#kota', function() {
            var idKota = $(this).val();
            tampilKecamatan(idKota);
        });

        $('body').on('change', '#kec', function() {
            var idKec = $(this).val();
            tampilKelurahan(idKec);
        });

        // Wilayah API

        FilePond.create(document.querySelector('[name="logo"]'), {
            acceptedFileTypes: ['image/png', 'image/jpeg'],
            labelIdle: 'Drag & Drop Logo Image <span class="filepond--label-action"> Browse </span>',
            fileValidateTypeDetectType: (source, type) =>
            new Promise((resolve, reject) => {
                // test if is xls file
                if (/\.xls$/.test(source.name)) return resolve('application/vnd.ms-excel');

                // accept detected type
                resolve(type);
            }),
        });

        FilePond.create(document.querySelector('[name="icon"]'), {
            acceptedFileTypes: ['image/png', 'image/jpeg'],
            labelIdle: 'Drag & Drop Icon Image <span class="filepond--label-action"> Browse </span>',
            fileValidateTypeDetectType: (source, type) =>
            new Promise((resolve, reject) => {
                // test if is xls file
                if (/\.xls$/.test(source.name)) return resolve('application/vnd.ms-excel');

                // accept detected type
                resolve(type);
            }),
        });

        $('body').on('click', '#btn_update', function(event) {
            event.preventDefault();
            $('#form-config :input').prop('disabled', false).trigger("chosen:updated");
            $(this).html('Simpan Konfigurasi');
            $(this).attr({
                id: 'btn_simpan',
                form: 'form-config',
                type: 'submit'
            });;
        });

        $('body').on('submit', '#form-config', function(event) {
            event.preventDefault();

            $.ajax({
                url: '<?= site_url('config/update') ?>',
                type: 'POST',
                dataType: 'JSON',
                data: new FormData(this),
                processData:false,
                contentType:false,
                cache:false,
                async:false,
                success:function (response) {
                    notification(response.type, response.message);

                    $('#form-config :input').prop('disabled', true).trigger("chosen:updated");
                    $('#btn_simpan').html('Update Konfigurasi');
                    $('#btn_simpan').attr({
                        id: 'btn_update',
                        form: '',
                        type: 'button'
                    });;

                    get();
                }

            });

            return false;
            
        });



    });

</script>