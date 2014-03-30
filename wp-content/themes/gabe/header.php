<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>
      <?php wp_title('$laquo;', true, 'right'); ?> <?php bloginfo('name'); ?>
    </title>
    <link
      rel="stylesheet"
      href="<?php bloginfo('stylesheet_url'); ?>"
      type="text/css" />
    <script
      type="text/javascript"
      src="<?php bloginfo('template_url'); ?>/js/scripts.js" />
    <link
      rel="shortcut icon"
      type="image/x-icon"
      href="<?php bloginfo('template_url'); ?>/images/favicon.ico" />

    <?php wp_head(); ?>
  </head>
  <body>
  <div id="wrapper">
    <div id="container">
