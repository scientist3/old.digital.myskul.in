		  <div class="row">
			<!-- small box -->
			<!-- <div class="col-lg-4 col-6">
			  <div class="small-box bg-aqua" style="color: white!important;">
				<div class="inner">
				  <h3><?php echo !empty($total_clusters)?$total_clusters:'0';?></h3>

				  <p>Total Clusters</p>
				</div>
				<div class="icon">
				  <i class="ion ion-person-add"></i>
				</div>
				<a href="<?php echo base_url('dashboard_cor/cluster'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
			  </div>
			</div> -->
			<!-- ./col -->
			<div class="col-lg-4 col-6">
			  <!-- small box -->
			  <div class="small-box bg-red" style="color: white!important;">
				<div class="inner">
				  <h3><?php echo !empty($total_centers)?$total_centers:'0';?></h3>

				  <p>Total <?php echo display("center"); ?></p>
				</div>
				<div class="icon">
				  <i class="ion ion-stats-bars"></i>
				</div>
				<a href="<?php echo base_url('dashboard_cor/center'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
			  </div>
			</div>
			<!-- ./col -->
			<div class="col-lg-4 col-6">
			  <!-- small box -->
			  <div class="small-box bg-yellow">
				<div class="inner">
				  <h3><?php echo !empty($total_animators)?$total_animators:'0';?></h3>

				  <p>Total Animators</p>
				</div>
				<div class="icon">
				  <i class="ion ion-chatbubbles"></i>
				</div>
				<a href="<?php echo base_url('dashboard_cor/user/members'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
			  </div>
			</div>
			<div class="col-lg-4 col-6">
			  <!-- small box -->
			  <div class="small-box bg-blue">
				<div class="inner">
				  <h3><?php echo !empty($total_students)?$total_students:'0';?></h3>

				  <p>Total <?php echo display("student"); ?></p>
				</div>
				<div class="icon">
				  <i class="ion ion-chatbubbles"></i>
				</div>
				<a href="<?php echo base_url('dashboard_cor/user/index'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
			  </div>
			</div>
			<!-- ./col -->
			<div class="col-lg-4 col-6">
			  <!-- small box -->
			  <div class="small-box bg-green">
				<div class="inner">
				  <h3><?php echo !empty($new_messages)?$new_messages:'0';?></h3>

				  <p>New Messages</p>
				</div>
				<div class="icon">
				  <i class="ion ion-chatboxes"></i>
				</div>
				<a href="<?php echo base_url('dashboard_cor/message'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
			  </div>
			</div>
			<!-- ./col -->
		  </div>
		  <!-- ./OVERALL JK -->