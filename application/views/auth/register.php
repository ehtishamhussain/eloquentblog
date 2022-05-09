<?php $this->load->view('templates/header')?>
<div class="container">
    <h3><?=$title ?></h3>

    <?php if($this->session->flashdata('user_registered')):?>

        <?php echo '<p class="alert alert-success">' . $this->session->flashdata('user_registered') .'</p>'; ?>
    <?php endif; ?>
    <?php echo validation_errors()?>

    <?php echo form_open('UsersController/register') ?>

    <div class="form-group">
        <label for="Name">Name</label>
        
            <input type="text" name="name" class="form-control" placeholder="Enter name">
      
    </div>
    <div class="form-group">
        <label for="username">Username</label>
       
            <input type="text" name="username"class="form-control" placeholder="Username">
        
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        
            <input type="email" name="email" class="form-control"placeholder="Enter email">
     
    </div>
    <div class="form-group">
        <label for="password">Password</label>
       
            <input type="password" name="password"class="form-control" placeholder="Password">
     
    </div>
    <div class="form-group">
        <label for="cpassword">Confirm Password</label>
        
            <input type="password" name="cpassword"class="form-control" placeholder="Confirm Password">
        
    </div>
    
    
        <button class="btn btn-primary" type="submit" >Register</button>
 

    <?php echo form_close() ?>

</div>
<?php $this->load->view('templates/footer')?>
