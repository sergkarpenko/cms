<?php

/**
 * PageTranslation form base class.
 *
 * @method PageTranslation getObject() Returns the current form's model object
 *
 * @package    si-invest
 * @subpackage form
 * @author     sergk
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePageTranslationForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id' => new sfWidgetFormInputHidden(),
      'name' => new sfWidgetFormInputText(),
      'content' => new sfWidgetFormTextarea(),
      'title' => new sfWidgetFormInputText(),
      'keywords' => new sfWidgetFormTextarea(),
      'description' => new sfWidgetFormTextarea(),
      'lang' => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name' => new sfValidatorString(array('max_length' => 255)),
      'content' => new sfValidatorString(array('required' => false)),
      'title' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'keywords' => new sfValidatorString(array('required' => false)),
      'description' => new sfValidatorString(array('required' => false)),
      'lang' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('lang')), 'empty_value' => $this->getObject()->get('lang'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('page_translation[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'PageTranslation';
  }

}
