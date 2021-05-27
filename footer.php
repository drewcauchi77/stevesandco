<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package steves_co
 */

?>

	<?php 
		$menu_name = 'Footer';
		$footer_nav = wp_get_nav_menu_items($menu_name);
		$menu = wp_get_nav_menu_object($menu_name);
		$fields = get_fields($menu);
	?>

	<footer id="colophon" class="site-footer padded-section priority-section">
		<div class="container footer-container">
			<section class="footer-title">
				<a href="<?= $fields['contact_section']['page_link']; ?>">
					<h2 class="title"><?= $fields['contact_section']['title']; ?></h2>

					<img class="arrow-image" src="/wp-content/uploads/2021/03/icon-arrow.svg" alt="Go to Page">
				</a>
			</section>

			<section class="contact-section">
				<h3 class="contact-title"><?= $fields['contact_section']['sub-title']; ?></h3>

				<div class="contact-text">
					<?= $fields['contact_section']['details']; ?>
				</div>
			</section>

			<nav class="footer-navigation">
				<ul class="footer-navigation-list">
					<?php foreach($footer_nav as $item) { ?>
						<li>
							<a href="<?= $item->url; ?>" class="menu-item-link action-link"><?= $item->title; ?></a>
						</li>
					<?php } ?>
				</ul>
			</nav>

			<section class="social-section">
				<ul class="social-navigation-list">
					<?php foreach($fields['social_section'] as $social) { ?>
						<li>
							<a href="<?= $social['social_link']; ?>" class="social-item-link" target="_blank">
								<img class="social-icon" src="<?= $social['social_icon']['url']; ?>" alt="<?= $social['social_icon']['alt']; ?>">
							</a>
						</li>
					<?php } ?>
				</ul>
			</section>

			<section class="bottom-navigation">
				<div class="privacy-section bottom-section">
					<a href="<?= $fields['bottom_navigation']['navigation_page_link']; ?>" class="privacy-link action-link">
						<span class="link-text"><?= $fields['bottom_navigation']['navigation_text']; ?></span>
					</a>
				</div>

				<div class="copyright-section bottom-section">
					<span class="copyright-text">&#169; STEVES&CO. <?= date('Y'); ?></span>
				</div>
			</section>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

<!-- Jquery CDN -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="crossorigin="anonymous"></script>
<!-- Animate on Scroll CDN JS -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<!-- Slick Slider JS CDN -->
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<!-- Site JS -->
<script src="<?= get_template_directory_uri(); ?>/js/app.js"></script>

</body>
</html>
