<?php

add_action( 'after_setup_theme', 'movementoflife_setup' );
function movementoflife_setup() {
	load_theme_textdomain( 'movementoflife', get_template_directory() . '/languages' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form' ));
	global $content_width;

	if ( ! isset( $content_width ) ) { $content_width = 1920; }
		register_nav_menus( array( 'main-menu' => esc_html__( 'Main Menu', 'movementoflife' )));
	}

	add_action( 'wp_enqueue_scripts', 'movementoflife_load_scripts' );
	function movementoflife_load_scripts() {
		wp_enqueue_style( 'movementoflife-style', get_stylesheet_uri() );
		wp_enqueue_script( 'jquery' );
	}

	add_action( 'wp_footer', 'movementoflife_footer_scripts' );
	function movementoflife_footer_scripts() {
		wp_enqueue_script( 'movementoflife-scripts', get_template_directory_uri() . '/js/script.js', array(), false, true );
		wp_enqueue_script( 'wufoo-scripts', get_template_directory_uri() . '/js/wufoo.js', array(), false, true );
	}

	add_filter( 'document_title_separator', 'movementoflife_document_title_separator' );
	function movementoflife_document_title_separator( $sep ) {
		$sep = '|';
		return $sep;
	}

	add_filter( 'the_title', 'movementoflife_title' );
	function movementoflife_title( $title ) {
		if ( $title == '' ) {
			return '...';

		} else {
			return $title;
		}
	}

	add_filter( 'the_content_more_link', 'movementoflife_read_more_link' );
	function movementoflife_read_more_link() {
		if ( ! is_admin() ) {
			return ' <a href="' . esc_url( get_permalink() ) . '" class="more-link">...</a>';
		}
	}

	add_filter( 'excerpt_more', 'movementoflife_excerpt_read_more_link' );
	function movementoflife_excerpt_read_more_link( $more ) {
		if ( ! is_admin() ) {
			global $post;
			return ' <a href="' . esc_url( get_permalink( $post->ID ) ) . '" class="more-link">...</a>';
		}
	}

	add_filter( 'intermediate_image_sizes_advanced', 'movementoflife_image_insert_override' );
	function movementoflife_image_insert_override( $sizes ) {
		unset( $sizes['medium_large'] );
		return $sizes;
	}

	add_action( 'widgets_init', 'movementoflife_widgets_init' );
	function movementoflife_widgets_init() {
		register_sidebar( array(
			'name' => esc_html__( 'Sidebar Widget Area', 'movementoflife' ),
			'id' => 'primary-widget-area',
			'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
			'after_widget' => '</li>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );
	}

	add_action( 'wp_head', 'movementoflife_pingback_header' );
	function movementoflife_pingback_header() {
		if ( is_singular() && pings_open() ) {
			printf( '<link rel="pingback" href="%s" />' . "\n", esc_url( get_bloginfo( 'pingback_url' )));
		}
	}

	add_action( 'comment_form_before', 'movementoflife_enqueue_comment_reply_script' );
	function movementoflife_enqueue_comment_reply_script() {
		if ( get_option( 'thread_comments' )) {
			wp_enqueue_script( 'comment-reply' );
		}
	}

	function movementoflife_custom_pings( $comment ) {
		?>
		<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
		<?php
	}

	add_filter( 'get_comments_number', 'movementoflife_comment_count', 0 );
	function movementoflife_comment_count( $count ) {
		if ( ! is_admin() ) {
			global $id;
			$get_comments = get_comments( 'status=approve&post_id=' . $id );
			$comments_by_type = separate_comments( $get_comments );
			return count( $comments_by_type['comment'] );
		} else {
			return $count;
		}
	}

	// Add Google Fonts
	function movementoflife_add_google_fonts() {
	   wp_enqueue_style( 'movementoflife-google-fonts-opensans', '//fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700', false );
	   wp_enqueue_style( 'movementoflife-google-fonts-muli', '//fonts.googleapis.com/css?family=Muli:300,400,800', false );
	   wp_enqueue_style( 'movementoflife-google-fonts-roboto', 'https://fonts.googleapis.com/css?family=Roboto:100,300,700', false );
	   wp_enqueue_style( 'movementoflife-google-fonts-henriette', 'https://use.typekit.net/apo2xlb.css', false );
	}
	   
	add_action( 'wp_enqueue_scripts', 'movementoflife_add_google_fonts' );

	// Add Font Awesome
	function enqueue_load_fa() {
	    wp_enqueue_style( 'load-fa', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css' );
	}

	add_action( 'wp_enqueue_scripts', 'enqueue_load_fa');

	// Add nav menus
	function register_menus() {
	    register_nav_menus(
	  		array(
	  			'footer-upper-nav-menu' => __( 'Footer Upper Nav Menu' ),
	  			'footer-lower-nav-menu' => __( 'Footer Lower Nav Menu' )
			)
	    );
	}
	add_action( 'init', 'register_menus' );

	// Display menu title
	function display_menu_title($title) {
		$menu_location = $title;
		$menu_locations = get_nav_menu_locations();
		$menu_object = (isset($menu_locations[$menu_location]) ? wp_get_nav_menu_object($menu_locations[$menu_location]) : null);
		$menu_name = (isset($menu_object->name) ? $menu_object->name : '');
		echo esc_html($menu_name);
	}
	add_action( 'init', 'display_menu_title' );

	// Custom post types
	function create_posttype() {
		register_post_type('species',
	        array(
	            'labels' => array(
	                'name' => __( 'Species' ),
	                'singular_name' => __( 'Species' )
	            ),
	            'hierarchical' => true,
	            'public' => true,
	            'has_archive' => true,
	            'rewrite' => array('slug' => 'species'),
	            'show_in_rest' => true,
	 			'supports' => array('title'),
	 			'menu_position' => 7,
	        )
	    );

		register_post_type('teammembers',
	        array(
	            'labels' => array(
	                'name' => __( 'Team Members' ),
	                'singular_name' => __( 'Team Member' )
	            ),
	            'hierarchical' => true,
	            'public' => true,
	            'has_archive' => true,
	            'rewrite' => array('slug' => 'team-members'),
	            'show_in_rest' => true,
	 			'supports' => array('title'),
	 			'menu_position' => 8,
	        )
	    );

		register_post_type('news',
	        array(
	            'labels' => array(
	                'name' => __( 'News' ),
	                'singular_name' => __( 'News Item' )
	            ),
	            'hierarchical' => true,
	            'public' => true,
	            'has_archive' => true,
	            'rewrite' => array('slug' => 'blogs/news'),
	            'show_in_rest' => true,
	 			'supports' => array('title', 'thumbnail', 'category'),
	 			'menu_position' => 9,
	        )
	    );
	}

	add_action( 'init', 'create_posttype' );

	// Hide posts in sidebar
	function remove_menu () {
   		remove_menu_page('edit.php');
	} 

	add_action('admin_menu', 'remove_menu');

	// Breadcrumbs
	function get_breadcrumb() {
	    echo '<a href="'.home_url().'" rel="nofollow">Home</a>';
	    if (is_category() || is_single()) {
	        echo "&nbsp;&#47;&nbsp;";
	        the_category(' &bull; ');
	            if (is_single()) {
	                echo " &nbsp;&#47;&nbsp; ";
	                the_title();
	            }
	    } elseif (is_page()) {
	    	global $post;
	    	$currentTitle = get_the_title($post);
	    	$parent = get_the_title($post->post_parent);

	    	if ($parent != $currentTitle) {
		        echo "&nbsp;&#47;&nbsp;";
		        echo '<a href="'. get_permalink($post->post_parent).'">'. apply_filters('the_title', $parent) .'</a>';
		    }
		    echo "&nbsp;&#47;&nbsp;";
	        echo the_title();
	    } elseif (is_search()) {
	        echo "&nbsp;&#47;&nbsp;Search Results for... ";
	        echo '"<em>';
	        echo the_search_query();
	        echo '</em>"';
	    }
	}

	// WordPress 5.6.1: Window Unload Error Final Fix
	add_action('admin_print_footer_scripts', 'wp_561_window_unload_error_final_fix');
	function wp_561_window_unload_error_final_fix(){
	    ?>
	    <script>
	        jQuery(document).ready(function($){

	            // Check screen
	            if(typeof window.wp.autosave === 'undefined')
	                return;

	            // Data Hack
	            var initialCompareData = {
	                post_title: $( '#title' ).val() || '',
	                content: $( '#content' ).val() || '',
	                excerpt: $( '#excerpt' ).val() || ''
	            };

	            var initialCompareString = window.wp.autosave.getCompareString(initialCompareData);

	            // Fixed postChanged()
	            window.wp.autosave.server.postChanged = function(){

	                var changed = false;

	                // If there are TinyMCE instances, loop through them.
	                if ( window.tinymce ) {
	                    window.tinymce.each( [ 'content', 'excerpt' ], function( field ) {
	                        var editor = window.tinymce.get( field );

	                        if ( ( editor && editor.isDirty() ) || ( $( '#' + field ).val() || '' ) !== initialCompareData[ field ] ) {
	                            changed = true;
	                            return false;
	                        }

	                    } );

	                    if ( ( $( '#title' ).val() || '' ) !== initialCompareData.post_title ) {
	                        changed = true;
	                    }

	                    return changed;
	                }

	                return window.wp.autosave.getCompareString() !== initialCompareString;

	            }
	        });
	    </script>
	    <?php
	}
