<?php /* Template Name: Single Services Page Template */

get_header();
$fields = get_fields();

$project_sec = $fields['project_including_this_services'];


?>

<main id="primary" class="site-main single-taxonomy-main">
		<section class="introduction-section">
			<div class="introduction-outer-container">
				<div class="inner-section">
					<div class="container introduction-container">
						<div class="introduction-content">
							<a href="/services" class="go-back">
								<div class="back-button arrow-button">
									<i class="arrow-right"></i>
									<span class="back-button-text button-text">&nbsp;</span>
								</div>
								<h2 class="section-title">Go Back</h2>
							</a>
							<h1 class="title"><?= the_title(); ?></h1>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="description-section padded-section priority-section no-pad-btm">
			<div class="container">
				<div class="post-content content-container" data-aos="fade-up" data-aos-duration="1000">
					<?= the_content(); ?>
				</div>
			</div>
		</section>
		<section class="description-section padded-section priority-section">
			<div class="post-content container content-container" data-aos="fade-up" data-aos-duration="1000">
				<h2><?php echo $project_sec['title']; ?></h2>
				<div class="projects-list" data-js-filter="target">
					<?php
						$projects = $project_sec['projects'];

						if($projects){
							foreach($projects as $project){
								?>	
								<div class="single-project" data-aos="fade-up" data-aos-duration="1000">
									<a class="single-project-link" href="<?= get_permalink($project['project']->ID); ?>">
										<div class="single-project-image-holder">
											<?php 
												$asset = get_post_meta($project['project']->ID, "thumbnail_section");
												$type =  get_post_mime_type((int)$asset[0][0]);
											
												if($type == 'video/mp4'){
													$videourl = wp_get_attachment_url((int)$asset[0][0]);
												?>
													<video class="thumbnail video" autoplay="autoplay" loop="loop" muted="muted" playsinline="">
														<source  src="<?= $videourl; ?>" type="video/mp4">
													</video>
												<?php
												}	
												else{
														$imageurl = wp_get_attachment_image_src( (int)$asset[0][0], 'full', '', '' );
													?><img class="thumbnail image" src="<?= $imageurl[0]; ?>" alt="project image"><?php
												}	
											?>
										</div>

										<div class="single-project-details">
											<div class="inner-details-container">
												<h3 class="single-project-title"><?= $project['project']->post_title; ?></h3>

												<?php
													$categoriesArr = array();
													$industriesCategory = get_the_terms($project['project']->ID, 'industrycat');
													if($industriesCategory !== false){
														foreach($industriesCategory as $industryCategory){
															$categoriesArr[] = $industryCategory->name; 
														}
													}
													
													$servicesCategory = get_the_terms($project['project']->ID, 'servicecat');
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
					?>
				</div>
				<div class="featured-news-button arrow-button">
					<a href="/projects">
						<i class="arrow-right"></i>
						<span class="featured-news-button-text button-text">See all projects.</span>
					</a>
				</div>
			</div>
		</section>
		
	</main><!-- #main -->
<?php
get_footer();