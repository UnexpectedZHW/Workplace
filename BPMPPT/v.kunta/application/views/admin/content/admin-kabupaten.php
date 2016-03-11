.<div class="page-content">
    <div class="page-header">
        <h1>
            Kabupaten
            <small>
                <i class="icon-double-angle-right"></i>
                View
            </small>
        </h1>
    </div><!-- /.page-header -->

    <div class="col-md-12">

        <select name="prov" class="search-query" id="sprov">
            <option value="0">-- pilih provinsi --</option>
            <?php foreach ($prov as $p): ?>     
                <?php $s = (!empty($del) && $del['id_provinsi']==$p['id_provinsi'])?'selected':''?>
                <option <?php echo $s?> value="<?php echo $p['id_provinsi'] ?>"><?php echo $p['nama_provinsi'] ?></option>
            <?php endforeach; ?>
        </select>            

    </div><br /><br /><br />

    <script>
        $(document).ready(function () {
            $("#sprov").change(function () {
                var s = $("#sprov").val();
                $.post("<?php echo site_url('load/load_kab')?>", {prov: s})
                    .done(function (data) {
                        $("#result").html(data);
                });
                $("#done").hide();
            });
            
            <?php if($this->uri->segment(3)=='del' && is_numeric($this->uri->segment(4))):?>
                $.post("<?php echo site_url('load/load_kab')?>", {prov: <?php echo $del['id_provinsi']?>})
                    .done(function (data) {
                        $("#result").html(data);
                });
            <?php endif?>
            
        });
    </script>

    <?php if (trim($this->uri->segment(4))!='' && $this->uri->segment(4) == 'done'): ?>
        <div class="alert alert-success" id="done">
            <p>Hapus data kabupaten berhasil</p>
        </div>	
    <?php endif ?>

    <!-- Konfirmasi Hapus -->
    <?php if (!empty($del)): ?>
        <div class="alert alert-warning">
            <strong>Apakah anda yakin akan menghapus data kabupaten berikut:</strong><br />
            Nama Kabupaten : <?php echo $del['nama_kabupaten'] ?><br />
            Provinsi : <?php echo $del['nama_provinsi'] ?><br /><br />
            <a href="<?php echo site_url('admin/kabupaten/del/' . $del['id_kabupaten'] . '/force') ?>" class="btn btn-xs btn-danger">Hapus</a>
            <a href="<?php echo site_url('admin/kabupaten') ?>" class="btn btn-xs">Batal</a>
        </div>	
    <?php endif ?>
    
    <div id="result"></div>    

</div>