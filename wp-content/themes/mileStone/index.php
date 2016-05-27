<?php get_header() ?>

<?php
	if ( have_posts() ) {
		while ( have_posts() ) : the_post();
			echo "<h1>" . get_the_title() . "</h1>";
			echo "<div class='container2'><div>";
			
			/* if ($s != '') {
				$content = get_the_content(); $keys = explode(" ", $s);
				$content = preg_replace('/('.implode('|', $keys) .')/iu', '<strong class="search-excerpt">\0</strong>', $content);
				echo $content;
			} else {
				the_content();
			} */
			
			the_content();
	
			echo "</div></div>";
			comments_template();
		endwhile;
	} else {
		echo "<div class='container2'><div>No posts found.</div></div>";
	}
	?>

<?php get_footer()?>