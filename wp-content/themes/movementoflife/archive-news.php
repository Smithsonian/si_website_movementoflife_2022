<?php 
/**
* Template Name: News
**/
?>

<?php get_header(); ?>

<!-- Begin billboard -->
<?php if (get_field('billboard_image', 268)): ?>
	<div class="billboard">
		<div class="billboard-slideshow-slide" style="background-image: url(<?php echo esc_url(get_field('billboard_image',  268)['url']); ?>); display: block;">
			<i class="fa fa-chevron-left" aria-hidden="true"></i>
			<?php if (get_field('billboard_link')): ?>
				<a href="<?php echo esc_url(get_field('billboard_link', 268)['url']); ?>" target="<?php get_field('billboard_link', 268)['target'] ? get_field('billboard_link', 268)['target'] : '_self'; ?>" title="<?php echo esc_html(get_field('billboard_link', 268)['title']); ?>">
			<?php endif; ?>
					<?php if (get_field('billboard_text', 268)): ?>
						<div class="slide-text-wrapper">
							<div class="slide-text">
								<div class="header-subhead">
									<h2><?php the_field('billboard_text', 268); ?></h2>
								</div>
							</div>
						</div>
					<?php endif; ?>
			<?php if (get_field('billboard_link')): ?>
				</a>
			<?php endif; ?>
			<i class="fa fa-chevron-right" aria-hidden="true"></i>
		</div>
	</div>
<?php endif; ?>
<!-- End billboard -->

<!-- Begin news -->
<div class="news-wrapper">
    <div class="main-content">
      	<h3><?php wp_title(''); ?></h3>

		<?php
			$loop = new WP_Query(
				array(
					'post_type' => 'news'
				)
			);
			while ( $loop->have_posts() ) : $loop->the_post(); ?>

			<div class="blog-post">
				<a href="<?php echo esc_url(get_field('news_link')['url']); ?>" target="<?php get_field('news_link')['target'] ? get_field('news_link')['target'] : '_self'; ?>" title="<?php echo esc_html(get_field('news_link')['title']); ?>">
					<?php the_post_thumbnail(); ?>
				</a>

				<div class="text">
					<a href="<?php echo esc_url(get_field('news_link')['url']); ?>" target="<?php get_field('news_link')['target'] ? get_field('news_link')['target'] : '_self'; ?>" title="<?php echo esc_html(get_field('news_link')['title']); ?>"><?php the_title(''); ?></a>
				</div>

				<div class="news-category"><?php the_field('news_category'); ?></div>
			</div>
		<?php endwhile; wp_reset_postdata(); ?>					
    </div>

    <div class="sidebar-content">
  		<h4>Categories</h4>
  
		<ul>
			<li id="AvianFilter" class="news-filter">Avian <span id="avianCount"></span></li>
			<li id="MarineFilter" class="news-filter">Marine <span id="marineCount"></span></li>
			<li id="TerrestrialFilter" class="news-filter">Terrestrial <span id="terrestrialCount"></span></li>
		</ul>
    </div>
</div>
<!-- End news -->

<?php get_footer(); ?>