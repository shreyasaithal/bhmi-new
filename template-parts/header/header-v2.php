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
	<div class="flex-row container header-centered-logo">

		<div class="flex-column  header-left">
			<nav class="nav nav-left main-navigation" id="site-navigation" role="navigation">
				<?php do_action( 'av5_header_left' ); ?>
				<ul class="nav-menu">
					<?php do_action( 'av5_header_menu_left' ); ?>
				</ul>
			</nav>
		</div>
		<?php do_action( 'av5_header_logo' ); ?>
		<div class="header-right flex-column">
			<div class="nav nav-right main-navigation">
				<ul class="nav-menu">
					<?php do_action( 'av5_header_menu_right' ); ?>
				</ul>
				<?php do_action( 'av5_header_right' ); ?>
			</div>
		</div>
	</div> <!-- end container -->
</div> <!-- end masthead -->
