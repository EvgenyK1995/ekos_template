<?php
if (function_exists('add_theme_support')) {
    add_theme_support('menus');
}

function edit_admin_menus() {
    global $menu;
    global $submenu;

    $menu[5][0] = 'Продукция';
    $submenu['edit.php'][5][0] = 'Вся продукция';
    $submenu['edit.php'][10][0] = 'Добавить Продукт';

    remove_menu_page('edit-comments.php');
}
add_action( 'admin_menu', 'edit_admin_menus' );

function custom_menu_order($menu_ord) {
    if (!$menu_ord) return true;

    return array(
        'index.php', // Консоль
        'separator1', // Первый разделитель
        'edit.php', // Записи
        'edit.php?post_type=page', // Страницы
        'upload.php', // Медиафайлы
        'link-manager.php', // Ссылки
        'edit-comments.php', // Комментарии
        'separator2', // Второй разделитель
        'themes.php', // Внешний вид
        'plugins.php', // Плагины
        'users.php', // Пользователи
        'tools.php', // Инструменты
        'options-general.php', // Параметры
        'separator-last', // Последний разделитель
    );
}
add_filter('custom_menu_order', 'custom_menu_order'); // Применить custom_menu_order
add_filter('menu_order', 'custom_menu_order');

add_action( 'wp_enqueue_scripts', 'theme_name_scripts' );
function theme_name_scripts() {
    wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue_script('app', get_template_directory_uri() . '/app.js', array(), '1.0.0', true);
}

function devise_rand_posts() {
    $args = array(
        'post_type' => 'post',
        'orderby'   => 'rand',
        'posts_per_page' => 1,
        );
    $string = '';
    $the_query = new WP_Query( $args );
    if ($the_query->have_posts()) {
        while ( $the_query->have_posts() ) {
            $the_query->the_post();

            $string .= '<a class="product" href="'. get_permalink() .'">';
                $image = get_field('image');
                if(!empty($image)) {
                    $string .= '<img class="product-image" src="'. esc_url($image['url']).'" alt="'. esc_attr($image['alt']).'" />';
                }

                $string .= '<div class="product-hover"></div>';
                $string .= '<div class="product-info">';
                    $string .= '<h2 class="product-title">'.get_field('title').'</h2>';
                    $string .= '<p class="product-description-mini">'.get_field('description-mini').'</p>';
                    $string .= '<button class="product-btn">узнать больше</button>';
                $string .= '</div>';
            $string .= '</a>';
        }
        wp_reset_postdata();
    }

    return $string;
}
add_shortcode('devise-random-posts','devise_rand_posts');
add_filter('widget-text', 'do_shortcode');

if (function_exists('pll_register_string')) {
	pll_register_string('privacy', 'Политика обработки персональных данных');
	pll_register_string('footer_description', 'Литейные добавки для сталелитейных производств: шлакообразующие смеси, теплоизоляционные покрывные смеси для промковша и кристаллизатора.');
	pll_register_string('Политика конфиденциальности', 'Политика обработки персональных данных');
}
