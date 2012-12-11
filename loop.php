<?php if ( ! have_posts() ) : ?>

  <article id="post-0" class="post error404 not-found">
    <h1 class="entry-title">Page Not Found</h1>
    <div class="entry-content">
      <p>Apologies, but no results were found for the requested page.</p>
    </div><!-- .entry-content -->
  </article><!-- #post-0 -->

<?php endif; ?>


<?php while ( have_posts() ) : the_post(); ?>

  <article id="<?php the_ID(); ?>" <?php post_class(); ?>>
    <h2 class="entry-title"><?php the_title(); ?></h2>

    <?php if ( is_archive() || is_search() ) : // Only display excerpts for archives and search. ?>

    <div class="entry-summary">
      <?php the_excerpt(); ?>
    </div><!-- .entry-summary -->

    <?php else : ?>

    <div class="entry-content">
      <?php the_content(); ?>
    </div><!-- .entry-content -->

    <?php endif; ?>

  </article><!-- #post-## -->

<?php endwhile; // End the loop. Whew. ?>
