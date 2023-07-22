<div class="row">
    <!--  form area -->
    <div class="col-sm-12">
        <div  class="panel panel-default thumbnail">
 
            <div class="panel-heading no-print">
                <div class="btn-group"> 
                    <a class="btn btn-primary" href="<?php echo base_url("dashboard_admin/organisation") ?>"> <i class="fa fa-list"></i>  <?php echo display('list_org') ?> </a>  
                </div>
            </div> 
            <?php //echo "<pre>"; print_r($org); echo "</pre>"; ?>
            <div class="panel-body panel-form">
                <div class="row">
                    <div class="col-md-9 col-sm-12">

                        <?php echo form_open_multipart('dashboard_admin/organisation/create','class="form-inner"') ?>

                            <?php echo form_hidden('org_id',$org->org_id); ?>

                            <div class="form-group row">
                                <label for="org_name" class="col-xs-3 col-form-label"><?php echo display('org_name') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <input name="org_name" type="text" class="form-control" id="org_name" placeholder="<?php echo display('org_name') ?>" value="<?php echo $org->org_name ?>" >
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="org_district" class="col-xs-3 col-form-label"><?php echo display('district') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <?php echo form_dropdown('org_district', $district_list, $org->org_district, 'class="form-control" id="org_district" '); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="org_head_id" class="col-xs-3 col-form-label"><?php echo display('org_head') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <?php echo form_dropdown('org_head_id', $org_head_list, $org->org_head_id, 'class="form-control" id="org_head_id" '); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-offset-3 col-sm-6">
                                    <div class="ui buttons">
                                        <button type="reset" class="ui button"><?php echo display('reset') ?></button>
                                        <div class="or"></div>
                                        <button class="ui positive button"><?php echo display('save') ?></button>
                                    </div>
                                </div>
                            </div>
                        <?php echo form_close() ?>
                    </div>
                    <div class="col-md-3"></div>
                </div>
            </div>
        </div>
    </div>

</div>