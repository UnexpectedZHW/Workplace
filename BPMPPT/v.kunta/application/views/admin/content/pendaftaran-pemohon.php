<div class="page-content">
    <div class="page-header">
        <h1>
            Pendaftaran
            <small>
                <i class="icon-double-angle-right"></i>
                Pemohon
            </small>
        </h1>
    </div><!-- /.page-header -->

    <div>
        <?php if (!empty($msg)): ?>
            <?php $sa = ($sts == 1) ? 'alert-success' : 'alert-danger' ?>
            <div class="alert <?php echo $sa ?>">
                <?php echo $msg ?>
            </div> 
        <?php endif ?>

        <div class="col-md-12">
            <a href="<?php echo site_url('pendaftaran/pemohon/import')?>" class="btn btn-small btn-success">Import Data</a>
        </div>
        <br /><br /><br />

        <form action="" method="post" role="form" class="col-md-6">
            <div class="form-group">
                <label for="in_tmt">NIK*</label>
                <input type="text" name="nik" class="form-control" value="<?php echo $post['nik'] ?>" />
            </div>
            <div class="form-group">
                <label for="in_tmt">Nama Pemohon*</label>
                <input type="text" name="nama_pemohon" class="form-control" value="<?php echo $post['nama_pemohon'] ?>" />
            </div>
            <div class="form-group">
                <label >Tipe Identitas*</label>
                <div class="controls">
                    <label style="width: 15%">
                        <input name="tipe_identitas" type="radio" value="KTP" class="ace"><span class="lbl">KTP</span>                                
                    </label>
                    <label style="width: 15%">
                        <input name="tipe_identitas" type="radio" value="SIM" class="ace"><span class="lbl">SIM</span> 
                    </label>
                    <label style="width: 15%">
                        <input name="tipe_identitas" type="radio" value="PASPOR" class="ace"><span class="lbl">PASPOR</span> 
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="in_tmt">No Identitas*</label>
                <input type="text" name="no_identitas" class="form-control" value="<?php echo $post['no_identitas'] ?>" />
            </div>
            <div class="form-group">
                <label for="in_tmt">Masa Berlaku Identitas</label>
                <input type="date" name="masaberlaku_identitas" class="form-control" value="<?php echo $post['masaberlaku_identitas'] ?>" />
            </div>        
            <div class="form-group">
                <label for="in_tmt">Kewarganegaraan</label>
                <input type="text" name="kewarganegaraan" class="form-control" value="<?php echo $post['kewarganegaraan'] ?>" />
            </div>        
            <div class="form-group">
                <label for="in_tmt">Alamat*</label>
                <input type="text" name="alamat" class="form-control" value="<?php echo $post['alamat'] ?>" />
            </div>        
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
                <label for="in_tmt">No Telp</label>
                <input type="text" name="no_telp" class="form-control" value="<?php echo $post['no_telp'] ?>" />
            </div>
            <div class="form-group">
                <label for="in_tmt">No Hp*</label>
                <input type="text" name="no_hp" class="form-control" value="<?php echo $post['no_hp'] ?>" />
            </div>
            <div class="form-group">
                <label for="in_tmt">Email</label>
                <input type="text" name="email" class="form-control" value="<?php echo $post['email'] ?>" />
            </div>

            <?php if (!empty($sts) && $sts == 1 && $this->uri->segment(3) == 'add'): ?>
            <?php else: ?>
                <div class="form-group">
                    <button class="btn btn-info">Simpan</button>
                </div>	
            <?php endif ?>
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