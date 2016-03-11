<div class="page-content">
    <div class="page-header">
        <h1>
            Dashboard
            <small>
                <i class="icon-double-angle-right"></i>
                Overview &amp; Stats
            </small>
        </h1>
    </div><!-- /.page-header -->

    <p>Selamat datang <?php echo $this->sess->fullname ?>, anda login pada dashboard Administrator SIM-IMB</p>
    <i class="icon-calendar"></i> Terakhir anda login <?php echo timeago($this->sess->lastlog) ?> 
    atau pada tanggal <?php echo date('d M Y, H:i', mysql_to_unix($this->sess->lastlog)) ?><br />
    <i class="icon-group"></i> Nama Group/Role : <?php echo $user['rolename'] ?>
    <br /><br />    

</div>