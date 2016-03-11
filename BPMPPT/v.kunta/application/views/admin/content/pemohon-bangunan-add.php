<div class="page-content">
    <div class="page-header">
        <h1>
            Bangunan
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
            <label for="in_tmt">Luas Taman</label>
            <input type="text" name="taman" class="form-control" value="<?php echo $post['taman'] ?>" />
        </div>
        <div class="form-group">
            <label for="in_tmt">Luas Parkir</label>
            <input type="text" name="parkir" class="form-control" value="<?php echo $post['parkir'] ?>" />
        </div>
        <div class="form-group">
            <label for="in_tmt">Lebar Jalan</label>
            <input type="text" name="lebar_jalan" class="form-control" value="<?php echo $post['lebar_jalan'] ?>" />
        </div>
        <div class="form-group">
            <label for="in_tmt">Luas Lahan Kurang Parkir</label>
            <input type="text" name="lahan_kurang_parkir" class="form-control" value="<?php echo $post['lahan_kurang_parkir'] ?>" />
        </div>
        <div class="form-group">
            <label for="in_tmt">PKL</label>
            <input type="text" name="pkl" class="form-control" value="<?php echo $post['pkl'] ?>" />
        </div>
        <div class="form-group">
            <label for="in_tmt">Luas Halaman Keras</label>
            <input type="text" name="halaman_keras" class="form-control" value="<?php echo $post['halaman_keras'] ?>" />
        </div>
        <div class="form-group">
            <label for="in_tmt">Luas Halaman Tidak Keras</label>
            <input type="text" name="halaman_tidak_keras" class="form-control" value="<?php echo $post['halaman_tidak_keras'] ?>" />
        </div>
        <div class="form-group">
            <label for="in_tmt">Luas Pagar</label>
            <input type="text" name="pagar" class="form-control" value="<?php echo $post['pagar'] ?>" />
        </div>
        <div class="form-group">
            <label for="in_tmt">Luas Drainase</label>
            <input type="text" name="drainase" class="form-control" value="<?php echo $post['drainase'] ?>" />
        </div>
        <div class="form-group">
            <label for="in_tmt">Luas Pos Jaga</label>
            <input type="text" name="pos_jaga" class="form-control" value="<?php echo $post['pos_jaga'] ?>" />
        </div>
        <div class="form-group">
            <label for="in_tmt">Luas Gerbang</label>
            <input type="text" name="gerbang" class="form-control" value="<?php echo $post['gerbang'] ?>" />
        </div>
        <div class="form-group">
            <label for="in_tmt">Jumlah Peresapan Air Hujan</label>
            <input type="text" name="peresapan_air_hujan" class="form-control" value="<?php echo $post['peresapan_air_hujan'] ?>" />
        </div>
        <div class="form-group">
            <label for="in_tmt">Jumlah Peresapan Air Kotor</label>
            <input type="text" name="peresapan_air_kotor" class="form-control" value="<?php echo $post['peresapan_air_kotor'] ?>" />
        </div>
        <div class="form-group">
            <label for="in_tmt">Jumlah Septic Tank</label>
            <input type="text" name="septic_tank" class="form-control" value="<?php echo $post['septic_tank'] ?>" />
        </div>
        <div class="form-group">
            <label for="in_tmt">Jumlah Water Torn</label>
            <input type="text" name="water_torn" class="form-control" value="<?php echo $post['water_torn'] ?>" />
        </div>
        <div class="form-group">
            <label for="in_tmt">Luas Tanggul</label>
            <input type="text" name="tanggul" class="form-control" value="<?php echo $post['tanggul'] ?>" />
        </div>
        <div class="form-group">
            <label for="in_tmt">Luas Turap</label>
            <input type="text" name="turap" class="form-control" value="<?php echo $post['turap'] ?>" />
        </div>
        <div class="form-group">
            <label for="in_tmt">Luas Kolam Renang</label>
            <input type="text" name="kolam_renang" class="form-control" value="<?php echo $post['kolam_renang'] ?>" />
        </div>
        <div class="form-group">
            <label for="in_tmt">Luas Bak Air Bawah Tanah</label>
            <input type="text" name="bak_bawah_tanah" class="form-control" value="<?php echo $post['bak_bawah_tanah'] ?>" />
        </div>
        <div class="form-group">
            <label for="in_tmt">Luas Menara / Antena</label>
            <input type="text" name="menara" class="form-control" value="<?php echo $post['menara'] ?>" />
        </div>
        <div class="form-group">
            <label for="in_tmt">Luas Cerobong Asap</label>
            <input type="text" name="cerobong_asap" class="form-control" value="<?php echo $post['cerobong_asap'] ?>" />
        </div>
        <div class="form-group">
            <label for="in_tmt">Jumlah APPAR</label>
            <input type="text" name="appar" class="form-control" value="<?php echo $post['appar'] ?>" />
        </div>
        <?php if(!empty($sts) && $sts==1 && $this->uri->segment(3)=='add'):?>
        <?php else:?>
        <div class="form-group">
            <button class="btn btn-info">Simpan</button>
        </div>	
        <?php endif?>	
    </form>
    
</div>