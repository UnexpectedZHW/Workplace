<?php if (count($kab) > 0): ?>
    <option value="0">-- pilih kabupaten --</option>
    <?php foreach ($kab as $v): ?>
        <option value="<?php echo $v['id_kabupaten'] ?>"><?php echo $v['nama_kabupaten'] ?></option>    	
    <?php endforeach ?>	
<?php else: ?>
    <option value="0">-- data belum tersedia --</option>    	    
<?php endif; ?>
