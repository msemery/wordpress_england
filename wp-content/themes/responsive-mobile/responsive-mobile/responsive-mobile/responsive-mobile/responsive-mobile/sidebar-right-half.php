<?php
/**
 * Sidebar Right Half
 *
 * Displays on the right of the Content Sidebar Half Page
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

responsive_mobile_widgets_before(); // above widgets container hook ?>
	<div id="widgets" class="widget-area right-half-sidebar" role="complementary" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">
		<?php responsive_mobile_widgets(); // above widgets hook ?>

		<?php if( !dynamic_sidebar( 'right-sidebar-half' ) ) : ?>
			<aside class="widget-wrapper">

				<h3 class="widget-title"><?php _e( 'In Archive', 'responsive-mobile' ); ?></h3>
				<ul>
					<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
				</ul>

			</aside><!-- end of .widget-wrapper -->
		<?php endif; //end of sidebar-right-half ?>

		<?php responsive_mobile_widgets_end(); // after widgets hook ?>
	</div><!-- end of #widgets -->
<?php responsive_mobile_widgets_after(); // after widgets container hook ?>