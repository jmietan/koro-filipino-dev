<?php
/**
 * Template part for displaying the footer content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Loop3-Digital
 */

?>

<footer id="colophon">

    <?php if ( is_front_page() && is_active_sidebar( 'sidebar-1' ) ) : ?>
        <aside role="complementary" aria-label="<?php esc_attr_e( 'Footer', 'loop3-digital' ); ?>">
            <?php dynamic_sidebar( 'sidebar-1' ); ?>
        </aside>
    <?php endif; ?>

    <?php if ( has_nav_menu( 'menu-2' ) ) : ?>
        <nav aria-label="<?php esc_attr_e( 'Footer Menu', 'loop3-digital' ); ?>">
            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'menu-2',
                    'menu_class'     => 'footer-menu',
                    'depth'          => 1,
                )
            );
            ?>
        </nav>
    <?php endif; ?>

    <div>
        <?php
        $loop_blog_info = get_bloginfo( 'name' );
        if ( ! empty( $loop_blog_info ) ) :
            ?>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>,
            <?php
        endif;

        /* translators: 1: WordPress link, 2: WordPress. */
        printf(
            '<a href="%1$s">proudly powered by %2$s</a>.',
            esc_url( __( 'https://wordpress.org/', 'loop3-digital' ) ),
            'WordPress'
        );
        ?>
    </div>

</footer><!-- #colophon -->

