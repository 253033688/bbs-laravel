<?php include(PUBLIC_PATH . "template/install/header.htm"); ?>

<section class="section">
	<div class="">
		<div class="success_tip cc">
			<a href="{{ $notice['url'] }}" class="f16 b">点击进入</a>
			<p><?php echo $notice['info'];?></p>
		</div>
		<div class=""> </div>
	</div>
</section>
<?php include(PUBLIC_PATH . "template/install/footer.htm"); ?>