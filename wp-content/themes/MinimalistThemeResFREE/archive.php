<?php get_header(); ?>	
	
		<div id="posts_cont">
	<?php if(is_category()) { ?>
	<div class="archive_title">
		<?php printf( __( '%s', 'twentyten' ), '<span>' . single_cat_title( '', false ) . '</span>' ); ?>
	</div><!--//archive_title-->
	<?php } ?>	
			<?php
			if(!is_paged()) {
				echo '<div class="gutter-sizer"></div>';
				echo '<div class="grid-sizer"></div>';
			}
			$args = array_merge( $wp_query->query, array( 'posts_per_page' => 6 ) );
			query_posts($args);
			$x = 0;
			while (have_posts()) : the_post(); ?>
			<div class="post_box">
			<div class="post_left">
					<?php if(get_post_meta( get_the_ID(), 'page_featured_type', true ) == 'youtube') { ?>
						<iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo get_post_meta( get_the_ID(), 'page_video_id', true ); ?>?wmode=transparent" frameborder="0" allowfullscreen></iframe>
					<?php } elseif(get_post_meta( get_the_ID(), 'page_featured_type', true ) == 'vimeo') { ?>
						<iframe src="https://player.vimeo.com/video/<?php echo get_post_meta( get_the_ID(), 'page_video_id', true ); ?>?title=0&amp;byline=0&amp;portrait=0&amp;color=03b3fc" width="500" height="338" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
					<?php } else { ?>								
						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('home-blog-neue'); ?></a>
					<?php } ?>
			</div>
			<div class="post_right">
				<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				
				<p><?php echo ds_get_excerpt('275'); ?></p>
			</div> 
			<div class="clear"></div>
			</div><!-- //post_box -->
			<?php endwhile; ?>
		</div> <!-- //posts_cont -->
		<div class="clear"></div>
		<div class="load_more_cont">
			<div align="center"><div class="load_more_text">
			<?php
			ob_start();
			next_posts_link('<img src="' . get_bloginfo('stylesheet_directory') . '/images/loading-button.png" />');
			$buffer = ob_get_contents();
			ob_end_clean();
			if(!empty($buffer)) echo $buffer;
			?>
			</div></div>
		</div><!--//load_more_cont-->     					
		<div class="clear"></div>
<script type="text/javascript">
$(document).ready(function($){
//jQuery(window).load(function($) {
	var $container = $('.home_posts_cont');
  $('#posts_cont').infinitescroll({
 
    navSelector  : "div.load_more_text",            
		   // selector for the paged navigation (it will be hidden)
    nextSelector : "div.load_more_text a:first",    
		   // selector for the NEXT link (to page 2)
    itemSelector : "#posts_cont .post_box"
		   // selector for all items you'll retrieve
  },function(arrayOfNewElems){
  
	  $('#posts_cont').append('<div class="clear"></div>');
	    var $newElems = $( arrayOfNewElems );
	    $container.imagesLoaded( function() {
		    $container.masonry( 'appended', $newElems );	  
		});
  
      //$('.home_post_cont img').hover_caption();
 
     // optional callback when new content is successfully loaded in.
 
     // keyword `this` will refer to the new DOM content that was just added.
     // as of 1.5, `this` matches the element you called the plugin on (e.g. #content)
     //                   all the new elements that were found are passed in as an array
 
  });  
});
</script>	

<?php get_footer(); ?> 		