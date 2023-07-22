<div class="row">
    <!--  table area -->
    <div class="col-sm-12">
        <div  class="panel panel-default thumbnail">
            <div class="panel-heading no-print">
                <h3>Messages From Site</h3>
            </div> 
            <div class="panel-body">
                <?php //echo "<pre>"; print_r($messages[0]); echo "</pre>";?>
				<?php //echo "<pre>"; print_r($new_messages); echo "</pre>";?>
                <table width="100%" class="datatable table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th><?php echo display('serial') ?></th>
                            <th><?php echo display('date') ?></th>
							<th><?php echo display('name') ?></th>
                            <th><?php echo display('email') ?></th>
							<th><?php echo display('mobile') ?></th>
                            <th><?php echo display('message') ?></th>
                            <th><?php echo display('action') ?></th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($messages)) { ?>
                            <?php $sl = 1; ?>
                            <?php foreach ($messages as $message) { ?>
                                <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                                    <td><?php echo $sl; ?>
										<?php if(!$message->f_read){ ?>
										<span class="pull-right-container">
											<small class="label pull-right bg-green">new</small>
										</span>
										<?php } ?>
									</td>
                                    <td><?php echo date('d-M-Y',strtotime($message->f_date)); ?></td>
									<td><?php echo $message->f_name; ?></td>
									<td><?php echo $message->f_email; ?></td>
								    <td>
										<div class="contact">
											<div class="line"></div>
											<a href="tel:+91<?php echo $message->f_phone;?>"><?php echo $message->f_phone; ?></a>
										</div>
									</td>
									<td><?php echo $message->f_subject; ?></td>
                                    <td class="center">
                                        <a href="<?php echo base_url("contactus/view/$message->f_id") ?>" class="btn btn-xs btn-primary"><i class="fa fa-eye"></i></a>
										<a href="<?php echo base_url("contactus/delete/$message->f_id") ?>" class="btn btn-xs btn-danger" onclick="return confirm('<?php echo display('are_you_sure') ?>')"><i class="fa fa-trash"></i></a> 
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