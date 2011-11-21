<?php

/**
 * Investor form base class.
 *
 * @method Investor getObject() Returns the current form's model object
 *
 * @package    si-invest
 * @subpackage form
 * @author     sergk
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseInvestorForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id' => new sfWidgetFormInputHidden(),
      'whois' => new sfWidgetFormInputText(),
      'name' => new sfWidgetFormInputText(),
      'project' => new sfWidgetFormInputText(),
      'role' => new sfWidgetFormInputText(),
      'phone' => new sfWidgetFormInputText(),
      'email' => new sfWidgetFormInputText(),
      'message' => new sfWidgetFormTextarea(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'whois' => new sfValidatorString(array('max_length' => 255)),
      'name' => new sfValidatorString(array('max_length' => 255)),
      'project' => new sfValidatorString(array('max_length' => 255)),
      'role' => new sfValidatorString(array('max_length' => 255)),
      'phone' => new sfValidatorString(array('max_length' => 255)),
      'email' => new sfValidatorString(array('max_length' => 255)),
      'message' => new sfValidatorString(array('required' => false)),
      'created_at' => new sfValidatorDateTime(),
      'updated_at' => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('investor[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Investor';
  }

}
