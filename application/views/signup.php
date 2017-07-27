<div class="container">
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <?php echo $this->session->flashdata('msg'); ?>
    </div>
</div>
  <h2>Sign Up </h2>
  <form action="signup" method="post">
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="name" class="form-control" id="name" placeholder="Enter name" name="name" value="<?php echo set_value('name'); ?>">
       <span class="text-danger"><?php echo form_error('name'); ?></span>
    </div>   
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="<?php echo set_value('email'); ?>">
       <span class="text-danger"><?php echo form_error('email'); ?></span>
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" value="<?php echo set_value('password'); ?>">
      <span class="text-danger"><?php echo form_error('password'); ?></span>
    </div>
    <div class="form-group">
      <label for="confirm_password">Confirm Password:</label>
      <input type="password" class="form-control" id="confirm_password" placeholder="Enter confirm  password" name="confirm_password" value="<?php echo set_value('confirm_password'); ?>">
       <span class="text-danger"><?php echo form_error('confirm_password'); ?></span>
    </div>
    <div class="form-group">
      <label for="mobile_number">Mobile Number:</label>
      <input type="text" class="form-control" id="mobile_number" placeholder="Enter mobile number" name="mobile_number" value="<?php echo set_value('mobile_number'); ?>">
      <span class="text-danger"><?php echo form_error('mobile_number'); ?></span>
    </div>
     

    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>

