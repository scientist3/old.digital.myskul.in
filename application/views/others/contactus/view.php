	<div class="row">
		<div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <a href="<?php echo base_url("contactus") ?>" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="" data-original-title="Back">
                    <i class="fa fa-reply"></i></a>
			  <h3 class="box-title"><span class="labell llabel-success"><?php  echo ucfirst($message->f_name); ?></span></h3>

              <!--<div class="box-tools pull-right">
                <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="" data-original-title="Previous"><i class="fa fa-chevron-left"></i></a>
                <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="" data-original-title="Next"><i class="fa fa-chevron-right"></i></a>
              </div>-->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="mailbox-read-info">
                <h3><?php echo $message->f_subject; ?></h3>
                <h5>From: <?php echo $message->f_email; ?>
                  <span class="mailbox-read-time pull-right"><?php echo date('d M Y h:i A',strtotime($message->f_date));?></span></h5>
              </div>
              <!-- /.mailbox-read-info - - >
              <div class="mailbox-controls with-border text-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="" data-original-title="Delete">
                    <i class="fa fa-trash-o"></i></button>
                  <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="" data-original-title="Reply">
                    <i class="fa fa-reply"></i></button>
                  <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="" data-original-title="Forward">
                    <i class="fa fa-share"></i></button>
                </div>
                <!-- /.btn-group - ->
                <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" title="" data-original-title="Print">
                  <i class="fa fa-print"></i></button>
              </div>
              <!-- /.mailbox-controls -->
              <div class="mailbox-read-message">
                <p><?php echo $message->f_message; ?></p>
              </div>
              <!-- /.mailbox-read-message -->
            </div>
            <!-- /.box-body -->
            <!-- /.box-footer -->
            <div class="box-footer">
              <!--<div class="pull-right">
                <button type="button" class="btn btn-default"><i class="fa fa-reply"></i> Reply</button>
                <button type="button" class="btn btn-default"><i class="fa fa-share"></i> Forward</button>
              </div>-->
              <a href="<?php echo base_url("contactus/delete/$message->f_id") ?>" class="btn btn-danger pull-right" onclick="return confirm('<?php echo display('are_you_sure') ?>')"><i class="fa fa-trash-o"></i></a> 
              <!--<button type="button" class="btn btn-default"><i class="fa fa-print"></i> Print</button>-->
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /. box -->
        </div>
	</div>