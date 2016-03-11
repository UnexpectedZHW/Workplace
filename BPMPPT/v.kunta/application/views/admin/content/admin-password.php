<div class="page-content">
    <div class="page-header">
        <h1>
            Password
            <small>
                <i class="icon-double-angle-right"></i>
                Ganti password
            </small>
        </h1>
    </div><!-- /.page-header -->
    <div class="row">
        <div class="col-xs-12">
            
            <div id="psn"></div>
            
            <form class="form-horizontal" role="form" onsubmit="op()">
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">password lama</label>
                    <div class="col-sm-9">
                        <input type="password" id="inputOldPwd" name="inputOldPwd" class="col-xs-10 col-sm-5" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right text-danger" >password baru</label>
                    <div class="col-sm-9">
                        <input type="password" id="inputNewPwd1" name="inputNewPwd1" class="col-xs-10 col-sm-5" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right text-danger" >password baru**</label>
                    <div class="col-sm-9">
                        <input type="password" id="inputNewPwd2" name="inputNewPwd2" class="col-xs-10 col-sm-5" required>
                    </div>
                </div>
                <div class="clearfix form-actions">
                    <div class="col-md-offset-3 col-md-9">
                        <button class="btn btn-info" type="submit">
                            <i class="icon-ok bigger-110"></i>
                            Submit
                        </button>

                        &nbsp; &nbsp; &nbsp;
                        <a href="<?php echo site_url('su/dashboard') ?>">
                            <button class="btn">
                                <i class="icon-undo bigger-110"></i>
                                cancel
                            </button>
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        function op() {
            var oldPwd = $("#inputOldPwd").val();
            var newPwd1 = $("#inputNewPwd1").val();
            var newPwd2 = $("#inputNewPwd2").val();
            
            $.ajax({
                'type': 'POST',
                'url': '<?php echo site_url('admin/password') ?>',
                'data': {
                    inputOldPwd:oldPwd,
                    inputNewPwd2: newPwd2,
                    inputNewPwd1: newPwd1
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


