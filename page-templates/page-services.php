<?php /* Template Name: Services Page Template */

get_header();
$fields = get_fields();

$introductionFields = $fields['introduction_section'];
$listingsFields = $fields['services_section'];
?>

	<main id="primary" class="site-main services-main">
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

		<section class="services-section priority-section padded-section">
			<div class="services-container">
				<div class="aside-navigation">
					<?php foreach($listingsFields['service_item'] as $service){ ?>
						<div class="same-page-navigation">
							<a href="#<?= $service['title']; ?>"><?= $service['title']; ?></a>
						</div>
					<?php } ?>
				</div>

				<div class="services-listings" data-aos="fade-up" data-aos-duration="1000">
					<?php foreach($listingsFields['service_item'] as $service){ ?>
						<div class="single-service">
							<h3 class="service-title container" id="<?= $service['title']; ?>"><?= $service['title']; ?>.</h3>

							<div class="service-content container"><?= $service['description']; ?></div>
							
							<div class="service-button arrow-button container">
								<a href="<?= $service['page_link']; ?>">
									<i class="arrow-right"></i>
									<span class="service-button-text button-text">Learn more.</span>
								</a>
							</div>

							<div class="service-image-gallery">
								<?php foreach($service['image_gallery'] as $image){ 
									if($image['type'] == 'image'){?>
										<img class="single-image" src="<?= $image['url']; ?>" alt="<?= $image['alt']; ?>">
										<?php
									} 
									else{
										?>
										<video class=" single-image video" autoplay="autoplay" loop="loop" muted="muted" playsinline="">
											<source  src="<?= $image['url']; ?>" type="video/mp4">
										</video>
										<?php	
									}
										?>
								<?php } ?>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
		</section>

	</main><!-- #main -->

<?php
get_footer();