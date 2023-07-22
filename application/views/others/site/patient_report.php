
<div class="row">
    <!--  table area -->
    <div class="col-sm-12">
        <div  class="panel panel-default thumbnail">
            <div class="panel-heading no-print">
                <h3>Recently Uploaded Reports</h3>
            </div> 
            <div class="panel-body">
                <?php //echo "<pre>"; print_r($reports[0]); echo "</pre>";?>
                <table width="100%" class="datatable table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th><?php echo display('serial') ?></th>
                            <th><?php echo display('date') ?></th>
                            <th><?php echo display('report_title') ?></th>
                            
                            <th><?php echo display('action') ?></th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($reports)) { ?>
                            <?php $sl = 1; ?>
                            <?php foreach ($reports as $report) { ?>
                                <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                                    <td><?php echo $sl; ?></td>
                                    <td><?php echo date('d-M-Y',strtotime($report->r_date)); ?></td>
                                    <td><?php echo $report->r_name; ?></td>
                                    <td class="center">
                                        <?php if ($report->r_downloadable==1){ ?>
                                            
                                        <a download href="<?php echo base_url($report->r_report) ?>" class="btn btn-xs btn-success"><i class="fa fa-download"></i></a>
                                    <?php }else{ ?>
                                        Download Pending...
                                        <div class="contact">
                                            <div class="line"></div>
                                            <a href="tel:+91<?php echo $phone;?>">Contact Us <?php echo $phone; ?></a>
                                        </div>
                                    <?php } ?>
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