  
  <div class="form-box" id="login-box">
             
            <div class="header">Register New Membership</div>
            <form action="<?php echo base_url(); ?>index.php/Home/registration" method="post">
                <div class="body bg-gray">
                  <div class="row">  <?php echo $this->session->flashdata('msg'); ?></div>
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Full name" value="<?php echo set_value('name'); ?>"/>
                         <span class="text-danger"><?php echo form_error('name'); ?></span>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Email ID" value="<?php echo set_value('email'); ?>"/>
                          <span class="text-danger"><?php echo form_error('email'); ?></span>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo set_value('password'); ?>"/>
                          <span class="text-danger"><?php echo form_error('password'); ?></span>
                    </div>
                    <div class="form-group">
                        <input type="password" name="confirm_password" class="form-control" placeholder="confirm password" value="<?php echo set_value('confirm_password'); ?>"/>
                        <span class="text-danger"><?php echo form_error('confirm_password'); ?></span>
                    </div>
                     <div class="form-group">
                        <input type="text" name="mobile_number" class="form-control" placeholder="Mobile number" value="<?php echo set_value('mobile_number'); ?>"/>
                          <span class="text-danger"><?php echo form_error('mobile_number'); ?></span>  
                    </div>
                </div>
                <div class="footer">                    

                    <button type="submit" class="btn bg-olive btn-block">Sign me up</button>

                    <a href="<?php echo base_url(); ?>Home/index" class="text-center">I already have a membership</a>
                </div>
            </form>

           <!--  <div class="margin text-center">
                <span>Register using social networks</span>
                <br/>
                <button class="btn bg-light-blue btn-circle"><i class="fa fa-facebook"></i></button>
                <button class="btn bg-aqua btn-circle"><i class="fa fa-twitter"></i></button>
                <button class="btn bg-red btn-circle"><i class="fa fa-google-plus"></i></button>

            </div> -->
        </div>

