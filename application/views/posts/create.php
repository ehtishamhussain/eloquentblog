<?php $this->load->view('templates/header');?>
<div class="container">
<?php echo validation_errors(); ?>
<?php echo form_open_multipart('posts/create')?>
  <div class="form-group">
    <label for="exampleInputEmail1">Title</label>
    <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter title">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Body</label>
    <input type="text" name="body" class="form-control" id="exampleInputPassword1" placeholder="Body">
  </div>
  <div class="form-group">
  <label for="uploadImage">Upload Image</label>
  <input type="file" class="form-control" id="uploadImage" name="userfile">
</div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
<?php $this->load->view('templates/footer');?>
