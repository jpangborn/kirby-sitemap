<?php

  $excludepages = c::get('sitemap.exclude.pages', array('error'));
  $excludetemplates = c::get('sitemap.exclude.templates', array());
  $excludeinvisible = c::get('sitemap.exclude.invisible', array());
  $important = c::get('sitemap.important', array());

  $kirby->set('route', array(
    'pattern' => 'sitemap.xml',
    'action' => function() use ($excludepages, $excludetemplates, $excludeinvisible, $important) {
      $sitemap = tpl::load(__DIR__ . DS . 'template.php', array(
        'pages' => site()->pages(),
        'excludepages' => $excludepages,
        'excludetemplates' => $excludetemplates,
        'excludeinvisible' => $excludeinvisible,
        'important' => $important), true);

      return new Response($sitemap, 'xml');
    }
  ));
