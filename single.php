<?php get_header(); ?>
<section>
    <?php if(have_posts()): the_post();
        $image = get_field('image');
    ?>
        <div class="single-product"
             style="background: url('<?php if(!empty($image)) { echo esc_url($image['url']); } ?>') no-repeat center center;
             background-size: cover;
        ">
            <div class="single-product-info">
                <h1 class="title"><?php the_field('title'); ?></h1>
                <p class="description-mini">
                    <?php the_field('description-mini'); ?>
                </p>
                <div class="description">
                    <?php the_field('description'); ?>
                </div>
            </div>
        </div>
        <div class="other-products">
            <h3 class="title">
                Другая продукция
            </h3>
            <div class="products">
                <?php
                    echo do_shortcode('[devise-random-posts]');
                ?>
            </div>
        </div>
    <?php endif; ?>
</section>
<?php get_footer(); ?>
