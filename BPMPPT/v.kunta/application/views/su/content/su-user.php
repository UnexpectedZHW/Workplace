<div class="page-content">
    <div class="page-header">
        <h1>
            Users
            <small>
                <i class="icon-double-angle-right"></i>
                overview
            </small>
        </h1>
    </div><!-- /.page-header -->
    <table id="sample-table-1" class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th class="center">No</th>
                <th>Username</th>
                <th>Fullname</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($getUser as $data) {
                ?>
                <tr>
                    <td class="center"><?php echo $no ?></td>
                    <td><?php echo $data['username'] ?></td>
                    <td><?php echo $data['name'] ?></td>
                    <td><?php echo $data['role'] ?></td>
                    <td>
                        <a href="<?php echo site_url('su/dashboard/user_edit/' . $data['ID']) ?>" >
                            <button class="btn btn-xs btn-success"><i class="icon-edit" ></i> Edit</button>
                        </a> 
                        | 
                        <button class="btn btn-xs btn-danger" id="btnDelete" onclick="dlt(<?php echo $data['ID'] . ",'" . $data['username']; ?>')"> <i class="icon-trash"></i> Delete</button>
                    </td>
                </tr>
                <?php
                $no++;
            }
            ?>
        </tbody>
    </table>
    <a href="<?php echo site_url('su/dashboard/user_tambah') ?>">
        <button class="btn btn-success"><i class="icon-plus"></i>Tambah data</button>
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
            var sid = "<?php echo site_url("su/dashboard/user_delete") . '/'; ?>" + id;
            $("#modalDelete").modal("show");
            $("#data").text("Username = " + name + " ?");
            $("#cfmDelete").click(function () {
                location.href = sid;
            });
        }
    </script>

</div><!-- /.page-content -->
