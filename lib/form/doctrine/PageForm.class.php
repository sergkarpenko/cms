<?php

/**
 * Page form.
 *
 * @package    si-invest
 * @subpackage form
 * @author     sergk
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PageForm extends BasePageForm
{
  public function configure()
  {
    unset($this['created_at'], $this['updated_at']);
    $this->i18nInit();

    $this->widgetSchema['status'] = new sfWidgetFormChoice(array(
      'choices' => $this->statuses
    ));
  }
}
