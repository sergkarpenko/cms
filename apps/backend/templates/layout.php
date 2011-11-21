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
</head>
<body>
<div id="panel" class="ui-widget-header ui-corner-all ui-helper-clearfix">
  <span>Панель управления</span>
      <span style="float:right">
          Пользователь: <?php echo $sf_user->getUsername() ?> |
          <a href="<?php echo url_for('@sf_guard_signout') ?>">Выход</a>
      </span>
</div>
<ul class="sf-menu">
  <li><a href="<?php echo url_for('page') ?>">Страницы</a></li>
  <li><a href="<?php echo url_for('news') ?>">Новости</a></li>
  <li><a href="<?php echo url_for('menu') ?>">Меню</a></li>
  <li><a href="<?php echo url_for('gallery') ?>">Галерея</a></li>
  <li><a href="<?php echo url_for('block') ?>">Блоки</a></li>
  <li><a href="<?php echo url_for('feedback') ?>">Обратная связь</a></li>
  <li><a href="<?php echo url_for('investor') ?>">Анкеты инвесторов</a></li>
  <li>
    <a href="#">Пользователи</a>
    <ul>
      <li><a href="<?php echo url_for('guard/permissions') ?>">Разрешения</a></li>
      <li><a href="<?php echo url_for('guard/groups') ?>">Группы</a></li>
      <li><a href="<?php echo url_for('guard/users') ?>">Пользователи</a></li>
    </ul>
  </li>
  <li><a href="<?php echo url_for('@sf_guard_signout') ?>">Выход</a></li>
</ul>
<p style="clear: both"/>
<?php echo $sf_content ?>
</body>
</html>
