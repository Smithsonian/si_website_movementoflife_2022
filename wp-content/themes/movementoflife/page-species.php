<?php 
/**
* Template Name: All Species Page
**/
?>

<?php get_header(); ?>

<!-- Begin billboard -->
<?php if (get_field('billboard_image')): ?>
	<div class="billboard">
		<div class="billboard-slideshow-slide" style="background-image: url(<?php echo esc_url(get_field('billboard_image')['url']); ?>); display: block;">
			<i class="fa fa-chevron-left" aria-hidden="true"></i>
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
			<i class="fa fa-chevron-right" aria-hidden="true"></i>
		</div>
	</div>
<?php endif; ?>
<!-- End billboard -->

<!-- Begin page links -->
<section id="skipTo">
	<div class="text-wrapper species-wrapper">
		<a class="species" href="#Terrestrial">
			<img src="https://static-media.secure.si.edu/sites/movementoflife/img/elephant.svg" alt="Elephant">
			<p>Terrestrial</p>
		</a>
		<a class="species" href="#Avian">
			<img src="https://static-media.secure.si.edu/sites/movementoflife/img/bird.svg" alt="bird">
			<p>Avian</p>
		</a>
		<a class="species" href="#Marine">
			<img src="https://static-media.secure.si.edu/sites/movementoflife/img/shark.svg" alt="Shark">	
			<p>Marine</p>
		</a>
	</div>
</section>
<!-- End page links -->

<!-- Begin species sections -->
<section id="Terrestrial">
 	<div class="text-wrapper species-list">
      	<img src="https://static-media.secure.si.edu/sites/movementoflife/img/elephant.svg" alt="elephant icon">
		<h3>Terrestrial</h3>

		<?php
			$loop = new WP_Query(
				array(
					'post_type' => 'species',
					'order' => 'ASC',
					'posts_per_page' => -1
				)
			);
			while ($loop->have_posts()) : $loop->the_post(); ?>
			
      		<?php if (get_field('species_type') == 'Terrestrial'): ?>
        		<a href="<?php the_permalink(); ?>" class="animal">
					<div class="animal-image" style="background-image: url('<?php echo esc_url(get_field('species_thumbnail_image')['url']); ?>');"></div>
					<p><?php the_title(); ?></p>
				</a>
      		<?php endif; ?>
		<?php endwhile; wp_reset_postdata(); ?>
	</div>
</section>

<section id="Avian">
    <div class="text-wrapper species-list">
        <img src="https://static-media.secure.si.edu/sites/movementoflife/img/bird.svg" alt="bird icon">
		<h3>Avian</h3>

		<?php
			$loop = new WP_Query(
				array(
					'post_type' => 'species',
					'order' => 'ASC',
					'posts_per_page' => -1
				)
			);
			while ( $loop->have_posts() ) : $loop->the_post(); ?>
			
      		<?php if (get_field('species_type') == 'Avian'): ?>
        		<a href="<?php the_permalink(); ?>" class="animal">
					<div class="animal-image" style="background-image: url('<?php echo esc_url(get_field('species_thumbnail_image')['url']); ?>');"></div>
					<p><?php the_title(); ?></p>
				</a>
      		<?php endif; ?>
		<?php endwhile; wp_reset_postdata(); ?>
	</div>
</section>

<section id="Marine">
    <div class="text-wrapper species-list">
        <img src="https://static-media.secure.si.edu/sites/movementoflife/img/shark.svg" alt="shark icon">
		<h3>Marine</h3>

		<?php
			$loop = new WP_Query(
				array(
					'post_type' => 'species',
					'order' => 'ASC',
					'posts_per_page' => -1
				)
			);
			while ( $loop->have_posts() ) : $loop->the_post(); ?>
			
      		<?php if (get_field('species_type') == 'Marine'): ?>
        		<a href="<?php the_permalink(); ?>" class="animal">
					<div class="animal-image" style="background-image: url('<?php echo esc_url(get_field('species_thumbnail_image')['url']); ?>');"></div>
					<p><?php the_title(); ?></p>
				</a>
      		<?php endif; ?>
		<?php endwhile; wp_reset_postdata(); ?>
	</div>
</section>
<!-- End species sections -->

<?php get_footer(); ?>