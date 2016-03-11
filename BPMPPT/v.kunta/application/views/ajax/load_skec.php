<?php if (count($kec) > 0): ?>
    <option value="0">-- pilih kecamatan --</option>
    <?php foreach ($kec as $v): ?>
        <option value="<?php echo $v['id_kecamatan'] ?>"><?php echo $v['nama_kecamatan'] ?></option>    	
    <?php endforeach ?>	
<?php else: ?>
    <option value="0">-- data belum tersedia --</option>    	    
<?php endif; ?>
