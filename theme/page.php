<?php get_header(); ?>
<main class="lovise-main">
    <div class="lovise-container" style="max-width: 800px;">
        <?php while ( have_posts() ) : the_post(); ?>
            <div class="lovise-page-header" data-animate>
                <h1 class="lovise-page-title"><?php the_title(); ?></h1>
            </div>
            <div class="lovise-page-content" data-animate data-delay="1">
                <?php the_content(); ?>
            </div>
        <?php endwhile; ?>
    </div>
</main>
<?php get_footer(); ?>
