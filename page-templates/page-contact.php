<?php /* Template Name: Contact Page Template */

get_header();
$fields = get_fields();

$introductionFields = $fields['introduction_section'];
$contactFields = $fields['contact_section'];
$formFields = $fields['contact_form_section'];
?>

	<main id="primary" class="site-main contact-main">
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

		<section class="contact-section priority-section padded-section">
			<div class="container contact-container">
				<div class="map-section" data-aos="fade-up" data-aos-duration="1000">
					<iframe src="<?= $contactFields['google_maps_link']; ?>" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
				</div>

				<div class="contact-details-section" data-aos="fade-up" data-aos-duration="1000">
					<div class="address-section">
						<h2 class="address-title section-title"><?= $contactFields['address_section']['title']; ?></h2>
						<div class="address-content"><?= $contactFields['address_section']['section_text']; ?></div>
					</div>

					<div class="phone-section">
						<h2 class="phone-title section-title"><?= $contactFields['phone_section']['title']; ?></h2>
						<div class="phone-content"><?= $contactFields['phone_section']['section_text']; ?></div>
					</div>
				</div>
			</div>
		</section>

		<section class="form-section priority-section padded-section">
			<div class="container form-container">
				<h2 class="form-title" data-aos="fade-up" data-aos-duration="1000"><?= $formFields['title']; ?></h2>

				<div class="form-text" data-aos="fade-up" data-aos-duration="1000"><?= $formFields['section_text']; ?></div>

				<div class="contact-form" data-aos="fade-up" data-aos-duration="1000">
					<?php echo do_shortcode($formFields['contact_field_shortcode']); ?>
				</div>
			</div>
		</section>

	</main><!-- #main -->

<?php
get_footer();