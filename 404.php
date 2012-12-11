<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package WordPress
 * @subpackage ed.gs Template
 * @since ed.gs Template 1.0
 */

get_header(); ?>

  <article id="post-0" class="post error404 not-found" role="main">
    <h1>Not Found</h1>
    <p>Apologies, but the page you requested could not be found.</p>
    <script>
      // focus on search field after it has loaded
      document.getElementById('s') && document.getElementById('s').focus();
    </script>
  </article>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
