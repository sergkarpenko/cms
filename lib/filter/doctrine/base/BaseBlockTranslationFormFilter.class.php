<?php

/**
 * BlockTranslation filter form base class.
 *
 * @package    si-invest
 * @subpackage filter
 * @author     sergk
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseBlockTranslationFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'content' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'content' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('block_translation_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'BlockTranslation';
  }

  public function getFields()
  {
    return array(
      'id' => 'Number',
      'content' => 'Text',
      'lang' => 'Text',
    );
  }
}
