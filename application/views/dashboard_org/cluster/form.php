<div class="row">
	<!--  Add Cluster -->
	<div class="col-sm-12 col-md-4">
		<div class="panel panel-default thumbnail">

			<div class="panel-heading no-print">
				<h3 class="float-left">
					<i class="fa fa-<?php echo isset($show_add_button) ? 'edit' : 'plus'; ?>"></i>
					<?php echo $left_subtitle; ?>
				</h3>
			</div>

			<div class="panel-body panel-form">
				<?php echo form_open_multipart('dashboard_org/cluster/create', 'class="form-inner"') ?>
				<?php echo form_hidden('cluster_id', $input->cluster_id); ?>
				<div class="row">
					<div class="col-sm-12">
						<div class="form-group">
							<label for="cluster_name">
								<?php echo display('cluster'); ?>
							</label> <small class="text-danger"> *</small>
							<input name="cluster_name" class="form-control form-control-sm" type="text"
								placeholder="<?php echo display('cluster') ?>" id="cluster_name"
								value="<?php echo $input->cluster_name; ?>" data-toggle="tooltip"
								title="<?php echo display('cluster'); ?>">
							<?php // echo form_error('cluster_name', '<span class="text-danger text-xs p-1">', '</span>'); ?>
						</div>
					</div>

					<div class="col-sm-12">
						<div class="form-group">
							<label for="cluster_head_id">
								<?php echo display('coodinator'); ?>
							</label> <small class="text-danger"> *</small>
							<?php echo form_dropdown('cluster_head_id', $coodinator_list, $input->cluster_head_id, 'class="form-control" id="cluster_head_id" '); ?>
							<?php // echo form_error('cluster_head_id', '<span class="text-danger text-xs p-1">', '</span>'); ?>
						</div>
					</div>
					
					<div class="col-sm-12">
						<div class="form-group">
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
				<?php echo form_close() ?>
			</div>
		</div>
		</div>
		<!-- List Cluster -->
		<div class="col-sm-12 col-md-8">
			<div class="panel panel-default thumbnail">
				<div class="panel-heading">
					<h3>
						<i class="fa fa-list"></i>
						<?php echo $right_subtitle; ?>
					</h3>
				</div>

				<?php //echo "<pre>"; print_r($clusters[0]); echo "</pre>"; ?>
				<div class="panel-body">
					<table width="100%" class="datatable table table-striped table-bordered table-hover">
						<thead>
							<tr>
								<th>
									<?php echo display('serial') ?>
								</th>
								<th>
									<?php echo display('cluster') ?>
								</th>
								<th>
									<?php echo display('org') ?>
								</th>
								<th>
									<?php echo display('coodinator') ?>
								</th>
								<!-- <th><?php echo display('date') ?></th> 
														<th><?php echo display('status') ?></th>  -->
								<th>
									<?php echo display('action') ?>
								</th>
							</tr>
						</thead>
						<tbody>
							<?php if (!empty($clusters)) { ?>
								<?php $sl = 1; ?>
								<?php foreach ($clusters as $cluster) { ?>
									<tr>
										<td>
											<?php echo $sl; ?>
										</td>
										<td>
											<?php echo $cluster->cluster_name; ?>
										</td>
										<td>
											<?php echo $cluster->org_name; ?>
										</td>
										<td>
											<?php echo $cluster->firstname; ?>
										</td>
										<!-- <td><?php echo character_limiter(strip_tags($org->org), 50); ?></td>
																		<td><?php echo date('d M Y h:i:s a', strtotime($org->datetime)); ?></td>   
																		<td><?php echo (($org->receiver_status == 0) ? "<i class='label label-warning'>not seen</label>" : "<i class='label label-success'>seen</label>"); ?></td>-->
										<td class="center" width="80">
											<a href="<?php echo base_url("dashboard_org/cluster/edit/$cluster->cluster_id") ?>"
												class="btn btn-xs btn-success"><i class="fa fa-edit"></i></a>
											<a href="<?php echo base_url("dashboard_org/cluster/delete/$cluster->cluster_id") ?>"
												class="btn btn-xs btn-danger" onclick="return confirm('<?php echo display('are_you_sure') ?>') "><i
													class="fa fa-trash"></i></a>
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
