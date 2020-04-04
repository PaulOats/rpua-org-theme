<?php
/**
 * Шаблон шапки (header.php)
 * @package WordPress
 * @subpackage rpua.org
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head();?>
</head>
<?php
//	$logo = get_field('logo', get_options_page_id('fs-options'));
?>
<body <?php body_class();?>>
	<header>
            <?php $args = array(
                'theme_location' => 'top',
				'container'=> 'nav',
                'fallback_cb' => false
			);
            wp_nav_menu($args);?>
				<div class="mobile_icon"><span></span><span></span><span></span></div>
		
	</header>
    

    <div class="main_container loading">