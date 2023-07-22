<div class="row">
    <!--  table area -->
    <div class="col-sm-12">
        <div class="panel panel-default thumbnail">
            <div class="panel-heading">
                <div class="btn-group">
                    <!-- <a class="btn btn-primary" href="<?php echo base_url("material/create") ?>"> <i class="fa fa-plus"></i>  <?php echo display('add_material') ?> </a>  -->
                    <h2>Material for <?php echo $center->center_name ;?> Center</h2>
                </div>
            </div>

            <?php //echo "<pre>"; print_r($materials[0]); echo "</pre>"; 
                $type =['1' => 'Video Link','2' =>'Document'];
            ?>
            <div class="panel-body">
                <table width="100%" class="datatable table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th><?php echo display('serial') ?></th>
                            <th><?php echo display('title') ?></th>
                            <th><?php echo display('description') ?></th>
                            <th><?php echo display('type') ?></th>
                            <!-- <th><?php echo display('mat_for') ?></th>  -->
                            <!-- <th><?php echo display('total_views') ?></th> -->
                            <!-- <th><?php echo display('status') ?></th> -->
                            <th><?php echo display('date') ?></th>  
                            <th><?php echo display('action') ?></th> 
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($materials)) { ?>
                            <?php $sl = 1; ?>
                            <?php foreach ($materials as $material) { ?>
                                <tr>
                                    <td><?php echo $sl; ?></td>
                                    <td>
                                        <a href="<?php echo base_url("dashboard_std/material/view/$material->mat_id") ?>" class="">
                                            <?php echo $material->mat_title; ?>
                                            <?php if (!array_key_exists($user_id,$material->seenby)){ ?>
                                                <span class="label label-info">New</span>
                                            <?php } ?>
                                        </a> 
                                    </td>
                                    <td><?php echo character_limiter(strip_tags($material->mat_desc),50); ?></td>
                                    <td><?php echo $type[$material->mat_type]; ?></td>
                                    <!-- <td><?php echo $material->mat_for; ?></td> -->
                                    <!-- <td class="text-center"><?php echo $material->total_views; ?></td> -->
                                    <!-- <td><?php echo (($material->ml_seen == 0) ? "<i class='label label-warning'>not seen</label>" : "<i class='label label-success'>seen</label>"); ?></td> -->
                                    <td><?php echo date('h:iA d M Y ', strtotime($material->mat_date)); ?></td>   
                                    <!-- <td><?php echo character_limiter(strip_tags($org->org),50); ?></td> -->
                                    <td class="center" width="80">
                                        
                                        <a href="<?php echo base_url("dashboard_std/material/view/$material->mat_id") ?>" class="btn btn-xs btn-info"><i class="fa fa-eye"></i></a> 
                                       <!--  <a href="<?php echo base_url("dashboard_std/material/edit/$material->mat_id") ?>" class="btn btn-xs btn-success"><i class="fa fa-edit"></i></a> 
                                        <a href="<?php echo base_url("dashboard_std/material/delete/$material->mat_id?isfile=".(($material->mat_type==2)?1:0)."&file=$material->mat_doc_link") ?>" class="btn btn-xs btn-danger" onclick="return confirm('<?php echo display('are_you_sure') ?>') "><i class="fa fa-trash"></i></a> -->
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
 
 