		  <div class="row">
			<div class="col-lg-3 col-6">
			  <!-- small box -->
			  <div class="small-box bg-aqua" style="color: white!important;">
				<div class="inner">
				  <h3><?php echo !empty($total_students)?$total_students:'0';?></h3>

				  <p>Total Students</p>
				</div>
				<div class="icon">
				  <i class="ion ion-person-add"></i>
				</div>
				<a href="<?php echo base_url('dashboard_admin/user'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
			  </div>
			</div>
			<!-- ./col -->
			<div class="col-lg-3 col-6">
			  <!-- small box -->
			  <div class="small-box bg-red" style="color: white!important;">
				<div class="inner">
				  <h3><?php echo !empty($total_org)?$total_org:'0';?></h3>

				  <p>Total Organisations</p>
				</div>
				<div class="icon">
				  <i class="ion ion-stats-bars"></i>
				</div>
				<a href="<?php echo base_url('dashboard_admin/organisation'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
			  </div>
			</div>
			<!-- ./col -->
			<div class="col-lg-3 col-6">
			  <!-- small box -->
			  <div class="small-box bg-yellow">
				<div class="inner">
				  <h3><?php echo !empty($total_clusters)?$total_clusters:'0';?></h3>

				  <p>Total Clusters</p>
				</div>
				<div class="icon">
				  <i class="ion ion-chatbubbles"></i>
				</div>
				<a href="<?php echo base_url('dashboard_admin/cluster'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
			  </div>
			</div>
			<!-- ./col -->
			<div class="col-lg-3 col-6">
			  <!-- small box -->
			  <div class="small-box bg-green">
				<div class="inner">
				  <h3><?php echo !empty($total_centers)?$total_centers:'0';?></h3>

				  <p>New Messages</p>
				</div>
				<div class="icon">
				  <i class="ion ion-chatboxes"></i>
				</div>
				<a href="<?php echo base_url('dashboard_admin/center'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
			  </div>
			</div>
			<!-- ./col -->
		  </div>
