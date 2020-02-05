<?php get_header();
		global $post;

	 $info = get_post_meta($post->ID);

	 $mainInfo = get_post_meta($post->ID, 'main_info', true);
	 $department = get_post_meta($post->ID, 'member-department', true);
	 $phone = get_post_meta($post->ID, 'member-phone', true);
	 $email = get_post_meta($post->ID, 'member-email', true);
	 $website = get_post_meta($post->ID, 'member-website', true);
	 $office = get_post_meta($post->ID, 'member-office', true);
	 $moreInfo = get_post_meta($post->ID, 'member-moreInfo', true);
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
     <div class="team-member_wrap wrap">
				<?php echo "<h2 class='entry-title'>" . get_the_title() ."</h2>"  ; ?>
				<?php  ?>
   		</div><!-- .wrap -->
	</header><!-- .entry-header -->

	<div class="entry-content">
   <div class="team-member_wrap wrap">
		 <?php
		?>
			<div class="team-member-main-info-container">
				<div class="team-member-image">
					<?php if(has_post_thumbnail()){
									the_post_thumbnail('portrait');
								}else{
									echo "<img src='../../wp-content/plugins/ufclas-team-members/images/placeholder.jpg' alt='Placeholder image for a headshot' />";
								}?>
				</div>

				<?php if(!empty($mainInfo)){ ?>
					<div class="team-member-main-info">
						<?php echo "$mainInfo"; ?>
					</div>
				<?php } ?>

				<h3>Contact Information</h3>
				<?php if(!empty($email)){
						//Removes @ufl.edu from showing up on the fron-end
				 		$strippedEmail = str_replace('@ufl.edu','', $email);
					?>
					<div class="team-member-email">
						<?php echo "<span class='bold-contact'>Email: </span> <a href='mailto:$email'>$strippedEmail</a>"; ?>
					</div>
				<?php } ?>

				<?php if(!empty($office)){ ?>
					<div class="team-member-office">
						<?php echo "<span class='bold-contact'>Office: </span> $office"; ?>
					</div>
				<?php } ?>

				<?php if(!empty($phone)){ ?>
					<div class="team-member-phone">
						<?php echo "<span class='bold-contact'>Phone: </span> <a href='tel:$phone'> $phone</a>"; ?>
					</div>
				<?php } ?>

				<?php if(!empty($website)){ ?>
					<div class="team-member-website">
						<?php echo "<a href='$website' target='_blank'>Website</a>"; ?>
					</div>
				<?php } ?>
			</div>

			<div class="team-member-additional-info">
				<?php echo "$moreInfo <br />" ?>
			</div>
   </div><!-- .wrap -->
	</div><!-- .entry-content -->
</article><!-- #post-## -->

<?php


get_footer(); ?>
