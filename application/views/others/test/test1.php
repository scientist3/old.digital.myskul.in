<?php 

//$db_list='';
echo "<pre>";
//print_r($db_list);
print_r($db_l_w_t);
//print_r($tbl_list);
//print_r($curr_db);
echo "</pre>";
?>
<div class="row">
	<div class="col-md-3">
      	<div class="box">
	        <div class="box-header with-border">
	          	<h3 class="box-title">All Databases</h3>
	        </div>
            <!-- /.box-header -->
            <div class="box-body">
              	<table class="datatable table table-bordered">
                	<tbody>
                		<tr>
	                		<th style="width: 10px">#</th>
	                		<th>Database Name</th>
	                	</tr>
	                	<?php foreach ($db_list as $key => $value) { ?>
						<tr>
							<td><?php echo $key+1 ?>.</td>
							<td><?php echo $value ?></td>
						</tr>
						<?php } ?>
              		</tbody>
              	</table>
            </div>
            
            <!-- /.box-body -->
            <div class="box-footer clearfix">
				<ul class="pagination pagination-sm no-margin pull-right">
					<li><a href="#">«</a></li>
					<li><a href="#">1</a></li>
					<li><a href="#">2</a></li>
					<li><a href="#">3</a></li>
					<li><a href="#">»</a></li>
				</ul>
            </div>
      	</div>
      	<!-- /.box -->
	</div>
	<div class="col-md-9">
      	<div class="box">
	        <div class="box-header with-border">
	          	<h3 class="box-title">Tables </h3>
	        </div>
            <!-- /.box-header -->
            <div class="box-body">
              	<table class="datatable table table-bordered">
                	<tbody>
                		<tr>
	                		<th width="10%">Table</th>
	                		<th width="10%">Field</th>
	                		<!--<th width="10%" >F Name</th>-->
	                		<th width="10%" >F Type</th>
	                		<th width="10%" >F Max_Len</th>
	                		<th width="10%" >F Default</th>
	                		<th width="10%" >F PK</th>
	                	</tr>
	                	<?php foreach ($tbl_list as $key => $value) { ?>
	                		<?php foreach ($value as $ki => $vi) { ?>
								<?php foreach ($vi as $k => $v) { ?>
									<?php if($ki===0 /*or $v->name==='enquiry_id'*/){ continue;}?>	                		
									<tr>
										<td><?php print_r($key)?></td>
										<td><?php print_r($ki) ?></td>
										<td><?php echo $v->name;//echo '<pre>';print_r($v);echo '</pre>'; ?></td>
										<td><?php echo $v->type ?></td>
										<td><?php echo $v->max_length ?></td>
										<td><?php echo $v->default ?></td>
										<td><?php echo ($v->primary_key)?'Yes':'No'; ?></td>
									</tr>
								<?php } ?>
							<?php } ?>
						<?php } ?>
              		</tbody>
              	</table>
            </div>
            
            <!-- /.box-body -->
            <div class="box-footer clearfix">
				<ul class="pagination pagination-sm no-margin pull-right">
					<li><a href="#">«</a></li>
					<li><a href="#">1</a></li>
					<li><a href="#">2</a></li>
					<li><a href="#">3</a></li>
					<li><a href="#">»</a></li>
				</ul>
            </div>
      	</div>
      	<!-- /.box -->
	</div>
</div>	