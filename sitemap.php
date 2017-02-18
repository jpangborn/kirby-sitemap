<?php

  $excludepages = c::get('sitemap.exclude.pages', array('error'));
  $excludetemplates = c::get('sitemap.exclude.templates', array());
  $important = c::get('sitemap.important', array());

  $kirby->set('routes', array(
    'pattern' => 'sitemap.xml',
    'action' => function() use ($excludepages, $excludetemplates, $important) {
      $sitemap = tpl::load(__DIR__ . DS . 'template.php', array(
        'pages' => site()->pages(),
        'excludepages' => $excludepages,
        'excludetemplates' => $excludetemplates,
        'important' => $important), true);

      return new Response($sitemap, 'xml');
    }
  ));
