<?php $this->load->view('templates/header'); ?>
<div class="container">
<h3><?= $title ?></h3>

<?php foreach($posts as $post) : ?>
	

	<h3><?php echo $post['title']; ?></h3>
    <div class="row mb-3">
		<div class="col-md-3">
			<img class="post-thumb" src="<?php echo site_url(); ?>assets/images/posts/<?php echo $post['post_image']; ?>" style="width:80%;">
		</div>
		<div class="col-md-9">
		<?php echo word_limiter($post['body'],60) ?>
		<br><br>
		<p><a class="btn btn-primary" href="<?php echo site_url('/posts/'.$post['slug']); ?>">Read More</a></p>
		</div>
	</div>
    <?php endforeach;?>
</div>
<?php $this->load->view('templates/footer'); ?>

