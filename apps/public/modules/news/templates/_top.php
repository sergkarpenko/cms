<?php use_helper('Date') ?>
<div class="news-header"><?php echo __('ПОСЛЕДНИЕ НОВОСТИ')?></div>
<?php foreach ($newss as $item): ?>
<div class="item">
  <?php if ($item->picture): ?>
  <img src="/uploads/news/<?php echo $item->picture?>" alt="<?php echo $item->name ?>"/>
  <?php else: ?>
  <img src="/images/news-template.png" alt="<?php echo $item->name ?>"/>
  <?php endif; ?>
  <?php echo link_to($item->name, '@news_show?id=' . $item->id) ?>
  <br/><?php echo format_date($item->created_at) ?>
</div>
<?php endforeach ?>