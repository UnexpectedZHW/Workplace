<div class="page-content">
    <div class="page-header">
        <h1>
            Kabupaten
            <small>
                <i class="icon-double-angle-right"></i>
                Tambah/Edit
            </small>
        </h1>
    </div><!-- /.page-header -->

    <?php if (!empty($msg)): ?>
        <?php $sa = ($sts == 1) ? 'alert-success' : 'alert-danger' ?>
        <div class="alert <?php echo $sa ?>">
            <?php echo $msg ?>
        </div> 
    <?php endif ?>

    
    <form action="" method="post" role="form" class="col-md-6">
        <div class="form-group">
            <label for="in_tmt">Nama Provinsi</label>
            <input type="text" class="form-control" readonly="readonly" value="<?php echo $prov['nama_provinsi'] ?>" />
        </div>
        <div class="form-group">
            <label for="in_tmt">Nama Kabupaten</label>
            <input type="text" name="nama_kabupaten" class="form-control" value="<?php echo $post['nama_kabupaten'] ?>" />
        </div>
        <div class="form-group">
            <label for="in_tmt">Fullname</label>
            <input type="text" name="fullname" class="form-control" value="<?php echo $post['fullname'] ?>" />
        </div>
        <div class="form-group">
            <label for="in_tmt">Latitude</label>
            <input type="text" name="lat" class="form-control" value="<?php echo $post['lat'] ?>" />
        </div>
        <div class="form-group">
            <label for="in_tmt">Longitude</label>
            <input type="text" name="lon" class="form-control" value="<?php echo $post['lon'] ?>" />
        </div>        
        <?php if(!empty($sts) && $sts==1 && $this->uri->segment(3)=='add'):?>
        <?php else:?>
        <div class="form-group">
            <button class="btn btn-info">Simpan</button>
        </div>	
        <?php endif?>
    </form>
</div>
