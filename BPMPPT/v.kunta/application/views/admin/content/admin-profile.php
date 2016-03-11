<div class="page-content">
    <div class="page-header">
        <h1>
            Profile
            <small>
                <i class="icon-double-angle-right"></i>
                Edit data user
            </small>
        </h1>
    </div><!-- /.page-header -->
    <div class="row">
        <div class="col-xs-12">
            
            <div id="psn"></div>
            
            <form class="form-horizontal" role="form" id="formProfile" onsubmit="op()">
                <?php foreach ($getProfile as $data) { ?>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" > Fullname </label>
                        <div class="col-sm-9">
                            <input type="text" id="inputName" name="inputName" class="col-xs-10 col-sm-5" value="<?php echo $data['name'] ?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" > E-mail </label>
                        <div class="col-sm-9">
                            <input type="email" id="inputEmail" name="inputEmail" class="col-xs-10 col-sm-5" value="<?php echo $data['email'] ?>" required>
                        </div>
                    </div>
                    <div class="clearfix form-actions">
                        <div class="col-md-offset-3 col-md-9">
                            <button class="btn btn-info" type="submit">
                                <i class="icon-ok bigger-110"></i>
                                Save
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
    <script>
        function op() {
            var a = $("#inputName").val();
            var b = $("#inputEmail").val();
            $.ajax({
                'type': 'POST',
                'url': '<?php echo site_url('admin/profile') ?>',
                'data': {
                    inputName: a,
                    inputEmail: b
                },
                'success': function (msg) {
                    $("#psn").show();
                    $("#psn").html(msg);
                }

            });
            event.preventDefault();
        }
    </script>
</div><!-- /.page-content -->




