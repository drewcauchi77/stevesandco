<?php /* Template Name: About Page Template */

get_header();
$fields = get_fields();

$introductionFields = $fields['introduction_section'];
$aboutFields = $fields['about_section'];
$testimonialFields = $fields['testimonials_section'];
$singleSpacerFields = $fields['spacer_single_image'];
$clientsFields = $fields['clients_section'];
$multipleSpacerFields = $fields['spacer_gallery'];
?>

	<main id="primary" class="site-main about-main">
		<section class="introduction-section">
			<div class="introduction-outer-container">
				<div class="inner-section">
					<div class="container introduction-container">
						<div class="introduction-content">
							<h2 class="section-title"><?= $introductionFields['tagline']; ?></h2>
							<h1 class="title"><?= $introductionFields['title']; ?></h1>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="about-section priority-section padded-section">
			<div class="container about-container">
				<h2 class="about-title section-title" data-aos="fade-up" data-aos-duration="1000"><?= $aboutFields['title']; ?></h2>

				<div class="about-text section-text" data-aos="fade-up" data-aos-duration="1000"><?= $aboutFields['section_text']; ?></div>
			</div>
		</section>

		<section class="testimonials-section padded-section priority-section">
			<div class="outer-images-container">
				<div class="testimonials-image-container testimonials-image-slider" data-aos="fade-up" data-aos-duration="1000">
					<?php foreach($testimonialFields['testimonials_list'] as $testimonial){ 
							$image = get_field('image', $testimonial['testimonial_object']->ID);
						?>
						<img src="<?= $image['url']; ?>" alt="<?= $image['alt']; ?>">
					<?php } ?>
				</div>
			</div>
			
			<div class="container testimonials-container">
				<div class="outer-slider-container">
					<div class="testimonials-content-slider" data-aos="fade-up" data-aos-duration="1000">
						<?php foreach($testimonialFields['testimonials_list'] as $testimonial){ 
								$position = get_field('position', $testimonial['testimonial_object']->ID);
								$content = get_field('testimonial_content', $testimonial['testimonial_object']->ID);
							?>
							<div class="single-testimonial">
								<div class="testimonial-content">
									<?= $content; ?>
								</div>

								<h3 class="testimonial-title">
									<?= $testimonial['testimonial_object']->post_title; ?>, <br>
									<?= $position ?>
								</h3>
							</div>
						<?php } ?>
					</div>

					<div class="slider-navigation" data-aos="fade-up" data-aos-duration="1000">
						<div class="arrow-button prev-button">
							<i class="arrow-right"></i>
						</div>

						<div class="arrow-button next-button">
							<i class="arrow-right"></i>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="single-spacer-section priority-section">
			<img class="spacer-image" src="<?= $singleSpacerFields['url']; ?>" alt="<?= $singleSpacerFields['alt'] ?>">
		</section>

		<section class="clients-section padded-section priority-section">
			<div class="container clients-container">
				<h2 class="clients-title section-title" data-aos="fade-up" data-aos-duration="1000"><?= $clientsFields['title']; ?></h2>

				<div class="clients-text section-text" data-aos="fade-up" data-aos-duration="1000"><?= $clientsFields['section_text']; ?></div>
			</div>

			<?php if($clientsFields['enable_row_one'] !== false){ ?>
				<div class="clients-list first-row infinite-slideshow-gallery" data-aos="fade-up" data-aos-duration="1000">
					<div class="clients-slideshow-row image-slideshow-row" style="grid-template-columns: repeat(<?= count($clientsFields['clients_row_one']); ?>, 1fr);">
						<?php 
						foreach($clientsFields['clients_row_one'] as $client){
							$image = get_field('white_logo', $client['client_object']->ID); ?>
							
							<img src="<?= $image['url']; ?>" alt="<?= $image['alt']; ?>">
						<?php } ?>
					</div>

					<div class="clients-slideshow-row image-slideshow-row" style="grid-template-columns: repeat(<?= count($clientsFields['clients_row_one']); ?>, 1fr);">
						<?php 
						foreach($clientsFields['clients_row_one'] as $client){
							$image = get_field('white_logo', $client['client_object']->ID); ?>
							
							<img src="<?= $image['url']; ?>" alt="<?= $image['alt']; ?>">
						<?php } ?>
					</div>
				</div>
			<?php } ?>
			
			<?php if($clientsFields['enable_row_two'] !== false){ ?>
				<div class="clients-list second-row infinite-slideshow-gallery" data-aos="fade-up" data-aos-duration="1000">
					<div class="clients-slideshow-row image-slideshow-row" style="grid-template-columns: repeat(<?= count($clientsFields['clients_row_two']); ?>, 1fr);">
						<?php 
						foreach($clientsFields['clients_row_two'] as $client){
							$image = get_field('white_logo', $client['client_object']->ID); ?>
							
							<img src="<?= $image['url']; ?>" alt="<?= $image['alt']; ?>">
						<?php } ?>
					</div>

					<div class="clients-slideshow-row image-slideshow-row" style="grid-template-columns: repeat(<?= count($clientsFields['clients_row_two']); ?>, 1fr);">
						<?php 
						foreach($clientsFields['clients_row_two'] as $client){
							$image = get_field('white_logo', $client['client_object']->ID); ?>
							
							<img src="<?= $image['url']; ?>" alt="<?= $image['alt']; ?>">
						<?php } ?>
					</div>
				</div>
			<?php } ?>
		</section>

		<section class="multiple-spacer-section padded-section priority-section">
			<div id="image-slider" data-aos="fade-up" data-aos-duration="1000">
				<?php foreach($multipleSpacerFields as $image){ ?>
					<img class="single-image" src="<?= $image['url']; ?>" alt="<?= $image['alt']; ?>">
				<?php } ?>
			</div>
		</section>
	</main><!-- #main -->

<?php
get_footer();