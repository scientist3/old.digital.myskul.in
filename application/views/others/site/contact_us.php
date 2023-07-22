    
    <!--  ************************* Page Title Starts Here ************************** -->
               <div class="page-nav no-margin row">
                   <div class="container">
                       <div class="row">
                           <h2>Contact Us</h2>
                           <ul>
                               <li> <a href="#"><i class="fas fa-home"></i> Home</a></li>
                               <li><i class="fas fa-angle-double-right"></i> Contact Us</li>
                           </ul>
                       </div>
                   </div>
               </div>
       
    <!-- ######## Page  Title End ####### -->
    
      <div style="margin-top:0px;" class="row no-margin">
        
        <iframe style="width:100%" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d249759.19784092825!2d79.10145254589841!3d12.009924873581818!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1448883859107"  height="450" frameborder="0" style="border:0" allowfullscreen></iframe>


      </div>

      <div class="row contact-rooo no-margin">
        <div class="container">
           <div class="row">
            <div style="padding:20px" class="col-sm-6">
              <h2 style="font-size:18px">Contact Form</h2>
                <!-- alert message -->
                <?php if ($this->session->flashdata('message') != null) {  ?>
                <div class="alert alert-info alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <?php echo $this->session->flashdata('message'); ?>
                </div> 
                <?php } ?>
                
                <?php if ($this->session->flashdata('exception') != null) {  ?>
                <div class="alert alert-danger alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <?php echo $this->session->flashdata('exception'); ?>
                </div>
                <?php } ?>
                
                <?php if (0 && validation_errors()) {  ?>
                <div class="alert alert-danger alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <?php //echo validation_errors(); ?>
                </div>
                <?php } ?>
              
                <?php echo form_open('contact_us','id="loginForm"'); ?>
                <div class="row">
                    <div style="padding-top:10px;" class="col-sm-3"><label>Enter Name :</label></div>
                    <div class="col-sm-8">
                      <input type="text" placeholder="Enter Name" name="f_name" class="form-control input-sm" required value="<?php echo $feedback->f_name; ?>">
                      <?php echo form_error('f_name', '<div class="alert alert-danger">', '</div>'); ?>
                    </div>
                </div>
                <div style="margin-top:10px;" class="row">
                    <div style="padding-top:10px;" class="col-sm-3"><label>Email Address :</label></div>
                    <div class="col-sm-8">
                      <input type="email" name="f_email" placeholder="Enter Email Address" class="form-control input-sm" required value="<?php echo $feedback->f_email; ?>">
                      <?php echo form_error('f_email', '<div class="alert alert-danger">', '</div>'); ?>
                    </div>
                </div>
                 <div style="margin-top:10px;" class="row">
                    <div style="padding-top:10px;" class="col-sm-3"><label>Mobile Number:</label></div>
                    <div class="col-sm-8">
                      <input type="text" name="f_phone" placeholder="Enter Mobile Number" class="form-control input-sm" required value="<?php echo $feedback->f_phone; ?>">
                      <?php echo form_error('f_phone', '<div class="alert alert-danger">', '</div>'); ?>
                    </div>
                </div>
				<div class="row">
                    <div style="padding-top:10px;" class="col-sm-3"><label>Enter Subject :</label></div>
                    <div class="col-sm-8">
                      <input type="text" placeholder="Enter Subject" name="f_subject" class="form-control input-sm" required value="<?php echo $feedback->f_subject; ?>">
                      <?php echo form_error('f_subject', '<div class="alert alert-danger">', '</div>'); ?>
                    </div>
                </div>
                <div style="margin-top:10px;" class="row">
                    <div style="padding-top:10px;" class="col-sm-3"><label>Enter  Message:</label></div>
                    <div class="col-sm-8">
                      <textarea rows="5" name="f_message" placeholder="Enter Your Message" class="form-control input-sm" required><?php echo $feedback->f_message; ?></textarea>
                      <?php echo form_error('f_message', '<div class="alert alert-danger">', '</div>'); ?>
                    </div>
                </div>
                 <div style="margin-top:10px;" class="row">
                    <div style="padding-top:10px;" class="col-sm-3"><label></label></div>
                    <div class="col-sm-8">
                     <button class="btn btn-danger btn-sm">Send Message</button>
                    </div>
                </div>
              </form>
            </div>
            <div class="col-sm-6">
              <div style="margin:50px" class="serv"> 
                
              <h2 style="margin-top:10px;">Address</h2>
                <?php echo $title; ?> <br>
                <?php echo $description; ?>
                Phone: <?php  echo $phone; ?> <br>
                Email: <a href="mailto:<?php  echo $email; ?>" class=""><?php  echo $email; ?></a><br>
                Web: <a target="_BLANK"href="http://www.valleydiagnosticentre.com" class="">www.valleydiagnosticentre.com</a>
              </div>    
                
             
            </div>
            </div>
        </div>
        
      </div>
