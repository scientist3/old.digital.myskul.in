		  <div class="row">
			<div class="col-lg-4 col-6">
			  <!-- small box -->
			  <div class="small-box bg-aqua" style="color: white!important;">
				<div class="inner">
				  <h3><?php echo !empty($total_stds)?$total_stds:'0';?></h3>

				  <p>Total <?php echo display("student"); ?></p>
				</div>
				<div class="icon">
				  <i class="ion ion-person-add"></i>
				</div>
				<a href="<?php echo base_url('dashboard_ani/user'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
			  </div>
			</div>
			<!-- ./col -->
			<div class="col-lg-4 col-6">
			  <!-- small box -->
			  <div class="small-box bg-red" style="color: white!important;">
				<div class="inner">
				  <h3><?php echo !empty($new_messages)?$new_messages:'0';?></h3>

				  <p>New Messages</p>
				</div>
				<div class="icon">
				  <i class="ion ion-stats-bars"></i>
				</div>
				<a href="<?php echo base_url('dashboard_ani/message'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
			  </div>
			</div>
			<!-- ./col -->
			
			<div class="col-lg-4 col-6">
			  <!-- small box -->
			  <div class="small-box bg-yellow">
				<div class="inner">
				  <h3><?php echo !empty($total_center_alloted)?$total_center_alloted:'0';?></h3>

				  <p><?php echo display("center"); ?> alloted</p>
				</div>
				<div class="icon">
				  <i class="ion ion-chatbubbles"></i>
				</div>
				<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
			  </div>
			</div>
			<!-- ./col -->
			<?php /*<div class="col-lg-3 col-6">
			  <!-- small box -->
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
			</div>
			<!-- ./col -->
			*/ ?>
		  </div>
		  <!-- ./OVERALL JK -->