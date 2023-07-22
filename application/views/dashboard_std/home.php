		  <div class="row">
			<div class="col-lg-4 col-6">
			  <!-- small box -->
			  <div class="small-box bg-aqua" style="color: white!important;">
				<div class="inner">
				  <h3><?php echo !empty($new_docs)?$new_docs:'0';?></h3>

				  <p>New Documents</p>
				</div>
				<div class="icon">
				  <i class="ion ion-person-add"></i>
				</div>
				<a href="<?php echo base_url('dashboard_std/material/index'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
			  </div>
			</div>
			<!-- ./col -->
			<div class="col-lg-4 col-6">
			  <!-- small box -->
			  <div class="small-box bg-red" style="color: white!important;">
				<div class="inner">
				  <h3><?php echo !empty($new_videos)?$new_videos:'0';?></h3>

				  <p>New Video</p>
				</div>
				<div class="icon">
				  <i class="ion ion-stats-bars"></i>
				</div>
				<a href="<?php echo base_url('dashboard_std/material/index'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
			  </div>
			</div>
			<!-- ./col -->
			<div class="col-lg-4 col-6">
			  <!-- small box -->
			  <div class="small-box bg-yellow">
				<div class="inner">
				  <h3><?php echo !empty($new_messages)?$new_messages:'0';?></h3>

				  <p>Notification / Message</p>
				</div>
				<div class="icon">
				  <i class="ion ion-chatbubbles"></i>
				</div>
				<a href="<?php echo base_url('dashboard_std/message/'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
			  </div>
			</div>
			<!-- ./col --><!-- 
			<div class="col-lg-3 col-6">
			  < !-- small box - - >
			  <div class="small-box bg-green">
				<div class="inner">
				  <h3><?php echo !empty($new_messages)?$new_messages:'0';?></h3>

				  <p>New Messages</p>
				</div>
				<div class="icon">
				  <i class="ion ion-chatboxes"></i>
				</div>
				<a href="<?php echo base_url('contactus'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
			  </div>
			</div> -->
			<!-- ./col -->
		  </div>
		  <!-- ./OVERALL JK -->
