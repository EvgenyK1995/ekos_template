<!doctype html>
<html>
    <head>
        <title><?=wp_get_document_title()?></title>
        <meta charset="UTF-8">
        <link rel="shortcut icon" href="<?=bloginfo('template_url')?>/src/img/favicon.png" />
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <header class="header <?php if(is_page(['3', '22', '24'])): ?>header_other<?php endif; ?>">
            <a href="/" class="logo">
                <img src="<?=bloginfo('template_url')?>/src/img/logo.png" alt="logo" />
            </a>
            <nav class="ekos-nav-menu">
                <?php wp_nav_menu(array('menu' => 'ekos_navigation', 'menu_class' => 'nav-menu')); ?>
            </nav>
            <?php
                $query = new WP_Query('page_id=26');
                if( $query->have_posts() ): while( $query->have_posts() ): $query->the_post();
                $phone = str_replace(array(' ', '(', ')', '-'), '', get_field('phone'));
            ?>
            <a href="tel:<?php echo $phone; ?>" class="contact-number">
                <?php the_field('phone') ?>
            </a>
            <?php endwhile; endif; wp_reset_postdata(); ?>
            <div class="humb-menu">
                <input type="checkbox" />
                <span class="humb-item item1"></span>
                <span class="humb-item item2"></span>
                <span class="humb-item item3"></span>
            </div>
        </header>
        <div class="mobile-menu">
            <div class="menu">
		        <?php
		        $query = new WP_Query('page_id=26');
		        if( $query->have_posts() ): while( $query->have_posts() ): $query->the_post();
			        $phone = str_replace(array(' ', '(', ')', '-'), '', get_field('phone'));
			        ?>
                    <a href="tel:<?php echo $phone; ?>" class="contact-number">
				        <?php the_field('phone') ?>
                    </a>
		        <?php endwhile; endif; wp_reset_postdata(); ?>
                <nav class="ekos-nav-menu">
			        <?php wp_nav_menu(array('menu' => 'ekos_navigation', 'menu_class' => 'nav-menu')); ?>
                </nav>
            </div>
        </div>
        <div class="wrapper">
