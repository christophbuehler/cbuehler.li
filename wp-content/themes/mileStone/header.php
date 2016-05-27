<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, user-scalable=no">
	<meta charset="utf-8" />
	
	<title><?php bloginfo('title')?></title>
	
	<link href='http://fonts.googleapis.com/css?family=Noto+Sans:400,700|Noto+Serif' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url')?>" />
	<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
	<script src="<?php bloginfo('template_directory'); ?>/script/patternText.js"></script>
	<script src="<?php bloginfo('template_directory'); ?>/script/main.js"></script>

	<?php wp_head()?>
</head>
<body <?php body_class(); ?>>
	<header id="header1">
		<div id="menuBtn"></div>
	</header>
	<div id="wrapper">
		<div id="leftNav">
			<div id="scrollWrapper">
				<div id="header-text" class="paragraph">
					<a href="http://www.cbuehler.li/about"><b>Christoph B&uuml;hlers</b> blog. Web, game development and more.</a> 
				</div>
				
				<?php get_search_form(); ?>

				<nav id="recentPosts">
					<ul>
					<?php
						query_posts(array('post_type' => 'post', 'order' => 'DESC'));

						while ( have_posts() ) {
						    the_post();

						    echo '<li><a title="';
						    the_title_attribute();
						    echo '" href="';
						    the_permalink();
						    echo '">';
						    the_title();
						    echo '</a><div class="tagList">';
						    the_tags('', '', '');
						    echo '</div></li>';
						}

					    wp_reset_query();
					 ?>
					</ul>
				</nav>

				<div id="tagCloud">
					<?php wp_tag_cloud(); ?>
				</div>
			</div>
		</div>
		<div id="scrollBox">
			<div id="container1">