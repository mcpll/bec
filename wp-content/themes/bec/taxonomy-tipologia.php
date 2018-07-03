<?php
/* Template Name: Collezione Taxonomy */

get_header(); 

$tipologia = get_queried_object();
//servirà per prendere i custom fields;
$id_tipologia = $tipologia->term_id;
?>

<h1><?php echo $tipologia->name; ?></h1>
<p><?php echo $tipologia->description; ?></p>


<?php if ( have_posts() ) : ?>
<ul>
<?php while ( have_posts() ) : the_post(); ?>
    <li><h2><a href="<?php the_permalink() ?>"><?php the_title() ?></h2></a></li>
<?php endwhile; ?>
</ul>
<?php endif; ?>



<?php get_footer(); ?>