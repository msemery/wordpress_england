<?php
/**
 * Page Meta-Data Template
 *
 * The template used for displaying page meta data for the pages
 *
 * @package      responsive_mobile
 * @license      license.txt
 * @copyright    2014 CyberChimps Inc
 * @since        0.0.1
 *
 * Please do not edit this file. This file is part of the responsive_mobile Framework and all modifications
 * should be made in a child theme.
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
?>

<header class="entry-header">
	<?php if( get_post_meta( get_the_ID(), 'cyberchimps_page_title_toggle', true ) ) {
		the_title( '<h1 class="entry-title post-title">', '</h1>' ); 
	}?>

	<?php if ( comments_open() ) : ?>
		<div class="post-meta">
			<?php responsive_mobile_post_meta_data(); ?>
			<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
				<span class="comments-link">
					<span class="mdash">&mdash;</span>
					<?php comments_popup_link( __( 'No Comments &darr;', 'responsive-mobile' ), __( '1 Comment &darr;', 'responsive-mobile' ), __( '% Comments &darr;', 'responsive-mobile' ) ); ?>
				</span>
			<?php endif; ?>
		</div><!-- .post-meta -->
	<?php endif; ?>
</header><!-- .entry-header -->
