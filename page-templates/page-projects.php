<?php /* Template Name: Projects Page Template */

get_header();
$fields = get_fields();

$introductionFields = $fields['introduction_section'];
?>

	<main id="primary" class="site-main projects-main">
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

		<section class="project-filters-section priority-section padded-section">
			<div class="container project-filters-container">
				<div class="filter-toggle">
					<span class="filter-toggle-title">Filter&nbsp;&nbsp;&nbsp;+</span>
				</div>

				<div class="filtering-projects">
					<div class="lds-ring"><div></div><div></div><div></div><div></div></div>
					<div class="filters-header">
						<div class="go-back-filters">
							<div class="back-button arrow-button">
								<i class="arrow-right"></i>
								<span class="back-button-text button-text">&nbsp;</span>
							</div>
							<span class="go-back-span">Filter</span>
						</div>

						<span class="clear-filter">clear</span>
					</div>

					<form data-js-form="filter" class="filters-form">

						<fieldset>
							<label class="taxonomy-title">Industries.</label>

							<?php
							$industries = get_terms( 
								array(
									'taxonomy' 		=> 'industrycat',
									'hide_empty' 	=> true,
								) 
							);

							foreach($industries as $industry){ ?>
								<div class="project-taxonomy" style="width:fit-content;">
									<input type="checkbox" id="<?= $industry->slug; ?>" name="project-industries[]" value="<?= $industry->term_id; ?>">
									<label for="<?= $industry->slug; ?>"><?= $industry->name; ?></label>
								</div>
							<?php } ?>
						</fieldset>

						<fieldset>
							<label class="taxonomy-title">Services.</label>

							<?php
							$services = get_terms( 
								array(
									'taxonomy' 		=> 'servicecat',
									'hide_empty' 	=> true,
								) 
							);

							foreach($services as $service){ ?>
								<div class="project-taxonomy" style="width:fit-content;">
									<input type="checkbox" id="<?= $service->slug; ?>" name="project-services[]" value="<?= $service->term_id; ?>">
									<label for="<?= $service->slug; ?>"><?= $service->name; ?></label>
								</div>
							<?php } ?>
						</fieldset>

						<fieldset class="submit-button">
							<button>Apply Filter</button>
							<input type="hidden" name="action" value="filter">
						</fieldset>

					</form>
				</div>
			</div>
		</section>

		<section class="project-list-section priority-section padded-section" id="filter">
			<div class="container project-list-container">
				<div class="projects-list" data-js-filter="target">
					<?php
						$args = array(
							'post_type' 		=> 'projects',
							'posts_per_page' 	=> -1,
							'order' 			=> 'ASC'
						);
					
						$query = new WP_Query($args);

						if($query->have_posts()){
							while($query->have_posts()){
								$query->the_post(); ?>
								
								<div class="single-project" data-aos="fade-up" data-aos-duration="1000">
									<a class="single-project-link" href="<?= get_permalink(); ?>">
										<div class="single-project-image-holder">
											<?php
											 $asset = get_field("thumbnail_section");
											 if($asset[0]['type'] == 'video'){
												?>
													<video class="thumbnail video" autoplay="autoplay" loop="loop" muted="muted" playsinline="">
														<source  src="<?= $asset[0]['url']; ?>" type="video/mp4">
													</video>
												<?php
											 }	
											 else{
													?><img class="thumbnail image" src="<?= $asset[0]['url'];; ?>" alt="<?= $asset[0]['alt']; ?>"><?php
											 }
											?>
										</div>
										<div class="single-project-details">
											<div class="inner-details-container">
												<h3 class="single-project-title"><?= get_the_title(); ?></h3>

												<?php
													$categoriesArr = array();
													$industriesCategory = get_the_terms(get_the_ID(), 'industrycat');
													if($industriesCategory !== false){
														foreach($industriesCategory as $industryCategory){
															$categoriesArr[] = $industryCategory->name; 
														}
													}
													
													$servicesCategory = get_the_terms(get_the_ID(), 'servicecat');
													if($servicesCategory !== false){
														foreach($servicesCategory as $serviceCategory){
															$categoriesArr[] = $serviceCategory->name; 
														}
													}
													$categories = implode(', ', $categoriesArr);
												?>
												<div class="single-project-button arrow-button">
													<i class="arrow-right"></i>
													<span class="single-project-button-text button-text">&nbsp;</span>
												</div>

												<span class="single-project-categories"><?= $categories; ?></span>
											</div>
										</div>

										<div class="single-project-plus-button">
											<span class="plus-text">+</span>
										</div>
									</a>
								</div>

							<?php }
						}

						wp_reset_postdata(); 
					?>
				</div>
			</div>
		</section>
	</main><!-- #main -->

<?php
get_footer();