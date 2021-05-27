<?php /* Template Name: Home Page Template */

get_header();
$fields = get_fields();

$introductionFields = $fields['introduction_section'];
$aboutFields = $fields['about_section'];
$projectsFields = $fields['projects_section'];
$clientsFields = $fields['clients_section'];
?>

	<main id="primary" class="site-main homepage-main">
		<section class="introduction-section">
			<video poster="<?= $introductionFields['video_poster']['url']; ?>" autoplay="autoplay" loop="loop" muted="muted" playsinline="" class="background-video" id="short-showreel">
				<source src="<?= $introductionFields['showreel_header_short_video']['url']; ?>" type="video/mp4">
			</video>

			<div class="introduction-outer-container">
				<div class="inner-section">
					<div class="container introduction-container">
						<h1 class="title"><?= $introductionFields['title'] ?></h1>
					</div>
				</div>
				
				<div class="showreel-section">
					<div class="special-container introduction-special-container">
						<span class="play-text">play showreel</span>
						<div class="play-button">
							<div class="triangle-button first-tri"></div>
							<div class="triangle-button"></div>
						</div>
					</div>
				</div>

				<div class="spacer-container"></div>

				<div class="full-video-overlay">
					<div class="video-inner-container">
						<div class="close-button">
							<span class="close-symbol">&#10005;</span>
						</div>
						<div class="video-player">
							<video id="full-showreel" class="video">
								<source src="<?= $introductionFields['showreel_video']['url']; ?>" type="video/mp4">
							</video>
							<div class="showreel-nav">
								<button class="o-play-btn playpausebtn">
									<i class="o-play-btn__icon">
										<div class="o-play-btn__mask"></div>
									</i>
								</button>
								
								<div class="vid-duration">
									<input class="seekslider" type="range" min="0" max="100" value="0" step="1">
									<div class="time-sec">
										<span class="curtimetext">00:00</span> / <span class="durtimetext">00:00</span>
									</div>
								</div>
								<div class="mutebtn">
									<img class="volume" src="/wp-content/uploads/2021/03/volume.png">	
									<img class="mute" src="/wp-content/uploads/2021/03/mute.png"/>	
								</div>
								<input class="volumeslider" type="range" min="0" max="100" value="100" step="1">
								<span class="fullscreenbtn"></span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="about-section padded-section">
			<div class="container about-container">
				<h2 class="about-title section-title" data-aos="fade-up" data-aos-duration="1000"><?= $aboutFields['title']; ?></h2>

				<div class="about-text section-text" data-aos="fade-up" data-aos-duration="1000"><?= $aboutFields['section_text']; ?></div>

				<div class="about-button arrow-button" data-aos="fade-up" data-aos-duration="1000">
					<a href="<?= $aboutFields['page_link']; ?>">
						<i class="arrow-right"></i>
						<span class="about-button-text button-text"><?= $aboutFields['page_link_text']; ?></span>
					</a>
				</div>
			</div>
		</section>

		<section class="projects-section padded-section">
			<div class="container projects-container">
				<h2 class="projects-title section-title" data-aos="fade-up" data-aos-duration="1000"><?= $projectsFields['title']; ?></h2>
				
				<div class="projects-list">
					<?php 
					$counter = 1;
					foreach($projectsFields['projects_list'] as $project){ ?>

						<div class="single-project <?= $counter > 4 ? 'mobile-hide' : '' ?>" data-aos="fade-up" data-aos-duration="1000">
							<a class="single-project-link" href="<?= get_permalink($project['project_object']->ID); ?>">
								<div class="single-project-image-holder">
									<?php 
									$asset = get_post_meta($project['project_object']->ID, "thumbnail_section");
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
										<h3 class="single-project-title"><?= $project['project_object']->post_title; ?></h3>

										<?php
											$categoriesArr = array();
											$industriesCategory = get_the_terms($project['project_object']->ID, 'industrycat');
											if($industriesCategory !== false){
												foreach($industriesCategory as $industryCategory){
													$categoriesArr[] = $industryCategory->name; 
												}
											}
											
											$servicesCategory = get_the_terms($project['project_object']->ID, 'servicecat');
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

					<?php
						$counter++;
					} ?>
				</div>
				
				<div class="projects-button arrow-button" data-aos="fade-up" data-aos-duration="1000">
					<a href="<?= $projectsFields['page_link']; ?>">
						<i class="arrow-right"></i>
						<span class="projects-button-text button-text"><?= $projectsFields['page_link_text']; ?></span>
					</a>
				</div>
			</div>
		</section>

		<section class="clients-section padded-section">
			<div class="container clients-container">
				<h2 class="clients-title section-title" data-aos="fade-up" data-aos-duration="1000"><?= $clientsFields['title']; ?></h2>

				<div class="clients-text section-text" data-aos="fade-up" data-aos-duration="1000"><?= $clientsFields['section_text']; ?></div>
			</div>

			<?php if($clientsFields['enable_row_one'] !== false){ ?>
				<div class="clients-list first-row infinite-slideshow-gallery" data-aos="fade-up" data-aos-duration="1000">
					<div class="clients-slideshow-row image-slideshow-row" style="grid-template-columns: repeat(<?= count($clientsFields['clients_row_one']); ?>, 1fr);">
						<?php 
						foreach($clientsFields['clients_row_one'] as $client){
							$image = get_field('blue_logo', $client['client_object']->ID); ?>
							
							<img src="<?= $image['url']; ?>" alt="<?= $image['alt']; ?>">
						<?php } ?>
					</div>

					<div class="clients-slideshow-row image-slideshow-row" style="grid-template-columns: repeat(<?= count($clientsFields['clients_row_one']); ?>, 1fr);">
						<?php 
						foreach($clientsFields['clients_row_one'] as $client){
							$image = get_field('blue_logo', $client['client_object']->ID); ?>
							
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
							$image = get_field('blue_logo', $client['client_object']->ID); ?>
							
							<img src="<?= $image['url']; ?>" alt="<?= $image['alt']; ?>">
						<?php } ?>
					</div>

					<div class="clients-slideshow-row image-slideshow-row" style="grid-template-columns: repeat(<?= count($clientsFields['clients_row_two']); ?>, 1fr);">
						<?php 
						foreach($clientsFields['clients_row_two'] as $client){
							$image = get_field('blue_logo', $client['client_object']->ID); ?>
							
							<img src="<?= $image['url']; ?>" alt="<?= $image['alt']; ?>">
						<?php } ?>
					</div>
				</div>
			<?php } ?>
		</section>
	</main><!-- #main -->

<?php
get_footer();