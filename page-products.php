<?php get_header(); ?>
<section class="page-products">
    <?php if( have_posts() ): while( have_posts() ): the_post(); ?>
        <div class="products-left">
            <h1 class="title"><?php the_field('title'); ?></h1>
            <span class="separator"></span>
            <p class="description-mini">
                <?php the_field('description-mini'); ?>
            </p>
        </div>
    <?php endwhile; endif; ?>
    <div class="products">
        <?php
            $posts = get_posts(array('post_type' => 'post'));
            if(!empty($posts)): foreach($posts as $post): the_post();
        ?>
        <a href="<?php the_permalink($post)?>" class="product">
            <?php
                $image = get_field('image');
                if(!empty($image)):
            ?>
                <img class="product-image"
                     src="<?php echo esc_url($image['url']); ?>"
                     alt="<?php echo esc_attr($image['alt']); ?>" />
            <?php endif;?>
            <div class="product-hover"></div>
            <div class="product-info">
                <h2 class="product-title">
                    <?php the_field('title'); ?>
                </h2>
                <p class="product-description-mini">
                    <?php the_field('description-mini'); ?>
                </p>
                <button class="product-btn">узнать больше</button>
            </div>
        </a>
        <?php endforeach; endif; wp_reset_postdata();?>
    </div>
</section>
<?php get_footer(); ?>
