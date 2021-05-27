<?php 
get_header();
global $post;
$fields = get_fields();

$projectHeaderSection = $fields['header_section'];
$projectDetails = $fields['project_details'];
$project_videos_and_images = $fields['project_videos_and_images'];

$industries = get_the_terms($post->ID, 'industrycat');
$services = get_the_terms($post->ID, 'servicecat');



?>
	<main id="primary" class="site-main single-post-main single-project-main">

		<section class="introduction-section">
			<?php 
				if(!$projectHeaderSection['change_to_header_image'] && !$projectHeaderSection['project_header_image']){
					?>
					<img src="<?= get_the_post_thumbnail_url(); ?>" alt="<?= get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true ); ?>">
					<?php 
				}
				else if($projectHeaderSection['change_to_header_image']){
					?><img src="<?= $projectHeaderSection['project_header_image']['url']; ?>" alt="Image of the project being described, that of <?= $projectDetails['comany_name']; ?>"><?php	
				}
				else if(!$projectHeaderSection['change_to_header_image'] && !$projectHeaderSection['project_header_video']){
					?><img src="<?= get_the_post_thumbnail_url(); ?>" alt="<?= get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true ); ?>"> <?php
				}
				else{
					?>
					<video poster="<?= $projectHeaderSection['project_header_image']['url']; ?>" alt="<?= $projectHeaderSection['project_header_image']['alt']; ?>" autoplay="autoplay" loop="loop" muted="muted" playsinline="" class="background-video" id="short-showreel" >
						<source src="<?= $projectHeaderSection['project_header_video']['url']; ?>" type="video/mp4">
					</video>
					<?php 
				}?>
		</section>
		<section class="content-section priority-section padded-section">
			<div class="container content-container">
				<div class="header-section" data-aos="fade-up" data-aos-duration="1000">
					<a href="/projects" class="go-back">
						<div class="back-button arrow-button">
							<i class="arrow-right"></i>
							<span class="back-button-text button-text">&nbsp;</span>
						</div>
						<span class="section-title">Projects</span>
					</a>

					<h1 class="post-title"><?= the_title(); ?></h1>
					<h2 class="client-name"><?= $projectDetails['company_name']; ?></h2>
					<div class="cat-sec-services-industry">
						<?php 
						if($industries){ ?>
						<h3>Industries</h3>
						<div class="list-container">
							<ul>
								<?php
									foreach ( $industries as $term ) {
										?>
										<a href="/industrycat/<?= $term->slug; ?>"> <?php echo $term->name; ?></a>
										<?php
									}?>
							</ul>
						</div>
						<?php } 
						if($services){ ?>
							<h3>Services</h3>
							<div class="list-container">
								<ul> 
									<?php
									foreach ( $services as $term ) {
										?>
										<a href="/servicecat/<?= $term->slug; ?>"> <?php echo $term->name; ?></a>
										<?php
									}
									?>
								</ul>
							</div>
							<?php
						}
						?>
					</div>
					
				</div>
			</div>
		</section>
		
		<section class="short-description-section priority-section project-paragraph-section">
			<div class="container description-container">
				<h2 class="description-title section-title" data-aos="fade-up" data-aos-duration="1000"><?= $projectDetails['the_brief']['brief_title']; ?></h2>

				<div class="description-text section-text" data-aos="fade-up" data-aos-duration="1000">
					<p>
						<?= $projectDetails['the_brief']['the_brief_desc']; ?>
					</p>
				</div>
			</div>
		</section>
	
		<section class="description-section padded-section priority-section project-paragraph-section">
			<?php foreach($projectDetails['title_and_desc'] as $section){ ?>
					<div class="container description-container">
						<h2 class="description-title section-title" data-aos="fade-up" data-aos-duration="1000"><?= $section['title_of_section']; ?></h2>

						<div class="description-text section-text" data-aos="fade-up" data-aos-duration="1000"><p><?= $section['section_content']; ?></p></div>
					</div>
			<?php } ?>
		</section>

		<div class="read-more-project priority-section">
			<div class="container">
				<div class="arrow-button">
					<i class="arrow-right"></i>
					<span class="single-listing-button-text button-text">Learn more.</span>
				</div>
				<div class="section-separator">
				</div>
			</div>
		</div>


		<section class="padded-section priority-section project-images-videos-section">
			<?php foreach($project_videos_and_images as $section){
				?>
				<div class="media-section">
				<?php
					if($section['change_to_image_only']){?>
						<img src="<?=  $section['content_project_image']['url'];?>" alt="<?=  $section['content_project_image']['alt'];?>">
					<?php 
					}
					else {?>
						<video id="full-showreel" class="video" alt="<?= $section['content_project_video']['alt']; ?>" muted loop autoplay playsinline>
							<source src="<?= $section['content_project_video']['url']; ?>"  type="video/mp4">
						</video>						
					<?php 
					}
					?>
				</div>	
			<?php } ?>
		</section>
	</main><!-- #main -->
<?php
get_footer();