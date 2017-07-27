<div class="container">
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <?php echo $this->session->flashdata('msg'); ?>
    </div>
</div>
  <h2>Sign in </h2>
  <form action="" method="post">
    
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
    
     <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>

