<h2><?php echo __('КРАТКАЯ  АНКЕТА ИНВЕСТОРА')?></h2>

<?php if ($form->hasErrors()): ?>
<div class="error_list"><?php echo __('При заполнении формы были допущены ошибки!')?></div>
<?php endif ?>

<form method="post" action="">
  <table id="feedback_form">
    <tfoot>
    <tr>
      <td colspan="2">
        <input type="submit" value=<?php echo __("Отправить")?>/>
      </td>
    </tr>
    </tfoot>
    <tbody>
    <?php echo $form ?>
    </tbody>
  </table>
</form>