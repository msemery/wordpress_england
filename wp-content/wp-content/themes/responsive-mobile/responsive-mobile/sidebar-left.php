<?php
/**
 * Sidebar Left
 *
 * Displays on the left of a page
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
	<div id="widgets" class="widget-area left-sidebar"  role="complementary" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">
		<?php responsive_mobile_widgets(); // above widgets hook ?>

		<?php if( !dynamic_sidebar( 'left-sidebar' ) ) : ?>
			<aside id="archives" class="widget-wrapper">

				<h1 class="widget-title"><?php _e( 'In Archive', 'responsive-mobile' ); ?></h1>
				<ul>
					<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
				</ul>

			</aside><!-- end of .widget-wrapper -->
		<?php endif; //end of right-left ?>

		<?php responsive_mobile_widgets_end(); // after widgets hook ?>
	</div><!-- end of #widgets -->
<?php responsive_mobile_widgets_after(); // after widgets container hook ?>