<div class="container-fluid">
                  <h3><font color="green">COVID19 QUARANTINE Surveillance STATUS OF J&K </font></h3>
                  <!-- OVERALL JK-->
                  <div class="row">
                    <div class="col-lg-3 col-6">
                      <!-- small box -->
                      <div class="small-box bg-aqua" style="color: white!important;">
                        <div class="inner">
                          <h3><?php echo $quarantined;?></h3>

                          <p>Quarantined</p>
                        </div>
                        <div class="icon">
                          <i class="ion ion-person-add"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                      <!-- small box -->
                      <div class="small-box bg-red" style="color: white!important;">
                        <div class="inner">
                          <h3><?php echo $sample_collected;?><!--<sup style="font-size: 20px">%</sup>--></h3>

                          <p>Samples Collected</p>
                        </div>
                        <div class="icon">
                          <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                      <!-- small box -->
                      <div class="small-box bg-yellow">
                        <div class="inner">
                          <h3> <?php echo $reports_awaited;?></h3>

                          <p>Reports Awaited</p>
                        </div>
                        <div class="icon">
                          <i class="ion ion-person-add"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                      <!-- small box -->
                      <div class="small-box bg-green">
                        <div class="inner">
                          <h3> <?php echo $sur_completed;?></h3>

                          <p>Surveillance Completed<?php //echo display('completed');?></p>
                        </div>
                        <div class="icon">
                          <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                    <!-- ./col -->
                  </div>
                  <!-- ./OVERALL JK -->
    
                <HR>
                
                <div class="heading clearfix">
                  <h3><font color="red">COVID19 CASE STATUS OF J&K </font></h3>
                </div> <!-- end .heading -->
                <!-- OVERALL JK-->
                <div class="row">
                  <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua" style="color: white!important;">
                      <div class="inner">
                        <h3><?php echo $confirmed;?></h3>

                        <p>Confirmed</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-person-add"></i>
                      </div>
                      <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- ./col -->
                  <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-red" style="color: white!important;">
                      <div class="inner">
                        <h3><?php echo $active;?><!--<sup style="font-size: 20px">%</sup>--></h3>

                        <p>Active (+VE)</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                      </div>
                      <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- ./col -->
                  <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                      <div class="inner">
                        <h3> <?php echo $recovered;?></h3>

                        <p>Recovered</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-person-add"></i>
                      </div>
                      <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- ./col -->
                  <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                      <div class="inner">
                        <h3> <?php echo $deceased;?></h3>

                        <p>Deceased<?php //echo display('completed');?></p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                      </div>
                      <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- ./col -->
                </div>
                <!-- ./OVERALL JK -->
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default thumbnail">

                <div class="panel-heading">
                    <h3><?php echo display('noticeboard') ?></h3>
                </div>

                <div class="panel-body">
                    <table width="100%" class="datatable table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th><?php echo display('serial') ?></th>
                                <th><?php echo display('title') ?></th>
                                <th><?php echo display('description') ?></th>
                                <th><?php echo display('start_date') ?></th>
                                <th><?php echo display('end_date') ?></th>
                                <th><?php echo display('assign_by') ?></th>
                                <th><?php echo display('action') ?></th> 
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($notices)) { ?>
                                <?php $sl = 1; ?>
                                <?php foreach ($notices as $notice) { ?>
                                    <tr>
                                        <td><?php echo $sl; ?></td>
                                        <td><?php echo $notice->title; ?></td>
                                        <td><?php echo character_limiter(strip_tags($notice->description),50); ?></td>
                                        <td><?php echo $notice->start_date; ?></td> 
                                        <td><?php echo $notice->end_date; ?></td> 
                                        <td><?php echo $notice->assign_by; ?></td> 
                                        <td class="center">
                                            <a href="<?php echo base_url("dashboard_nadu/noticeboard/notice/details/$notice->id") ?>" class="btn btn-xs btn-success"><i class="fa fa-eye"></i></a> 
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




        <!--  table area -->
        <div class="col-sm-12">
            <div class="panel panel-default thumbnail">
                <div class="panel-heading">
                    <h3><?php echo display('inbox') ?></h3>
                </div>

                <div class="panel-body">
                    <table width="100%" class="datatable table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th><?php echo display('serial') ?></th>
                                <th><?php echo display('sender') ?></th>
                                <th><?php echo display('subject') ?></th>
                                <th><?php echo display('message') ?></th>
                                <th><?php echo display('date') ?></th> 
                                <th><?php echo display('status') ?></th> 
                                <th><?php echo display('action') ?></th> 
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($messages)) { ?>
                                <?php $sl = 1; ?>
                                <?php foreach ($messages as $message) { ?>
                                    <tr>
                                        <td><?php echo $sl; ?></td>
                                        <td><?php echo $message->sender_name; ?></td>
                                        <td><?php echo $message->subject; ?></td>
                                        <td><?php echo character_limiter(strip_tags($message->message),50); ?></td>
                                        <td><?php echo date('d M Y h:i:s a', strtotime($message->datetime)); ?></td>  
                                        <td><?php echo (($message->receiver_status == 0) ? "<i class='label label-warning'>not seen</label>" : "<i class='label label-success'>seen</label>"); ?></td>
                                        <td class="center" width="80">
                                            <a href="<?php echo base_url("dashboard_nadu/messages/message/inbox_information/$message->id") ?>" class="btn btn-xs btn-success"><i class="fa fa-eye"></i></a> 
                                            <a href="<?php echo base_url("dashboard_nadu/messages/message/delete/$message->id/$message->sender_id/$message->receiver_id") ?>" class="btn btn-xs btn-danger" onclick="return confirm('<?php echo display('are_you_sure') ?>') "><i class="fa fa-trash"></i></a> 
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
</div>
 
 