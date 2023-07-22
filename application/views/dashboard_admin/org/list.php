<div class="row">
    <!--  table area -->
    <div class="col-sm-12">
        <div class="panel panel-default thumbnail">
            <div class="panel-heading">
                <div class="btn-group">
                    <a class="btn btn-primary" href="<?php echo base_url("dashboard_admin/organisation/create") ?>"> <i class="fa fa-plus"></i>  <?php echo display('add_org') ?> </a>
                </div>
            </div>

            <div class="panel-body">
                <table width="100%" class="datatable table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th><?php echo display('serial') ?></th>
                            <th><?php echo display('name') ?></th>
                            <th><?php echo display('district') ?></th>
                            <th><?php echo display('head') ?></th>
                            <!-- <th><?php echo display('date') ?></th> 
                            <th><?php echo display('status') ?></th>  -->
                            <th><?php echo display('action') ?></th> 
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($orgs)) { ?>
                            <?php $sl = 1; ?>
                            <?php foreach ($orgs as $org) { ?>
                                <tr>
                                    <td><?php echo $sl; ?></td>
                                    <td><?php echo $org->org_name; ?></td>
                                    <td><?php echo $org->org_district; ?></td>
                                    <td><?php echo $org->firstname; ?></td>
                                    <!-- <td><?php echo character_limiter(strip_tags($org->org),50); ?></td>
                                    <td><?php echo date('d M Y h:i:s a', strtotime($org->datetime)); ?></td>   
                                    <td><?php echo (($org->receiver_status == 0) ? "<i class='label label-warning'>not seen</label>" : "<i class='label label-success'>seen</label>"); ?></td>-->
                                    <td class="center" width="80">
                                        <a href="<?php echo base_url("dashboard_admin/organisation/edit/$org->org_id") ?>" class="btn btn-xs btn-success"><i class="fa fa-edit"></i></a> 
                                        <a href="<?php echo base_url("dashboard_admin/organisation/delete/$org->org_id") ?>" class="btn btn-xs btn-danger" onclick="return confirm('<?php echo display('are_you_sure') ?>') "><i class="fa fa-trash"></i></a> 
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
 
 