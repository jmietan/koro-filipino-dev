<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no `home.php` file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Loop3-Digital
 */

get_header();
?>

	<section id="primary">
		<main id="main">

		<?php
		if ( have_posts() ) {

			if ( is_home() && ! is_front_page() ) :
				?>
				<header class="entry-header">
					<h1 class="entry-title"><?php single_post_title(); ?></h1>
				</header><!-- .entry-header -->
				<?php
			endif;

			// Load posts loop.
			while ( have_posts() ) {
				the_post();
				get_template_part( 'template-parts/content/content' );
			}

			// Previous/next page navigation.
			loop_the_posts_navigation();

		} else {

			// If no content, include the "No posts found" template.
			get_template_part( 'template-parts/content/content', 'none' );

		}
		?>
		<?php
		$events = tribe_get_events([
			'posts_per_page' => 4,
			'eventDisplay'   => 'upcoming',
		]);

		if ($events) {
			echo '<ul class="latest-events">';
			foreach ($events as $event) {
				$event_title = get_the_title($event->ID);
				$event_link  = get_permalink($event->ID);
				$event_date  = tribe_get_start_date($event->ID, false, 'F j, Y');
				echo "<li><a href='{$event_link}'>{$event_title}</a> - {$event_date}</li>";
			}
			echo '</ul>';
		} else {
			echo 'No upcoming events.';
		}
		?>
		<!-- instagram feeds -->
		<?php echo do_shortcode('[insta-gallery id="0"]'); ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
