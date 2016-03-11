<div class="page-content">
    <div class="page-header">
        <h1>
            Group
            <small>
                <i class="icon-double-angle-right"></i>
                view user
            </small>
        </h1>
    </div><!-- /.page-header -->
    <table id="sample-table-1" class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th class="center">No</th>
                <th>username</th>
                <th>fullname</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; foreach ($getUserRole as $data) { ?>
                <tr>
                    <td class="center"><?php echo $no  ?></td>
                    <td><?php echo $data['username'] ?></td>
                    <td><?php echo $data['name'] ?></td>
                    
                </tr>
            <?php $no++; } ?>
        </tbody>
    </table>
    <a href="<?php echo site_url('su/dashboard/group'); ?>">
        <button class="btn btn-inverse"><i class="icon-arrow-left"></i>Kembali</button>
    </a>
</div><!-- /.page-content -->
