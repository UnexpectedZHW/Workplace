<div class="page-content">
    <div class="page-header">
        <h1>
            Group
            <small>
                <i class="icon-double-angle-right"></i>
                Access
                <i class="icon-double-angle-right"></i>
                <?=$group ?>
            </small>    
        </h1>
        <hr />
        <div class="row">
            <div class="col-xs-12">
                <form method="post" action="">
                    <?php foreach ($rolePerms as $data){ ?>
                    <h3><?php echo $data['main'] ?></h3>
                    <label class="inline">
                        <?php foreach ($data['sub'] as $row) { ?>
                        <input type="checkbox" class="ace" name="access[]" value="<?=$row['ID'] ?>" <?php echo $row['access'] > 0 ? 'checked':'' ?>/>
                        <span class="lbl" style="margin-right: 15px"> <?php echo $row['submenu'] ?> </span>
                    </label>
                    <?php  } } ?>
                    <div class="clearfix form-actions">
                        <div class="col-md-offset-3 col-md-9">
                            <button class="btn btn-info" type="submit">
                                <i class="icon-save bigger-110"></i>
                                Save
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
    </div><!-- /.page-header -->
</div><!-- /.page-content -->


