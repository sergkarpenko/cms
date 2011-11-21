<?php

/**
 * NewsTranslation filter form base class.
 *
 * @package    si-invest
 * @subpackage filter
 * @author     sergk
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseNewsTranslationFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'annotation' => new sfWidgetFormFilterInput(),
      'content' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'name' => new sfValidatorPass(array('required' => false)),
      'annotation' => new sfValidatorPass(array('required' => false)),
      'content' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('news_translation_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'NewsTranslation';
  }

  public function getFields()
  {
    return array(
      'id' => 'Number',
      'name' => 'Text',
      'annotation' => 'Text',
      'content' => 'Text',
      'lang' => 'Text',
    );
  }
}
