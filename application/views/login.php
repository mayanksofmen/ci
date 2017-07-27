 <div class="form-box" id="login-box">
            <div class="header">Log In</div>
            <form action="<?php echo base_url(); ?>index.php/Home/index" method="post">
                <div class="body bg-gray">
                <div class="row">  <?php echo $this->session->flashdata('msg'); ?></div>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo set_value('email'); ?>"/>
                        <span class="text-danger"><?php echo form_error('email'); ?></span>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo set_value('password'); ?>"/>
                         <span class="text-danger"><?php echo form_error('password'); ?></span>
                    </div>          
                   <!--  <div class="form-group">
                        <input type="checkbox" name="remember_me"/> Remember me
                    </div> -->
                </div>
                <div class="footer">                                                               
                    <button type="submit" class="btn bg-olive btn-block">Log in</button>  
                    
                    <!-- <p><a href="#">I forgot my password</a></p> -->
                    
                    <a href="<?php echo base_url(); ?>index.php/Home/registration" class="text-center">Register a new membership</a>
                </div>
            </form>

           <!--  <div class="margin text-center">
                <span>Sign in using social networks</span>
                <br/>
                <button class="btn bg-light-blue btn-circle"><i class="fa fa-facebook"></i></button>
                <button class="btn bg-aqua btn-circle"><i class="fa fa-twitter"></i></button>
                <button class="btn bg-red btn-circle"><i class="fa fa-google-plus"></i></button>

            </div> -->
        </div>