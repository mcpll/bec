<?php
/* Template Name: Collezione Taxonomy */

get_header(); ?>

<?php


$tax  = get_taxonomy( 'collezione' );
$terms = get_terms( 'collezione' );

?>

<h1><?php echo $tax->name; ?></h1>
<p><?php echo $tax->description; ?></p>

<?php

if ( ! empty( $terms ) && ! is_wp_error( $terms ) ): ?>
    <ul>
    <?php foreach ( $terms as $term ): ?>
        <li><a href="<?php echo esc_url( get_term_link( $term ) ); ?>"><?php echo $term->name; ?></a></li>    
    <?php endforeach; ?>
    </ul>
<?php endif; ?>

<?php get_footer(); ?>