<?php get_header(); ?>

<!-- Begin billboard -->
<?php if (get_field('billboard_image')): ?>
	<div class="billboard">
		<div class="billboard-slideshow-slide" style="background-image: url(<?php echo esc_url(get_field('billboard_image')['url']); ?>); display: block;">
			<i class="fa fa-chevron-left" aria-hidden="true"></i>
			<?php if (get_field('billboard_link')): ?>
				<a href="<?php echo esc_url(get_field('billboard_link')['url']); ?>" target="<?php get_field('billboard_link')['target'] ? get_field('billboard_link')['target'] : '_self'; ?>" title="<?php echo esc_html(get_field('billboard_link')['title']); ?>">
			<?php endif; ?>
				<div class="slide-text-wrapper">
					<div class="slide-text">
					<div class="header-subhead">
						<h2>
							<?php if (get_field('billboard_text')): ?>
								<?php the_field('billboard_text'); ?>	
							<?php else: ?>
								<?php wp_title(''); ?>
							<?php endif; ?>
						</h2>
					</div>
					</div>
				</div>
			<?php if (get_field('billboard_link')): ?></a><?php endif; ?>
			<i class="fa fa-chevron-right" aria-hidden="true"></i>
		</div>
	</div>
<?php endif; ?>
<!-- End billboard -->

<!-- Begin billboard/slideshow -->
<?php if (get_field('billboard_slideshow')): ?>Test
	<?php while (have_rows('billboard_slideshow')): the_row(); ?>
		<div class="billboard">
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
		</div>
	<?php endwhile; ?>
<?php endif; ?>
<!-- End billboard/slideshow -->

<!-- Begin page content -->
<?php if (have_posts()): while (have_posts()): the_post(); ?>
	<section id="skipTo">
		<?php $fullWidth = get_field('full_width_page'); if (!$fullWidth): ?>
			<div class="page-content text-wrapper">
		<?php endif; ?>
			<?php the_content(); ?>
		<?php $fullWidth = get_field('full_width_page'); if (!$fullWidth): ?>
			</div>
		<?php endif; ?>
	</section>
<?php endwhile; endif; ?>
<!-- End page content -->

<!-- Begin three column linked content -->
<?php if (get_field('three_column_grid_item')): ?>
	<section>
		<div class="three-column-grid page-content">
			<?php while (have_rows('three_column_grid_item')): the_row(); ?>
				<div class="three-column-grid-item">
					<img src="<?php echo esc_url(get_sub_field('three_column_grid_item_image')['url']); ?>" alt="<?php echo get_sub_field('three_column_grid_item_image')['alt']; ?>" width="<?php the_sub_field('three_column_grid_item_image_width'); ?>">
					<div class="item-title"><?php the_sub_field('three_column_grid_item_name'); ?></div>
					<p><?php the_sub_field('three_column_grid_item_description'); ?></p>
					<?php if (get_sub_field('three_column_grid_item_link')): ?>
						<a href="<?php echo esc_url(get_sub_field('three_column_grid_item_link')['url']); ?>" target="<?php get_sub_field('three_column_grid_item_link')['target'] ? get_sub_field('three_column_grid_item_link')['target'] : '_self'; ?>" title="<?php echo esc_html(get_sub_field('three_column_grid_item_link')['title']); ?>" class="button">
							<?php echo esc_html(get_sub_field('three_column_grid_item_link')['title']); ?>
						</a>
					<?php endif; ?>
				</div>
			<?php endwhile; ?>
		</div>
	</section>
<?php endif; ?>
<!-- End three column linked content -->

<?php get_footer(); ?>