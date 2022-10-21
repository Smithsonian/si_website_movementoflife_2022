<?php 
/**
* Template Name: Resources
**/
?>

<?php get_header(); ?>

<!-- Begin billboard -->
<?php if(get_field('billboard_image')): ?>
	<?php $billboardImage = get_field('billboard_image'); ?>
	<div class="hero">
		<img src="<?php echo esc_url($billboardImage['url']); ?>" alt="<?php echo $billboardImage['alt']; ?>">
		<?php the_field('billboard_text'); ?>
		<?php if (get_field('photo_credit')): ?>
			<div class="photo-credit"><?php the_field('photo_credit'); ?></div>
		<?php endif; ?>
	</div>
<?php endif; ?>
<!-- End billboard -->

<!-- Begin intro text -->
<div class="page-content">
	<?php if (have_posts()): while (have_posts()): the_post(); ?>
		<?php if (the_content()): ?>
			<?php the_content(); ?>
		<?php endif; ?>
	<?php endwhile; endif; ?>
	<hr>
</div>
<!-- End intro text -->

<!-- Begin sections -->
<section>
	<div class="image-textbox-wrapper">
		<?php if (have_rows('resources_section')): while (have_rows('resources_section')): the_row(); ?>
			<h3><?php the_sub_field('resources_section_title'); ?></h3>
			<div class="section-description"><?php the_sub_field('resources_section_description'); ?></div>

			<?php if (have_rows('resources_image_and_text_box')): while (have_rows('resources_image_and_text_box')): the_row(); ?>
				<div class="image-textbox">
					<?php $image = get_sub_field('resources_image'); ?>
					<div class="image-wrapper">
						<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo $image['alt']; ?>">
					</div>

					<div class="text-wrapper">
						<p><?php the_sub_field('resources_text'); ?></p>
						
						<?php if (get_sub_field('resources_link')): ?>
							<a href="<?php echo esc_url(get_sub_field('resources_link')['url']); ?>" target="<?php get_sub_field('resources_link')['target'] ? get_sub_field('resources_link')['target'] : '_self'; ?>" title="<?php echo esc_html(get_sub_field('resources_link')['title']); ?>">
							<?php echo esc_html(get_sub_field('resources_link')['title']); ?>
							</a>
						<?php endif; ?>
					</div>
				</div>
				
				<?php if (get_sub_field('resources_additional_text')): ?>
					<div class="additional-text">
						<?php the_sub_field('resources_additional_text'); ?>
					</div>
				<?php endif; ?>

			<?php endwhile; endif; ?>
			<hr>
		<?php endwhile; endif; ?>
	</div>
</section>
<!-- End sections -->

<?php get_footer(); ?>