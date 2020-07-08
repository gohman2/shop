<?php
/**
 * Template name: Shop
 */
get_header();
?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main">

            <h1>Топ 15</h1>
            <div class="container">
                <div class="col-md-8 products">
            <?php
            $top_ids = [];
            $new_query = get_product(10, [1,3,5], [ 'l' ]);
            if ($new_query->have_posts()) :
                $count = $new_query->found_posts;
                $i = 1;
                    while ($new_query->have_posts()) :
                        $new_query->the_post();

                        if($i == 1){
                            echo '<div class="row">';
                        }
                      get_template_part('template-parts/content/content','card');
                        $top_ids[] = get_the_ID();

                        if(($i % 3) == 0){
                            echo '</div>';
                            echo '<div class="row">';
                        }
                        if($i == $count){
                            echo '</div>';
                        }
                        $i++;
                    endwhile;
            endif;
            wp_reset_postdata();
?>
                </div>
            </div>
            <div class="container">
                <div class="col-md-8 products">
            <?php
            $second_query = get_product(5, [2,4], [ 'xl' ], true);
            if ($second_query->have_posts()) :
                $count = $second_query->found_posts;
                $n = 1;
                while ($second_query->have_posts()) :
                    $second_query->the_post();

                    if($n == 1){
                        echo '<div class="row">';
                    }
                    get_template_part('template-parts/content/content','card');
                    $top_ids[] = get_the_ID();

                    if(($n % 3) == 0){
                        echo '</div>';
                        echo '<div class="row">';
                    }
                    if($n == $count){
                        echo '</div>';
                    }
                    $n++;
                endwhile;
            endif;
            wp_reset_postdata();
            ?>
                </div>
            </div>
            <h1>Остальные товары</h1>
            <div class="container">
                <div id="all_product" class="col-md-8 products">
<?php
 $all_query = get_all_product($top_ids);
            if ($all_query->have_posts()) :
                $count_all = $all_query->found_posts;
                $c = 1;
                while ($all_query->have_posts()) :
                    $all_query->the_post();

                    if($c == 1){
                        echo '<div class="row">';
                    }
                    get_template_part('template-parts/content/content','card');
                    $top_ids[] = get_the_ID();

                    if(($c % 3) == 0){
                        echo '</div>';
                        echo '<div class="row">';
                    }
                    if($c == $count_all){
                        echo '</div>';
                    }
                    $c++;

                endwhile;
            endif;
            wp_reset_postdata();
?>
                </div>
            </div>
            <?php
            if( $count_all <= 15 ){ /* hide button if all posts show */
                $style = "display:none;";
            }else{
                $style = '';
            }?>
            <div style="<?php echo $style; ?>" class="blog_load">
                <button class="load_btn"
                        data-post-total="<?php echo $count_all; ?>"
                        data-post-offset="15"
                        data-post-perpage="15"
                        data-post-sort="DESC"
                        data-post-not="<?php echo implode(",", $top_ids) ?>">
                    Загрузить еще
                </button>
            </div>
        </main><!-- #main -->
    </div><!-- #primary -->

<?php



get_footer();