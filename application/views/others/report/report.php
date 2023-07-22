<div class="row">
    <!--  table area -->
    <div class="col-sm-12">
        <div  class="panel panel-default thumbnail">
            <div class="panel-heading no-print">
                <div class="btn-group"> 
                    <a class="btn btn-success" href="<?php echo base_url("report/create") ?>"> <i class="fa fa-plus"></i>  <?php echo display('add_report') ?> </a>  
                </div>
            </div> 
            <div class="panel-body">
                <?php //echo "<pre>"; print_r($reports[0]); echo "</pre>";?>
                <table width="100%" class="datatable table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th><?php echo display('serial') ?></th>
							<th><?php echo display('patient_id') ?></th>
                            <th><?php echo display('report_title') ?></th>
							<th><?php echo display('mobile') ?></th>
                            <!--<th><?php echo display('report') ?></th>-->
                            <th><?php echo display('downloadable') ?></th>
                            <th><?php echo display('date') ?></th>
                            <th><?php echo display('action') ?></th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($reports)) { ?>
                            <?php $sl = 1; ?>
                            <?php foreach ($reports as $report) { ?>
                                <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                                    <td><?php echo $sl; ?></td>
									<td><?php echo $report->r_patient_id; ?></td>
									<td><?php echo $report->r_name; ?></td>
								    <td>
										<div class="contact">
											<div class="line"></div>
											<a href="tel:+91<?php echo $report->phone;?>"><?php echo $report->phone; ?></a>
										</div>
									</td>
									<!--<td><?php echo $report->r_report; ?></td>-->
                                    <td><?php echo ($report->r_downloadable)?'<span class="label label-success">Yes</span>':'<span class="label label-danger">No</span>'; ?></td>
                                    <td><?php echo date('d-M-Y',strtotime($report->r_date)); ?></td>
                                    <td class="center">
                                        <a href="<?php echo base_url("report/edit/$report->r_id") ?>" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>
										<a download href="<?php echo base_url($report->r_report) ?>" class="btn btn-xs btn-success"><i class="fa fa-download"></i></a>
                                        <a href="<?php echo base_url("report/delete/$report->r_id?file=$report->r_report") ?>" class="btn btn-xs btn-danger" onclick="return confirm('<?php echo display('are_you_sure') ?>')"><i class="fa fa-trash"></i></a> 
                                    </td>
                                    
                                   <!-- <td><?php//echo (($doctor->d_status==1)?display('active'):display('inactive')); ?></td>-->
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