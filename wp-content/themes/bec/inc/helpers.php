<?php

/*
*
* Restituisce tutte le tassonomie legate ad un post-type
*
*/

function getAllTaxonomies($post_type){
    //init obj finale
    $array_objects = array();
    //prendo tutte le tax legate al post type passato come argomento
    $taxonomy_objects = get_object_taxonomies( $post_type, 'objects' );
    $i = 0;
    //construisco obj finale
    foreach( $taxonomy_objects as $obj ){
        //label da mostrare del menu
        $array_objects[$i]["nome"] = $obj->label;
        //voci del menu (le nostre checkbox )
        $terms = get_terms( $obj->name, array(
            //prendo anche quelle che non hanno prodotti associati, eliminare
            //se non desiderati
            'hide_empty' => false,
        ) );
        $j = 0;
        foreach( $terms as $term ){
            //ti metto tutto non si sa mai ;)
            $array_objects[$i]["valori"][$j] = $term;
            $j++;
        }
        $i++;
    }
    return $array_objects;
}

/*
*
* Disegna il menu dei filtri per il post type passato
*
*/

function renderFilterMenu($post_type){
    
    $html = "";
    $allLabels = getAllTaxonomies($post_type);
    
    if( is_array($allLabels) && count($allLabels) > 0 ){
        $html .= "<ul class=\"FilterMenu\">";
        foreach( $allLabels as $label ){
            $html .= "<li>
                <div class=\"FilterMenu--label\"> Cerca per "
                . $label["nome"] . 
                "</div>";
            if( count($label["valori"]) > 0 ){
                $html .= "<ul>";
                foreach( $label["valori"] as $val ){
                    $html .= "<li>
                        <div class=\"FilterMenu--value form-group form-check\">
                            <input type=\"checkbox\" class=\"form-check-input\" id=" . $val->taxonomy . "_termid_" . $val->term_id  . " value=" . $val->term_id . ">
                            <label class=\"form-check-label\" for=". $val->taxonomy . "_termid_" . $val->term_id  .">" . $val->name . "</label>
                        </div>
                    </li>";
                }
                $html .= "</ul>
                </li>";
            }
        }
        $html .= "</ul>";
    }
    return $html;
}


function getProductsByTerms(){

    //esempio array in ingresso, cancella quando in prod
    $arrayTerms = array(
        'collezione' => array( 13 ),
        'materiale' => array( 4 )      
    );

    $tax_query = array('relation' => "OR" );

    foreach( $arrayTerms as $key => $term ){
        $tax_query[] = array(
            'taxonomy' => $key,
            'field' => 'term_id',
            'terms' => $term,
        );
    }

    $args['post_type'] = 'prodotto';
    
    if ( ! empty( $tax_query ) ) {
        $args['tax_query'] = $tax_query;
    }

    error_log( print_r($args, true ));

    $products = new WP_Query( $args ); 
    return $products;
}
