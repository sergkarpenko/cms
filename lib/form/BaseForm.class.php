<?php

/**
 * Base project form.
 *
 * @package    si-invest
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: BaseForm.class.php 20147 2009-07-13 11:46:57Z FabianLange $
 */
class BaseForm extends sfFormSymfony
{
  protected $statuses = array(0 => 'Активно', 1 => 'Неактивно');

  protected function i18nInit()
  {
    $langs = sfConfig::get('app_lang_list');
    $this->embedI18n(array_keys($langs));

    foreach ($langs as $lang => $description)
    {
      $this->widgetSchema->setLabel($lang, $description);
    }
  }
}
