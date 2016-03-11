<div class="page-content">
    <div class="page-header">
        <h1>
            Pendaftaran
            <small>
                <i class="icon-double-angle-right"></i>
                Pemohon Import
            </small>
        </h1>
    </div><!-- /.page-header -->

    <div>
        <p>
            Data Pemohon dapat di Import melalui Microsoft Excel dengan standar format yang dapat di download 
            di link berikut ini <?php echo anchor(base_url('xls/template_pemohon.xls'), 'Format Excel Pemohon') ?><br />
            Pada saat melakukan upload file excel, pastikan memilih Provinsi, Kabupaten dan Kecamatan.
        </p>
        <p>
            <em>File Excel hasil export data pemohon dari aplikasi ini tidak dapat digunakan untuk Import data, 
                format harus disesuaikan dengan file yang anda download diatas</em>
        </p>

        <?php if (!empty($msg)): ?>
            <?php $sa = ($sts == 1) ? 'alert-success' : 'alert-danger' ?>
            <div class="alert <?php echo $sa ?>">
                <?php echo $msg ?>
            </div> 
        <?php endif ?>

        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <select name="ref_provinsi_id" class="search-query" id="sprov">
                    <option value="0">-- pilih provinsi --</option>
                    <?php foreach ($prov as $p): ?>     
                        <?php $s = (!empty($del) && $del['id_provinsi'] == $p['id_provinsi']) ? 'selected' : '' ?>
                        <option <?php echo $s ?> value="<?php echo $p['id_provinsi'] ?>"><?php echo $p['nama_provinsi'] ?></option>
                    <?php endforeach; ?>
                </select> 
            </div>
            <div class="form-group">
                <select name="ref_kabupaten_id" class="search-query" id="skab">
                    <option value="0">-- pilih kabupaten --</option>
                </select>
            </div>
            <div class="form-group">
                <select name="ref_kecamatan_id" class="search-query" id="skec">
                    <option value="0">-- pilih kecamatan --</option>
                </select>
            </div>

            <div class="form-group">
                <input type="file" name="fxls" />
            </div>

            <input class="btn btn-primary" name="up" type="submit" value="Upload"/> 
        </form>
    </div>

    <script>
        $(document).ready(function () {
            var s;
            $("#sprov").change(function () {
                s = $("#sprov").val();
                $.post("<?php echo site_url('load/load_skab') ?>", {prov: s})
                        .done(function (data) {
                            $("#skab").html(data);
                        });
            });

            $("#skab").change(function () {
                var k = $("#skab").val();
                $.post("<?php echo site_url('load/load_skec') ?>", {kab: k, prov: s})
                        .done(function (data) {
                            $("#skec").html(data);
                        });

            });
        });
    </script>

</div>