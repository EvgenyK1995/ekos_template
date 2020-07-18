<?php get_header(); ?>
    <section class="page-about">
    <?php
        if( have_posts() ): while( have_posts() ): the_post();
        $image = get_field('image');
    ?>
        <div class="about-header">
            <div class="image-container"
                 style="background: url('<?php if(!empty($image)) { echo esc_url($image['url']); } ?>') no-repeat right center;
                 background-size: cover;
             ">
            </div>
            <div class="about-header-right">
                <h1 class="title"><?php the_field('title'); ?></h1>
                <span class="separator"></span>
                <p class="description-mini">
                    <?php the_field('description-mini'); ?>
                </p>
            </div>
        </div>
        <div class="description">
            <?php the_field('description'); ?>
            <div class="partners">
                <?php the_content(); ?>
            </div>
        </div>
    <?php endwhile; endif; ?>
    </section>
<?php get_footer(); ?>
