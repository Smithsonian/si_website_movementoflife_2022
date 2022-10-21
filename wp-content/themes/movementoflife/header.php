<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<!-- Begin Comscore -->
    <script type="text/javascript">
		var _comscore = _comscore || [];
		_comscore.push({ c1: "2", c2: "7741285", c3:"", c4:"movementoflife.si.edu", c5:"", c6:"", c15:"" });
		(function() {
			var s = document.createElement("script"), el = document.getElementsByTagName("script")[0]; s.async = true;
			s.src = (document.location.protocol == "https:" ? "https://sb" : "http://b") + ".scorecardresearch.com/beacon.js";
			el.parentNode.insertBefore(s, el);
		})();
	</script>
	<!-- End Comscore -->

	<!-- Begin Hotjar Tracking Code for https://movementoflife.si.edu/ -->
	<script>
		(function(h,o,t,j,a,r){
			h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
			h._hjSettings={hjid:1895016,hjsv:6};
			a=o.getElementsByTagName('head')[0];
			r=o.createElement('script');r.async=1;
			r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
			a.appendChild(r);
		})(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
	</script>
	<!-- End Hotjar Tracking Code -->

	<!-- BEGIN Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-67330603-11"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-67330603-11');
	</script>
	<!-- END Google Analytics -->

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