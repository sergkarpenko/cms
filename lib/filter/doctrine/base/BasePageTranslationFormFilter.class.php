<?php

/**
 * PageTranslation filter form base class.
 *
 * @package    si-invest
 * @subpackage filter
 * @author     sergk
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasePageTranslationFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'content' => new sfWidgetFormFilterInput(),
      'title' => new sfWidgetFormFilterInput(),
      'keywords' => new sfWidgetFormFilterInput(),
      'description' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'name' => new sfValidatorPass(array('required' => false)),
      'content' => new sfValidatorPass(array('required' => false)),
      'title' => new sfValidatorPass(array('required' => false)),
      'keywords' => new sfValidatorPass(array('required' => false)),
      'description' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('page_translation_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'PageTranslation';
  }

  public function getFields()
  {
    return array(
      'id' => 'Number',
      'name' => 'Text',
      'content' => 'Text',
      'title' => 'Text',
      'keywords' => 'Text',
      'description' => 'Text',
      'lang' => 'Text',
    );
  }
}
