<div class="page-content">
    <div class="page-header">
        <h1>
            Bangunan
            <small>
                <i class="icon-double-angle-right"></i>
                View
            </small>
        </h1>
    </div><!-- /.page-header -->
    
    <!-- Sukses Hapus Data -->
    <?php if (trim($this->uri->segment(4))!='' && $this->uri->segment(4) == 'done'): ?>
        <div class="alert alert-success">
            <p>Hapus data bangunan berhasil</p>
        </div>	
    <?php endif ?>

    <!-- Konfirmasi Hapus -->
    <?php if (!empty($del)): ?>
        <div class="alert alert-warning">
            <strong>Apakah anda yakin akan menghapus data bangunan berikut:</strong>
            <br />
            Luas Taman : <?php echo $del['taman'] ?>
            <br />
            <a href="<?php echo site_url('admin/bangunan/del/' . $del['id_bangunan'] . '/force') ?>" class="btn btn-xs btn-danger">Hapus</a>
            <a href="<?php echo site_url('pemohon/bangunan') ?>" class="btn btn-xs">Batal</a>
        </div>	
    <?php endif ?>
    
    <a href="<?php echo site_url('admin/bangunan/add') ?>" class="btn btn-success">Tambah Data</a>
    <br /><br />
    <table class="table table-striped table-bordered">
        <tr>
            <th>#</th>
            <th>Luas Taman</th>
            <th>Luas Parkiran</th>
            <th>Lebar Jalan</th>
            <th>Luas Lahan Kekurangan Parkir</th>
            <th></th>
        </tr>	    
        <?php $no = 1 ?>
        <?php foreach ($prov as $v): ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $v['taman'] ?></td>
                <td><?php echo $v['parkir'] ?></td>
                <td><span class="pull-right"><?php echo $v['lebar_jalan'] ?></span></td>
                <td><span class="pull-right"><?php echo $v['lahan_kurang_parkir'] ?></span></td>
                <th>
                    <a href="<?php echo site_url('admin/bangunan/edit/' . $v['id_bangunan']) ?>" class="btn btn-xs btn-info">Edit</a> 
                    <a href="<?php echo site_url('admin/bangunan/del/' . $v['id_bangunan']) ?>" class="btn btn-xs btn-danger">Hapus</a> 
                </th>
            </tr>	    	
        <?php endforeach ?>	
    </table>
    
</div>