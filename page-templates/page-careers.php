<?php /* Template Name: Careers Page Template */

get_header();
$fields = get_fields();

$introductionFields = $fields['introduction_section'];
$listingsFields = $fields['listings_section'];
$internshipFields = $fields['additional_section'];
$multipleSpacerFields = $fields['spacer_gallery'];
?>

	<main id="primary" class="site-main careers-main">
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

		<section class="listings-section priority-section">
			<div class="container padded-section listings-container">
				<h2 class="listings-title section-title" data-aos="fade-up" data-aos-duration="1000"><?= $listingsFields['title']; ?></h2>

				<div class="listings-text section-text" data-aos="fade-up" data-aos-duration="1000"><?= $listingsFields['section_text']; ?></div>

				<div class="listings" data-aos="fade-up" data-aos-duration="1000">
					<?php
					
					$args = array(
						'post_type'			=> 'vacancies',
						'order'    			=> 'ASC',
						'post_status' 		=> 'publish',
						'posts_per_page' 	=> -1,
					);              
					
					$the_query = new WP_Query( $args );

					if($the_query->have_posts()){
						foreach($the_query->posts as $q){ ?>

							<div class="single-listing">
								<a href="<?= get_permalink($q->ID); ?>">
									<h3 class="single-listing-title"><?= $q->post_title; ?></h3>

									<div class="single-listing-button arrow-button">
										<i class="arrow-right"></i>
										<span class="single-listing-button-text button-text">Read more.</span>
									</div>
								</a>
							</div>

						<?php 
						}
					}else{ ?>

						<div class="no-listings">
							<p class="no-listings-title">There are no available vacancies at the moment.</p>
						</div>

					<?php 
					}
					
					?>
				</div>
			</div>
		</section>

		<section class="internship-section padded-section priority-section">
			<div class="container internship-container">
				<h2 class="internship-title section-title" data-aos="fade-up" data-aos-duration="1000"><?= $internshipFields['title']; ?></h2>

				<div class="internship-text section-text" data-aos="fade-up" data-aos-duration="1000"><?= $internshipFields['section_text']; ?></div>
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