<?php 
/**
* Template Name: Species Page
* Template Post Type: species
**/
?>

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

<section id="skipTo" class="species-detail-page">
	<!-- Begin intro section -->
	<div class="text-wrapper intro-section">
		<div class="species-description">
			<?php if (get_field('species_common_name')): ?>
				<div class="species-name"><?php the_field('species_common_name'); ?></div>
			<?php endif; ?>

			<?php if (get_field('species_binomial_name')): ?>
				<div class="binomial-name"><em><?php the_field('species_binomial_name'); ?></em></div>
			<?php endif; ?>

			<?php if (get_field('species_description')): ?>
				<div style="margin-left: auto;">
					<?php the_field('species_description'); ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
	<!-- End intro section -->

	<!-- Begin in page links -->
	<nav class="page-navigation">
		<?php if (get_field('species_facts')): ?>
			<a href="#<?php echo get_field_object('species_facts')['label']; ?>"><?php echo get_field_object('species_facts')['label']; ?></a>
		<?php endif; ?>
		<?php if (get_field('species_tracking')): ?>
			<a href="#<?php echo get_field_object('species_tracking')['label']; ?>"><?php echo get_field_object('species_tracking')['label']; ?></a>
		<?php endif; ?>
		<?php if (get_field('species_resources') || get_field('species_scholarly_articles') || get_field('species_additional_content')): ?>
			<a href="#<?php echo get_field_object('species_resources')['label']; ?>"><?php echo get_field_object('species_resources')['label']; ?></a>
		<?php endif; ?>
	</nav>
	<!-- End in page links -->

	<!-- Begin Facts section -->
	<?php if (get_field('species_facts')): ?>
		<div class="text-wrapper" id="<?php echo get_field_object('species_facts')['label']; ?>">
			<h3><?php echo get_field_object('species_facts')['label']; ?></h3>

			<?php while (have_rows('species_facts')): the_row(); ?>
				<?php if (get_sub_field('species_where_we_work_map')): ?>
					<img class="align-right" src="<?php echo esc_url(get_sub_field('species_where_we_work_map')['url']); ?>" alt="<?php echo get_sub_field('species_where_we_work_map')['alt']; ?>">
					<?php if (get_sub_field('species_where_we_work_map')['caption']): ?>
						<p class="image-caption"><?php echo get_sub_field('species_where_we_work_map')['caption']; ?></p>
					<?php endif; ?>
				<?php endif; ?>

				<?php if (get_sub_field('species_height')): ?>
					<p><strong><?php echo get_sub_field_object('species_height')['label']; ?>: </strong><?php the_sub_field('species_height'); ?></p>
				<?php endif; ?>

				<?php if (get_sub_field('species_length')): ?>
					<p><strong><?php echo get_sub_field_object('species_length')['label']; ?>: </strong><?php the_sub_field('species_length'); ?></p>
				<?php endif; ?>

				<?php if (get_sub_field('species_weight')): ?>
					<p><strong><?php echo get_sub_field_object('species_weight')['label']; ?>: </strong><?php the_sub_field('species_weight'); ?></p>
				<?php endif; ?>

				<?php if (get_sub_field('species_wingspan')): ?>
					<p><strong><?php echo get_sub_field_object('species_wingspan')['label']; ?>: </strong><?php the_sub_field('species_wingspan'); ?></p>
				<?php endif; ?>

				<?php if (get_sub_field('species_description')): ?>
					<p><?php the_sub_field('species_description'); ?></p>
				<?php endif; ?>

				<?php if (get_sub_field('species_conservation_status')): ?>
					<p><strong><?php echo get_sub_field_object('species_conservation_status')['label']; ?>: </strong><?php the_sub_field('species_conservation_status'); ?></p>
				<?php endif; ?>

				<?php if (get_sub_field('species_conservation_status_image')): ?>
					<a href="https://www.iucnredlist.org/species/7140/12828813" target="_blank">
						<img class="align-left" src="<?php echo esc_url(get_sub_field('species_conservation_status_image')['url']); ?>" alt="<?php echo get_sub_field('species_conservation_status_image')['alt']; ?>">
						<?php if (get_sub_field('species_conservation_status_image')['caption']): ?>
							<p class="image-caption"><?php echo get_sub_field('species_conservation_status_image')['caption']; ?></p>
						<?php endif; ?>
					</a>
				<?php endif; ?>
			<?php endwhile; ?>
		</div>
	<?php endif; ?>
	<!-- End Facts section -->

	<!-- Begin Tracking section -->
	<?php if (get_field('species_tracking') || get_field('species_history')): ?>
		<div class="text-wrapper" id="<?php echo get_field_object('species_tracking')['label']; ?>">
			<?php if (get_field('species_history')): ?>
				<h3><?php echo get_field_object('species_history')['label']; ?></h3>
				<?php the_field('species_history'); ?>
			<?php endif; ?>
		
			<?php if (get_field('species_tracking')): ?>
				<h3><?php echo get_field_object('species_tracking')['label']; ?></h3>
				<?php the_field('species_tracking'); ?>
			<?php endif; ?>

			<!-- Begin Meet the Team -->
			<?php $team_members = get_field('species_meet_the_team_members'); if ($team_members): ?>
				<h2>Meet the Team</h2>
				<?php foreach ($team_members as $post): setup_postdata($post); ?>
					<div class="team-member">
						<div class="headshot" style="background-image: url('<?php echo esc_url(get_field('team_member_image')['url']); ?>');"></div>
						<div class="team-member-name">
							<?php if (get_field('team_member_link')): ?>
								<a href="<?php echo esc_url(get_field('team_member_link')['url']); ?>" target="<?php get_field('team_member_link')['target'] ? get_field('team_member_link')['target'] : '_self'; ?>" title="<?php echo esc_html(get_field('team_member_link')['title']); ?>">
							<?php endif; ?>
								<?php the_title(); ?>
							<?php if (get_field('team_member_link')): ?>
								</a>
							<?php endif; ?>
							</div>
						
						<p><strong><?php if (get_field('team_member_title')) { the_field('team_member_title'); } ?></strong></p>

                    	<p><?php if (get_field('team_member_location')) { the_field('team_member_location'); } ?></p>
				</div>
				<?php endforeach; wp_reset_postdata(); ?>
			<?php endif; ?>
			<!-- End Meet the Team -->

			<!-- Begin Extra Content -->
			<?php if (get_field('species_additional_content')): ?>
				<div class="species-additional-content">
					<?php the_field('species_additional_content'); ?>
				</div>
			<?php endif; ?>
			<!-- End Extra Content -->
	<?php endif; ?>
	<!-- End Tracking section -->
</section>
<section class="species-detail-page">
	<div class="text-wrapper" id="<?php echo get_field_object('species_resources')['label']; ?>">
		<!-- Begin Resources -->
		<?php if (get_field('species_resources') || get_field('species_scholarly_articles')): ?>
			<h3><?php echo get_field_object('species_resources')['label']; ?></h3>
			
			<div class="news-items">
				<?php while (have_rows('species_resources')): the_row(); ?>
					<div class="news-item">
						<?php if (get_sub_field('species_resources_thumbnail_image')): ?>
							<img src="<?php echo esc_url(get_sub_field('species_resources_thumbnail_image')['url']); ?>" alt="<?php echo get_sub_field('species_resources_thumbnail_image')['alt']; ?>">
						<?php endif; ?>

						<?php if (get_sub_field('species_resources_title_link')): ?>
							<div class="headline">
								<a href="<?php echo esc_url(get_sub_field('species_resources_title_link')['url']); ?>" target="<?php get_sub_field('species_resources_title_link')['target'] ? get_sub_field('species_resources_title_link')['target'] : '_self'; ?>" title="<?php echo esc_html(get_sub_field('species_resources_title_link')['title']); ?>"><?php echo esc_html(get_sub_field('species_resources_title_link')['title']); ?></a>
							</div>
						<?php endif; ?>
					</div>
				<?php endwhile; ?>
			</div>
		<?php endif; ?>
		<!-- End Resources -->
		
		<!-- Begin Scholarly Articles -->
		<?php if (get_field('species_scholarly_articles')): ?>
			<div class="scholarly-articles">
				<h4><?php echo get_field_object('species_scholarly_articles')['label']; ?></h4>

				<?php while (have_rows('species_scholarly_articles')): the_row(); ?>
					<p><?php the_sub_field('species_article_credits_and_link'); ?></p>
				<?php endwhile; ?>
			</div>
		<?php endif; ?>
		<!-- End Scholarly Articles -->
		
		<!-- End Collaborators -->
		<?php if (get_field('species_collaborators')): ?>
			<div class="collaborators">
				<h4><?php echo get_field_object('species_collaborators')['label']; ?></h4>

				<?php while (have_rows('species_collaborators')): the_row(); ?>
					<?php if (get_sub_field('species_collaborator_image')): ?>
						<div class="sponsorwrap">
							<?php if (get_sub_field('species_collaborator_link')): ?>
								<a href="<?php echo esc_url(get_sub_field('species_collaborator_link')['url']); ?>" target="<?php get_sub_field('species_collaborator_link')['target'] ? get_sub_field('species_collaborator_link')['target'] : '_self'; ?>" title="<?php echo esc_html(get_sub_field('species_collaborator_link')['title']); ?>">
							<?php endif; ?>
								<img src="<?php echo esc_url(get_sub_field('species_collaborator_image')['url']); ?>" alt="<?php echo get_sub_field('species_collaborator_image')['alt']; ?>">
							<?php if (get_sub_field('species_collaborator_link')): ?>
								</a>
							<?php endif; ?>
						</div>
					<?php else: ?>
						<?php if (get_sub_field('species_collaborator_link')): ?>
							<a href="<?php echo esc_url(get_sub_field('species_collaborator_link')['url']); ?>" target="<?php get_sub_field('species_collaborator_link')['target'] ? get_sub_field('species_collaborator_link')['target'] : '_self'; ?>" title="<?php echo esc_html(get_sub_field('species_collaborator_link')['title']); ?>">
						<?php endif; ?>
							<p style="text-align: center;"><?php the_sub_field('species_collaborator_name'); ?></p>
						<?php if (get_sub_field('species_collaborator_link')): ?>
							</a>
						<?php endif; ?>
					<?php endif; ?>
				<?php endwhile; ?>
			</div>
		<?php endif; ?>
		<!-- End Collaborators -->
	</div>
</section>

<?php get_footer(); ?>