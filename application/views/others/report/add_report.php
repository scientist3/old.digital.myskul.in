<div class="row">
    <!--  form area -->
    <div class="col-sm-12">
        <div  class="panel panel-default thumbnail">
 
            <div class="panel-heading no-print">
                <div class="btn-group"> 
                    <a class="btn btn-primary" href="<?php echo base_url("report") ?>"> <i class="fa fa-list"></i>  <?php echo display('view_reports') ?> </a>  
                </div>
            </div> 
			<?php //echo "<pre>"; print_r($report); echo "</pre>"; ?>
            <div class="panel-body panel-form">
                <div class="row">
					<div id="output" class="hide alert"></div>
					<div class="col-md-9 col-sm-12">

                        <?php echo form_open_multipart('report/create','class="form-inner" id="mailForm"') ?>
							<?php echo form_hidden('r_id',$report->r_id); ?>
                            
							<div class="form-group row"> <!--pateint_name-->
                                <label for="r_patient_id" class="col-xs-3 col-form-label"><?php echo display('patient_name') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <?php
                                        echo form_dropdown('r_patient_id', $patients_list, $report->r_patient_id, 'class="form-control" id="r_patient_id" ');

                                    ?>
                                </div>
                            </div>
							
							<div class="form-group row">
                                <label for="r_name" class="col-xs-3 col-form-label"><?php echo display('report_title') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <input name="r_name" type="text" class="form-control" id="r_name" placeholder="<?php echo display('report_title') ?>" value="<?php echo $report->r_name ?>" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="attach_file" class="col-xs-3 col-form-label"><?php echo display('attach_file') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <input type="file" name="attach_file" id="attach_file">

                                    <input type="hidden" name="hidden_attach_file" id="hidden_attach_file" value="<?php echo $report->r_report ?>">

                                    <p id="upload-progress" class="hide alert"></p>
                                </div>
                            </div>
							
							<div class="form-group row">
                                <label class="col-sm-3"><?php echo display('downloadable') ?></label>
                                <div class="col-xs-9">
                                    <div class="form-check">
                                        <label class="radio-inline">
                                        <input type="radio" name="r_downloadable" value="1" <?php echo  set_radio('r_downloadable', '1', TRUE); ?> ><?php echo display('yes') ?>
                                        </label>
                                        <label class="radio-inline">
                                        <input type="radio" name="r_downloadable" value="0" <?php echo  set_radio('r_downloadable', '0'); ?> ><?php echo display('no') ?>
                                        </label>
                                    </div>
                                </div>
                            </div>
							
                            <div class="form-group row">
                                <label class="col-sm-3"><?php echo display('status') ?></label>
                                <div class="col-xs-9">
                                    <div class="form-check">
                                        <label class="radio-inline">
                                        <input type="radio" name="r_status" value="1" <?php echo  set_radio('r_status', '1', TRUE); ?> ><?php echo display('active') ?>
                                        </label>
                                        <label class="radio-inline">
                                        <input type="radio" name="r_status" value="0" <?php echo  set_radio('r_status', '0'); ?> ><?php echo display('inactive') ?>
                                        </label>
                                    </div>
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

<script type="text/javascript">
$(function(){
    var browseFile = $('#attach_file');
    var form       = $('#mailForm');
    var progress   = $("#upload-progress");
    var hiddenFile = $("#hidden_attach_file");
    var output     = $("#output");
    browseFile.on('change',function(e)
    {
        e.preventDefault(); 
        uploadData = new FormData(form[0]);

        $.ajax({
            url      : '<?php echo base_url('report/do_upload') ?>',
            type     : form.attr('method'),
            dataType : 'json',
            cache    : false,
            contentType : false,
            processData : false,
            data     : uploadData, 
            beforeSend  : function() 
            {
                hiddenFile.val('');
                progress.removeClass('hide').html('<i class="fa fa-cog fa-spin"></i> Loading..');
            },
            success  : function(data) 
            { 
                progress.addClass('hide');
                if (data.status == false) {
                    output.html('<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+data.exception).addClass('alert-danger').removeClass('hide').removeClass('alert-info');
                } else if (data.status == true ) {
                    output.html('<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+data.message).addClass('alert-info').removeClass('hide').removeClass('alert-danger');
                    hiddenFile.val(data.filepath);
                }  
            }, 
            error    : function() 
            {
                progress.addClass('hide');
                output.addClass('hide');
                alert('failed!');
            }   
        });
    });



});
</script>