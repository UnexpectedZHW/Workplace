<div class="page-content">
    <div class="page-header">
        <h1>
            Group
            <small>
                <i class="icon-double-angle-right"></i>
                edit
            </small>
        </h1>
    </div><!-- /.page-header -->
    <div class="row">
        <div class="center text-danger"><strong><?php echo $this->session->flashdata('role'); ?></strong></div>
        <div class="col-xs-12 col-sm-12">
            <form role="form" method="post" action="">
                <div class="form-group">
                    <div class="row">
                        <div class="container">
                            <label>Nama Role</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="container">
                            <?php foreach ($getRole as $data) { ?>
                                <input class="col-sm-6" type="text" name="inputRole" value="<?php echo $data['rolename'] ?>" />
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="input-group">
                                <select class="form-control col-sm-6" id="form-field-select-1" name="inputUser">
                                    <option value="0" selected>tambah user</option>
                                    <?php foreach ($getUser as $data) { ?>
                                        <option value="<?php echo $data['ID'] ?>"><?php echo $data['username'] ?></option>
                                    <?php } ?>
                                </select>
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        Tambahkan
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </form> 
        </div>
    </div>
    <hr />
    <div class="row">
        <div class="col-xs-12">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th class="center">No</th>
                        <th>Username</th>
                        <th>Fullname</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($getUserRole as $data) {
                        ?>
                        <tr>
                            <td><?php echo $no ?></td>
                            <td><?php echo $data['username'] ?></td>
                            <td><?php echo $data['name'] ?></td>
                            <td>
                                <button class="btn btn-xs btn-danger" id="btnDelete" onclick="dlt(<?php echo $data['ID'].", '".$data['username']; ?>')"> <i class="icon-trash"></i> Delete</button>
                            </td>
                        </tr>
                    <?php $no++; } ?>
                </tbody>
            </table>
        </div>
    </div>
    <a href="<?php echo site_url('su/dashboard/group'); ?>">
        <button class="btn btn-inverse"><i class="icon-arrow-left"></i>Kembali</button>
    </a>
    <div id="modalDelete" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class='widget-header'>
                        <h4 class='smaller'>
                            <i class='icon-warning-sign red'></i> 
                            Konfirmasi hapus
                        </h4>
                    </div>
                    <div class="alert alert-info bigger-110">
                        apakah anda yakin akan menghapus <br />
                        <p id="data"></p>
                    </div>
                    <div class="center">
                        <a href="#">
                            <button type="button" class="btn btn-success" id="cfmDelete" role="button" aria-disabled="false">
                                <i class="icon-ok"></i>
                                &nbsp; Ya..hapus sekarang
                            </button>
                        </a>
                        <button type="button" data-dismiss="modal" class="btn btn-danger" role="button" aria-disabled="false">
                            <i class="icon-arrow-left"></i>
                            &nbsp; batalkan
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function dlt(id, name) {
            var sid = "<?php echo site_url("su/dashboard/group_delete_user/".$roleID) . '/'; ?>" + id;
            $("#modalDelete").modal("show");
            $("#data").text("username = " + name + " ?");
            $("#cfmDelete").click(function () {
                location.href = sid;
            });
        }
    </script>
</div><!-- /.page-content -->




