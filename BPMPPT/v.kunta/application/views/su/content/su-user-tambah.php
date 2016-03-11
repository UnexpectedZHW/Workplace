<div class="page-content">
    <div class="page-header">
        <h1>
            User
            <small>
                <i class="icon-double-angle-right"></i>
                tambah data
            </small>
        </h1>
    </div><!-- /.page-header -->
    <div class="row">
        <div class="col-xs-12">
            <div class="col-md-10 center red"><?php echo $this->session->flashdata('user') ?></div>
            <form class="form-horizontal" role="form" method="post" action="<?php site_url('su/dashboard/user_tambah') ?>">
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Username </label>
                    <div class="col-sm-9">
                        <input type="text" id="inputKey" name="inputUsername" class="col-xs-10 col-sm-5" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" > Fullname </label>
                    <div class="col-sm-9">
                        <input type="text" id="inputName" name="inputName" class="col-xs-10 col-sm-5" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" > E-mail </label>
                    <div class="col-sm-9">
                        <input type="email" name="inputEmail" class="col-xs-10 col-sm-5" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" > Password </label>
                    <div class="col-sm-9">
                        <input type="password" name="inputPwd" class="col-xs-10 col-sm-5" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" >Superadmin </label>
                    <div class="col-sm-9">
                        <input type="radio" name="isSuperadmin" value="1"> yes
                        <input type="radio" name="isSuperadmin" value="0"> no
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



