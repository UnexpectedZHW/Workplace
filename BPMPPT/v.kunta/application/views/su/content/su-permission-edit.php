<div class="page-content">
    <div class="page-header">
        <h1>
            Permission
            <small>
                <i class="icon-double-angle-right"></i>
                edit
            </small>
        </h1>
    </div><!-- /.page-header -->
    <div class="row">
        <div class="col-xs-12">
            <?php foreach ($getSu as $data) { ?>
            <form class="form-horizontal" role="form" method="post" action="<?php site_url('su/dashboard/permission_edit') ?>">
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> key </label>
                    <div class="col-sm-9">
                        <input type="text" id="inputKey" name="inputKey" class="col-xs-10 col-sm-5" value="<?php echo $data['permKey'] ?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" > Name </label>
                    <div class="col-sm-9">
                        <input type="text" id="inputName" name="inputName" class="col-xs-10 col-sm-5" value="<?php echo $data['permName'] ?>" required>
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
            <?php } ?>
        </div>
    </div>
</div><!-- /.page-content -->


