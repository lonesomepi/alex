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
  $date_theDay = false;

	/*
		Notes:
			 -- check social media formatting, some folks did "@" some did literal URLs
			 -- check for additional fields like, "contact", "website_ii", "zoom_passcode",
			 -- [FIL] French & Francophone Studies, Chinese, Italian... added as a majors, commented out
			 -- Soc / Crim has a youtube video

			 -- created "non-majors" array after $majors ends


	*/
  $majors = array(

  	"African American Studies" => array(
      "image"        => "https://clas.ufl.edu/files/2018/08/20130523-civil-rights-768x768.jpg",
      "modal_string" => "modal_africanamericanstudies",
			"date"				 => "August 28, 12:30pm - 1:00pm"
			// "date"				 => "August 23, 1pm-3pm",                 // this was different in the Zoom Info.xlsx
			// "zoom"				 => "https://ufl.zoom.us/j/95995387347",  // this was different in the Zoom Info.xlsx
			"zoom"				 => "https://ufl.zoom.us/j/6130344353?pwd=bndYbFpRMG43R2VXWEk2MURaSXl1Zz09",
			"website"			 => "https://afam.clas.ufl.edu/",
			"facebook"		 => "https://www.facebook.com/groups/126930330689448/",
			"instagram"		 => "https://www.instagram.com/africa_uf/?hl=en",
			"linkedin"		 => "https://www.linkedin.com/",
    ),

  	"Anthropology" => array(
      "image"        => "https://clas.ufl.edu/files/2018/06/AdobeStock_45471701-768x768.jpg",
      "modal_string" => "modal_anthropology",
			"date"				 => "August 28, 1:00pm - 1:30pm",
			"zoom"				 => "",
			"website"			 => "",
			"facebook"		 => "",
			"instagram"		 => "",
			"linkedin"		 => "",
    ),

  	"Astronomy / Astrophysics" => array(
      "image"        => "https://clas.ufl.edu/files/2018/06/heic0604a-copy-768x768.jpg",
      "modal_string" => "modal_astronomyastrophysics",
			"date"				 => "August 28, 1:30pm - 2:00pm",
			"zoom"				 => "https://ufl.zoom.us/j/94709338895",
			"website"			 => "https://www.astro.ufl.edu/undergraduate-studies/",
			"facebook"		 => "",
			"instagram"		 => "",
			"linkedin"		 => "",
    ),

  	"Biology / Botany / Zoology" => array(
      "image"        => "https://clas.ufl.edu/files/2018/06/AdobeStock_79547141-copy-768x768.jpg",
      "modal_string" => "modal_biologybotanyzoology",
			"date"				 => "August 28, Biology/Botany/Zoology	3:30pm - 4:00pm",
			"zoom"				 => "",
			"website"			 => "",
			"facebook"		 => "",
			"instagram"		 => "",
			"linkedin"		 => "",
    ),

  	"Chemistry / Biochemistry" => array(
      "image"        => "https://clas.ufl.edu/files/2018/06/AdobeStock_69081385-copy-768x768.jpg",
      "modal_string" => "modal_chemistrybiochemistry",
			"date"				 => "August 28, 3:30pm - 4:00pm",
			"zoom"				 => "https://ufl.zoom.us/j/96692201649",
			"website"			 => "https://www.chem.ufl.edu/",
			// "website_ii"  => "https://saacs.chem.ufl.edu/", // club group
			"facebook"		 => "https://www.facebook.com/UFChemistry/?lang=en",
			"instagram"		 => "",
			"linkedin"		 => "",
    ),

  	"Classical Studies" => array(
      "image"        => "https://clas.ufl.edu/files/2018/06/AdobeStock_74640910-768x768.jpg",
      "modal_string" => "modal_classicalstudies",
			"date"				 => "August 28, 12:30pm - 1pm",
			"zoom"				 => "https://ufl.zoom.us/j/93065457057?pwd=R0VYOW1jT2wvNVlKeVRraWw4YUhBUT09",
			"website"			 => "https://classics.ufl.edu/",
			"facebook"		 => "https://www.facebook.com/UFClassics/",
			"instagram"		 => "",
			"linkedin"		 => "",
    ),

  	"Computer Science" => array(
      "image"        => "https://clas.ufl.edu/files/2018/08/kevin-364843-unsplash-768x768.jpg",
      "modal_string" => "modal_computerscience",
			"date"				 => "August 28, 12:30pm - 1:00pm",
			"zoom"				 => "https://ufl.zoom.us/j/4755418272",
			"website"			 => "",
			"facebook"		 => "",
			"instagram"		 => "",
			"linkedin"		 => "",
    ),

  	"Economics" => array(
      "image"        => "https://clas.ufl.edu/files/2018/06/AdobeStock_96784677-768x768.jpg",
      "modal_string" => "modal_economics",
			"date"				 => "August 28, 2:00pm - 2:30pm",
			"zoom"				 => "https://ufl.zoom.us/j/94946059416?pwd=Y3k3Sk4wKy8rTXROMlNpR1l6VzN2UT09",
			// "zoom_id"      => "949 4605 9416",
			// "zoom_passcode" => "Passcode: Economics",
			"website"			 => "https://economics.clas.ufl.edu/",
			// "course_catalog" => "https://catalog.ufl.edu/UGRD/colleges-schools/UGLAS/ECO_BA/",
			"facebook"		 => "",
			"instagram"		 => "",
			"linkedin"		 => "",
    ),

  	"English" => array(
      "image"        => "https://clas.ufl.edu/files/2018/06/AdobeStock_69733834-copy-768x768.jpg",
      "modal_string" => "modal_english",
			"date"				 => "August 28, 3:30pm - 4:00pm",
			"zoom"				 => "https://ufl.zoom.us/j/91426451372?pwd=WWo1NzQvbXNrNXZNek1wV3gzK2VNQT09",
			"zoom_id"      => "914 2645 1372",
			"zoom_passcode" => "337162",
			"website"			 => "http://www.english.ufl.edu",
			"facebook"		 => "",
			"instagram"		 => "",
			"linkedin"		 => "",
    ),

  	"Foreign Languages and Literatures" => array(
      "image"        => "https://clas.ufl.edu/files/2018/08/AdobeStock_66118249-copy-768x768.jpg",
      "modal_string" => "modal_foreignlanguagesandliteratures",
			"date"				 => "August 28,",
			"zoom"				 => "",
			"website"			 => "",
			"facebook"		 => "",
			"instagram"		 => "",
			"linkedin"		 => "",
    ),

/*
	FLL, FLL, FLL, FLL, FLL, FLL, FLL, FLL, FLL, FLL, FLL, FLL
	FLL, FLL, FLL, FLL, FLL, FLL, FLL, FLL, FLL, FLL, FLL, FLL
	FLL, FLL, FLL, FLL, FLL, FLL, FLL, FLL, FLL, FLL, FLL, FLL

  	"French & Francophone Studies" => array(
      "image"        => "",
      "modal_string" => "",
			"date"				 => "August 28, 4:00pm - 4:30pm",
			"zoom"				 => "https://ufl.zoom.us/j/96835341963?pwd=UFdiRitCdmRtWEpmdFJFL09XQ0NxUT09",
			"zoom_passcode" => "116496",
			"website"			 => "https://catalog.ufl.edu/UGRD/colleges-schools/UGLAS/FFR_BA/",
			// "website_ii"   => "https://news.clas.ufl.edu/department-newsletters/ffs-newsletter/",
			"facebook"		 => "https://www.facebook.com/University-of-Florida-French-Alumni-Friends-213490458791328",
			"instagram"		 => "",
			"linkedin"		 => "",
    ),

		"General/Arabic" => array(
			"image"        => "",
			"modal_string" => "",
			"date"				 => "August 28, 4:00pm - 4:30pm",
			"zoom"				 => "https://ufl.zoom.us/j/95195579496",
			"website"			 => "http://languages.ufl.edu/",
			// "website_ii" => "https://catalog.ufl.edu/UGRD/colleges-schools/UGLAS/FAR_BA/",
			// "website_iii" => "https://catalog.ufl.edu/UGRD/colleges-schools/UGLAS/ALL_UMN/",
			"facebook"		 => "",
			"instagram"		 => "",
			"linkedin"		 => "",
		),

		"Vietnamese" => array(
			"image"        => "",
			"modal_string" => "",
			"date"				 => "August 28, 4:00pm - 4:30pm",
			"zoom"				 => "https://ufl.zoom.us/j/97972550766",
			"website"			 => "https://languages.ufl.edu/academics/llc-languages/vietnamese-studies/",
			"facebook"		 => "",
			"instagram"		 => "",
			"linkedin"		 => "",
		),

		"Chinese" => array(
			"image"        => "",
			"modal_string" => "",
			"date"				 => "August 28, 4:30pm - 5:00pm",
			"zoom"				 => "https://ufl.zoom.us/j/3552260266",
			"website"			 => "https://languages.ufl.edu/academics/llc-languages/chinese-studies/",
			// "website_ii"   => "https://catalog.ufl.edu/UGRD/colleges-schools/UGLAS/FCH_BA/",
			// "website_iii"  => "https://catalog.ufl.edu/UGRD/colleges-schools/UGLAS/EAC_EAJ_UMN/",
			"facebook"		 => "",
			"instagram"		 => "",
			"linkedin"		 => "",
		),

		"Italian" => array(
			"image"        => "",
			"modal_string" => "",
			"date"				 => "August 28, 4:30pm - 5:00pm",
			"zoom"				 => "https://ufl.zoom.us/j/94464499121",
			"website"			 => "https://languages.ufl.edu/academics/llc-languages/italian-studies/",
			"facebook"		 => "",
			"instagram"		 => "",
			"linkedin"		 => "",
		),

		"Russian" => array(
			"image"        => "",
			"modal_string" => "",
			"date"				 => "August 28, 4:30pm - 5:00pm",
			"zoom"				 => "https://ufl.zoom.us/my/gorham",
			"website"			 => "https://languages.ufl.edu/academics/llc-languages/russian-studies/",
			"facebook"		 => "",
			"instagram"		 => "",
			"linkedin"		 => "",
		),

		"German" => array(
			"image"        => "",
			"modal_string" => "",
			"date"				 => "August 28, 4:30pm - 5:00pm",
			"zoom"				 => "https://ufl.zoom.us/j/93730762422?pwd=eGIvMHRBdWozVzFKcEZVYWZwUU9BZz09",
			"website"			 => "https://languages.ufl.edu/academics/llc-languages/german-studies/",
			"facebook"		 => "",
			"instagram"		 => "",
			"linkedin"		 => "",
		),

		"" => array(
			"image"        => "",
			"modal_string" => "",
			"date"				 => "August 28,",
			"zoom"				 => "",
			"website"			 => "",
			"facebook"		 => "",
			"instagram"		 => "",
			"linkedin"		 => "",
		),

*/

  	"Geography" => array(
      "image"        => "https://clas.ufl.edu/files/2018/06/AdobeStock_149933617-copy-768x768.jpg",
      "modal_string" => "modal_geography",
			"date"				 => "August 28, 3:00pm - 3:30pm",
			"zoom"				 => "https://ufl.zoom.us/j/9569627316",
			"website"			 => "https://geog.ufl.edu/programs/",
			"facebook"		 => "",
			"instagram"		 => "@ufspanishportuguese",
			"linkedin"		 => "",
			// "contact" => "Dr. Liang Mao liangmao@ufl.edu",
    ),

  	"Geology" => array(
      "image"        => "https://clas.ufl.edu/files/2018/06/AdobeStock_25662101-copy-1-768x768.jpg",
      "modal_string" => "modal_geology",
			"date"				 => "August 28, 1:30pm - 2:00pm",
			"zoom"				 => "https://ufl.zoom.us/j/4131442564?pwd=Yk1wY1VpYUtjUjhSZitiTk1BOWZnUT09",
			// "zoom_passcode" => "123987";
			"website"			 => "https://geology.ufl.edu",
			"facebook"		 => "https://www.facebook.com/groups/19707529493/",
			"instagram"		 => "",
			"linkedin"		 => "",
			// "twitter"      => "https://twitter.com/ufgeology?lang=en",
			// "contact info" => "Dr. Joseph Meert, Undergraduate Coordinator jmeert@ufl.edu"
    ),

  	"History" => array(
      "image"        => "https://clas.ufl.edu/files/2018/09/time-100-influential-photos-lunch-atop-skyscraper-19-768x768.jpg",
      "modal_string" => "modal_history",
			"date"				 => "August 28, 2:00pm - 2:30pm",
			"zoom"				 => "https://ufl.zoom.us/j/97247132715",
			"zoom_id"      => "972 4713 2715",
			"website"			 => "http://history.ufl.edu",
			"facebook"		 => "https://www.facebook.com/ufhistory/",
			"instagram"		 => "",
			"linkedin"		 => "",
    ),

  	"Interdisciplinary Studies" => array(
      "image"        => "https://clas.ufl.edu/files/2018/08/AdobeStock_214143167-web-768x768.jpeg",
      "modal_string" => "modal_interdisciplinarystudies",
			"date"				 => "August 28, 1:00pm - 1:30pm",
			"zoom"				 => "https://ufl.zoom.us/j/95145876956",
			"website"			 => "https://clas.ufl.edu/undergraduate/interdisciplinary-studies/",
			"facebook"		 => "",
			"instagram"		 => "",
			"linkedin"		 => "",
    ),

  	"International Studies" => array(
      "image"        => "https://clas.ufl.edu/files/2018/08/AdobeStock_74118907-copy-768x768.jpg",
      "modal_string" => "modal_internationalstudies",
			"date"				 => "August 28, 3:30pm - 4:00pm",
			"zoom"				 => "https://ufl.zoom.us/j/91498381789",
			"website"			 => "https://bobgrahamcenter.ufl.edu/academics/international-studies-major/",
			"facebook"		 => "https://www.facebook.com/grahamcenter/",
			"instagram"		 => "https://www.instagram.com/bobgrahamcenter/?hl=en",
			"linkedin"		 => "",
    ),

		"Jewish Studies" => array(
			"image"        => "https://clas.ufl.edu/files/2018/06/AdobeStock_100911292-768x768.jpg",
			"modal_string" => "modal_internationalstudies",
			"date"				 => "August 28,",
			"zoom"				 => "",
			"website"			 => "",
			"facebook"		 => "",
			"instagram"		 => "",
			"linkedin"		 => "",
		),

  	"Linguistics" => array(
      "image"        => "https://clas.ufl.edu/files/2018/06/AdobeStock_126831597-768x768.jpeg",
      "modal_string" => "modal_linguistics",
			"date"				 => "August 28, 2:00pm - 2:30pm",
			// SKYPE, SKYPE, SKYPE
			"zoom"				 => "https://ufl.zoom.us/skype/91226781208",
			"website"			 => "https://lin.ufl.edu/",
			"facebook"		 => "https://www.facebook.com/UFLinguistics",
			"instagram"		 => "",
			"linkedin"		 => "",
			// "twitter"      => "https://twitter.com/UFLinguistics"
			// "document"     => "Linguistics_PDF.pdf",
    ),

  	"Mathematics" => array(
      "image"        => "https://clas.ufl.edu/files/2018/06/AdobeStock_91532560-768x768.jpg",
      "modal_string" => "modal_mathematics",
			"date"				 => "August 28, 3:00pm - 3:30pm",
			"zoom"				 => "https://ufl.zoom.us/j/93435944839",
			"website"			 => "https://math.ufl.edu/mathematics-major/",
			// "website_ii"   => "https://math.ufl.edu/courses/undergraduate-advising/",
			"twitter"      => "@UF_SpanPort",
			"facebook"		 => "",
			"instagram"		 => "",
			"linkedin"		 => "",
    ),

	 	// microbiology wanted to link to a highly specific facebook post, but I'm assuming that was unintended: https://www.facebook.com/UFMicrobiology/posts/3736574403026589?comment_id=3736685843015445&reply_comment_id=3736709186346444&notif_id=1597172159178313&notif_t=feed_comment&ref=notif
  	"Microbiology &amp; Cell Science" => array(
      "image"         => "https://clas.ufl.edu/files/2019/01/AdobeStock_92945897-1-768x768.jpeg",
      "modal_string"  => "modal_microbiologycellscience",
			"date"				  => "August 28, 2:30pm - 3:00pm",
			"zoom"				  => "https://ufl.zoom.us/j/2916037397",
			"zoom_passcode" => "Microbe",
			"website"			  => "http://microcell.ufl.edu/",
			"facebook"		  => "https://www.facebook.com/UFMicrobiology",
			"instagram"		  => "",
			"linkedin"		  => "",
    ),

  	"Philosophy" => array(
      "image"        => "https://clas.ufl.edu/files/2018/06/AdobeStock_50029495-768x768.jpg",
      "modal_string" => "modal_philosophy",
			"date"				 => "August 28, 2:30pm - 3:00pm",
			"zoom"				 => "https://ufl.zoom.us/j/96630919673",
			"website"			 => "https://phil.ufl.edu/",
			// "website_ii"   => "https://phil.ufl.edu/what-is-philosophy/",
			// "website_iii"  => "https://phil.ufl.edu/undergraduate-studies-in-philosophy-at-uf/",
			"facebook"		 => "https://www.facebook.com/ufphilosophy/",
			"instagram"		 => "",
			"linkedin"		 => "",
			// "contact"      => "Dr. Gene Witmer (gwitmer@ufl.edu)",
			// "contact_ii"   => "Dr. Arina Pismenny (arinapismenny@ufl.edu)",
    ),

  	"Physics" => array(
      "image"        => "https://clas.ufl.edu/files/2018/06/AdobeStock_102065176-768x768.jpg",
      "modal_string" => "modal_physics",
			"date"				 => "August 28, 3:00pm - 3:30pm",
			"zoom"				 => "https://ufl.zoom.us/j/94044683758?pwd=dk80Q3Fjc1V5Zm5pNXJ6TUV1QUJmdz09",
			// "zoom_id"      => "940 4468 3758",
			// "zoom_passcode" => "544552",
			"website"			 => "https://www.phys.ufl.edu/wp/index.php/undergraduate/",
			"facebook"		 => "https://www.facebook.com/UFPhysics/",
			"instagram"		 => "",
			"linkedin"		 => "",
    ),

  	"Political Science" => array(
      "image"        => "https://clas.ufl.edu/files/2018/06/AdobeStock_75957404-copy-1-768x768.jpg",
      "modal_string" => "modal_politicalscience",
			"date"				 => "August 28, 1:30pm - 2:00pm",
			"zoom"				 => "",
			"website"			 => "",
			"facebook"		 => "",
			"instagram"		 => "",
			"linkedin"		 => "",
    ),

  	"Psychology" => array(
      "image"        => "https://clas.ufl.edu/files/2018/06/AdobeStock_79538106-768x768.jpg",
      "modal_string" => "modal_psychology",
			"date"				 => "August 28, 3:00pm - 3:30pm",
			"zoom"				 => "https://ufl.zoom.us/j/98020368376",
			"website"			 => "https://psych.ufl.edu/",
			"facebook"		 => "",
			"instagram"		 => "",
			"linkedin"		 => "",
			"contact"      => "Ron Chandler, Ph.D.  ronchandler@ufl.edu",
    ),

  	"Religion" => array(
      "image"        => "https://clas.ufl.edu/files/2018/12/peter-hershey-113988-unsplash-768x768.jpg",
      "modal_string" => "modal_religion",
			"date"				 => "August 28, 1:30pm - 2:00pm",
			"zoom"				 => "https://ufl.zoom.us/j/91233609852?pwd=aGFUKzB0K1JYM0pPeXloS21seHh0QT09",
			"website"			 => "https://religion.ufl.edu",
			"facebook"		 => "",
			"instagram"		 => "",
			"linkedin"		 => "",
    ),

  	"Sociology / Criminology" => array(
      "image"        => "https://clas.ufl.edu/files/2018/06/AdobeStock_169349498-768x768.jpg",
      "modal_string" => "modal_sociology",
			"date"				 => "August 28, 1:00pm - 1:30pm",
			"zoom"				 => "https://ufl.zoom.us/j/7488310005",
			// "zoom_passcode"      => "748 831 0005",
			"website"			 => "https://soccrim.clas.ufl.edu/",
			"facebook"		 => "",
			"instagram"		 => "",
			"linkedin"		 => "",
			//"youtube_url"  => "https://youtu.be/lDC_vuzrfrU",
    ),

  	"Spanish / Portuguese Studies" => array(
      "image"        => "https://clas.ufl.edu/files/2018/06/AdobeStock_78600516-768x768.jpeg",
      "modal_string" => "modal_spanishportuguese",
			"date"				 => "August 28, 2:30pm - 3:00pm",
			"zoom"				 => "https://ufl.zoom.us/j/3522733749?pwd=angyL3ZjUDhkVitnelV5cWh2cFVJZz09",
			// "zoom_id"      => "3522733749",
			// "zoom_passcode" => "1688",
			// HTTP ? https < --
			"website"			 => "http://spanishandportuguese.ufl.edu/undergraduate-programs/",
			"facebook"		 => "https://www.facebook.com/SPSUF",
			"instagram"		 => "",
			"linkedin"		 => "",
    ),

  	"Statistics" => array(
      "image"        => "https://clas.ufl.edu/files/2018/06/AdobeStock_59192777-768x768.jpeg",
      "modal_string" => "modal_statistics",
			"date"				 => "August 28, 1:00pm - 1:30pm",
			"zoom"				 => "https://ufl.zoom.us/j/95950391874?pwd=ZUplanBBYVBwVzJUdVdhWnh6OEM2dz09",
			"website"			 => "https://stat.ufl.edu/academics/undergraduate/",
			"facebook"		 => "",
			"instagram"		 => "",
			"linkedin"		 => "",
    ),

  	"Sustainability Studies" => array(
      "image"        => "https://clas.ufl.edu/files/2018/06/AdobeStock_168922056-copy-768x768.jpg",
      "modal_string" => "modal_sustainabilitystudies",
			"date"				 => "August 28, 4:00pm - 4:30pm",
			"zoom"				 => "https://ufl.zoom.us/j/5443276371",
			"website"			 => "https://sustainability.clas.ufl.edu/",
			"facebook"		 => "",
			"instagram"		 => "",
			"linkedin"		 => "",
    ),

  	"Women&#8217;s Studies" => array(
      "image"        => "https://clas.ufl.edu/files/2018/08/AdobeStock_104998817-copy-768x768.jpg",
      "modal_string" => "modal_womensstudies",
			"date"				 => "August 28, 2:00pm - 2:30pm",
			"zoom"				 => "https://ufl.zoom.us/j/98969657258?pwd=bkY3R0V3U0xsVU1BQTcxVWpRZDdoQT09",
			"website"			 => "https://wst.ufl.edu/",
			"facebook"		 => "",
			"instagram"		 => "@UF_CGSWSR",
			"linkedin"		 => "",
    )

  );


	$non_major = array(

		"Dial Center for Written &amp; Oral Communication" => array(
			"image"        => "",
			"modal_string" => "",
			"date"				 => "September 2, 3:30pm-5:30pm",
			"zoom"				 => "https://ufl.zoom.us/j/95685523807?pwd=eC90N3NIUmQ0SEtMbFBEMmVPMkY1QT09",
			// "zoom_id" => "956 8552 3807",
			// "zoom_passcode" => "874076",
			"website"			 => "https://cwoc.ufl.edu/programs/communications-studies-minor-sch/",
			"facebook"		 => "",
			"instagram"		 => "",
			"linkedin"		 => "",
			"contact"      => "Stephanie Webster, Associate Director, swebster@ufl.edu",
		),

		"Statistics Club at UF" => array(
			"image"        => "",
			"modal_string" => "",
			"date"				 => "September 1, 5:00pm-6:00pm",
			"zoom"				 => "https://ufl.zoom.us/j/91077838650",
			"website"			 => "",
			"facebook"		 => "https://www.facebook.com/groups/ufstatisticsclub/",
			"instagram"		 => "",
			"linkedin"		 => "",
		),

		"University of Florida Speech and Debate" => array(
			"image"        => "",
			"modal_string" => "",
			"date"				 => "September 8, 7:00pm - 8pm",
			"zoom"				 => "https://ufl.zoom.us/j/91611513809",
			"website"			 => "https://debate.cwoc.ufl.edu/",
			"facebook"		 => "https://www.facebook.com/UFspeechanddebate",
			"instagram"		 => "@ufspeechanddebate",
			"linkedin"		 => "",
			"contact"      => "Assistant Director of Forensics, Dr. Amy Martinelli acmart@ufl.edu",
		),

		"Center for European Studies" => array(
			"image"        => "",
			"modal_string" => "",
			"date"				 => "September 2, 5:00pm-6:00pm",
			"zoom"				 => "https://ufl.zoom.us/webinar/register/WN_o3FidtmQR3aL3X0UrVguig",
			"website"			 => "https://ces.ufl.edu/",
			"facebook"		 => "https://www.facebook.com/ces.ufl",
			"instagram"		 => "",
			"linkedin"		 => "",
			"contact"      => "Undergraduate Coordinator: Holly Raynard (hraynard@ufl.edu)",
			"contact_ii"   => "Academic Programs Coordinator: Corinne Tomasi (corie@ufl.edu)",
		),

	);


	$curricular = array(

  	"Club" => array(
      "image"        => "https://clas.ufl.edu/files/2020/02/instruments-768x768.jpg",
      "modal_string" => "modal_club",
			"date"				 => "August 23, 1pm-3pm",
			"zoom"				 => "https://google.com",
			"website"			 => "https://afam.clas.ufl.edu/",
			"facebook"		 => "https://www.facebook.com/groups/126930330689448/",
			"instagram"		 => "https://www.instagram.com/africa_uf/?hl=en",
			"linkedin"		 => "https://www.linkedin.com/",
    ),

  	"Group" => array(
      "image"        => "https://clas.ufl.edu/files/2019/08/montage-768x768.jpg",
      "modal_string" => "modal_group",
			"date"				 => "August 28,",
			"zoom"				 => "",
			"website"			 => "",
			"facebook"		 => "",
			"instagram"		 => "",
			"linkedin"		 => "",
    ),

		"Minor" => array(
			"image"        => "https://clas.ufl.edu/files/2019/01/1504_13_UF_Sofranko_191-1-1-768x768.jpg",
			"modal_string" => "modal_minor",
			"date"				 => "August 28,",
			"zoom"				 => "",
			"website"			 => "",
			"facebook"		 => "",
			"instagram"		 => "",
			"linkedin"		 => "",
		),

		"Organization" => array(
			"image"        => "https://clas.ufl.edu/files/2019/01/2018-08-16_Ustler_Hall-0916-1-768x768.jpg",
			"modal_string" => "modal_organization",
			"date"				 => "August 28,",
			"zoom"				 => "",
			"website"			 => "",
			"facebook"		 => "",
			"instagram"		 => "",
			"linkedin"		 => "",
		),


  );
?>

<body <?php body_class(); ?>>
  <img class="background" src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) .'images/century-tower-background.jpg'?>" alt="Century Tower background image with blue overlay" />

  <div class="link-landing" id="top"></div>
	<header>
    <div class="fixed-header">
      <div class="top-mobile-header">
        <div class="uf-wordmark">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 165.38 111.61"><defs><style>.uf-wordmark-svg{fill:#fff;}</style></defs><g class="Layer_2" data-name="Layer 2"><g class="Layer_1-2" data-name="Layer 1"><polygon class="uf-wordmark-svg" points="117.94 91.75 117.94 63.49 143.97 63.49 143.97 44.87 117.94 44.87 117.94 18.48 146.52 18.48 146.52 28.71 165.38 28.71 165.38 0 89.88 0 89.88 18.48 96.95 18.48 96.95 91.75 89.91 91.75 89.91 110.37 124.75 110.37 124.75 91.75 117.94 91.75"/><path class="uf-wordmark-svg" d="M80.06,68.66V18.47h7V0H52.12V18.47h6.81v44c0,18.42-2.13,27.27-15.36,27.27S28.21,80.84,28.21,62.42V18.47H35V0H0V18.47H6.93V68.66c0,11,0,19.94,5.17,28,5.78,9.14,16.27,14.94,31.47,14.94,26.91,0,36.49-14,36.49-42.95"/></g></g></svg>
         <span class="SVGaltText">University of Florida</span>
        </div>
       <h1>
         <span class="mobile"><svg xmlns="http://www.w3.org/2000/svg" wclassth="200" height="12.661" viewBox="0 0 200 12.661">
  			 	<g class="Group_809" data-name="Group 809" transform="translate(-704.164 -664.728)">
    				<path class="Path_241" data-name="Path 241" d="M707.125,665.446h2.809a1.123,1.123,0,0,1-.019.616c-1.444,0-1.713.019-1.79.1a10.57,10.57,0,0,0-.116,2.425c-.019,1.212-.019,1.886-.019,5.966a6.859,6.859,0,0,0,.077,1.77c.077.077.366.135,1.713.135,1.578,0,2.117-.058,2.424-.366s.655-1.058,1.27-3.54c.039-.1.539-.077.539.019-.019,1.309-.077,3.329-.154,4.445,0,.1-.058.154-.231.154-1.481-.039-3-.039-4.984-.039-2.136,0-3.252,0-4.445.02a1.182,1.182,0,0,1,.019-.635c1.4-.039,1.635-.019,1.712-.1s.077-.385.1-1.482c.019-2.348.077-4.6.077-6.967,0-1.385-.039-1.751-.116-1.828s-.308-.115-1.655-.115a1.123,1.123,0,0,1,.02-.616C705.2,665.408,706.22,665.446,707.125,665.446Z" transform="translate(0 -0.064)" fill="#fff"/>
    				<path class="Path_242" data-name="Path 242" d="M716.135,677.087c-.038,0-.038-.577.039-.577,1.058-.019,1.347-.038,1.424-.115.1-.1.115-.289.135-.712.019-.616.019-1.059.019-1.751,0-.751-.058-2.232-.077-3.041-.019-.481-.058-.673-.135-.75s-.231-.1-1.405-.115c-.057,0-.057-.578.02-.578.153,0,2.6-.038,3-.038.193,0,.251.038.251.173v4.426c0,1.751.115,2.29.211,2.386s.308.1,1.289.115c.1,0,.135.616.02.616C720.523,677.126,716.424,677.087,716.135,677.087Zm2.309-9.679a1.243,1.243,0,0,1-1.135-1.251,1,1,0,0,1,.308-.77,1.286,1.286,0,0,1,.981-.4,1.164,1.164,0,0,1,1.136,1.135A1.387,1.387,0,0,1,718.444,667.408Z" transform="translate(-1.122 -0.024)" fill="#fff"/>
    				<path class="Path_243" data-name="Path 243" d="M724.3,676.294c-.076,0-.4.288-1.019,1.039-.077.115-.52.038-.52-.116.039-.788.1-3.021.1-5.446,0-1.135-.057-3.772-.1-5.37-.019-.769-.038-.866-.1-.923s-.193-.077-1.328-.077c-.115,0-.115-.578-.019-.578,1.039-.019,2.348-.057,3.117-.1.135,0,.154.1.154.212,0,.423-.058,5.581-.058,6.158l.058.02a3.147,3.147,0,0,1,2.559-2.021,3.412,3.412,0,0,1,2.367,1.078,3.741,3.741,0,0,1,1.058,2.713,4.6,4.6,0,0,1-1.462,3.252,3.414,3.414,0,0,1-2.424,1.116A4.539,4.539,0,0,1,724.3,676.294Zm.5-4.638a2.95,2.95,0,0,0-.27,1.5,7.092,7.092,0,0,0,.173,2.521,2.469,2.469,0,0,0,1.79.9,1.727,1.727,0,0,0,1.616-1.019,5.169,5.169,0,0,0,.462-2.386,5.749,5.749,0,0,0-.4-2.425,1.232,1.232,0,0,0-1.251-.808C725.991,669.944,725.2,670.848,724.8,671.656Z" transform="translate(-1.606)" fill="#fff"/>
    				<path class="Path_244" data-name="Path 244" d="M740.577,675.382a3.561,3.561,0,0,1-3.348,2.405,4.583,4.583,0,0,1-3.31-1.328,3.757,3.757,0,0,1-1.1-2.771,4.075,4.075,0,0,1,1.193-2.809,4.031,4.031,0,0,1,2.963-1.328,3.641,3.641,0,0,1,2.694,1.116,4.093,4.093,0,0,1,1.02,2.867.155.155,0,0,1-.115.174c-3.117-.02-4.754.019-5.812.057a4.22,4.22,0,0,0,.423,2.059,2.236,2.236,0,0,0,2.232,1.193A2.652,2.652,0,0,0,740,675.151C740.115,675.054,740.6,675.266,740.577,675.382Zm-5.351-4.2a4.8,4.8,0,0,0-.461,1.924l4.079-.038c-.115-1.963-.75-2.848-2.078-2.848A1.742,1.742,0,0,0,735.226,671.186Z" transform="translate(-2.695 -0.453)" fill="#fff"/>
    				<path class="Path_245" data-name="Path 245" d="M743.495,676.835a1.955,1.955,0,0,0,.115-.924c.019-.673.019-2.694,0-3.656,0-1.135-.1-1.578-.192-1.655-.077-.077-.308-.077-1.271-.077-.115,0-.1-.635.02-.635,1.1,0,2.482-.057,2.886-.057.192,0,.269.077.25.288-.019.4-.038,1.116-.038,1.963l.077.019c.673-1.443,1.385-2.444,2.578-2.444a1.587,1.587,0,0,1,1.77,1.54,1.237,1.237,0,0,1-1.173,1.308.906.906,0,0,1-1-.9c0-.6.462-.885.462-1,0-.077-.116-.154-.366-.154-.693,0-1.289.751-1.77,1.713a3.936,3.936,0,0,0-.5,1.866v1.328a4.005,4.005,0,0,0,.154,1.443,5.757,5.757,0,0,0,1.462.116c.135,0,.154.635.038.635H742.07c-.057,0-.077-.616,0-.616C743.3,676.893,743.437,676.893,743.495,676.835Z" transform="translate(-3.56 -0.463)" fill="#fff"/>
    				<path class="Path_246" data-name="Path 246" d="M753.27,670.732c0,.154.577.231.577.885a.931.931,0,0,1-.982.943,1.008,1.008,0,0,1-1.058-1,1.332,1.332,0,0,1,.462-1,3.623,3.623,0,0,1,2.54-.924,3.423,3.423,0,0,1,2.559.866,2.565,2.565,0,0,1,.635,2.021c0,.981-.058,2.463-.058,3.771,0,.52.135.673.443.673.4,0,.712-.384.923-1.327.058-.058.482.019.482.1-.154,1.116-.809,1.963-1.828,1.963a1.739,1.739,0,0,1-1.809-1.29,3.347,3.347,0,0,1-2.483,1.29c-1.1.019-2.424-.77-2.424-1.944a1.959,1.959,0,0,1,.6-1.443c.6-.6,1.693-1.1,4.406-1.308.019-.193.019-.366.019-.751,0-.943-.077-1.328-.346-1.6a1.908,1.908,0,0,0-1.328-.4C753.77,670.251,753.27,670.617,753.27,670.732Zm-.231,4.946c0,.751.384,1.251,1.1,1.251a2.819,2.819,0,0,0,1.944-1.193,1.76,1.76,0,0,0,.154-.789c.019-.539.019-.847.019-1.385C753.5,673.811,753.039,674.292,753.039,675.678Z" transform="translate(-4.428 -0.461)" fill="#fff"/>
    				<path class="Path_247" data-name="Path 247" d="M764.292,664.792c.173,0,.25.135.25.327-.019,2-.019,3.6-.019,5.678,0,1.943-.039,3.348-.058,4.83,0,.385.039.616.154.712.1.116.193.135,1.347.173.038,0,.077.6,0,.6-1.712-.058-2.829-.058-4.6-.058a1.053,1.053,0,0,1,.019-.6c1.059-.019,1.194-.019,1.271-.1.057-.058.076-.135.076-.347.02-.885.058-2.694.058-3.925,0-2.636,0-4.06-.038-6.043,0-.424,0-.5-.058-.558-.077-.058-.25-.077-1.347-.116-.1-.038-.116-.577.038-.577C762.482,664.811,763.175,664.811,764.292,664.792Z" transform="translate(-5.371 -0.006)" fill="#fff"/>
    				<path class="Path_248" data-name="Path 248" d="M773.125,676.129a4.891,4.891,0,0,0,.885-1.462c1.693-3.7,2.905-6.447,4.1-9.564a1.417,1.417,0,0,1,.6-.077c.4,0,.462.038.481.115.558,1.693,1.405,4.079,3.483,9.776a3.5,3.5,0,0,0,.673,1.366c.192.193.385.25,1.578.289a.979.979,0,0,1,0,.577c-1.078-.019-1.5-.058-2.424-.058-1.232,0-1.732-.019-2.868.02-.077,0-.077-.578-.019-.578,1.078-.057,1.212-.115,1.309-.211s.115-.25-.039-.693c-.134-.423-.327-1.039-.673-1.963-.4-.019-1.617-.057-3.118-.057-.692,0-1.231,0-1.751.019a.179.179,0,0,0-.173.135c-.231.5-.365.827-.558,1.347a3.563,3.563,0,0,0-.212.885c0,.4.193.462,1.424.538a.984.984,0,0,1-.019.578c-1.039-.058-3.04-.039-4.253,0a1.35,1.35,0,0,1,0-.558C772.547,676.5,772.855,676.418,773.125,676.129Zm4.811-8.833c-.962,2.348-1.655,3.868-2.405,5.62,1.174.058,3.309.1,4.464.1-.4-1.174-1.328-3.829-2-5.716Z" transform="translate(-6.335 -0.028)" fill="#fff"/>
    				<path class="Path_249" data-name="Path 249" d="M788.534,676.835a1.942,1.942,0,0,0,.115-.924c.019-.673.019-2.694,0-3.656,0-1.135-.1-1.578-.192-1.655-.077-.077-.308-.077-1.27-.077-.116,0-.1-.635.019-.635,1.1,0,2.482-.057,2.886-.057.193,0,.27.077.251.288-.02.4-.039,1.116-.039,1.963l.077.019c.674-1.443,1.385-2.444,2.578-2.444a1.588,1.588,0,0,1,1.771,1.54,1.238,1.238,0,0,1-1.174,1.308.906.906,0,0,1-1-.9c0-.6.462-.885.462-1,0-.077-.115-.154-.365-.154-.693,0-1.29.751-1.771,1.713a3.947,3.947,0,0,0-.5,1.866v1.328a4,4,0,0,0,.154,1.443,5.773,5.773,0,0,0,1.462.116c.135,0,.154.635.039.635H787.11c-.058,0-.077-.616,0-.616C788.341,676.893,788.476,676.893,788.534,676.835Z" transform="translate(-7.796 -0.463)" fill="#fff"/>
    				<path class="Path_250" data-name="Path 250" d="M800.088,677.407a2.51,2.51,0,0,1-1.848-.692,2,2,0,0,1-.519-1.54c0-1.385.019-3.309.058-4.888-.116-.019-1.174-.019-1.386-.019-.116,0-.1-.655-.019-.655,1.039-.077,1.328-.134,1.578-.365a5.489,5.489,0,0,0,1-2.425c.019-.115.558-.1.577.019-.019.5-.057,2.194-.077,2.752.751-.019,2.194-.019,2.387-.019.134-.019.115.75-.039.75-1.482-.019-2.02-.019-2.309,0-.039.52-.077,2.271-.077,3.7,0,1.5.038,1.847.173,2.1a.871.871,0,0,0,.808.462c.577,0,1.078-.539,1.386-1.77.038-.1.635.038.6.154C802.05,676.58,801.146,677.407,800.088,677.407Z" transform="translate(-8.666 -0.19)" fill="#fff"/>
    				<path class="Path_251" data-name="Path 251" d="M810.138,676.735a3.687,3.687,0,0,1-2.482.9,6.5,6.5,0,0,1-2.309-.481c-.115,0-.231.193-.366.6-.019.077-.557.038-.557-.039-.039-.885-.116-1.963-.193-2.79,0-.1.558-.154.6-.077a4.162,4.162,0,0,0,.827,1.52,2.7,2.7,0,0,0,1.924.635,2.157,2.157,0,0,0,1.444-.423,1.234,1.234,0,0,0,.307-.847c0-.635-.442-.923-2.059-1.366a4.823,4.823,0,0,1-2.29-.943,1.712,1.712,0,0,1-.519-1.27,2.736,2.736,0,0,1,2.886-2.521,5.427,5.427,0,0,1,2.04.558c.116,0,.154-.173.346-.731a1,1,0,0,1,.578,0,23.685,23.685,0,0,0-.058,2.617c0,.116-.558.116-.6.039a3.9,3.9,0,0,0-.77-1.213,1.992,1.992,0,0,0-1.578-.6,1.6,1.6,0,0,0-1.193.4,1.124,1.124,0,0,0-.308.77c0,.635.462.9,2.117,1.347a4.608,4.608,0,0,1,2.405,1.058,1.711,1.711,0,0,1,.481,1.251A2.384,2.384,0,0,1,810.138,676.735Z" transform="translate(-9.411 -0.441)" fill="#fff"/>
    				<path class="Path_252" data-name="Path 252" d="M823.458,672a3.852,3.852,0,0,1,.433-.77,4.972,4.972,0,0,1,.818.145.728.728,0,0,1,.064.321c-.192.432-1.139,2.725-1.652,4.057a3.222,3.222,0,0,0-.241,1.042c0,.208.1.417.305.417.4,0,.737-.192,1.683-1.362.032-.033.4.224.385.256-.914,1.283-1.539,1.716-2.278,1.716a1.072,1.072,0,0,1-1.122-1.01,2.532,2.532,0,0,1,.1-.722c-.5.674-1.587,1.748-2.582,1.748a2,2,0,0,1-1.748-2.085,3.806,3.806,0,0,1,1.3-2.726,5.411,5.411,0,0,1,3.336-1.8A1.283,1.283,0,0,1,823.458,672Zm-4.233,2.453a4.206,4.206,0,0,0-.562,1.876.852.852,0,0,0,.882.946c.93,0,2.212-1.347,2.662-2.245a9.262,9.262,0,0,0,.962-2.422.989.989,0,0,0-1.043-.9C820.973,671.71,820.011,672.881,819.226,674.452Z" transform="translate(-10.671 -0.611)" fill="#fff"/>
    				<path class="Path_253" data-name="Path 253" d="M829.931,671.436a.065.065,0,0,1,.064.081c-.112.336-.593,1.683-.754,2.085-.016.032.033.1.064.064,1.379-1.8,2.053-2.453,2.918-2.453a1.437,1.437,0,0,1,1.075.432,1.214,1.214,0,0,1,.385.914,5.06,5.06,0,0,1-.785,2.165,6.02,6.02,0,0,0-.77,1.989.405.405,0,0,0,.4.432c.384,0,.865-.352,1.652-1.219.032-.032.4.256.369.289-.514.625-1.508,1.587-2.309,1.587a1.057,1.057,0,0,1-.833-.352,1.181,1.181,0,0,1-.337-.866,6.486,6.486,0,0,1,.8-2.165,4.919,4.919,0,0,0,.689-1.844.615.615,0,0,0-.625-.658c-.418,0-.674.208-1.363.9a12.673,12.673,0,0,0-2.26,3.078c-.225.545-.514,1.187-.738,1.748a6.221,6.221,0,0,1-1.106.016c-.032,0-.032-.033-.016-.081.208-.465,1.331-3,1.572-3.576.577-1.443.673-1.924.625-1.972-.032-.032-1.379-.015-1.587-.032a.939.939,0,0,1,.032-.514C828.006,671.484,829.851,671.452,829.931,671.436Z" transform="translate(-11.5 -0.61)" fill="#fff"/>
    				<path class="Path_254" data-name="Path 254" d="M842.283,671.879c0,.015.032.032.048,0,.641-1.572.946-2.357,1.539-3.881.081-.224.048-.321.016-.352a11.153,11.153,0,0,0-1.684-.08c-.048,0-.048-.514.016-.514.881,0,2.1.033,3.159.016a.08.08,0,0,1,.08.1c-1.362,3.207-2.068,4.907-3.527,8.258a2.372,2.372,0,0,0-.257.962.377.377,0,0,0,.369.418,1.6,1.6,0,0,0,1.058-.593,9.1,9.1,0,0,0,.689-.754c.033-.033.385.24.353.273-.833,1.09-1.6,1.7-2.261,1.7a1.139,1.139,0,0,1-1.235-1.074,2.79,2.79,0,0,1,.016-.352,3.242,3.242,0,0,1-2.485,1.491,2.192,2.192,0,0,1-1.476-.674,2.063,2.063,0,0,1-.592-1.475,4.4,4.4,0,0,1,1.442-3,4.852,4.852,0,0,1,3.255-1.539A1.638,1.638,0,0,1,842.283,671.879Zm-4.506,2.037a3.957,3.957,0,0,0-.465,1.779c0,.834.352,1.267,1.01,1.267a2.376,2.376,0,0,0,1.731-.9,5.909,5.909,0,0,0,1.3-1.892,15.146,15.146,0,0,0,.641-1.62,1.374,1.374,0,0,0-1.362-1.25C839.477,671.3,838.466,672.536,837.777,673.915Z" transform="translate(-12.41 -0.219)" fill="#fff"/>
    				<path class="Path_255" data-name="Path 255" d="M858.971,665.214c.039-.058.52,0,.52.058a24.823,24.823,0,0,0-.077,3.771c0,.058-.481.1-.52.019a7.024,7.024,0,0,0-1.347-2.405,2.791,2.791,0,0,0-2.116-.77,2.685,2.685,0,0,0-2.021.712,2.127,2.127,0,0,0-.616,1.482c0,1.289.963,1.616,3.31,2.27a7.072,7.072,0,0,1,3.271,1.5,2.612,2.612,0,0,1,.731,1.925c0,2.078-1.866,3.56-4.1,3.56-1.982,0-3.021-.942-3.464-.942-.269,0-.538.307-.769.788-.039.077-.481.02-.481-.038a29.615,29.615,0,0,0-.135-4.2c0-.1.442-.135.5-.058a9.478,9.478,0,0,0,1.636,2.81,3.7,3.7,0,0,0,2.6.981,2.859,2.859,0,0,0,2.059-.654,1.916,1.916,0,0,0,.578-1.443c0-1.213-.712-1.751-2.983-2.348-2.078-.558-2.944-.981-3.5-1.539a2.29,2.29,0,0,1-.693-1.867c0-1.924,1.79-3.559,4.156-3.559a5.632,5.632,0,0,1,2.887.75C858.567,666.023,858.8,665.638,858.971,665.214Z" transform="translate(-13.825 -0.043)" fill="#fff"/>
    				<path class="Path_256" data-name="Path 256" d="M863.743,676.542a3.738,3.738,0,0,1-1.154-2.732,4.154,4.154,0,0,1,1.174-2.848,4.357,4.357,0,0,1,3.136-1.347c1.847,0,3.156,1.039,3.156,2.155a1.1,1.1,0,0,1-1.116,1.135.978.978,0,0,1-1-.9.8.8,0,0,1,.231-.635,2.346,2.346,0,0,1,.5-.308c.116-.135-.327-.75-1.712-.75a2.092,2.092,0,0,0-1.963,1.173,4.456,4.456,0,0,0-.423,2.136,4.859,4.859,0,0,0,.366,2.232A1.99,1.99,0,0,0,866.9,677a2.879,2.879,0,0,0,2.656-2.078c.077-.154.635.134.577.269a3.805,3.805,0,0,1-3.5,2.559A4.11,4.11,0,0,1,863.743,676.542Z" transform="translate(-14.9 -0.46)" fill="#fff"/>
    				<path class="Path_257" data-name="Path 257" d="M871.731,677.087c-.039,0-.039-.577.038-.577,1.059-.019,1.347-.038,1.424-.115.1-.1.116-.289.135-.712.019-.616.019-1.059.019-1.751,0-.751-.058-2.232-.077-3.041-.019-.481-.058-.673-.135-.75s-.23-.1-1.4-.115c-.058,0-.058-.578.019-.578.154,0,2.6-.038,3-.038.192,0,.25.038.25.173v4.426c0,1.751.115,2.29.212,2.386s.308.1,1.289.115c.1,0,.135.616.019.616C876.118,677.126,872.02,677.087,871.731,677.087Zm2.309-9.679a1.242,1.242,0,0,1-1.135-1.251,1,1,0,0,1,.307-.77,1.288,1.288,0,0,1,.982-.4,1.164,1.164,0,0,1,1.135,1.135A1.386,1.386,0,0,1,874.04,667.408Z" transform="translate(-15.756 -0.024)" fill="#fff"/>
    				<path class="Path_258" data-name="Path 258" d="M885.219,675.382a3.561,3.561,0,0,1-3.348,2.405,4.584,4.584,0,0,1-3.31-1.328,3.756,3.756,0,0,1-1.1-2.771,4.078,4.078,0,0,1,1.192-2.809,4.033,4.033,0,0,1,2.964-1.328,3.644,3.644,0,0,1,2.694,1.116,4.093,4.093,0,0,1,1.02,2.867.156.156,0,0,1-.116.174c-3.117-.02-4.754.019-5.812.057a4.22,4.22,0,0,0,.423,2.059,2.236,2.236,0,0,0,2.232,1.193,2.651,2.651,0,0,0,2.579-1.866C884.757,675.054,885.238,675.266,885.219,675.382Zm-5.35-4.2a4.8,4.8,0,0,0-.462,1.924l4.079-.038c-.115-1.963-.75-2.848-2.078-2.848A1.74,1.74,0,0,0,879.869,671.186Z" transform="translate(-16.299 -0.453)" fill="#fff"/>
    				<path class="Path_259" data-name="Path 259" d="M886.835,676.959c.905,0,1.155,0,1.232-.076s.134-.251.134-1.617v-3a4.468,4.468,0,0,0-.154-1.674c-.1-.1-.346-.1-1.27-.115-.077,0-.077-.616.02-.616.693,0,2.405-.019,3.04-.019.116.019.154.1.154.231-.019.308-.077,1.366-.1,1.828l.077.019c.577-1.058,1.443-2.367,2.905-2.367,1.578,0,2.444.982,2.444,2.829,0,.846-.019,1.616-.019,2.713,0,1.424.1,1.693.173,1.77.1.1.327.116,1.193.135.1,0,.1.558-.019.539-1.232-.02-3.214-.02-4.042,0-.116-.02-.1-.578-.039-.578a2.2,2.2,0,0,0,.885-.134c.077-.077.1-.327.1-.789v-3.926c0-.962-.347-1.481-1.135-1.481-1.078,0-1.867,1.077-2.233,1.847a2.479,2.479,0,0,0-.288,1.385c0,.443.019,1.29.038,2.1,0,.539.02.789.1.866.1.1.27.115,1.174.154.077,0,.077.6-.019.577-.981-.019-3.56-.019-4.349.019C886.739,677.556,886.739,676.959,886.835,676.959Z" transform="translate(-17.17 -0.453)" fill="#fff"/>
    				<path class="Path_260" data-name="Path 260" d="M899.221,676.542a3.734,3.734,0,0,1-1.155-2.732,4.154,4.154,0,0,1,1.174-2.848,4.359,4.359,0,0,1,3.137-1.347c1.847,0,3.155,1.039,3.155,2.155a1.1,1.1,0,0,1-1.116,1.135.978.978,0,0,1-1-.9.8.8,0,0,1,.231-.635,2.369,2.369,0,0,1,.5-.308c.115-.135-.327-.75-1.713-.75a2.092,2.092,0,0,0-1.963,1.173,4.467,4.467,0,0,0-.423,2.136,4.873,4.873,0,0,0,.366,2.232A1.99,1.99,0,0,0,902.377,677a2.878,2.878,0,0,0,2.655-2.078c.077-.154.635.134.577.269a3.8,3.8,0,0,1-3.5,2.559A4.107,4.107,0,0,1,899.221,676.542Z" transform="translate(-18.236 -0.46)" fill="#fff"/>
    				<path class="Path_261" data-name="Path 261" d="M915.282,675.382a3.561,3.561,0,0,1-3.348,2.405,4.584,4.584,0,0,1-3.31-1.328,3.756,3.756,0,0,1-1.1-2.771,4.075,4.075,0,0,1,1.193-2.809,4.03,4.03,0,0,1,2.963-1.328,3.644,3.644,0,0,1,2.694,1.116,4.093,4.093,0,0,1,1.02,2.867.156.156,0,0,1-.116.174c-3.117-.02-4.753.019-5.812.057a4.219,4.219,0,0,0,.423,2.059,2.238,2.238,0,0,0,2.233,1.193,2.65,2.65,0,0,0,2.578-1.866C914.82,675.054,915.3,675.266,915.282,675.382Zm-5.35-4.2a4.8,4.8,0,0,0-.462,1.924l4.08-.038c-.115-1.963-.75-2.848-2.078-2.848A1.74,1.74,0,0,0,909.932,671.186Z" transform="translate(-19.126 -0.453)" fill="#fff"/>
    				<path class="Path_262" data-name="Path 262" d="M923.571,676.735a3.689,3.689,0,0,1-2.483.9,6.5,6.5,0,0,1-2.309-.481c-.115,0-.231.193-.365.6-.019.077-.558.038-.558-.039-.039-.885-.116-1.963-.193-2.79,0-.1.558-.154.6-.077a4.162,4.162,0,0,0,.827,1.52,2.7,2.7,0,0,0,1.924.635,2.156,2.156,0,0,0,1.444-.423,1.234,1.234,0,0,0,.307-.847c0-.635-.442-.923-2.058-1.366a4.812,4.812,0,0,1-2.29-.943,1.709,1.709,0,0,1-.52-1.27,2.736,2.736,0,0,1,2.887-2.521,5.42,5.42,0,0,1,2.039.558c.116,0,.154-.173.347-.731a.993.993,0,0,1,.577,0,23.7,23.7,0,0,0-.058,2.617c0,.116-.558.116-.6.039a3.9,3.9,0,0,0-.77-1.213,1.99,1.99,0,0,0-1.578-.6,1.6,1.6,0,0,0-1.193.4,1.124,1.124,0,0,0-.308.77c0,.635.462.9,2.117,1.347a4.607,4.607,0,0,1,2.405,1.058,1.707,1.707,0,0,1,.481,1.251A2.388,2.388,0,0,1,923.571,676.735Z" transform="translate(-20.079 -0.441)" fill="#fff"/>
  				</g>
				</svg>

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
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 165.38 111.61"><defs><style>.uf-wordmark-svg{fill:#fff;}</style></defs><g class="Layer_2" data-name="Layer 2"><g class="Layer_1-2" data-name="Layer 1"><polygon class="uf-wordmark-svg" points="117.94 91.75 117.94 63.49 143.97 63.49 143.97 44.87 117.94 44.87 117.94 18.48 146.52 18.48 146.52 28.71 165.38 28.71 165.38 0 89.88 0 89.88 18.48 96.95 18.48 96.95 91.75 89.91 91.75 89.91 110.37 124.75 110.37 124.75 91.75 117.94 91.75"/><path class="uf-wordmark-svg" d="M80.06,68.66V18.47h7V0H52.12V18.47h6.81v44c0,18.42-2.13,27.27-15.36,27.27S28.21,80.84,28.21,62.42V18.47H35V0H0V18.47H6.93V68.66c0,11,0,19.94,5.17,28,5.78,9.14,16.27,14.94,31.47,14.94,26.91,0,36.49-14,36.49-42.95"/></g></g></svg>

             <span class="SVGaltText">University of Florida</span>
            </div>
           <span class="mobile">
						 <svg xmlns="http://www.w3.org/2000/svg" wclassth="200" height="12.661" viewBox="0 0 200 12.661">
		  				 <g class="Group_809" data-name="Group 809" transform="translate(-704.164 -664.728)">
		    		 	 <path class="Path_241" data-name="Path 241" d="M707.125,665.446h2.809a1.123,1.123,0,0,1-.019.616c-1.444,0-1.713.019-1.79.1a10.57,10.57,0,0,0-.116,2.425c-.019,1.212-.019,1.886-.019,5.966a6.859,6.859,0,0,0,.077,1.77c.077.077.366.135,1.713.135,1.578,0,2.117-.058,2.424-.366s.655-1.058,1.27-3.54c.039-.1.539-.077.539.019-.019,1.309-.077,3.329-.154,4.445,0,.1-.058.154-.231.154-1.481-.039-3-.039-4.984-.039-2.136,0-3.252,0-4.445.02a1.182,1.182,0,0,1,.019-.635c1.4-.039,1.635-.019,1.712-.1s.077-.385.1-1.482c.019-2.348.077-4.6.077-6.967,0-1.385-.039-1.751-.116-1.828s-.308-.115-1.655-.115a1.123,1.123,0,0,1,.02-.616C705.2,665.408,706.22,665.446,707.125,665.446Z" transform="translate(0 -0.064)" fill="#fff"/>
		    	 		 <path class="Path_242" data-name="Path 242" d="M716.135,677.087c-.038,0-.038-.577.039-.577,1.058-.019,1.347-.038,1.424-.115.1-.1.115-.289.135-.712.019-.616.019-1.059.019-1.751,0-.751-.058-2.232-.077-3.041-.019-.481-.058-.673-.135-.75s-.231-.1-1.405-.115c-.057,0-.057-.578.02-.578.153,0,2.6-.038,3-.038.193,0,.251.038.251.173v4.426c0,1.751.115,2.29.211,2.386s.308.1,1.289.115c.1,0,.135.616.02.616C720.523,677.126,716.424,677.087,716.135,677.087Zm2.309-9.679a1.243,1.243,0,0,1-1.135-1.251,1,1,0,0,1,.308-.77,1.286,1.286,0,0,1,.981-.4,1.164,1.164,0,0,1,1.136,1.135A1.387,1.387,0,0,1,718.444,667.408Z" transform="translate(-1.122 -0.024)" fill="#fff"/>
		    	 		 <path class="Path_243" data-name="Path 243" d="M724.3,676.294c-.076,0-.4.288-1.019,1.039-.077.115-.52.038-.52-.116.039-.788.1-3.021.1-5.446,0-1.135-.057-3.772-.1-5.37-.019-.769-.038-.866-.1-.923s-.193-.077-1.328-.077c-.115,0-.115-.578-.019-.578,1.039-.019,2.348-.057,3.117-.1.135,0,.154.1.154.212,0,.423-.058,5.581-.058,6.158l.058.02a3.147,3.147,0,0,1,2.559-2.021,3.412,3.412,0,0,1,2.367,1.078,3.741,3.741,0,0,1,1.058,2.713,4.6,4.6,0,0,1-1.462,3.252,3.414,3.414,0,0,1-2.424,1.116A4.539,4.539,0,0,1,724.3,676.294Zm.5-4.638a2.95,2.95,0,0,0-.27,1.5,7.092,7.092,0,0,0,.173,2.521,2.469,2.469,0,0,0,1.79.9,1.727,1.727,0,0,0,1.616-1.019,5.169,5.169,0,0,0,.462-2.386,5.749,5.749,0,0,0-.4-2.425,1.232,1.232,0,0,0-1.251-.808C725.991,669.944,725.2,670.848,724.8,671.656Z" transform="translate(-1.606)" fill="#fff"/>
		    	 		 <path class="Path_244" data-name="Path 244" d="M740.577,675.382a3.561,3.561,0,0,1-3.348,2.405,4.583,4.583,0,0,1-3.31-1.328,3.757,3.757,0,0,1-1.1-2.771,4.075,4.075,0,0,1,1.193-2.809,4.031,4.031,0,0,1,2.963-1.328,3.641,3.641,0,0,1,2.694,1.116,4.093,4.093,0,0,1,1.02,2.867.155.155,0,0,1-.115.174c-3.117-.02-4.754.019-5.812.057a4.22,4.22,0,0,0,.423,2.059,2.236,2.236,0,0,0,2.232,1.193A2.652,2.652,0,0,0,740,675.151C740.115,675.054,740.6,675.266,740.577,675.382Zm-5.351-4.2a4.8,4.8,0,0,0-.461,1.924l4.079-.038c-.115-1.963-.75-2.848-2.078-2.848A1.742,1.742,0,0,0,735.226,671.186Z" transform="translate(-2.695 -0.453)" fill="#fff"/>
		    	 		 <path class="Path_245" data-name="Path 245" d="M743.495,676.835a1.955,1.955,0,0,0,.115-.924c.019-.673.019-2.694,0-3.656,0-1.135-.1-1.578-.192-1.655-.077-.077-.308-.077-1.271-.077-.115,0-.1-.635.02-.635,1.1,0,2.482-.057,2.886-.057.192,0,.269.077.25.288-.019.4-.038,1.116-.038,1.963l.077.019c.673-1.443,1.385-2.444,2.578-2.444a1.587,1.587,0,0,1,1.77,1.54,1.237,1.237,0,0,1-1.173,1.308.906.906,0,0,1-1-.9c0-.6.462-.885.462-1,0-.077-.116-.154-.366-.154-.693,0-1.289.751-1.77,1.713a3.936,3.936,0,0,0-.5,1.866v1.328a4.005,4.005,0,0,0,.154,1.443,5.757,5.757,0,0,0,1.462.116c.135,0,.154.635.038.635H742.07c-.057,0-.077-.616,0-.616C743.3,676.893,743.437,676.893,743.495,676.835Z" transform="translate(-3.56 -0.463)" fill="#fff"/>
		    	 		 <path class="Path_246" data-name="Path 246" d="M753.27,670.732c0,.154.577.231.577.885a.931.931,0,0,1-.982.943,1.008,1.008,0,0,1-1.058-1,1.332,1.332,0,0,1,.462-1,3.623,3.623,0,0,1,2.54-.924,3.423,3.423,0,0,1,2.559.866,2.565,2.565,0,0,1,.635,2.021c0,.981-.058,2.463-.058,3.771,0,.52.135.673.443.673.4,0,.712-.384.923-1.327.058-.058.482.019.482.1-.154,1.116-.809,1.963-1.828,1.963a1.739,1.739,0,0,1-1.809-1.29,3.347,3.347,0,0,1-2.483,1.29c-1.1.019-2.424-.77-2.424-1.944a1.959,1.959,0,0,1,.6-1.443c.6-.6,1.693-1.1,4.406-1.308.019-.193.019-.366.019-.751,0-.943-.077-1.328-.346-1.6a1.908,1.908,0,0,0-1.328-.4C753.77,670.251,753.27,670.617,753.27,670.732Zm-.231,4.946c0,.751.384,1.251,1.1,1.251a2.819,2.819,0,0,0,1.944-1.193,1.76,1.76,0,0,0,.154-.789c.019-.539.019-.847.019-1.385C753.5,673.811,753.039,674.292,753.039,675.678Z" transform="translate(-4.428 -0.461)" fill="#fff"/>
		  			 	 <path class="Path_247" data-name="Path 247" d="M764.292,664.792c.173,0,.25.135.25.327-.019,2-.019,3.6-.019,5.678,0,1.943-.039,3.348-.058,4.83,0,.385.039.616.154.712.1.116.193.135,1.347.173.038,0,.077.6,0,.6-1.712-.058-2.829-.058-4.6-.058a1.053,1.053,0,0,1,.019-.6c1.059-.019,1.194-.019,1.271-.1.057-.058.076-.135.076-.347.02-.885.058-2.694.058-3.925,0-2.636,0-4.06-.038-6.043,0-.424,0-.5-.058-.558-.077-.058-.25-.077-1.347-.116-.1-.038-.116-.577.038-.577C762.482,664.811,763.175,664.811,764.292,664.792Z" transform="translate(-5.371 -0.006)" fill="#fff"/>
		    	 		 <path class="Path_248" data-name="Path 248" d="M773.125,676.129a4.891,4.891,0,0,0,.885-1.462c1.693-3.7,2.905-6.447,4.1-9.564a1.417,1.417,0,0,1,.6-.077c.4,0,.462.038.481.115.558,1.693,1.405,4.079,3.483,9.776a3.5,3.5,0,0,0,.673,1.366c.192.193.385.25,1.578.289a.979.979,0,0,1,0,.577c-1.078-.019-1.5-.058-2.424-.058-1.232,0-1.732-.019-2.868.02-.077,0-.077-.578-.019-.578,1.078-.057,1.212-.115,1.309-.211s.115-.25-.039-.693c-.134-.423-.327-1.039-.673-1.963-.4-.019-1.617-.057-3.118-.057-.692,0-1.231,0-1.751.019a.179.179,0,0,0-.173.135c-.231.5-.365.827-.558,1.347a3.563,3.563,0,0,0-.212.885c0,.4.193.462,1.424.538a.984.984,0,0,1-.019.578c-1.039-.058-3.04-.039-4.253,0a1.35,1.35,0,0,1,0-.558C772.547,676.5,772.855,676.418,773.125,676.129Zm4.811-8.833c-.962,2.348-1.655,3.868-2.405,5.62,1.174.058,3.309.1,4.464.1-.4-1.174-1.328-3.829-2-5.716Z" transform="translate(-6.335 -0.028)" fill="#fff"/>
		    	 		 <path class="Path_249" data-name="Path 249" d="M788.534,676.835a1.942,1.942,0,0,0,.115-.924c.019-.673.019-2.694,0-3.656,0-1.135-.1-1.578-.192-1.655-.077-.077-.308-.077-1.27-.077-.116,0-.1-.635.019-.635,1.1,0,2.482-.057,2.886-.057.193,0,.27.077.251.288-.02.4-.039,1.116-.039,1.963l.077.019c.674-1.443,1.385-2.444,2.578-2.444a1.588,1.588,0,0,1,1.771,1.54,1.238,1.238,0,0,1-1.174,1.308.906.906,0,0,1-1-.9c0-.6.462-.885.462-1,0-.077-.115-.154-.365-.154-.693,0-1.29.751-1.771,1.713a3.947,3.947,0,0,0-.5,1.866v1.328a4,4,0,0,0,.154,1.443,5.773,5.773,0,0,0,1.462.116c.135,0,.154.635.039.635H787.11c-.058,0-.077-.616,0-.616C788.341,676.893,788.476,676.893,788.534,676.835Z" transform="translate(-7.796 -0.463)" fill="#fff"/>
		  			 	 <path class="Path_250" data-name="Path 250" d="M800.088,677.407a2.51,2.51,0,0,1-1.848-.692,2,2,0,0,1-.519-1.54c0-1.385.019-3.309.058-4.888-.116-.019-1.174-.019-1.386-.019-.116,0-.1-.655-.019-.655,1.039-.077,1.328-.134,1.578-.365a5.489,5.489,0,0,0,1-2.425c.019-.115.558-.1.577.019-.019.5-.057,2.194-.077,2.752.751-.019,2.194-.019,2.387-.019.134-.019.115.75-.039.75-1.482-.019-2.02-.019-2.309,0-.039.52-.077,2.271-.077,3.7,0,1.5.038,1.847.173,2.1a.871.871,0,0,0,.808.462c.577,0,1.078-.539,1.386-1.77.038-.1.635.038.6.154C802.05,676.58,801.146,677.407,800.088,677.407Z" transform="translate(-8.666 -0.19)" fill="#fff"/>
		    	 	 	 <path class="Path_251" data-name="Path 251" d="M810.138,676.735a3.687,3.687,0,0,1-2.482.9,6.5,6.5,0,0,1-2.309-.481c-.115,0-.231.193-.366.6-.019.077-.557.038-.557-.039-.039-.885-.116-1.963-.193-2.79,0-.1.558-.154.6-.077a4.162,4.162,0,0,0,.827,1.52,2.7,2.7,0,0,0,1.924.635,2.157,2.157,0,0,0,1.444-.423,1.234,1.234,0,0,0,.307-.847c0-.635-.442-.923-2.059-1.366a4.823,4.823,0,0,1-2.29-.943,1.712,1.712,0,0,1-.519-1.27,2.736,2.736,0,0,1,2.886-2.521,5.427,5.427,0,0,1,2.04.558c.116,0,.154-.173.346-.731a1,1,0,0,1,.578,0,23.685,23.685,0,0,0-.058,2.617c0,.116-.558.116-.6.039a3.9,3.9,0,0,0-.77-1.213,1.992,1.992,0,0,0-1.578-.6,1.6,1.6,0,0,0-1.193.4,1.124,1.124,0,0,0-.308.77c0,.635.462.9,2.117,1.347a4.608,4.608,0,0,1,2.405,1.058,1.711,1.711,0,0,1,.481,1.251A2.384,2.384,0,0,1,810.138,676.735Z" transform="translate(-9.411 -0.441)" fill="#fff"/>
		    	 		 <path class="Path_252" data-name="Path 252" d="M823.458,672a3.852,3.852,0,0,1,.433-.77,4.972,4.972,0,0,1,.818.145.728.728,0,0,1,.064.321c-.192.432-1.139,2.725-1.652,4.057a3.222,3.222,0,0,0-.241,1.042c0,.208.1.417.305.417.4,0,.737-.192,1.683-1.362.032-.033.4.224.385.256-.914,1.283-1.539,1.716-2.278,1.716a1.072,1.072,0,0,1-1.122-1.01,2.532,2.532,0,0,1,.1-.722c-.5.674-1.587,1.748-2.582,1.748a2,2,0,0,1-1.748-2.085,3.806,3.806,0,0,1,1.3-2.726,5.411,5.411,0,0,1,3.336-1.8A1.283,1.283,0,0,1,823.458,672Zm-4.233,2.453a4.206,4.206,0,0,0-.562,1.876.852.852,0,0,0,.882.946c.93,0,2.212-1.347,2.662-2.245a9.262,9.262,0,0,0,.962-2.422.989.989,0,0,0-1.043-.9C820.973,671.71,820.011,672.881,819.226,674.452Z" transform="translate(-10.671 -0.611)" fill="#fff"/>
		    	 		 <path class="Path_253" data-name="Path 253" d="M829.931,671.436a.065.065,0,0,1,.064.081c-.112.336-.593,1.683-.754,2.085-.016.032.033.1.064.064,1.379-1.8,2.053-2.453,2.918-2.453a1.437,1.437,0,0,1,1.075.432,1.214,1.214,0,0,1,.385.914,5.06,5.06,0,0,1-.785,2.165,6.02,6.02,0,0,0-.77,1.989.405.405,0,0,0,.4.432c.384,0,.865-.352,1.652-1.219.032-.032.4.256.369.289-.514.625-1.508,1.587-2.309,1.587a1.057,1.057,0,0,1-.833-.352,1.181,1.181,0,0,1-.337-.866,6.486,6.486,0,0,1,.8-2.165,4.919,4.919,0,0,0,.689-1.844.615.615,0,0,0-.625-.658c-.418,0-.674.208-1.363.9a12.673,12.673,0,0,0-2.26,3.078c-.225.545-.514,1.187-.738,1.748a6.221,6.221,0,0,1-1.106.016c-.032,0-.032-.033-.016-.081.208-.465,1.331-3,1.572-3.576.577-1.443.673-1.924.625-1.972-.032-.032-1.379-.015-1.587-.032a.939.939,0,0,1,.032-.514C828.006,671.484,829.851,671.452,829.931,671.436Z" transform="translate(-11.5 -0.61)" fill="#fff"/>
		    	 		 <path class="Path_254" data-name="Path 254" d="M842.283,671.879c0,.015.032.032.048,0,.641-1.572.946-2.357,1.539-3.881.081-.224.048-.321.016-.352a11.153,11.153,0,0,0-1.684-.08c-.048,0-.048-.514.016-.514.881,0,2.1.033,3.159.016a.08.08,0,0,1,.08.1c-1.362,3.207-2.068,4.907-3.527,8.258a2.372,2.372,0,0,0-.257.962.377.377,0,0,0,.369.418,1.6,1.6,0,0,0,1.058-.593,9.1,9.1,0,0,0,.689-.754c.033-.033.385.24.353.273-.833,1.09-1.6,1.7-2.261,1.7a1.139,1.139,0,0,1-1.235-1.074,2.79,2.79,0,0,1,.016-.352,3.242,3.242,0,0,1-2.485,1.491,2.192,2.192,0,0,1-1.476-.674,2.063,2.063,0,0,1-.592-1.475,4.4,4.4,0,0,1,1.442-3,4.852,4.852,0,0,1,3.255-1.539A1.638,1.638,0,0,1,842.283,671.879Zm-4.506,2.037a3.957,3.957,0,0,0-.465,1.779c0,.834.352,1.267,1.01,1.267a2.376,2.376,0,0,0,1.731-.9,5.909,5.909,0,0,0,1.3-1.892,15.146,15.146,0,0,0,.641-1.62,1.374,1.374,0,0,0-1.362-1.25C839.477,671.3,838.466,672.536,837.777,673.915Z" transform="translate(-12.41 -0.219)" fill="#fff"/>
		    	 		 <path class="Path_255" data-name="Path 255" d="M858.971,665.214c.039-.058.52,0,.52.058a24.823,24.823,0,0,0-.077,3.771c0,.058-.481.1-.52.019a7.024,7.024,0,0,0-1.347-2.405,2.791,2.791,0,0,0-2.116-.77,2.685,2.685,0,0,0-2.021.712,2.127,2.127,0,0,0-.616,1.482c0,1.289.963,1.616,3.31,2.27a7.072,7.072,0,0,1,3.271,1.5,2.612,2.612,0,0,1,.731,1.925c0,2.078-1.866,3.56-4.1,3.56-1.982,0-3.021-.942-3.464-.942-.269,0-.538.307-.769.788-.039.077-.481.02-.481-.038a29.615,29.615,0,0,0-.135-4.2c0-.1.442-.135.5-.058a9.478,9.478,0,0,0,1.636,2.81,3.7,3.7,0,0,0,2.6.981,2.859,2.859,0,0,0,2.059-.654,1.916,1.916,0,0,0,.578-1.443c0-1.213-.712-1.751-2.983-2.348-2.078-.558-2.944-.981-3.5-1.539a2.29,2.29,0,0,1-.693-1.867c0-1.924,1.79-3.559,4.156-3.559a5.632,5.632,0,0,1,2.887.75C858.567,666.023,858.8,665.638,858.971,665.214Z" transform="translate(-13.825 -0.043)" fill="#fff"/>
		    	 		 <path class="Path_256" data-name="Path 256" d="M863.743,676.542a3.738,3.738,0,0,1-1.154-2.732,4.154,4.154,0,0,1,1.174-2.848,4.357,4.357,0,0,1,3.136-1.347c1.847,0,3.156,1.039,3.156,2.155a1.1,1.1,0,0,1-1.116,1.135.978.978,0,0,1-1-.9.8.8,0,0,1,.231-.635,2.346,2.346,0,0,1,.5-.308c.116-.135-.327-.75-1.712-.75a2.092,2.092,0,0,0-1.963,1.173,4.456,4.456,0,0,0-.423,2.136,4.859,4.859,0,0,0,.366,2.232A1.99,1.99,0,0,0,866.9,677a2.879,2.879,0,0,0,2.656-2.078c.077-.154.635.134.577.269a3.805,3.805,0,0,1-3.5,2.559A4.11,4.11,0,0,1,863.743,676.542Z" transform="translate(-14.9 -0.46)" fill="#fff"/>
		    	 		 <path class="Path_257" data-name="Path 257" d="M871.731,677.087c-.039,0-.039-.577.038-.577,1.059-.019,1.347-.038,1.424-.115.1-.1.116-.289.135-.712.019-.616.019-1.059.019-1.751,0-.751-.058-2.232-.077-3.041-.019-.481-.058-.673-.135-.75s-.23-.1-1.4-.115c-.058,0-.058-.578.019-.578.154,0,2.6-.038,3-.038.192,0,.25.038.25.173v4.426c0,1.751.115,2.29.212,2.386s.308.1,1.289.115c.1,0,.135.616.019.616C876.118,677.126,872.02,677.087,871.731,677.087Zm2.309-9.679a1.242,1.242,0,0,1-1.135-1.251,1,1,0,0,1,.307-.77,1.288,1.288,0,0,1,.982-.4,1.164,1.164,0,0,1,1.135,1.135A1.386,1.386,0,0,1,874.04,667.408Z" transform="translate(-15.756 -0.024)" fill="#fff"/>
		    	 		 <path class="Path_258" data-name="Path 258" d="M885.219,675.382a3.561,3.561,0,0,1-3.348,2.405,4.584,4.584,0,0,1-3.31-1.328,3.756,3.756,0,0,1-1.1-2.771,4.078,4.078,0,0,1,1.192-2.809,4.033,4.033,0,0,1,2.964-1.328,3.644,3.644,0,0,1,2.694,1.116,4.093,4.093,0,0,1,1.02,2.867.156.156,0,0,1-.116.174c-3.117-.02-4.754.019-5.812.057a4.22,4.22,0,0,0,.423,2.059,2.236,2.236,0,0,0,2.232,1.193,2.651,2.651,0,0,0,2.579-1.866C884.757,675.054,885.238,675.266,885.219,675.382Zm-5.35-4.2a4.8,4.8,0,0,0-.462,1.924l4.079-.038c-.115-1.963-.75-2.848-2.078-2.848A1.74,1.74,0,0,0,879.869,671.186Z" transform="translate(-16.299 -0.453)" fill="#fff"/>
		    	 		 <path class="Path_259" data-name="Path 259" d="M886.835,676.959c.905,0,1.155,0,1.232-.076s.134-.251.134-1.617v-3a4.468,4.468,0,0,0-.154-1.674c-.1-.1-.346-.1-1.27-.115-.077,0-.077-.616.02-.616.693,0,2.405-.019,3.04-.019.116.019.154.1.154.231-.019.308-.077,1.366-.1,1.828l.077.019c.577-1.058,1.443-2.367,2.905-2.367,1.578,0,2.444.982,2.444,2.829,0,.846-.019,1.616-.019,2.713,0,1.424.1,1.693.173,1.77.1.1.327.116,1.193.135.1,0,.1.558-.019.539-1.232-.02-3.214-.02-4.042,0-.116-.02-.1-.578-.039-.578a2.2,2.2,0,0,0,.885-.134c.077-.077.1-.327.1-.789v-3.926c0-.962-.347-1.481-1.135-1.481-1.078,0-1.867,1.077-2.233,1.847a2.479,2.479,0,0,0-.288,1.385c0,.443.019,1.29.038,2.1,0,.539.02.789.1.866.1.1.27.115,1.174.154.077,0,.077.6-.019.577-.981-.019-3.56-.019-4.349.019C886.739,677.556,886.739,676.959,886.835,676.959Z" transform="translate(-17.17 -0.453)" fill="#fff"/>
		    	 		 <path class="Path_260" data-name="Path 260" d="M899.221,676.542a3.734,3.734,0,0,1-1.155-2.732,4.154,4.154,0,0,1,1.174-2.848,4.359,4.359,0,0,1,3.137-1.347c1.847,0,3.155,1.039,3.155,2.155a1.1,1.1,0,0,1-1.116,1.135.978.978,0,0,1-1-.9.8.8,0,0,1,.231-.635,2.369,2.369,0,0,1,.5-.308c.115-.135-.327-.75-1.713-.75a2.092,2.092,0,0,0-1.963,1.173,4.467,4.467,0,0,0-.423,2.136,4.873,4.873,0,0,0,.366,2.232A1.99,1.99,0,0,0,902.377,677a2.878,2.878,0,0,0,2.655-2.078c.077-.154.635.134.577.269a3.8,3.8,0,0,1-3.5,2.559A4.107,4.107,0,0,1,899.221,676.542Z" transform="translate(-18.236 -0.46)" fill="#fff"/>
		    	 		 <path class="Path_261" data-name="Path 261" d="M915.282,675.382a3.561,3.561,0,0,1-3.348,2.405,4.584,4.584,0,0,1-3.31-1.328,3.756,3.756,0,0,1-1.1-2.771,4.075,4.075,0,0,1,1.193-2.809,4.03,4.03,0,0,1,2.963-1.328,3.644,3.644,0,0,1,2.694,1.116,4.093,4.093,0,0,1,1.02,2.867.156.156,0,0,1-.116.174c-3.117-.02-4.753.019-5.812.057a4.219,4.219,0,0,0,.423,2.059,2.238,2.238,0,0,0,2.233,1.193,2.65,2.65,0,0,0,2.578-1.866C914.82,675.054,915.3,675.266,915.282,675.382Zm-5.35-4.2a4.8,4.8,0,0,0-.462,1.924l4.08-.038c-.115-1.963-.75-2.848-2.078-2.848A1.74,1.74,0,0,0,909.932,671.186Z" transform="translate(-19.126 -0.453)" fill="#fff"/>
		    	 		 <path class="Path_262" data-name="Path 262" d="M923.571,676.735a3.689,3.689,0,0,1-2.483.9,6.5,6.5,0,0,1-2.309-.481c-.115,0-.231.193-.365.6-.019.077-.558.038-.558-.039-.039-.885-.116-1.963-.193-2.79,0-.1.558-.154.6-.077a4.162,4.162,0,0,0,.827,1.52,2.7,2.7,0,0,0,1.924.635,2.156,2.156,0,0,0,1.444-.423,1.234,1.234,0,0,0,.307-.847c0-.635-.442-.923-2.058-1.366a4.812,4.812,0,0,1-2.29-.943,1.709,1.709,0,0,1-.52-1.27,2.736,2.736,0,0,1,2.887-2.521,5.42,5.42,0,0,1,2.039.558c.116,0,.154-.173.347-.731a.993.993,0,0,1,.577,0,23.7,23.7,0,0,0-.058,2.617c0,.116-.558.116-.6.039a3.9,3.9,0,0,0-.77-1.213,1.99,1.99,0,0,0-1.578-.6,1.6,1.6,0,0,0-1.193.4,1.124,1.124,0,0,0-.308.77c0,.635.462.9,2.117,1.347a4.607,4.607,0,0,1,2.405,1.058,1.707,1.707,0,0,1,.481,1.251A2.388,2.388,0,0,1,923.571,676.735Z" transform="translate(-20.079 -0.441)" fill="#fff"/>
		  		 		</g>
				 		</svg>
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
            <svg class="Group_764" data-name="Group 764" xmlns="http://www.w3.org/2000/svg" wclassth="30" height="30" viewBox="0 0 30 30">
						  <g class="Group_113" data-name="Group 113">
						    <path class="Blue" d="M3.1,0H26.9A3.1,3.1,0,0,1,30,3.1V26.9A3.1,3.1,0,0,1,26.9,30H3.1A3.1,3.1,0,0,1,0,26.9V3.1A3.1,3.1,0,0,1,3.1,0Z" fill="#f45a1d"/>
						  </g>
						  <g class="Group_114" data-name="Group 114" transform="translate(3.75 3.75)">
						    <path class="Path_55" data-name="Path 55" d="M2033.105,2206.373c3,0,3.359.011,4.546.066a6.225,6.225,0,0,1,2.089.387,3.727,3.727,0,0,1,2.135,2.135,6.232,6.232,0,0,1,.387,2.089c.054,1.187.066,1.543.066,4.546s-.012,3.359-.066,4.546a6.23,6.23,0,0,1-.387,2.089,3.73,3.73,0,0,1-2.135,2.135,6.235,6.235,0,0,1-2.089.387c-1.186.054-1.542.066-4.546.066s-3.36-.011-4.546-.066a6.229,6.229,0,0,1-2.089-.387,3.73,3.73,0,0,1-2.135-2.135,6.21,6.21,0,0,1-.387-2.089c-.054-1.187-.066-1.543-.066-4.546s.011-3.36.066-4.546a6.211,6.211,0,0,1,.387-2.089,3.727,3.727,0,0,1,2.135-2.135,6.219,6.219,0,0,1,2.089-.387c1.186-.054,1.542-.066,4.546-.066m0-2.027c-3.055,0-3.438.013-4.638.068a8.262,8.262,0,0,0-2.731.523,5.752,5.752,0,0,0-3.29,3.29,8.267,8.267,0,0,0-.523,2.73c-.055,1.2-.068,1.583-.068,4.639s.013,3.438.068,4.638a8.265,8.265,0,0,0,.523,2.73,5.753,5.753,0,0,0,3.29,3.291,8.276,8.276,0,0,0,2.731.522c1.2.055,1.583.068,4.638.068s3.439-.013,4.639-.068a8.273,8.273,0,0,0,2.73-.522,5.755,5.755,0,0,0,3.291-3.291,8.259,8.259,0,0,0,.522-2.73c.055-1.2.068-1.583.068-4.638s-.013-3.439-.068-4.639a8.262,8.262,0,0,0-.522-2.73,5.754,5.754,0,0,0-3.291-3.29,8.259,8.259,0,0,0-2.73-.523c-1.2-.054-1.583-.068-4.639-.068Z" transform="translate(-2021.855 -2204.346)" fill="#fff"/>
						    <path class="Path_56" data-name="Path 56" d="M2036.754,2213.468a5.777,5.777,0,1,0,5.777,5.777A5.776,5.776,0,0,0,2036.754,2213.468Zm0,9.527a3.75,3.75,0,1,1,3.75-3.75A3.75,3.75,0,0,1,2036.754,2222.995Z" transform="translate(-2025.504 -2207.995)" fill="#fff"/>
						    <circle class="Ellipse_1" data-name="Ellipse 1" cx="1.35" cy="1.35" r="1.35" transform="translate(15.905 3.895)" fill="#fff"/>
						  </g>
						</svg>
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
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 300 35.86"><defs><style>.journeys-svg{fill:#f15d2d;}.cls-2{fill:#fff;}</style></defs><g class="Layer_2" data-name="Layer 2"><g class="Layer_1-2" data-name="Layer 1"><path class="journeys-svg" d="M300,35.86H0V0H300ZM2.07,33.79H297.93V2.07H2.07Z"/><path class="cls-2" d="M20.72,19.17c0,3.4-1.2,4.93-4.07,4.93a9.41,9.41,0,0,1-4-1.06l.72-2.31a8.43,8.43,0,0,0,2.55.47c1.07,0,1.62-.59,1.62-2V12h3.2Z"/><path class="cls-2" d="M38.54,18c0,3.94-2.28,6.14-6,6.14S26.42,21.9,26.42,18s2.28-6.21,6.07-6.21S38.54,14,38.54,18ZM35.3,18c0-2.22-1-3.34-2.81-3.34S29.66,15.74,29.66,18s1.05,3.28,2.83,3.28S35.3,20.12,35.3,18Z"/><path class="cls-2" d="M55.09,18.21c0,4-1.79,5.89-5.48,5.89s-5.46-1.9-5.46-5.89V12h3.2v6.26c0,2,.77,3,2.26,3s2.28-1,2.28-3V12h3.2Z"/><path class="cls-2" d="M71.74,23.93H68.32l-2.4-3.34H64.29v3.34h-3.2V12h5c3.38,0,5.28,1.61,5.28,4.47a3.69,3.69,0,0,1-2.28,3.64l2.68,3.61ZM66.1,18.09c1.34,0,2.08-.6,2.08-1.67s-.74-1.72-2.08-1.72H64.29v3.39Z"/><path class="cls-2" d="M85.22,23.93l-5.06-6.76v6.76H77V12h2.91l5.07,6.83V12h3.2v12Z"/><path class="cls-2" d="M94.5,23.93V12h8.84v2.9H97.7v1.81h4.81v2.75H97.7v1.67h5.8v2.85Z"/><path class="cls-2" d="M115.84,23.93h-3.18V20.16L108.17,12h3.35l2,3.77a14.67,14.67,0,0,1,.72,1.51c.2-.49.46-1,.73-1.51L117,12h3.36l-4.5,8.21Z"/><path class="cls-2" d="M133.06,15.23a10.67,10.67,0,0,0-3.89-.91c-.69,0-1.26.28-1.26.79s.46.77,3,1.63,3.22,1.73,3.22,3.73c0,2.18-1.59,3.63-4.4,3.63a12.45,12.45,0,0,1-5.66-1.63L125.3,20a9,9,0,0,0,4.28,1.39c.71,0,1.1-.29,1.1-.8s-.31-.71-2.63-1.4-3.41-2-3.41-3.83c0-2,1.47-3.59,4.18-3.59A11.86,11.86,0,0,1,134,12.89Z"/><path class="cls-2" d="M152.89,12c3,0,4.63,1.22,4.63,3.36a2.35,2.35,0,0,1-1.81,2.29c1.73.43,2.59,1.46,2.59,2.91,0,2.18-1.92,3.42-5.36,3.42h-4.81V12Zm-1.56,4.59h1.93c.78,0,1.24-.33,1.24-.94s-.59-1-1.61-1h-1.56Zm0,4.73H153c1.24,0,2-.43,2-1.17S154.36,19,153.26,19h-1.93Z"/><path class="cls-2" d="M163.78,23.93V12h8.83v2.9H167v1.81h4.81v2.75H167v1.67h5.79v2.85Z"/><path class="cls-2" d="M189.62,22.61a12.43,12.43,0,0,1-5.82,1.49c-3.59,0-5.87-2.2-5.87-6.14,0-3.71,2.38-6.21,6-6.21a13.71,13.71,0,0,1,5.18,1.08l-.8,2.38a14.86,14.86,0,0,0-4.09-.67c-1.82,0-3,1.38-3,3.42s1,3.31,2.77,3.31a7.66,7.66,0,0,0,2.91-.45V19.63h-3.07V17.11h5.84Z"/><path class="cls-2" d="M195.54,23.93V12h3.2v12Z"/><path class="cls-2" d="M213.41,23.93l-5.07-6.76v6.76h-3.2V12H208l5.07,6.83V12h3.2v12Z"/><path class="cls-2" d="M238.22,23.93V19.35H233.7v4.58h-3.2V12h3.2v4.5h4.52V12h3.2v12Z"/><path class="cls-2" d="M247.8,23.93V12h8.83v2.9H251v1.81h4.81v2.75H251v1.67h5.79v2.85Z"/><path class="cls-2" d="M273.16,23.93h-3.42l-2.39-3.34h-1.63v3.34h-3.2V12h5c3.37,0,5.28,1.61,5.28,4.47a3.7,3.7,0,0,1-2.28,3.64l2.67,3.61Zm-5.63-5.84c1.33,0,2.08-.6,2.08-1.67s-.75-1.72-2.08-1.72h-1.81v3.39Z"/><path class="cls-2" d="M278.38,23.93V12h8.84v2.9h-5.64v1.81h4.81v2.75h-4.81v1.67h5.79v2.85Z"/></g></g></svg>
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
