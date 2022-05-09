<?php $this->load->view('templates/header')?>

<?php echo form_open('Userscontroller/login') ?>
<div class="container">
    
<div class="row justify-content-center">
        <div class="col-md-4 col-md-offset-4">
        <?php if($this->session->flashdata('login_failed')) : ?>
        <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('login_failed').'</p>'?>
    <?php endif; ?>
            <h1 class="text-center"><?=$title?></h1>
            <div class="form-group">
                <input type="text" name="username" class="form-control" placeholder="Enter your username" required autofocus>
            </div>
            <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Enter your password" required autofocus>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Login</button>
        </div>
    </div>
</div>
    

<?php echo form_close(); ?>
<?php $this->load->view('templates/footer'); ?>

