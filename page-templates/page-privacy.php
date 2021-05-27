<?php /* Template Name: Privacy Page Template */

get_header();
$fields = get_fields();

$introductionFields = $fields['introduction_section'];
?>

<main id="primary" class="site-main privacy-main">
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

	<section class="content-section priority-section padded-section">
		<div class="container content-container">
			<div class="text-section"  data-aos="fade-up" data-aos-duration="1000">
				<div class="post-content">
					<?= the_content(); ?>
				</div>
			</div>
		</div>
	</section>
</main><!-- #main -->

<?php
get_footer();