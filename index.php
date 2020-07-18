<?php get_header(); ?>
<section class="wrapper">
    <div class="main-slider">
        <?php
        echo do_shortcode('[smartslider3 slider=2]');
        ?>
    </div>
    <div class="page-products">
        <?php
        $query = new WP_Query('page_id=22');
        if( $query->have_posts() ): while( $query->have_posts() ): $query->the_post();
            ?>
            <div class="products-left">
                <h1 class="title"><?php the_field('title'); ?></h1>
                <span class="separator"></span>
                <p class="description-mini">
                    <?php the_field('description-mini'); ?>
                </p>
                <a class="btn btn-to-products" href="/products">
                    В КАТАЛОГ
                </a>
            </div>
        <?php endwhile; endif; wp_reset_postdata(); ?>
        <div class="products">
            <?php
            $posts = get_posts(array('post_type' => 'post', 'posts_per_page' => 4));
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
            <?php endforeach; endif; wp_reset_postdata(); ?>
        </div>
    </div>
    <div class="page-about">
        <?php
        $query = new WP_Query('page_id=24');
        if($query->have_posts()): while($query->have_posts()): $query->the_post();
            ?>
            <div class="about-header">
                <div class="image-container">
                    <?php
                    $image = get_field('image');
                    if(!empty($image)):
                        ?>
                        <img class="about-header-image"
                             src="<?php echo esc_url($image['url']); ?>"
                             alt="<?php echo esc_attr($image['alt']); ?>" />
                    <?php endif;?>
                </div>
                <div class="about-header-right">
                    <h1 class="title"><?php the_field('title'); ?></h1>
                    <span class="separator"></span>
                    <p class="description-mini">
                        <?php the_field('description-mini'); ?>
                    </p>
                    <a class="btn btn-to-about" href="/about">
                        ПОДРОБНЕЕ
                    </a>
                </div>
            </div>
        <?php endwhile; endif;  wp_reset_postdata(); ?>
    </div>
    <div class="contacts">
        <div class="contact-form">
            <h3 class="title">
                Остались вопросы?
            </h3>
            <?php
            echo do_shortcode('[contact-form-7 id="102" title="Задать вопрос"]');
            ?>
        </div>
    </div>
</section>
<?php get_footer(); ?>
