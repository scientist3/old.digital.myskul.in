<div class="row">
    <!--  form area -->
    <div class="col-sm-12">
        <div  class="panel panel-default thumbnail">
 
            <div class="panel-heading no-print">
                <div class="btn-group"> 
                    <a class="btn btn-primary" href="<?php echo base_url("patient") ?>"> <i class="fa fa-list"></i>  <?php echo display('patient_list') ?> </a>  
                </div>
            </div> 
            <?php //echo "<pre>"; print_r($patient); echo "</pre>"; ?>
            <div class="panel-body panel-form">
                <div class="row">
                    <div class="col-md-9 col-sm-12">

                        <?php echo form_open_multipart('patient/create','class="form-inner"') ?>

                            <?php echo form_hidden('id',$patient->id); ?>

                            <!-- <div class="form-group row">
                                <label for="patient_id" class="col-xs-3 col-form-label"><?php echo display('patient_id') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <input readonly name="patient_id" type="text" class="form-control" id="patient_id" placeholder="<?php echo display('patient_id') ?>" value="<?php echo $patient->patient_id ?>" >
                                </div>
                            </div> -->

                            <div class="form-group row">
                                <label for="firstname" class="col-xs-3 col-form-label"><?php echo display('first_name') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <input name="firstname" type="text" class="form-control" id="firstname" placeholder="<?php echo display('first_name') ?>" value="<?php echo $patient->firstname ?>" >
                                </div>
                            </div>

                            <!--<div class="form-group row">
                                <label for="lastname" class="col-xs-3 col-form-label"><?php echo display('last_name') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <input name="lastname" type="text" class="form-control" id="lastname" placeholder="<?php echo display('last_name') ?>" value="<?php echo $patient->lastname ?>">
                                </div>
                            </div>-->
                            <div class="form-group row">
                                <label for="district" class="col-xs-3 col-form-label"><?php echo display('district') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <?php echo form_dropdown('district', $district_list, $patient->district, 'class="form-control" id="district" '); ?>
                                </div>
                            </div>

                            <?php /* 
                            <div class="form-group row">
                                <label for="password" class="col-xs-3 col-form-label"><?php echo display('password') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <input name="password" type="password" class="form-control" id="password" placeholder="<?php echo display('password') ?>">
                                </div>
                            </div>
                            

                            <div class="form-group row">
                                <label for="email" class="col-xs-3 col-form-label"><?php echo display('email') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <input name="email" type="text" class="form-control" id="email" placeholder="<?php echo display('email') ?>" value="<?php echo $patient->email ?>">
                                </div>
                            </div>

                            

                             
							<div class="form-group row">
                                <label for="mobile" class="col-xs-3 col-form-label"><?php echo display('mobile') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <input name="mobile" class="form-control" type="text" placeholder="<?php echo display('mobile') ?>" id="mobile"  value="<?php echo $patient->mobile ?>">
                                </div>
                            </div>
							*/?>

                            <div class="form-group row">
                                <label for="phone" class="col-xs-3 col-form-label"><?php echo display('phone') ?></label>
                                <div class="col-xs-9">
                                    <input name="phone" class="form-control" type="text" placeholder="<?php echo display('phone') ?>" id="phone"  value="<?php echo $patient->phone ?>">
                                </div>
                            </div>
                            <!--<div class="form-group row">
                                <label for="report_status" class="col-xs-3 col-form-label"><?php echo display('report_status') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <input name="report_status" class="form-control" type="text" placeholder="<?php echo display('report_status') ?>" id="report_status"  value="<?php echo $patient->report_status ?>">
                                </div>
                            </div>-->
                            <?php /* <div class="form-group row">
                                <label for="blood_group" class="col-xs-3 col-form-label"><?php echo display('blood_group') ?></label>
                                <div class="col-xs-9"> 
                                    <?php
                                        $bloodList = array(
                                            ''   => display('select_option'),
                                            'A+' => 'A+',
                                            'A-' => 'A-',
                                            'B+' => 'B+',
                                            'B-' => 'B-',
                                            'O+' => 'O+',
                                            'O-' => 'O-',
                                            'AB+' => 'AB+',
                                            'AB-' => 'AB-'
                                        );
                                        echo form_dropdown('blood_group', $bloodList, $patient->blood_group, 'class="form-control" id="blood_group" '); 
                                    ?>
                                </div>
                            </div> 

                            <div class="form-group row">
                                <label class="col-sm-3"><?php echo display('sex') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <div class="form-check">
                                        <label class="radio-inline">
                                        <input type="radio" name="sex" value="Male" <?php echo  set_radio('sex', 'Male', TRUE); ?> ><?php echo display('male') ?>
                                        </label>
                                        <label class="radio-inline">
                                        <input type="radio" name="sex" value="Female" <?php echo  set_radio('sex', 'Female'); ?> ><?php echo display('female') ?>
                                        </label>
                                        <label class="radio-inline">
                                        <input type="radio" name="sex" value="Other" <?php echo  set_radio('sex', 'Other'); ?> ><?php echo display('other') ?>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            */?>
                            <div class="form-group row">
                                <label for="address" class="col-xs-3 col-form-label"><?php echo display('address') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <textarea name="address" class="form-control"  placeholder="<?php echo display('address') ?>" maxlength="140" rows="2"><?php echo $patient->address ?></textarea>
                                </div>
                            </div>
							
							<?php /*
                            <!--<div class="form-group row">
                                <label for="report" class="col-xs-3 col-form-label"><?php echo display('travel') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <textarea name="travel" class="form-control"  placeholder="<?php echo display('travel') ?>" maxlength="140" rows="2"><?php echo $patient->travel ?></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="center" class="col-xs-3 col-form-label"><?php echo display('center') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <?php echo form_dropdown('center',$center_list, $patient->center, 'class="form-control" id="center" '); ?>
                                    <!--<select  class="form-control"  name="center" id="center" placeholder="Quarantine">                               
                                    <option value="">Centre Name</option>
                                </select>-->
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3"><?php echo display('sample_collected') ?></label>
                                <div class="col-xs-9">
                                    <div class="form-check">
                                        <label class="radio-inline">
                                        <input type="radio" name="sample_collected" value="1" <?php echo  set_radio('sample_collected', '1'); ?> ><?php echo display('yes') ?>
                                        </label>
                                        <label class="radio-inline">
                                        <input type="radio" name="sample_collected" value="0" <?php echo  set_radio('sample_collected', '0', true); ?> ><?php echo display('no') ?>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3"><?php echo display('sample_result') ?></label>
                                <div class="col-xs-9">
                                    <div class="form-check">
                                        <label class="radio-inline">
                                        <input type="radio" name="sample_result" value="-1" <?php echo  set_radio('sample_result', '-1'); ?> ><?php echo display('positive') ?>
                                        </label>
                                        <label class="radio-inline">
                                        <input type="radio" name="sample_result" value="1" <?php echo  set_radio('sample_result', '1'); ?> ><?php echo display('negative') ?>
                                        </label>
                                        <label class="radio-inline">
                                        <input type="radio" name="sample_result" value="0" <?php echo  set_radio('sample_result', '0', true); ?> ><?php echo display('res_awaited') ?>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3"><?php echo display('recovered') ?></label>
                                <div class="col-xs-9">
                                    <div class="form-check">
                                        <label class="radio-inline">
                                        <input type="radio" name="recovered" value="1" <?php echo  set_radio('recovered', '1'); ?> ><?php echo display('yes') ?>
                                        </label>
                                        <label class="radio-inline">
                                        <input type="radio" name="recovered" value="0" <?php echo  set_radio('recovered', '0',TRUE); ?> ><?php echo display('no') ?>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3"><?php echo display('deceased') ?></label>
                                <div class="col-xs-9">
                                    <div class="form-check">
                                        <label class="radio-inline">
                                        <input type="radio" name="deceased" value="1" <?php echo  set_radio('deceased', '1'); ?> ><?php echo display('yes') ?>
                                        </label>
                                        <label class="radio-inline">
                                        <input type="radio" name="deceased" value="0" <?php echo  set_radio('deceased', '0',TRUE); ?> ><?php echo display('no') ?>
                                        </label>
                                    </div>
                                </div>
                            </div>*/ ?>

                            <!-- if employee picture is already uploaded -->
                            <?php /*
							<?php if(!empty($patient->picture)) {  ?>
                            <div class="form-group row">
                                <label for="picturePreview" class="col-xs-3 col-form-label"></label>
                                <div class="col-xs-9">
                                    <img src="<?php echo base_url($patient->picture) ?>" alt="Picture" class="img-thumbnail" />
                                </div>
                            </div>
                            <?php } ?>

                            <div class="form-group row">
                                <label for="picture" class="col-xs-3 col-form-label"><?php echo display('picture') ?></label>
                                <div class="col-xs-9">
                                    <input type="file" name="picture" id="picture" value="<?php echo $patient->picture ?>">
                                    <input type="hidden" name="old_picture" value="<?php echo $patient->picture ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3"><?php echo display('status') ?></label>
                                <div class="col-xs-9">
                                    <div class="form-check">
                                        <label class="radio-inline">
                                        <input type="radio" name="status" value="1" <?php echo  set_radio('status', '1', TRUE); ?> ><?php echo display('active') ?>
                                        </label>
                                        <label class="radio-inline">
                                        <input type="radio" name="status" value="0" <?php echo  set_radio('status', '0'); ?> ><?php echo display('inactive') ?>
                                        </label>
                                    </div>
                                </div>
                            </div> */ ?>

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