<div class="page-content">
    <div class="page-header">
        <h1>
            ganti password
            <small>
                <i class="icon-double-angle-right"></i>

            </small>
        </h1>
    </div><!-- /.page-header -->
    <div class="row">
        <div class="col-xs-12">
            <div class="col-md-10 center red" id="confirm"><?php echo $this->session->flashdata('password') ?></div>
            <div class="alert alert-danger" id="pesanVal" style="display:none">
                <button type="button" class="close" onclick="btnCls()">
                    <i class="icon-remove"></i>
                </button>
                <div id="psn"></div>
            </div>
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
                            Simpan
                        </button>

                        &nbsp; &nbsp; &nbsp;
                        <button class="btn" type="reset">
                            <i class="icon-undo bigger-110"></i>
                            Reset
                        </button>
                    </div>
                </div>
            </form>
            <script>
                function op() {
                    var oldPwd = $('#inputOldPwd').val();
                    var newPwd1 = $('#inputNewPwd1').val();
                    var newPwd2 = $('#inputNewPwd2').val();
                    if (newPwd1 !== newPwd2) {
                        $('#psn').text('password baru tidak sama');
                        $('#pesanVal').show();
                        
                    } else {
                        $.ajax({
                            'type': 'POST',
                            'url': '<?php echo site_url('su/dashboard/password_ganti') ?>',
                            'data': {
                                inputOldPwd: oldPwd,
                                inputNewPwd1: newPwd1
                            },
                            'success': function (msg) {
                                $("#pesanVal").show();
                                $("#psn").html(msg);
                            }

                        });
                    }
                    event.preventDefault();
                }
                
                function btnCls(){
                    $('#pesanVal').hide();
                }
            </script>
        </div>
    </div>
</div><!-- /.page-content -->


