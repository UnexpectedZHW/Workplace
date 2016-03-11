<div class="page-content">
    <div class="page-header">
        <h1>
            Kecamatan
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
        
        <select name="kab" class="search-query" id="skab">
            <option value="0">-- pilih kabupaten --</option>
        </select>
        
        <br /><br /><br />
        
        <?php if (trim($this->uri->segment(4))!='' && $this->uri->segment(4) == 'done'): ?>
            <div class="alert alert-success" id="done">
                <p>Hapus data kecamatan berhasil</p>
            </div>	
        <?php endif ?>

        <!-- Konfirmasi Hapus -->
        <?php if (!empty($del)): ?>
            <div class="alert alert-warning">
                <strong>Apakah anda yakin akan menghapus data kecamatan berikut:</strong><br />
                Nama Kecamatan : <?php echo $del['nama_kecamatan'] ?><br />
                Kabupaten : <?php echo $kab['nama_kabupaten'] ?><br />
                Provinsi : <?php echo $kab['nama_provinsi'] ?><br /><br />
                <a href="<?php echo site_url('admin/kecamatan/del/' . $del['id_kecamatan'] . '/force') ?>" class="btn btn-xs btn-danger">Hapus</a>
                <a href="<?php echo site_url('admin/kecamatan') ?>" class="btn btn-xs">Batal</a>
            </div>	
        <?php endif ?>
        
        <div id="result"></div>    
        
    </div>
    
    <script>
        $(document).ready(function () {
            var s;
            $("#sprov").change(function () {
                s = $("#sprov").val();
                $.post("<?php echo site_url('load/load_skab')?>", {prov: s})
                    .done(function (data) {
                        $("#skab").html(data);
                });
                $("#result").hide();
            });  
            
            $("#skab").change(function () {
                var k = $("#skab").val();
                $.post("<?php echo site_url('load/load_kec')?>", {kab: k, prov: s})
                    .done(function (data) {
                        $("#result").html(data);
                });
                $("#result").show();
            }); 
        });
    </script>
    
</div>