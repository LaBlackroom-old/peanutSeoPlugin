<?php use_helper('Date') ?>
<?xml version="1.0" encoding="UTF-8" ?>
<?xml-stylesheet type="text/xsl" href="/peanutSeoPlugin/seo/sitemap.xsl" ?>

<!-- generator="peanut with his bff symfony" -->
<urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd" xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

  <?php
    $seoHomepage = sfConfig::get('app_seo_homepage');
    $seoPage = sfConfig::get('app_seo_page');
    $seoLink = sfConfig::get('app_seo_link');
  ?>
  
  <url>
  	<loc><?php echo url_for('@homepage', true) ?></loc>
    <lastmod><?php echo format_date($pageSitemap[0]['updated_at'], 'yyyy-MM-dd'); ?></lastmod>
  	<changefreq><?php echo $seoHomepage['changefreq']; ?></changefreq>
  	<priority><?php echo $seoHomepage['priority']; ?></priority>
  </url>

  <?php foreach($pageSitemap as $sitemap) { ?>
  
  <url>
  	<loc><?php echo url_for('item_show', array('slug' => $sitemap['slug'], 'sf_format' => 'html'), true) ?></loc>
  	<lastmod><?php echo format_date($sitemap['updated_at'], 'yyyy-MM-dd'); ?></lastmod>
  	<changefreq><?php echo $seoPage['changefreq']; ?></changefreq>
  	<priority><?php echo $seoPage['priority']; ?></priority>
  </url>
  
  <?php } ?>

  <?php foreach($linkSitemap as $sitemap) { ?>

  <url>
  	<loc><?php echo url_for('item_show', array('slug' => $sitemap['slug'], 'sf_format' => 'html'), true) ?></loc>
  	<lastmod><?php echo format_date($sitemap['updated_at'], 'yyyy-MM-dd'); ?></lastmod>
  	<changefreq><?php echo $seoLink['changefreq']; ?></changefreq>
  	<priority><?php echo $seoLink['priority']; ?></priority>
  </url>

  <?php } ?>



</urlset>