<?php

/**
 * Investor filter form base class.
 *
 * @package    si-invest
 * @subpackage filter
 * @author     sergk
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseInvestorFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'whois' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'name' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'project' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'role' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'phone' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'email' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'message' => new sfWidgetFormFilterInput(),
      'created_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'whois' => new sfValidatorPass(array('required' => false)),
      'name' => new sfValidatorPass(array('required' => false)),
      'project' => new sfValidatorPass(array('required' => false)),
      'role' => new sfValidatorPass(array('required' => false)),
      'phone' => new sfValidatorPass(array('required' => false)),
      'email' => new sfValidatorPass(array('required' => false)),
      'message' => new sfValidatorPass(array('required' => false)),
      'created_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('investor_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Investor';
  }

  public function getFields()
  {
    return array(
      'id' => 'Number',
      'whois' => 'Text',
      'name' => 'Text',
      'project' => 'Text',
      'role' => 'Text',
      'phone' => 'Text',
      'email' => 'Text',
      'message' => 'Text',
      'created_at' => 'Date',
      'updated_at' => 'Date',
    );
  }
}
