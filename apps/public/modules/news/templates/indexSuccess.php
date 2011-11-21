<?php use_helper('Date') ?>
<h2><?php echo __('НОВОСТИ')?></h2>
<?php if (count($pager)): ?>
<?php foreach ($pager as $item): ?>
  <div class="news-item" style="margin-bottom: 7px">
    <?php echo link_to($item->name, '@news_show?id=' . $item->id) ?>
    <br/><?php echo $item->annotation ?>
    <br/><?php echo format_date($item->created_at) ?>
  </div>
  <?php endforeach ?>
<?php if ($pager->haveToPaginate()): ?>
  <div class="pagination">

    <?php if ($pager->getPage() != $pager->getPreviousPage()) : ?>
    <a href="<?php echo url_for('@news') ?>?page=<?php echo $pager->getPreviousPage() ?>">
      &larr; <?php echo __('Назад')?>
    </a>
    <?php endif ?>
    &nbsp;
    <?php if ($pager->getPage() != $pager->getNextPage()) : ?>
    <a href="<?php echo url_for('@news') ?>?page=<?php echo $pager->getNextPage() ?>">
      <?php echo __('Вперед')?> &rarr;
    </a>
    <?php endif ?>

  </div>
  <?php endif; ?>
<?php else: ?>
<?php echo __('Новостей не найдено') ?>
<?php endif ?>