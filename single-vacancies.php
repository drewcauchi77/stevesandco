<?php 
get_header();
$fields = get_fields();

$introductionFields = $fields['introduction_section'];
$contentFields = $fields['content_section'];
$multipleSpacerFields = $fields['spacer_gallery'];
?>

	<main id="primary" class="site-main single-vacancy-main">
		<section class="introduction-section">
			<div class="introduction-outer-container">
				<div class="inner-section">
					<div class="container introduction-container">
						<div class="introduction-content">
							<a href="/careers" class="go-back">
								<div class="back-button arrow-button">
									<i class="arrow-right"></i>
									<span class="back-button-text button-text">&nbsp;</span>
								</div>
								<h2 class="section-title">Careers</h2>
							</a>

							<h1 class="title"><?= the_title(); ?></h1>
						</div>
					</div>
				</div>
			</div>
		</section>
		
		<section class="description-section padded-section priority-section">
			<div class="container description-container">
				<h2 class="description-title section-title" data-aos="fade-up" data-aos-duration="1000"><?= $introductionFields['title']; ?></h2>

				<div class="description-text section-text" data-aos="fade-up" data-aos-duration="1000"><?= $introductionFields['section_text']; ?></div>
			</div>
		</section>

		<section class="content-section padded-section priority-section">
			<div class="container content-container" data-aos="fade-up" data-aos-duration="1000">

				<?php foreach($contentFields['individual_section'] as $section){ ?>
					<div class="content-part">
						<div class="title-container">
							<h2 class="content-title section-title"><?= $section['title']; ?></h2>
							<div class="mobile-button">
								<span></span>
								<span></span>
							</div>
						</div>

						<div class="content-text section-text"><?= $section['content']; ?></div>
					</div>
				<?php } ?>

			</div>
		</section>
		
		<section class="form-section priority-section padded-section">
			<div class="container form-container">
				<h2 class="form-title section-title" data-aos="fade-up" data-aos-duration="1000">Application form.</h2>

				<div class="vacancy-form" data-aos="fade-up" data-aos-duration="1000">
					<?php echo do_shortcode('[contact-form-7 title="Vacancy Form"]'); ?>
				</div>
			</div>
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