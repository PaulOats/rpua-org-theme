<?php
/**
 * Функции шаблона (function.php)
 * @package WordPress
 * @author Paul Oats
 * @subpackage rpua.org
 */

add_theme_support('title-tag');

register_nav_menus(array(
	'top' => 'Верхнее',
	'bottom' => 'Внизу',
	'second-bottom' => 'Второе нижнее'
));

add_theme_support('post-thumbnails'); 
set_post_thumbnail_size(150, 150); 
add_image_size('big-thumb', 400, 400, true); 


register_sidebar(array( // регистрируем левую колонку, этот кусок можно повторять для добавления новых областей для виджитов
	'name' => 'Сайдбар', // Название в админке
	'id' => "sidebar", // идентификатор для вызова в шаблонах
	'description' => 'Обычная колонка в сайдбаре', // Описалово в админке
	'before_widget' => '<div id="%1$s" class="widget %2$s">', // разметка до вывода каждого виджета
	'after_widget' => "</div>\n", // разметка после вывода каждого виджета
	'before_title' => '<span class="widgettitle">', //  разметка до вывода заголовка виджета
	'after_title' => "</span>\n", //  разметка после вывода заголовка виджета
));


if (!function_exists('pagination')) { 
    
	function pagination() { // функция вывода пагинации
		global $wp_query; // текущая выборка должна быть глобальной
		$big = 999999999; // число для замены
		$links = paginate_links(array( // вывод пагинации с опциями ниже
			'base' => str_replace($big,'%#%',esc_url(get_pagenum_link($big))), // что заменяем в формате ниже
			'format' => '?paged=%#%', // формат, %#% будет заменено
			'current' => max(1, get_query_var('paged')), // текущая страница, 1, если $_GET['page'] не определено
			'type' => 'array', // нам надо получить массив
			'prev_text'    => 'Назад', // текст назад
	    	'next_text'    => 'Вперед', // текст вперед
			'total' => $wp_query->max_num_pages, // общие кол-во страниц в пагинации
			'show_all'     => false, // не показывать ссылки на все страницы, иначе end_size и mid_size будут проигнорированны
			'end_size'     => 15, //  сколько страниц показать в начале и конце списка (12 ... 4 ... 89)
			'mid_size'     => 15, // сколько страниц показать вокруг текущей страницы (... 123 5 678 ...).
			'add_args'     => false, // массив GET параметров для добавления в ссылку страницы
			'add_fragment' => '',	// строка для добавления в конец ссылки на страницу
			'before_page_number' => '', // строка перед цифрой
			'after_page_number' => '' // строка после цифры
		));
	 	if( is_array( $links ) ) { // если пагинация есть
		    echo '<ul class="pagination">';
		    foreach ( $links as $link ) {
		    	if ( strpos( $link, 'current' ) !== false ) echo "<li class='active'>$link</li>"; // если это активная страница
		        else echo "<li>$link</li>"; 
		    }
		   	echo '</ul>';
		 }
	}
}


add_action('wp_footer', 'add_scripts'); 
if (!function_exists('add_scripts')) { 
	function add_scripts() { 
	    if(is_admin()) return false; 
            wp_deregister_script('jquery'); // выключаем стандартный jquery
            wp_enqueue_script('jquery','//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js','','',true);
//            wp_enqueue_script('fancybox','//cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js','','',true);
            wp_enqueue_script('slick', get_template_directory_uri().'/js/slick/slick.min.js','','',true);
//            wp_enqueue_script('cookies', get_template_directory_uri().'/js/over/cookies.js','','',true);
            wp_enqueue_script('lazy', get_template_directory_uri().'/js/lazyload/lazyload.min.js','','',true);
//            wp_enqueue_script('lazy_vimeo', get_template_directory_uri().'/js/lazyload/vimeo.js','','',true);
			wp_enqueue_script('main', get_template_directory_uri().'/js/main.js','','',true);
	}
} 


add_action('wp_print_styles', 'add_styles');
if (!function_exists('add_styles')) {
	function add_styles() {
	    if(is_admin()) return false;
		wp_enqueue_style( 'main', get_template_directory_uri().'/style.css' );
//        wp_enqueue_style( 'cookies', get_template_directory_uri().'/js/over/cookies.css' );
//        wp_enqueue_style( 'fancybox', '//cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css' );
        wp_enqueue_style( 'slick', get_template_directory_uri().'/js/slick/slick.css' );
	}
}
    
function my_custom_upload_mimes($mimes = array()) {
	$mimes['svg'] = "image/svg+xml";
	return $mimes;
}
add_action('upload_mimes', 'my_custom_upload_mimes');


function get_cat_slug($cat_id) {
	$cat_id = (int) $cat_id;
	$category = &get_category($cat_id);
	return $category->slug;
}


?>
