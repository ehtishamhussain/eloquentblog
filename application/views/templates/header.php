<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
    <script src="http://cdn.ckeditor.com/4.5.11/standard/ckeditor.js"></script>

    <title>Ciblog</title>
  </head>
  <body>
    
  <nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">
  <a class="navbar-brand" href="<?php echo base_url()?>home">Logo</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url(); ?>home">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url();?>about">About</a>
      </li>
      <?php if($this->session->userdata('logged_in')):?>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url()?>posts">Blog</a>
      </li>
      <?php endif;?>
      <?php if(!$this->session->userdata('logged_in')):?>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url()?>users/register">Register </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url()?>users/login">Login </a>
      </li>
      <?php endif; ?>
</ul>
<?php if($this->session->userdata('logged_in')):?>
<ul class="nav navbar-nav navbar-right">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url()?>posts/create">Create </a>
      </li>
     
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url()?>users/logout">Logout </a>
      </li>
      
      
    </ul>
    <?php endif; ?>
  </div>
</nav>
<?php if($this->session->flashdata('Login_success')): ?>
  <?php echo '<p class="alert alert-success">'.$this->session->flashdata('Login_success').'</p>'; ?>

  <?php endif; ?>