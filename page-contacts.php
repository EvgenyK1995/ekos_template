<?php get_header(); ?>
<section class="page-contacts">
    <?php if( have_posts() ): while( have_posts() ): the_post(); ?>
    <div class="contacts-map">
        <iframe src="https://snazzymaps.com/embed/208307" width="100%" height="100%" style="border:none;"></iframe>
    </div>
    <div class="contacts-info">
        <h1 class="title"><?php the_field('title') ?></h1>
        <p class="contact-number"><?php the_field('phone') ?></p>
        <p class="contact-email"><?php the_field('email') ?></p>
        <p class="contact-address"><?php the_field('address') ?></p>
        <div class="contact-form">
            <h3 class="title">
                Задать вопрос
            </h3>
            <?php
                echo do_shortcode('[contact-form-7 id="102" title="Задать вопрос"]');
            ?>
            <p class="to-privacy">
                Нажимая кнопку, вы соглашаетесь с
                <a href="<?=bloginfo("url")?>/privacy-policy/">Политикой обработки персональных даных</a>
            </p>
        </div>
    </div>
    <?php endwhile; endif; ?>
</section>
<?php get_footer(); ?>
