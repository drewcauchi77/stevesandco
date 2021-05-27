<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package steves_co
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Site Font -->
	<link rel="stylesheet" href="https://fonts.cdnfonts.com/css/gellix">
	<!-- Animate on Slide -->
	<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
	<!-- Slick Slider -->
	<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
	
	<?php wp_head(); ?>
</head>
<div class="cursor-dot-outline"></div>
<div class="cursor-dot"></div>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<?php 
		$menu_name = 'Header';
		$header_nav = wp_get_nav_menu_items($menu_name);
		$menu = wp_get_nav_menu_object($menu_name);
		$fields = get_fields($menu);
	?>
	
	<header id="masthead" class="site-header">
		<div class="container-holder">
			<div class="special-container header-container">
				<div class="logo-section">
					<a href="/">
						<img class="large" src="<?= $fields['site_logo']['url']; ?>" alt="<?= $fields['site_logo']['alt']; ?>">
						<img class="small hide" src="<?= $fields['site_logo_small']['url']; ?>" alt="<?= $fields['site_logo_small']['alt']; ?>">
					</a>
				</div>

				<div class="menu-section">
					<div class="menu-bar">
						<span></span>
						<span></span>
						<span></span>
						<span></span>
					</div> 
					<nav class="nav" id="nav">
						<div class="menu-logo-open">
							<a href="/">
								<img src="<?= $fields['site_logo']['url']; ?>" alt="<?= $fields['site_logo']['alt']; ?>">
							</a>
						</div>

						<div class="set-images">
							<?php foreach($fields['menu_images'] as $image){ ?>
								<img src="<?= $image['image']['url']; ?>" class="menu-image <?= $image['page_relation']; ?>-image" alt="<?= $image['image']['alt']; ?>">
							<?php } ?>
						</div>
						
						<ul class="header-navigation-open">
							<?php foreach($header_nav as $item) { ?>
								<li class="<?= $item->classes[0]?>">
									<a href="<?= $item->url; ?>" class="menu-item-link <?= strtolower($item->title);?>"><?= $item->title; ?></a>
								</li>
							<?php } ?>
						</ul>
					</nav> 

					<div class="menu-bg" id="menu-bg"></div>
				</div>
			</div>
		</div>
	</header><!-- #masthead -->
