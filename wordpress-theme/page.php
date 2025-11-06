<?php
/**
 * Template for displaying static pages
 */

get_header();
?>

<main id="main" class="site-main">
    <?php
    while (have_posts()) :
        the_post();
        ?>
        
        <article id="post-<?php the_ID(); ?>" <?php post_class('page-content'); ?>>
            <div class="container" style="padding: 4rem 1rem;">
                <div style="max-width: 900px; margin: 0 auto;">
                    
                    <!-- Breadcrumb -->
                    <div style="margin-bottom: 2rem; font-size: 0.875rem;">
                        <a href="<?php echo esc_url(home_url('/')); ?>" style="color: var(--primary);">
                            <?php _e('Home', 'hart-living'); ?>
                        </a>
                        <span style="margin: 0 0.5rem; color: var(--foreground); opacity: 0.5;">/</span>
                        <span style="color: var(--foreground); opacity: 0.7;"><?php the_title(); ?></span>
                    </div>
                    
                    <!-- Page Title -->
                    <h1 style="font-size: 2.5rem; font-weight: 700; margin-bottom: 2rem;">
                        <?php the_title(); ?>
                    </h1>
                    
                    <!-- Page Content -->
                    <div style="line-height: 1.8; font-size: 1.125rem;">
                        <?php the_content(); ?>
                    </div>
                    
                </div>
            </div>
        </article>
        
        <?php
    endwhile;
    ?>
</main>

<?php
get_footer();
