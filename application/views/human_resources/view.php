<div class="row">
    <!--  table area -->
    <div class="col-sm-12">
        <div  class="panel panel-default thumbnail">
 
            <div class="panel-heading no-print">
                <div class="btn-group"> 
                    <a class="btn btn-success" href="<?php echo base_url("human_resources/employee/form") ?>"> <i class="fa fa-plus"></i>  <?php echo display('add_employee') ?> </a>   
                </div>
            </div> 

            <?php //$employees=$centers;//echo"<pre>"; print_r($employees[0]); echo "</pre>"; ?>
            <?php //echo"<pre>"; print_r($centers[0]); echo "</pre>"; ?>
            
            <div class="panel-body">
                <table width="100%" class="datatable table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th><?php echo display('serial') ?></th>
                            <th><?php echo display('name')?></th>
                            <th><?php echo display('mobile') ?></th>
                            <th><?php echo display('designation') ?></th>
                            <th><?php echo display('center') ?></th>
                            <th><?php echo display('address') ?></th>
                            <th><?php echo display('email') ?></th>
                            <th><?php echo display('picture') ?></th>
                            
                            <th><?php echo display('action') ?></th>
                            <!--<th>< ?php echo display('user_role') ?></th>
                            <th>< ?php echo display('status') ?></th>-->
                            <!--<th>< ?php echo display('last_name') ?></th>-->
                            <!--<th>< ?php echo display('user_id') ?></th>
                            <th>< ?php echo display('sex') ?></th>-->
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($employees)) { ?>
                            <?php $sl = 1; ?>
                            <?php foreach ($employees as $employee) { ?>
                                <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                                    <td><?php echo $sl; ?></td>
                                    <td><?php echo $employee->firstname." ".$employee->lastname." (".(($employee->sex=='Male')?'M':'F').")"; ?></td>
                                    <td>
                                        <div class="contact">
                                            <div class="line"></div>
                                            <a href="tel:+91<?php echo $employee->mobile;?>"><?php echo $employee->mobile; ?></a>
                                        </div>
                                    </td>
                                    <td><?php echo $employee->designation; ?></td>
                                    <td><?php echo $employee->name; ?></td>
                                    <td><?php echo $employee->address; ?></td>
                                    <td><?php echo $employee->email; ?></td>
                                    <td><img src="<?php echo (!empty($employee->picture) ? base_url($employee->picture) : base_url("assets/images/no-img.png")) ?>" width="65" height="50"/></td>
                                    <!--<td>< ?php echo $employee->lastname; ?></td>-->
                                    <td class="center" width="80">
                                        <a href="<?php echo base_url("human_resources/employee/profile/$employee->user_id") ?>" class="btn btn-xs btn-success"><i class="fa fa-eye"></i></a> 
                                        <a href="<?php echo base_url("human_resources/employee/form/$employee->user_id") ?>" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a> 
                                        <a href="<?php echo base_url("human_resources/employee/delete/$employee->user_id/$employee->user_role") ?>" class="btn btn-xs btn-danger" onclick="return confirm('<?php echo display('are_you_sure') ?>')"><i class="fa fa-trash"></i></a> 
                                    </td> 
                                    <!--<td>< ?php echo $userRoles[$employee->user_role] ?></td> 
                                    <td>< ?php echo (($employee->status==1)?display('active'):display('inactive')); ?></td>-->
                                    
                                   
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