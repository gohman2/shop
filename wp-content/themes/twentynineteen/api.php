<?php
/*
 * Template name: api
 * */
get_header();

wp_head();

if($_GET['generate'] == 1){

    $count_prod = 1000;
    $i = 0;
    $taxonomy_arr = [
        'subject_slug'  => 'subject',
        'color_slug'    => 'color',
        'material_slug' => 'material',
        'size_slug'     => 'size',
    ];

    $delivery = ['ukr_post','new_post'];
    $pay      = ['card','cash'];

    $subjects  = get_all_terms($taxonomy_arr['subject_slug']);
    $colors    = get_all_terms($taxonomy_arr['color_slug']);
    $materials = get_all_terms($taxonomy_arr['material_slug']);
    $sizes     = get_all_terms($taxonomy_arr['size_slug']);

    $image_id  = 35;

    for($i = 1 ; $i <= $count_prod; $i++){
        $title = 'Товар#'.$i;
        $post_name = sanitize_title($title);

        $post = wp_slash(array(
            'post_status'  => 'publish',
            'post_title'   => $title,
            'post_name'    => $post_name,
            'post_content' => '',
            'post_type'    => 'product',
            'tax_input'    => array(
                $taxonomy_arr['subject_slug']  => array( get_rand_elem($subjects) ),
                $taxonomy_arr['color_slug']    => array( get_rand_elem($colors) ),
                $taxonomy_arr['material_slug'] => array( get_rand_elem($materials) ),
                $taxonomy_arr['size_slug']     => array( get_rand_elem($sizes) ),
            ),
        ));
        $single_id = wp_insert_post($post);
        echo set_post_thumbnail( $single_id, $image_id ) ? 'image ok': 'image ne ok';
        echo $single_id.'<br>';

        $price       = mt_rand(2000, 5000);
        $price_sale  = mt_rand(500, 1999);
        $rating      = mt_rand(1, 50)/10;

        update_field('price', $price, $single_id);
        update_field('sale_price', $price_sale, $single_id);
        update_field('rate', $rating, $single_id);
        update_field('in_stock', get_true_or_false(), $single_id);
        update_field('sale', get_true_or_false(), $single_id);
        update_field('new', get_true_or_false(), $single_id);
        update_field('top', get_true_or_false(), $single_id);
        update_field('delivery', array( get_rand_elem($delivery) ), $single_id);
        update_field('pay_type', array( get_rand_elem($pay) ), $single_id);
    }

}

function get_all_terms($taxonomy){
    $terms = get_terms( [
        'taxonomy' => $taxonomy,
        'hide_empty' => false,
    ] );

    $result = [];
    foreach ($terms as $term){
        $result[] = $term->slug;
    }

    return $result;
}

function get_rand_elem($tax_elem){
    return $tax_elem[mt_rand(0, count($tax_elem) - 1)];
}

function get_true_or_false(){
    return mt_rand(0, 1) ? true : false;
}

get_footer();