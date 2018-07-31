<?php
/**
 * 5th-Avenue header layout
 *
 * @package 5th-Avenue
 * @version 1.0.0
 * @author lifeis.design
 */

defined( 'ABSPATH' ) || exit;

?>
<div id="masthead" class="header-main">
	<div class="flex-row container header-centered-logo ">
		<div class="header-left flex-column">
			<div class="nav nav-left">
				<?php do_action( 'av5_header_left' ); ?>
			</div>
		</div>		

		<?php do_action( 'av5_header_logo' ); ?>

		<div class="header-right flex-column">
			<div class="nav nav-right">
				<?php do_action( 'av5_header_right' ); ?>
			</div>
		</div>

	</div> <!-- end container -->
	<div class="menu-under-header--wrapper">
		<nav class="nav nav-center main-navigation" id="site-navigation" role="navigation">
			<ul class="nav-menu">
				<?php do_action( 'av5_header_menu_left' ); ?>
			</ul>
		</nav>
	</div>
</div> <!-- end masthead -->
