<div class="page-content">
    <div class="page-header">
        <h1>
            User
            <small>
                <i class="icon-double-angle-right"></i>
                edit data user
            </small>
        </h1>
    </div><!-- /.page-header -->
    <div class="row">
        <div class="col-xs-12">
            <form class="form-horizontal" role="form" method="post" action="">   
                <?php foreach ($getUser as $data) { ?>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Username </label>
                        <div class="col-sm-9">
                            <input type="text" id="inputKey" name="inputUsername" class="col-xs-10 col-sm-5" value="<?php echo $data['username'] ?>" required>
                            <input type="hidden" name="inputID" value="<?php echo $data['ID'] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" > Fullname </label>
                        <div class="col-sm-9">
                            <input type="text" id="inputName" name="inputName" class="col-xs-10 col-sm-5" value="<?php echo $data['name'] ?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" > E-mail </label>
                        <div class="col-sm-9">
                            <input type="email" name="inputEmail" class="col-xs-10 col-sm-5" value="<?php echo $data['email'] ?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" > Password </label>
                        <div class="col-sm-9">
                            <input type="password" name="inputPwd" class="col-xs-10 col-sm-5" >
                        </div>
                    </div>
                    <div class="alert alert-danger">
                        <strong>Warning! </strong>

                        Kosongkan kolom password jika tidak ingin mengganti password
                        <br />
                    </div>
                    <!--<div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" >Superadmin </label>
                        <div class="col-sm-9">
                            <input type="radio" name="isSuperadmin" value="1" checked> yes
                            <input type="radio" name="isSuperadmin" value="0"> no
                        </div>
                    </div> -->
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
                <?php } ?>
            </form>
        </div>
    </div>
</div><!-- /.page-content -->



