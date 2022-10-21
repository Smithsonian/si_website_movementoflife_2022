<?php 
/**
* Template Name: Tools
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

<section id="skipTo" class="tools-page">
    <!-- Begin intro text -->
    <div class="text-wrapper intro-text">
        <?php if (have_posts()): while (have_posts()): the_post(); ?>
            <?php if (the_content()): ?>
                <?php the_content(); ?>
            <?php endif; ?>
        <?php endwhile; endif; ?>
    </div>
    <!-- End intro text -->

    <!-- Begin ctmm links -->
    <?php if (get_field('two_column_grid_items')): ?>
        <div class="two-column-grid text-wrapper">
            <?php while (have_rows('two_column_grid_items')): the_row(); ?>
                <span class="technology">
                    <?php if (get_sub_field('two_column_grid_items_image')): ?>
                        <img src="<?php echo esc_url(get_sub_field('two_column_grid_items_image')['url']); ?>" alt="<?php echo get_sub_field('two_column_grid_items_image')['alt']; ?>">
                    <?php endif; ?>
                    <?php if (get_sub_field('two_column_grid_items_title')): ?>
                        <div class="item-title"><?php the_sub_field('two_column_grid_items_title'); ?></div>
                    <?php endif; ?>
                    <?php if (get_sub_field('two_column_grid_items_description')): ?>
                        <p><?php the_sub_field('two_column_grid_items_description'); ?></p>
                    <?php endif; ?>
                    <?php if (get_sub_field('two_column_grid_items_link')): ?>
                        <a href="<?php echo esc_url(get_sub_field('two_column_grid_items_link')['url']); ?>" target="<?php get_sub_field('two_column_grid_items_link')['target'] ? get_sub_field('two_column_grid_items_link')['target'] : '_self'; ?>" title="<?php echo esc_html(get_sub_field('two_column_grid_items_link')['title']); ?>"><button><?php echo esc_html(get_sub_field('two_column_grid_items_link')['title']); ?></button></a>
                    <?php endif; ?>
                </span>
            <?php endwhile; ?>
        </div>
    <?php endif; ?>
    <!-- End ctmm links -->

    <!-- Begin Applications -->
    <?php if (get_field('tools_applications')): ?>
        <div class="text-wrapper" id="projects">
            <h3 id="projects"><?php echo get_field_object('tools_applications')['label']; ?></h3>
            <div class="three-column-grid">
                <?php while (have_rows('tools_applications')): the_row(); ?>
                    <span class="technology">
                        <?php if (get_sub_field('tools_applications_image')): ?>
                            <img src="<?php echo esc_url(get_sub_field('tools_applications_image')['url']); ?>" alt="<?php echo get_sub_field('tools_applications_image')['alt']; ?>">
                        <?php endif; ?>
                        <?php if (get_sub_field('tools_applications_name')): ?>
                            <div class="item-title"><?php the_sub_field('tools_applications_name'); ?></div>
                        <?php endif; ?>
                        <?php if (get_sub_field('tools_applications_link')): ?>
                            <a href="<?php echo esc_url(get_sub_field('tools_applications_link')['url']); ?>" target="<?php get_sub_field('tools_applications_link')['target'] ? get_sub_field('tools_applications_link')['target'] : '_self'; ?>" title="<?php echo esc_html(get_sub_field('tools_applications_link')['title']); ?>"><button><?php echo esc_html(get_sub_field('tools_applications_link')['title']); ?></button></a>
                        <?php endif; ?>
                    </span>
                <?php endwhile; ?>
            </div>
        </div>
    <?php endif; ?>
    <!-- End Applications -->

    <!-- Begin Education & Outreach -->
    <?php if (get_field('tools_education_and_outreach')): ?>
        <div class="text-wrapper" id="outreach">
            <h3 id="education"><?php echo get_field_object('tools_education_and_outreach')['label']; ?></h3>
            <?php the_field('tools_education_and_outreach'); ?>
        </div>
    <?php endif; ?>
    <!-- End Education & Outreach -->

    <!-- Begin Meet the Team -->
    <?php $team_members = get_field('tools_meet_the_team'); if ($team_members): ?>
        <img class="align-center" src="https://thumbs-prod.si-cdn.com/INZ20HP3sFIcqC0thFuddT3YIcU=/fit-in/1072x0/https://public-media.secure.si.edu/cms_page_media/2020/10/15/1602796572/Rplot02.png" alt="">

        <h3><?php echo get_field_object('tools_meet_the_team')['label']; ?></h3>

        <div class="team-members">
            <?php foreach ($team_members as $post): setup_postdata($post); ?>
                <div class="team-member">
                    <div class="headshot" style="background-image: url('<?php echo esc_url(get_field('team_member_image')['url']); ?>');"></div>
                    <div class="team-member-name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
                    <p><strong><?php the_field('team_member_title'); ?></strong></p>
                    <p><?php the_field('team_member_location'); ?></p>
                </div>
            <?php endforeach; wp_reset_postdata(); ?>
        </div>
    <?php endif; ?>
    <!-- End Meet the Team -->

    <!-- Begin Collaborators -->
    <?php if (get_field('tools_collaborators')): ?>
        <section>
		    <div class="text-wrapper" id="resources">
                <div class="collaborators">
                    <h3><?php echo get_field_object('tools_collaborators')['label']; ?></h3>

                    <div class="three-column-grid" style="align-items: center;">
                        <?php while (have_rows('tools_collaborators')): the_row(); ?>
                            <div class="sponsorwrap">
                                <?php if (get_sub_field('tools_collaborators_link')): ?>
                                    <a href="<?php echo esc_url(get_sub_field('tools_collaborators_link')['url']); ?>" target="<?php get_sub_field('tools_collaborators_link')['target'] ? get_sub_field('tools_collaborators_link')['target'] : '_self'; ?>" title="<?php echo esc_html(get_sub_field('tools_collaborators_link')['title']); ?>">
                                <?php endif; ?>
                                    <img src="<?php echo esc_url(get_sub_field('tools_collaborators_image')['url']); ?>" alt="<?php echo get_sub_field('tools_collaborators_image')['alt']; ?>" class="logo">
                                <?php if (get_sub_field('tools_collaborators_link')): ?>
                                    </a>
                                <?php endif; ?>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
		    </div>
	    </section>
    <?php endif; ?>
    <!-- End Collaborators -->
</section>

<?php get_footer(); ?>