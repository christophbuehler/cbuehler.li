<?php
/*
Template Name: No comments
*/

get_header() ?>

<?php
if ( have_posts() ) {
	while ( have_posts() ) : the_post();
		echo "<h1>" . get_the_title() . "</h1>";
		echo "<div class='container2'><div>";
		the_content();
		echo "</div></div>";
	endwhile;
} else {
	echo "<div class='container2'><div>No posts found.</div></div>";
}
?>

<?php get_footer()?>