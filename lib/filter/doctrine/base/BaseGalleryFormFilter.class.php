<?php

/**
 * Gallery filter form base class.
 *
 * @package    si-invest
 * @subpackage filter
 * @author     sergk
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseGalleryFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'photo' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'position' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'photo' => new sfValidatorPass(array('required' => false)),
      'position' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('gallery_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Gallery';
  }

  public function getFields()
  {
    return array(
      'id' => 'Number',
      'photo' => 'Text',
      'position' => 'Number',
    );
  }
}
