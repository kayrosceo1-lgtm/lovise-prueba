<?php get_header(); ?>
<main class="lovise-main">
    <div class="lovise-container">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <article class="lovise-post">
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <?php the_excerpt(); ?>
            </article>
        <?php endwhile; the_posts_navigation(); endif; ?>
    </div>
</main>
<?php get_footer(); ?>
