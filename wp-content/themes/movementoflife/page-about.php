<?php 
/**
* Template Name: About
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

<section id="skipTo">
    <!-- Begin intro text -->
    <div class="text-wrapper about-mission">
        <?php if (have_posts()): while (have_posts()): the_post(); ?>
            <?php if (the_content()): ?>
                <?php the_content(); ?>
            <?php endif; ?>
        <?php endwhile; endif; ?>
    </div>
    <!-- End intro text -->

    <!-- Begin Our Team -->
    <?php $team_members = get_field('about_our_team'); if ($team_members): ?>
        <h2><?php echo get_field_object('about_our_team')['label']; ?></h2>

        <div class="team-members">
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

                    <?php if (get_field('team_member_phone_number') || get_field('team_member_email')): ?>
                        <div class="contact-info">
                            <?php if (get_field('team_member_email')): ?>
                                <a href="mailto:<?php the_field('team_member_email'); ?>" target="">
                                    <p><i class="fa fa-envelope" aria-hidden="true"></i>Email</p>
                                </a>
                            <?php endif; ?>
                            <?php if (get_field('team_member_phone_number')): ?>
                                <a href="tel:<?php the_field('team_member_phone_number'); ?>">
                                    <p><i class="fa fa-phone" aria-hidden="true"></i><?php the_field('team_member_phone_number'); ?></p>
                                </a>
                            <?php endif; ?>
                        
                        </div>
                    <?php endif; ?>
                </div>
            <?php endforeach; wp_reset_postdata(); ?>

            <!-- Begin Open Positions -->
            <?php if (get_field('about_open_positions')): ?>
                <?php the_field('about_open_positions'); ?>
            <?php endif; ?>
            <!-- End Open Positions -->
        </div>
    <?php endif; ?>
    <!-- End Our Team -->
</section>

<section class="sponsors-partners">
    <div class="text-wrapper">
        <?php if (get_field('about_sponsors_and_partners_title')): ?>
            <h2><?php the_field('about_sponsors_and_partners_title'); ?></h2>
        <?php endif; ?>
        <!-- Begin Our Sponsors -->
        <?php if (get_field('about_our_sponsors')): ?>
            <h3><?php echo get_field_object('about_our_sponsors')['label']; ?></h3>

            <?php while (have_rows('about_our_sponsors')): the_row(); ?>
                <?php if (get_sub_field('about_our_sponsors_new_line')): ?><br><?php endif; ?>
                <?php if (get_sub_field('about_our_sponsors_image')): ?>
                    <?php if (get_sub_field('about_our_sponsors_link')): ?>
                        <a href="<?php echo esc_url(get_sub_field('about_our_sponsors_link')['url']); ?>" target="<?php get_sub_field('about_our_sponsors_link')['target'] ? get_sub_field('about_our_sponsors_link')['target'] : '_self'; ?>" title="<?php echo esc_html(get_sub_field('about_our_sponsors_link')['title']); ?>">
                    <?php endif; ?>
                        <img src="<?php echo esc_url(get_sub_field('about_our_sponsors_image')['url']); ?>" alt="<?php echo get_sub_field('about_our_sponsors_image')['alt']; ?>" class="logo">
                        <?php if (get_sub_field('about_our_sponsors_link')): ?>
                        </a>
                    <?php endif; ?>
                <?php else: ?>
                    <div class="sponsorwrap">
                        <?php if (get_sub_field('about_our_sponsors_link')): ?>
                            <a href="<?php echo esc_url(get_sub_field('about_our_sponsors_link')['url']); ?>" target="<?php get_sub_field('about_our_sponsors_link')['target'] ? get_sub_field('about_our_sponsors_link')['target'] : '_self'; ?>" title="<?php echo esc_html(get_sub_field('about_our_sponsors_link')['title']); ?>">
                        <?php endif; ?>
                            <p><?php the_sub_field('about_our_sponsors_name'); ?></p>
                        <?php if (get_sub_field('about_our_sponsors_link')): ?>
                            </a>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                <?php if (get_sub_field('about_our_sponsors_new_line')): ?><br><?php endif; ?>
            <?php endwhile;  ?>
        <?php endif; ?>
        <!-- End Our Sponsors -->

        <!-- Begin Our Partners -->
        <?php if (get_field('about_our_partners')): ?>
            <h3><?php echo get_field_object('about_our_partners')['label']; ?></h3>

            <?php while (have_rows('about_our_partners')): the_row(); ?>
                
                <div class="sponsorwrap">
                    <?php if (get_sub_field('about_our_partners_link')): ?>
                        <a href="<?php echo esc_url(get_sub_field('about_our_partners_link')['url']); ?>" target="<?php get_sub_field('about_our_partners_link')['target'] ? get_sub_field('about_our_partners_link')['target'] : '_self'; ?>" title="<?php echo esc_html(get_sub_field('about_our_partners_link')['title']); ?>">
                    <?php endif; ?>
                        <img src="<?php echo esc_url(get_sub_field('about_our_partners_image')['url']); ?>" alt="<?php echo get_sub_field('about_our_partners_image')['alt']; ?>" class="logo">
                    <?php if (get_sub_field('about_our_partners_link')): ?>
                        </a>
                    <?php endif; ?>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
        <!-- End Our Partners -->

        <!-- Begin Sponsors and Partners extra content -->
        <?php if (get_field('about_sponsors_and_partners_extra_content')): ?>
            <?php the_field('about_sponsors_and_partners_extra_content'); ?>
        <?php endif; ?>
        <!-- End Sponsors and Partners extra content -->
    </div>
</section>
<?php get_footer(); ?>