<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package abstrak
 */

$unique_id = esc_attr( abstrak_unique_id( 'search-' ) );
?>
<div class="widget widget-search">
    <form  id="<?php echo esc_attr($unique_id); ?>"  action="<?php echo esc_url(home_url( '/' )); ?>" method="GET" class="blog-search">
        <div class="axil-search blog-search form-group">
            <input  type="text"  name="s"  placeholder="<?php echo esc_attr_x( 'Search ...', 'placeholder', 'abstrak' ); ?>" value="<?php echo get_search_query(); ?>"/>
            <button type="submit" class="search-button"><i class="fal fa-search"></i></button>
        </div>
    </form>
</div>
