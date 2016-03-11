<a href="<?php echo site_url('admin/kabupaten/add/' . $post['prov']) ?>" class="btn btn-success">Tambah Data</a>
<br /><br />
<table class="table table-striped table-bordered">
    <tr>
        <th>#</th>
        <th>Nama Kabupaten</th>
        <th>Fullname</th>
        <th>Latitude</th>
        <th>Longitude</th>
        <th></th>
    </tr>	    
    <?php $no = 1 ?>
    <?php foreach ($kab as $v): ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $v['nama_kabupaten'] ?></td>
            <td><?php echo $v['fullname'] ?></td>
            <td><span class="pull-right"><?php echo $v['lat'] ?></span></td>
            <td><span class="pull-right"><?php echo $v['lon'] ?></span></td>
            <th>
                <a href="<?php echo site_url('admin/kabupaten/edit/' . $v['id_kabupaten']) ?>" class="btn btn-xs btn-info">Edit</a> 
                <a href="<?php echo site_url('admin/kabupaten/del/' . $v['id_kabupaten']) ?>" class="btn btn-xs btn-danger">Hapus</a> 
            </th>
        </tr>	    	
    <?php endforeach ?>	
</table>