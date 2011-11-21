<?php

/**
 * Menu form.
 *
 * @package    si-invest
 * @subpackage form
 * @author     sergk
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class MenuForm extends BaseMenuForm
{
  public function configure()
  {
    $this->i18nInit();

    $this->widgetSchema['status'] = new sfWidgetFormChoice(array(
      'choices' => $this->statuses
    ));

  }
}
