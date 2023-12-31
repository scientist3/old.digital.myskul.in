<div class="row">
	<!--  form area -->
	<div class="col-sm-12 col-md-4">
		<div class="panel panel-default thumbnail">

			<div class="panel-heading no-print">
				<h3>
					<i class="fa fa-list"></i> <?php echo display('add_centers') ?>
				</h3>
			</div>
			<?php //echo "<pre>"; print_r($center); echo "</pre>"; 
			?>
			<div class="panel-body panel-form">
				<?php echo form_open_multipart('dashboard_org/center/create', 'class="form-inner"') ?>

				<?php echo form_hidden('center_id', $center->center_id); ?>
				<div class="row">

					<div class="col-sm-12">
						<div class="form-group">
							<label for="center_name">
								<?php echo display('center_name') ?> <i class="text-danger">*</i>
							</label>

							<input name="center_name" type="text" class="form-control form-control-sm" id="center_name" placeholder="<?php echo display('center_name') ?>" value="<?php echo $center->center_name ?>">

						</div>
					</div>

					<div class="col-sm-12">
						<div class="form-group">
							<label for="center_cluster_id">
								<?php echo display('cluster') ?> <i class="text-danger">*</i>
							</label>
							<?php echo form_dropdown('center_cluster_id', $cluster_list, $center->center_cluster_id, 'class="form-control" id="center_cluster_id" '); ?>
						</div>
					</div>

					<div class="col-sm-12">
						<div class="form-group">
							<label for="center_head_id">
								<?php echo display('animator') ?> <i class="text-danger">*</i>
							</label>
							<?php echo form_dropdown('center_head_id', $animator_list, $center->center_head_id, 'class="form-control" id="center_head_id" '); ?>
						</div>
					</div>

					<div class="col-sm-12">
						<div class="form-group">
							<label for="center_type_id">
								<?php echo display('center_type') ?> <i class="text-danger">*</i>
							</label>
							<?php echo form_dropdown('center_type_id', $center_type, $center->center_type_id ?? NULL, 'class="form-control" id="center_type_id" '); ?>
						</div>
					</div>
					<div class="col-sm-12">
						<div class="form-group">
							<div class="pull-right">
								<div class="ui buttons">
									<button type="reset" class="ui button">
										<?php echo display('reset') ?>
									</button>
									<div class="or"></div>
									<button class="ui positive button">
										<?php echo display('save') ?>
									</button>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php echo form_close() ?>
			</div>
		</div>
	</div>

	<!-- Center List -->
	<div class="col-sm-12 col-md-8">
		<div class="panel panel-default thumbnail">
			<div class="panel-heading">
				<h3>
					<i class="fa fa-plus"></i> <?php echo display('list_center') ?>
				</h3>
			</div>

			<?php //echo "<pre>"; print_r($centers[0]); echo "</pre>"; 
			?>
			<div class="panel-body">
				<table width="100%" class="datatable table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th>
								<?php echo display('serial') ?>
							</th>
							<th>
								<?php echo display('center_name') ?>
							</th>
							<th>
								<?php echo display('cluster') ?>
							</th>
							<th>
								<?php echo display('animator') ?>
							</th>
							<!-- <th><?php echo display('date') ?></th>
														<th><?php echo display('status') ?></th>  -->
							<th>
								<?php echo display('action') ?>
							</th>
						</tr>
					</thead>
					<tbody>
						<?php if (!empty($centers)) { ?>
							<?php $sl = 1; ?>
							<?php foreach ($centers as $center) { ?>
								<tr>
									<td>
										<?php echo $sl; ?>
									</td>
									<td>
										<?php echo $center->center_name; ?>
									</td>
									<td>
										<?php echo $center->cluster_name; ?>
									</td>
									<td>
										<?php echo $center->firstname; ?>
									</td>
									<!-- <td><?php echo character_limiter(strip_tags($org->org), 50); ?></td>
																		<td><?php echo date('d M Y h:i:s a', strtotime($org->datetime)); ?></td>
																		<td><?php echo (($org->receiver_status == 0) ? "<i class='label label-warning'>not seen</label>" : "<i class='label label-success'>seen</label>"); ?></td>-->
									<td class="center" width="80">
										<a href="<?php echo base_url("dashboard_org/center/edit/$center->center_id") ?>" class="btn btn-xs btn-success"><i class="fa fa-edit"></i></a>
										<a href="<?php echo base_url("dashboard_org/center/delete/$center->center_id") ?>" class="btn btn-xs btn-danger" onclick="return confirm('<?php echo display('are_you_sure') ?>') "><i class="fa fa-trash"></i></a>
									</td>
								</tr>
								<?php $sl++; ?>
							<?php } ?>
						<?php } ?>
					</tbody>
				</table> <!-- /.table-responsive -->
			</div>
		</div>
	</div>

</div>