<?php
/* Template Name: Collezione Taxonomy */

get_header(); 

$collezione = get_queried_object();
//servirà per prendere i custom fields;
$id_collezione = $collezione->term_id;
?>

<h1><?php echo $collezione->name; ?></h1>
<p><?php echo $collezione->description; ?></p>


<?php if ( have_posts() ) : ?>
<ul>
<?php while ( have_posts() ) : the_post(); ?>
    <li><h2><a href="<?php the_permalink() ?>"><?php the_title() ?></h2></a></li>
<?php endwhile; ?>
</ul>
<?php endif; ?>



<?php get_footer(); ?>