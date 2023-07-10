<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<!-- Google tag (gtag.js) -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-KFKGFW5REQ"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'G-KFKGFW5REQ');
	</script>

	<?php wp_head(); ?>
</head>

<?php 
	global $post; 
	$post_slug = $post->post_name;
?>
<body class="<?php echo($post_slug); ?>">

	<!-- Begin Skip Links-->
    <nav id="skipLinks" class="visuallyhidden">
      <h2>Accessibility Navigation</h2>
      <ul>
        <li><a href="#skipTo">Skip to Content</a></li>
        <li><a href="#navContainer">Skip to Navigation</a></li>
      </ul>
    </nav>
    <!-- End Skip Links-->

	<div class="header">
      	<nav class="partner-nav">
			<div class="partner-nav-wrapper">
				<a href="https://conservationcommons.si.edu/" alt="Smithsonian Conservation Commons logo" id="smithsonian-logo" target="_blank">
					<img src="/wp-content/uploads/smithsonian-logo-white.png" alt="Smithsonian Conservation Commons logo">
				</a>
				<a id="donateButton" class="button" href="https://support.si.edu/site/Donation2?df_id=20505&20505.donation=form1&autologin=true&s_subsrc=header_nav">Donate</a>
			</div>
		</nav>

		<div class="header-wrapper">
			<i class="fa fa-bars"></i>
			<i class="fa fa-times" aria-hidden="true"></i>
			<div class="site-logo">
				<a href="/" class="logo-image"><img src="/wp-content/uploads/MovementofLife_HeaderLogo.svg" alt="Movement of Life logo" width="100"></a>
			</div>

			<div id="navContainer" class="sub-header">
				<?php wp_nav_menu(array('theme_location' => 'main-menu')); ?>
			</div>

			<div class="social-media">
				<a href="mailto:movementoflife@si.edu" target="_blank" aria-label="Email the Movement of Life team"><i class="fa fa-envelope" aria-hidden="true" style="margin-top: 2px; font-size: 1.1rem; vertical-align: top;"></i><span class="visuallyhidden">Movement of Life Email link</span></a>
				<a href="https://twitter.com/SmithsonianMoL" target="_blank" aria-label="Visit Movement of Life on Twitter"><i class="fa fa-twitter" aria-hidden="true"></i><span class="visuallyhidden">Movement of Life Twitter link</span></a>
				<a href="https://www.youtube.com/channel/UCDd12UJPzp0sHIspkH_LkfA" target="_blank" aria-label="Visit Movement of Life on YouTube"><i class="fa fa-youtube-play" aria-hidden="true"></i><span class="visuallyhidden">Movement of Life YouTube link</span></a>
			</div>
      	</div>
    </div>

	<a name="main" href="javascript:;" id="main-content" aria-label="CONTENT"><span class="outofsight">CONTENT</span></a>