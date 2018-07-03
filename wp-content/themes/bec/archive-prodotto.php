<?php
/**
 * The template for displaying archive products pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Neat
 */

get_header(); ?>

<?php if ( have_posts() ) : ?>
<?php
    $cpt = get_queried_object();
?>
<h1><?php echo $cpt->label ?></h1>
<p><?php echo $cpt->description ?></p>
<ul>
<?php while ( have_posts() ) : the_post(); ?>
    <li><h2><a href="<?php the_permalink() ?>"><?php the_title() ?></h2></a></li>
<?php endwhile; ?>
</ul>
<?php  echo renderFilterMenu( $cpt->name ) ?>
<?php endif; ?>


<?php get_footer(); ?>