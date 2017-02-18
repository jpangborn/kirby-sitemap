<?= '<?xml version="1.0" encoding="utf-8"?>' ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
  <?php foreach($pages->index() as $p): ?>
  <?php if(in_array($p->uri(), $excludepages)) continue ?>
  <?php if(in_array($p->template(), $excludetemplates)) continue ?>
  <?php if(in_array($p->template(), $excludeinvisible) && $p->isInvisible()) continue ?>
  <url>
    <loc><?= html($p->url()) ?></loc>
    <lastmod><?= $p->modified('c') ?></lastmod>
    <priority><?= ($p->isHomePage() || in_array($p->uri(), $important)) ? 1 : number_format(0.5/$p->depth(), 1) ?></priority>
  </url>
  <?php endforeach ?>
</urlset>
