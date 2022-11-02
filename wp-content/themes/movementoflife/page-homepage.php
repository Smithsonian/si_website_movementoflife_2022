<?php 
/**
* Template Name: Homepage
**/
?>

<?php get_header(); ?>

<!-- Begin billboard/slideshow -->
<?php if (get_field('billboard_slideshow')): ?>
	<div class="billboard">
		<?php while (have_rows('billboard_slideshow')): the_row(); ?>
			<div class="billboard-slideshow-slide" style="background-image: url(<?php echo esc_url(get_sub_field('billboard_slideshow_image')['url']); ?>); display: block;">
				<i class="fa fa-chevron-left" aria-hidden="true"></i>
				<?php if (get_sub_field('billboard_slideshow_link')): ?>
					<a href="<?php echo esc_url(get_sub_field('billboard_slideshow_link')['url']); ?>" target="<?php get_sub_field('billboard_slideshow_link')['target'] ? get_sub_field('billboard_slideshow_link')['target'] : '_self'; ?>" title="<?php echo esc_html(get_sub_field('billboard_slideshow_link')['title']); ?>">
				<?php endif; ?>
					<div class="slide-text-wrapper">
						<div class="slide-text">
						<div class="header-subhead">
							<?php if (get_sub_field('billboard_slideshow_text')): ?>
								<?php the_sub_field('billboard_slideshow_text'); ?>	
							<?php else: ?>
								<h2><?php wp_title(''); ?></h2>
							<?php endif; ?>
						</div>
						</div>
					</div>
				<?php if (get_sub_field('billboard_link')): ?></a><?php endif; ?>
				<i class="fa fa-chevron-right" aria-hidden="true"></i>
			</div>
		<?php endwhile; ?>
	</div>
<?php endif; ?>
<!-- End billboard/slideshow -->

<!-- Begin sub billboard -->
<?php if (get_field('homepage_sub_billboard')): ?>
	<div class="sub-billboard" style="grid-template-columns: repeat(<?php echo(count(get_field('homepage_sub_billboard'))); ?>, 1fr);">
		<?php while (have_rows('homepage_sub_billboard')): the_row(); ?>
			<div class="sub-billboard-grid-item" style="background-image: url(<?php echo esc_url(get_sub_field('sub_billboard_image')['url']); ?>);">
				<div class="grid-item-text">
					<div class="title"><?php the_sub_field('sub_billboard_title'); ?></div>
					<?php the_sub_field('sub_billboard_description'); ?>
				</div>
			</div>
		<?php endwhile; ?>
	</div>
<?php endif; ?>
<!-- End sub billboard -->

<!-- Begin Our Projects section -->
<?php if (get_field('homepage_species')): ?>
	<section>
		<div class="text-wrapper species-wrapper">
			<h2><?php echo get_field_object('homepage_species')['label']; ?></h2>

			<?php if (get_field('homepage_our_projects_text')): the_field('homepage_our_projects_text'); endif; ?>

			<?php while (have_rows('homepage_species')): the_row(); ?>
				<?php if (get_sub_field('homepage_species_name')): ?>
					<a href="/species/#<?php the_sub_field('homepage_species_name'); ?>" class="species">
						<?php if ('homepage_species_image'): ?>
							<img src="<?php echo esc_url(get_sub_field('homepage_species_image')['url']); ?>" alt="<?php echo get_sub_field('homepage_species_image')['alt']; ?>">
						<?php endif; ?>
						<p><?php the_sub_field('homepage_species_name'); ?></p>
					</a>
				<?php endif; ?>
			<?php endwhile; ?>

			<?php if (get_field('homepage_our_projects_button')): ?>
				<a href="<?php echo esc_url(get_field('homepage_our_projects_button')['url']); ?>" target="<?php get_field('homepage_our_projects_button')['target'] ? get_field('homepage_our_projects_button')['target'] : '_self'; ?>" title="<?php echo esc_html(get_field('homepage_our_projects_button')['title']); ?>" class="button"><?php echo esc_html(get_field('homepage_our_projects_button')['title']); ?></a>
			<?php endif; ?>
		</div>
	</section>
<?php endif; ?>
<!-- End Our Projects section -->

<!-- Begin In The News -->
<?php $count = 0; $new_items = get_field('homepage_in_the_news'); if ($new_items): ?>
	<section>
        <div class="text-wrapper">
			<h2><?php echo get_field_object('homepage_in_the_news')['label']; ?></h2>

			<div class="news-items">
				<?php foreach ($new_items as $post): setup_postdata($post); if ($count++ == 3) break; ?>
					<div class="news-item">
						<a href="<?php echo esc_url(get_field('news_link')['url']); ?>" target="<?php get_field('news_link')['target'] ? get_field('news_link')['target'] : '_self'; ?>" title="<?php echo esc_html(get_field('news_link')['title']); ?>">
							<?php the_post_thumbnail(); ?>
						</a>

						<div class="headline">
							<a href="<?php echo esc_url(get_field('news_link')['url']); ?>" target="<?php get_field('news_link')['target'] ? get_field('news_link')['target'] : '_self'; ?>" title="<?php echo esc_html(get_field('news_link')['title']); ?>"><?php the_title(''); ?></a>
						</div>
					</div>
				<?php endforeach; wp_reset_postdata(); ?>
			</div>

			<a href="/blogs/news/" class="see-more">See more stories <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
		</div>
	</section>
<?php endif; ?>

<!-- Begin extra page content -->
<?php if (have_posts()): while (have_posts()): the_post(); ?>
	<?php if (the_content()): ?>
		<div class="page-content">
			<?php the_content(); ?>
		</div>
	<?php endif; ?>
<?php endwhile; endif; ?>
<!-- End extra page content -->

<?php get_footer(); ?>