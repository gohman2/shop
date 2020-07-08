<div class="col-sm-4">
    <div class="product-item">
        <div class="product-img">
            <a href="<?php echo get_the_permalink(); ?>">
                <?php the_post_thumbnail( 'medium' ); ?>
            </a>
        </div>
        <div class="product-list">
            <h3><?php the_title(); ?></h3>
            <div class="rating">rate<?php echo get_field('rate', get_the_ID()); ?></div>
            <span class="price"><?php echo get_field('price', get_the_ID()); ?></span>

        </div>
    </div>
</div>