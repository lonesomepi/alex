<?php
/*
 * Template Name: Fall 2020 Convocation
 * Template Post Type: page
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta property="og:title" content="<?php echo get_the_title();?>" />
	<meta property="og:image" content="<?php echo get_the_post_thumbnail_url(get_the_ID(),'square-crop'); ?>" />
	<meta property="og:image:type" content="image/jpeg" />
	<meta property="og:image:width" content="500" />
	<meta property="og:image:height" content="400" />
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>

	<link rel="icon" href="<?php echo get_stylesheet_directory_uri().'/assets/images/favicon/favicon.ico' ?>" >
	<link rel="apple-touch-icon" href="<?php echo get_stylesheet_directory_uri().'/assets/images/favicon/favicon-180.png' ?>">
	<link rel="stylesheet" type="text/css" href="https://cloud.typography.com/6019574/7283992/css/fonts.css" />
	<meta name="msapplication-TileColor" content="#00529b">
	<meta name="msapplication-TileImage" content="<?php echo get_stylesheet_directory_uri().'/assets/images/favicon/favicon-144.png' ?>">
	<script src="https://kit.fontawesome.com/79e986c029.js" crossorigin="anonymous"></script>
</head>

<?php
	// "NULL" time variable for special, date-based, behaviors -- i think it does nothing at the moment.
  $date_theDay = false;

	/*

		Notes:
			$majors:
			 -- check social media formatting, some folks did "@" some did literal URLs
			 -- additional fields added like, "contact", "website_ii", "zoom_passcode",
			 -- [FIL] French & Francophone Studies, Chinese, Italian... were added as a majors, and commented out
			 -- Soc / Crim  has a youtube video -- "Criminology" was put after "Soc/Crim"
			 -- linguistics has a PDF
			 -- mathematics has a twitter social media account
			 -- created "non-majors" array after $majors ends
		$non_major:
			-- "University of Florida Speech and Debate" doesn't have an end time. Just: "7:00pm"
	*/

	include("include/lists.php");
?>

<body <?php body_class(); ?>>
  <img class="background" src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) .'images/century-tower-background.jpg'?>" alt="Century Tower background image with blue overlay" />
  <div class="link-landing" id="top"></div>
	<header>
    <div class="fixed-header">
      <div class="top-mobile-header">
        <div class="uf-wordmark">
					<?php include("svg/image_mobile_clasWordmark.svg"); ?>
         <span class="SVGaltText">University of Florida</span>
        </div>
       <h1>
         <span class="mobile">
					 <?php include("svg/image_mobile_header.svg"); ?>
				<span class="SVGaltText">College of Liberal Arts and Sciences</span></span>
        <span class="tablet">College of Liberal Arts and Sciences</span>
       </h1>
      </div>
    </div>

		  <div class="mobile-menu" id="menuToggle">
		    <input type="checkbox" aria-label="hamburger-menu-toggle" />
        <div class="hamburger-menu-icon">
  		    <span></span>
  		    <span></span>
  		    <span></span>
        </div>

		    <div id="menu">
          <div class="top-hamburger-menu">
            <div class="uf-wordmark">
							<?php include("svg/image_mobile_ufWordmark.svg"); ?>
             <span class="SVGaltText">University of Florida</span>
            </div>
           <span class="mobile">
						<?php include("svg/image_mobile_menu.svg"); ?>
				 		<span class="SVGaltText">College of Liberal Arts and Sciences</span></span>
         		<span class="tablet">College of Liberal Arts and Sciences</span>
          </div>
					<nav role="navigation">
							<ul>
								<li><a href="#top">Home</a></li>
								<li><a href="#welcome-video">Welcome Video</a></li>
                <li><a href="#academics">Academics</a></li>
                <li><a href="#curricular">Co & Extra Curricular</a></li>
								<li><a href="#social-media">Social Media</a></li>
							</ul>
						</nav>
          <div class="tablet-banner">
            <p>Convocation — Fall 2020</p>
          </div>
		    </div>
		  </div>
			<!-- end /mobile menu  -->


      <nav class="desktop-menu" role="navigation">
        <ul>
					<li><a href="#top">Home</a></li>
					<li><a href="#welcome-video">Welcome Video</a></li>
					<li><a href="#academics">Academics</a></li>
					<li><a href="#curricular">Co & Extra Curricular</a></li>
					<li><a href="#social-media">Social Media</a></li>
        </ul>
      </nav>
  </header>


  <div class="header-divider"></div>
  <main>
    <section id="container_graph_headers">
      <div class="inner-container">
        <h2 class="visuallyhidden">Introduction</h2>
        <p class="graph_header">University of Florida</p>
        <p id="graph_header_titleSlug">College <span>of</span> Liberal Arts <span>and</span> Sciences</p>
        <p class="graph_header">New Student Convocation</p>

  			<!--  Flower Icon -->
        <div class="flower-icon">
  				<span class="border-before-after">
						<?php include("svg/image_flowerIcon.svg"); ?>
					</span>
  			</div>

        <p class="ceremony-date">— August 28, 2020 —</p>

  			<!-- replace image -->
  			<div class="clas-graduation-crest">
						<?php include("svg/image_ufWings.svg"); ?>
  			</div>
      </div>
    </section>

		<!-- 1. Welcome Message -->
    <div class="link-landing" id="welcome-video"></div>
		<section class="virtual-ceremony section-container">
      <div class="inner-container">
  			<!-- <h3>Dean's Message</h3> -->
  			<h2 class="congratulations">WELCOME</h2>
  			<p class="from-message">to the College of Liberal Arts & Sciences</p>
  			<iframe src="https://www.youtube.com/embed/89AY-kZovXM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" title="Dean's Message Video" allowfullscreen></iframe>

        <!--  Flower Icon -->
        <div class="flower-icon">
          <span class="border-before-after">
						<?php include("svg/image_flowerIcon.svg"); ?>
					</span>
        </div>
      </div>
    </section>

		<!-- 2. Open House Academic -->
    <div class="link-landing" id="academics"></div>
		<section class="major-recognition section-container open-house">
      <div class="inner-container">
  			<!-- <h3>Associate Dean's Message</h3> -->
  			<h2 class="congratulations">Open House - Academics</h2>
  			<p class="from-message">Join us for an open house! Please click on the individual majors or centers below for more information.</p>

  			<div class="majors-container">
  				<?php ufclas_convocation_modals_list($majors); ?>
  			</div>
      </div>
		</section>

		<!-- 3. Open House Co/Extra Curricular -->
		<div class="link-landing" id="curricular"></div>
		<section class="major-recognition section-container open-house">
			<div class="inner-container">
				<!-- <h3>Associate Dean's Message</h3> -->
				<h2 class="congratulations">Open House - Co & Extra Curricular</h2>
				<p class="from-message">Join us for an open house! Please click on the individual majors or centers below for more information.</p>

				<div class="majors-container">
					<?php ufclas_convocation_curricular_modals_list($curricular); ?>
				</div>
			</div>
		</section>

		<!-- 4. Social Media -->
    <div class="link-landing" id="social-media"></div>
  		<section class="social-media section-container">
        <h2 class="visuallyhidden">Social Media</h2>
        <div class="inner-container">
          <div class="instagram-intro">
            <?php include("svg/image_instagram.svg"); ?>
            <p>Instagram</p>
          </div>

    			<!-- <h3>Associate Dean's Message</h3> -->
    			<?php echo do_shortcode('[instagram-feed whitelist="1"]'); ?>
        </div>
  		</section>
	</main>

	<footer>
		<div class="clas-wordmark">
			<a href="https://clas.ufl.edu" target="_blank">
				<?php include("svg/image_clasWordmark.svg"); ?>
			</a>
		</div>
		<div class="journeys-wordmark">
			<?php include("svg/image_journeys.svg"); ?>
		</div>
	</footer>

	<script src="http://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
<?php wp_footer(); ?>
<script type="text/javascript">
// this stops the video from playing in the iframe after the modal is closed
<?php foreach ($majors as $key => $list_value) { ?>
  jQuery("#<?php echo $list_value['modal_string']; ?>").on('hidden.bs.modal', function (e) {
      jQuery("#<?php echo $list_value['modal_string']; ?> iframe").attr("src", jQuery("#<?php echo $list_value['modal_string']; ?> iframe").attr("src"));
  });
<?php } ?>
</script>
</body>
</html>
