<div class="page-content">
    <div class="page-header">
        <h1>
            Group
            <small>
                <i class="icon-double-angle-right"></i>
                tambah data
            </small>
        </h1>
    </div><!-- /.page-header -->
    <div class="row">
        <div class="col-xs-12">
            <div class="col-md-10 center red"><?php echo $this->session->flashdata('group') ?></div>
            <form class="form-horizontal" role="form" method="post" action="<?php echo site_url('su/dashboard/group_tambah') ?>">
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nama Role </label>
                    <div class="col-sm-9">
                        <input type="text" id="inputRole" name="inputRole" class="col-xs-10 col-sm-5" required>
                    </div>
                </div>
                <div class="clearfix form-actions">
                    <div class="col-md-offset-3 col-md-9">
                        <button class="btn btn-info" type="submit">
                            <i class="icon-ok bigger-110"></i>
                            Submit
                        </button>

                        &nbsp; &nbsp; &nbsp;
                        <button class="btn" type="reset">
                            <i class="icon-undo bigger-110"></i>
                            Reset
                        </button>
                    </div>
                </div>
            </form> 
        </div>
    </div>
</div><!-- /.page-content -->

