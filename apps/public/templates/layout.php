<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <?php include_http_metas() ?>
  <?php include_metas() ?>
  <?php include_title() ?>
  <link rel="shortcut icon" href="/favicon.ico"/>
  <?php include_stylesheets() ?>
  <?php include_javascripts() ?>
  <!--[if IE 6]>
  <script type="text/javascript" src="/js/DD_belatedPNG_0.0.8a-min.js"></script>
  <script type="text/javascript">DD_belatedPNG.fix('.png');</script>
  <![endif]-->
  <!--[if lte IE 7]>
  <script type="text/javascript">
      $(function(){
          var m = 0;
          $('#menu a').each(function(){
              if ($('#menu').height() - $(this).height() > 0)
                  m = ($('#menu').height() - $(this).height())/2;
              else
                  m = 0;
              $(this).css('padding-top', m);
              $(this).css('padding-bottom', m);
              $(this).css('width', $(this).width());
          });
      });
  </script>
  <![endif]-->
  <script type="text/javascript">
    $(document).ready(function() {
      $('#gallery').infiniteCarousel({
        imagePath: '/js/infinitecarousel/images/',
        textholderHeight : 0,
        displayProgressBar: false,
        autoHideControls: true,
        displayTime: 10000,
        displayThumbnailBackground: false
      });
    });
  </script>
</head>
<body>
<div id="container">
  <div id="header">
    <div id="menu">
      <?php include_component('menu', 'list', array('lang' => $sf_user->getCulture())) ?>
    </div>
    <div id="logo" class="png">
      <div style="float: right; margin-top:-12px">
        <?php $l = $sf_user->getCulture() ?>
        <?php foreach (sfConfig::get('app_lang_original_names') as $lang => $description): ?>
        <a href="<?php echo str_replace('/' . $l . '/', '/' . $lang . '/', $_SERVER['REQUEST_URI']) ?>"
           title="<?php echo $description ?>">
          <img class="png" src="/images/flags/<?php echo $lang ?>.png" alt="<?php echo $description ?>"/></a>
        <?php endforeach ?>
      </div>
      <a href="<?php echo url_for('@localized_homepage') ?>"><img src="/images/logo.png" alt="Союз инвесторов"
                                                                  class="png" style="float: left"></a>
      <?php use_helper('I18N')?>
      <div id="slogan"> <?php echo __('Честность')?>,<br/> <?php echo __('Надежность')?>
        ,<br/> <?php echo __('Профессионализм')?></div>
      <div style="clear: both;"/>
    </div>

  </div>

  <div id="wrapper">
    <div id="content">
      <?php include_component('gallery', 'show', array('lang' => $sf_user->getCulture())) ?>
      <?php echo $sf_content ?>
    </div>
  </div>

  <div id="navigation">
    <div id="news">
      <?php include_component('news', 'top', array('lang' => $sf_user->getCulture())) ?>
    </div>
    <div id="projects">
      <div class="header"><?php echo __('ПРОЕКТЫ')?></div>
      <?php include_component('block', 'show', array('name' => 'projects', 'lang' => $sf_user->getCulture())) ?>
    </div>
    <div id="partners">
      <div class="header"><?php echo __('НАШИ ПАРТНЕРЫ')?></div>
      <?php include_component('block', 'show', array('name' => 'partners', 'lang' => $sf_user->getCulture())) ?>
      <div style="clear: both"></div>
    </div>
    <div id="contacts">
      <div class="header"><?php echo __('НАШИ КООРДИНАТЫ')?></div>
      <div class="wrap">
        <?php include_component('block', 'show', array('name' => 'contacts', 'lang' => $sf_user->getCulture())) ?>
      </div>
    </div>
  </div>

  <div id="extra">
  </div>

  <div id="footer">
    <p><?php echo __('Все права на материалы охраняются в соответствии с законодательством Украины.')?> &copy; site.org
      2010 </p>
  </div>
</div>
</body>
</html>
