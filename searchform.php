<?php
/**
 * 5th-Avenue search form
 *
 * @package 5th-Avenue
 * @version 1.0.0
 */

defined( 'ABSPATH' ) || exit;

?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="text" required class="search-field" 
		   placeholder="<?php esc_attr_e( 'Search...', '5th-avenue' ); ?>" 
		   value="<?php the_search_query(); ?>" name="s" id="search"
		   title="<?php esc_attr_e( 'Search for:', '5th-avenue' ); ?>" />	
	<button type="submit" value="<?php esc_attr_e( 'Search', '5th-avenue' ); ?>" class="search-submit"><i class="icon-5ave-search-3"></i><i class="fa-chevron-right"></i><span></span></button>
</form>



