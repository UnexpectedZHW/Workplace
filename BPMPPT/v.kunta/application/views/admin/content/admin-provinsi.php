<div class="page-content">
    <div class="page-header">
        <h1>
            Provinsi
            <small>
                <i class="icon-double-angle-right"></i>
                View
            </small>
        </h1>
    </div><!-- /.page-header -->
    
    <!-- Sukses Hapus Data -->
    <?php if (trim($this->uri->segment(4))!='' && $this->uri->segment(4) == 'done'): ?>
        <div class="alert alert-success">
            <p>Hapus data provinsi berhasil</p>
        </div>	
    <?php endif ?>

    <!-- Konfirmasi Hapus -->
    <?php if (!empty($del)): ?>
        <div class="alert alert-warning">
            <strong>Apakah anda yakin akan menghapus data provinsi berikut:</strong><br />
            Nama Provinsi : <?php echo $del['nama_provinsi'] ?><br />
            Fullname : <?php echo $del['fullname'] ?><br />
            Latitude : <?php echo $del['lat'] ?><br />
            Longitude : <?php echo $del['lon'] ?><br /><br />
            <a href="<?php echo site_url('admin/provinsi/del/' . $del['id_provinsi'] . '/force') ?>" class="btn btn-xs btn-danger">Hapus</a>
            <a href="<?php echo site_url('admin/provinsi') ?>" class="btn btn-xs">Batal</a>
        </div>	
    <?php endif ?>
    
    <a href="<?php echo site_url('admin/provinsi/add') ?>" class="btn btn-success">Tambah Data</a>
    <br /><br />
    <table class="table table-striped table-bordered">
        <tr>
            <th>#</th>
            <th>Nama Provinsi</th>
            <th>Fullname</th>
            <th>Latitude</th>
            <th>Longitude</th>
            <th></th>
        </tr>	    
        <?php $no = 1 ?>
        <?php foreach ($prov as $v): ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $v['nama_provinsi'] ?></td>
                <td><?php echo $v['fullname'] ?></td>
                <td><span class="pull-right"><?php echo $v['lat'] ?></span></td>
                <td><span class="pull-right"><?php echo $v['lon'] ?></span></td>
                <th>
                    <a href="<?php echo site_url('admin/provinsi/edit/' . $v['id_provinsi']) ?>" class="btn btn-xs btn-info">Edit</a> 
                    <a href="<?php echo site_url('admin/provinsi/del/' . $v['id_provinsi']) ?>" class="btn btn-xs btn-danger">Hapus</a> 
                </th>
            </tr>	    	
        <?php endforeach ?>	
    </table>
    
</div>