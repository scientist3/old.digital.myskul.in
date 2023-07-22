<div class="row">
    <!--  table area -->
    <div class="col-sm-12">
        <div  class="panel panel-default thumbnail">
            <div class="panel-heading no-print">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="btn-group col-sm-2"> 
                            <a class="btn btn-success" href="<?php echo base_url("patient/create") ?>"> 
                                <i class="fa fa-plus"></i>  <?php echo display('add_patient') ?> 
                            </a> 
                        </div>
                        
                    </div>
                </div>
            </div>
            <?php //echo "<pre>"; print_r($patients[0]); echo "</pre>"; ?>
            <div class="panel-body">
                <table width="100%" class="datatable table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th><?php echo display('serial') ?></th>
                            <!-- <th><?php echo display('picture') ?></th> -->
							<th><?php echo display('patient_id') ?></th>
                            <th><?php echo display('first_name') ?></th>
                            <th><?php echo display('mobile') ?></th>
                            <th><?php echo display('district') ?></th>
                            <th><?php echo display('address') ?></th>
                            <th><?php echo display('action') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($patients)) { ?>
                            <?php $sl = 1; ?>
                            <?php foreach ($patients as $patient) { ?>
                                <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                                    <td><?php echo $sl; ?></td>
									<!--
									<td>
                                        <a target="_BLANK" href="<?php echo (!empty($patient->picture)?base_url($patient->picture):base_url("assetslte/images/no-img.png")) ?>"">
                                            <img alt="Picture" src="<?php echo (!empty($patient->picture)?base_url($patient->picture):base_url("assetslte/images/no-img.png")) ?>" class="img-thumbnail img-responsive" height="50px" width="50px">
                                        </a>
                                    </td> 
									-->
                                    <td><?php echo $patient->patient_id; ?></td>
                                    <td><?php echo $patient->firstname; ?></td>
                                    <td><div class="contact"><div class="line"></div><a href="tel:+91<?php echo $patient->phone;?>"><?php echo $patient->phone; ?></a></div></td>
                                    <td><?php echo $patient->district; ?></td>
                                    <td><?php echo $patient->address; ?></td>
                                    <td class="center">
                                        <a href="<?php echo base_url("patient/profile/$patient->id") ?>" class="btn btn-xs btn-success"><i class="fa fa-eye"></i></a> 
                                        <a href="<?php echo base_url("patient/edit/$patient->id") ?>" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a> 
                                        <a href="<?php echo base_url("patient/delete/$patient->id") ?>" class="btn btn-xs btn-danger" onclick="return confirm('<?php echo display('are_you_sure') ?>')"><i class="fa fa-trash"></i></a> 
                                    </td>
                                    
                                </tr>
                                <?php $sl++; ?>
                            <?php } ?> 
                        <?php } ?> 
                    </tbody>
                </table>  <!-- /.table-responsive -->
            </div>
        </div>
    </div>
</div>

<!-- jQuery 3 -->
<script src="<?php echo base_url('assetslte/'); ?>bower_components/jquery/dist/jquery.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
    //district
    /*$('#district').change(function(){
        alert('Hep');
    });*/
    $("#district").change(function(){
        var center_list1 = $('#center');
        var error = $('#error');
        
        $.ajax({
            url  : '<?= base_url('patient/center_by_district/') ?>',
            type : 'post',
            dataType : 'JSON',
            data : {
                '<?= $this->security->get_csrf_token_name(); ?>' : '<?= $this->security->get_csrf_hash(); ?>',
                district : $(this).val()
            },
            success : function(data) 
            {
                if (data.status == true) {
                    center_list1.html(data.center);
                    error.html('');
                } else {
                    center_list1.html('<option value="">Select Center</option>');
                    //error.html(data.center);
                }
            }, 
            error : function()
            {
                alert('failed');
            }
        });
    }); 

});
</script>