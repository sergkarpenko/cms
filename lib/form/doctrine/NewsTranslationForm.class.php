<?php

/**
 * NewsTranslation form.
 *
 * @package    si-invest
 * @subpackage form
 * @author     sergk
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class NewsTranslationForm extends BaseNewsTranslationForm
{
  public function configure()
  {
    $this->widgetSchema['content'] = new sfWidgetFormCKEditor();
    $this->widgetSchema->setLabel('content', 'Содержимое');
    $this->widgetSchema->setLabel('annotation', 'Аннотация');
  }
}
