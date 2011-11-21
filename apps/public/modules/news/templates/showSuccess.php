<h2><?php echo __('НОВОСТИ')?> / <?php echo $news->name ?></h2>
<div style="margin-bottom: 10px">
  <?php echo $sf_data->getRaw('news')->content ?>
  <a href="<?php echo url_for('@news')?>"><?php echo __('К списку новостей')?></a>
</div>