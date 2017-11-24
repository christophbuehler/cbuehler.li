<!DOCTYPE html>
<html lang="en">
<head>
  <meta content="width=device-width, user-scalable=no" name="viewport">
  <meta charset="UTF-8">
  <meta name="theme-color" content="#FFFFFF">

  <title><?php bloginfo('title')?></title>

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons|Source+Code+Pro:400,600,900" rel="stylesheet">
  <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<script src="<?php bloginfo('template_directory'); ?>/script/script.js"></script>
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <div class="profile">
    <div class="content-wrapper">
      <header>
        <div id="logo-container">
          <svg version="1.1" id="logo" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 270.2 338.1" style="enable-background:new 0 0 270.2 338.1;" xml:space="preserve"><style type="text/css">.st0{fill:none;stroke:#10181F;stroke-width:19;stroke-miterlimit:10;}</style><path class="st0 st01" d="M191.7,48.8C158,7,99.7-2.6,55.8,25.4C5.6,57.5-1.3,125.3,23.2,166.3C41,196,74.4,208.9,109,210.1c29.6,1,57.6-6.6,80.9-19.7C246.7,158.6,261.7,76.5,260.7,0l0,338.1"stroke-dasharray="2000"stroke-dashoffset="2000"/><path class="st0 st02" d="M112.6,210.1 l 0,128.1"stroke-dasharray="2000"stroke-dashoffset="2000"/><path class="st0 st03" d="M119.1,253.6 l 147,0"stroke-dasharray="2000"stroke-dashoffset="2000"/><script type="text/javascript">document.querySelector('svg').addEventListener('show', function(){show(false);});document.querySelector('svg').addEventListener('hide', function(){show(true);});function show(hide){[{selector: '.st01', transitionShow: 'stroke-dashoffset .8s linear', transitionHide: 'stroke-dashoffset .8s linear'},{selector: '.st02', transitionShow: 'stroke-dashoffset .48s linear .32s', transitionHide: 'stroke-dashoffset .48s linear'},{selector: '.st03', transitionShow: 'stroke-dashoffset .28s linear .52s', transitionHide: 'stroke-dashoffset .28s linear'}].map(function(anim){var path=document.querySelector(anim.selector);var length=path.getTotalLength();path.style.strokeDasharray=length + ' ' + length;if (hide){path.style.transition=path.style.WebkitTransition=anim.transitionHide;path.style.strokeDashoffset=length;return;}path.style.transition=path.style.WebkitTransition='none';path.style.strokeDashoffset=length;path.getBoundingClientRect();path.style.transition=path.style.WebkitTransition=anim.transitionShow;path.style.strokeDashoffset="0";});}</script></svg><br>
          <span id="logo-font">cb&uuml;hler</span>
        </div>
        <div class="clear">
          <a class="nav-link" href="#projects" id="projects-link">projects</a>
          <a class="nav-link" href="#profile" id="profile-link">profile</a>
        </div>
      </header>
      <div class="content">
        Christoph Bühler is a software developer from Liechtenstein.<br><br>
        Besides from being interested in the full stack, he is passionate about visual communication and user experience.<br><br>
        <a href="mailto: christoph.buehler@hotmail.com">get in touch</a>
      </div>
    </div>
  </div>
  <div id="projects">
    <div id="sections"></div>
    <ul id="project-nav">
      <?php
      $posts = get_posts(array('post_status' => 'publish'));
      foreach ($posts as $post) {
        echo sprintf('<li><a class="nav-link" data-post-name="%s" href="#projects/%s">%s</a></li>', $post->post_name, $post->post_name, get_the_title());
      }
      ?>
    </ul>
    <footer class="project-footer">
      <a id="close-link" href="#profile">
        <span class="nav-link">close</span>
      </a>
    </footer>
  </div>
  <?php wp_footer(); ?>
</body>
</html>
