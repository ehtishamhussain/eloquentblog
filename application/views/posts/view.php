<?php $this->load->view('templates/header'); ?>

<div class="container">
<h3><?php echo $post->title; ?></h3>
    <div class="row">
		<div class="col-md-3 mb-2">
			<img style="width:80%;" src="<?php echo site_url(); ?>assets/images/posts/<?php echo $post->post_image; ?>">
		</div>
		<div class="col-md-9">
		<?php echo $post->body ?>
		<br><br>
		
		</div>
	</div>
	<div class="container">
		
	<a href="<?php echo base_url()?>/posts/edit/<?php echo $post->slug ?>" class="btn btn-primary pull-left mb-2">
		Edit
	</a>
		<?php 
		$id=intval($post->id);
		
		

		echo form_open('posts/delete/'.$id)?>
		<button type="submit" class="btn btn-danger">Delete</button>
	</form>
	
	</div>
</div>
<?php $this->load->view('templates/footer'); ?>


	