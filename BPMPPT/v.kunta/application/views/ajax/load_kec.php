<a href="<?php echo site_url('admin/kecamatan/add/' . $post['prov'].'/'.$post['kab']) ?>" class="btn btn-success">Tambah Data</a>
<br /><br />
<table class="table table-striped table-bordered">
    <tr>
        <th>#</th>
        <th>Nama Kecamatan</th>
        <th>Fullname</th>
        <th>Latitude</th>
        <th>Longitude</th>
        <th></th>
    </tr>	    
    <?php $no = 1 ?>
    <?php foreach ($kec as $v): ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $v['nama_kecamatan'] ?></td>
            <td><?php echo $v['fullname'] ?></td>
            <td><span class="pull-right"><?php echo $v['lat'] ?></span></td>
            <td><span class="pull-right"><?php echo $v['lon'] ?></span></td>
            <th>
                <a href="<?php echo site_url('admin/kecamatan/edit/' . $v['id_kecamatan']) ?>" class="btn btn-xs btn-info">Edit</a> 
                <a href="<?php echo site_url('admin/kecamatan/del/' . $v['id_kecamatan']) ?>" class="btn btn-xs btn-danger">Hapus</a> 
            </th>
        </tr>	    	
    <?php endforeach ?>	
</table>