<?php use_helper('I18N') ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
  <?php include_http_metas() ?>
  <?php include_metas() ?>
  <?php include_title() ?>
  <link rel="shortcut icon" href="/favicon.ico"/>
  <?php include_stylesheets() ?>
  <?php include_javascripts() ?>
</head>
<body>
<div id="login" class="ui-widget-content ui-corner-all">
  <div class="ui-widget-header ui-corner-all" style="text-align: center; margin: 3px;padding: 5px;">
    Союз Инвесторов
  </div>
  <form action="<?php echo url_for('@sf_guard_signin') ?>" method="post">
    <p class="row">
      <label>Логин</label>
      <?php echo $form['username']->render(array('class' => 'text ui-widget-content ui-corner-all')) ?>
    </p>

    <p class="row">
      <label>Пароль</label>
      <?php echo $form['password']->render(array('class' => 'text ui-widget-content ui-corner-all')) ?>
    </p>

    <p class="row">
      <label>Запомнить?</label>
      <?php echo $form['remember']->render(array('class' => 'text ui-widget-content ui-corner-all')) ?>
    </p>

    <p class="row center ui-dialog-buttonpane ui-widget-content ui-helper-clearfix" style="border: 0">
      <input value="Вход" type="submit" class="ui-state-default ui-corner-all"/>
      <?php echo $form['_csrf_token']->render() ?>
    </p>
  </form>
  <?php /* echo get_partial('sfGuardAuth/signin_form', array('form' => $form)) */?>
</div>
</body>
</html>

