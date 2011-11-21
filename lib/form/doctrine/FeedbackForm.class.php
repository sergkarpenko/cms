<?php

/**
 * Feedback form.
 *
 * @package    si-invest
 * @subpackage form
 * @author     sergk
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class FeedbackForm extends BaseFeedbackForm
{
  public function configure()
  {
    unset($this['created_at'], $this['updated_at']);

    $this->validatorSchema['email'] = new sfValidatorAnd(array(
      $this->validatorSchema['email'],
      new sfValidatorEmail(),
    ));
    $this->validatorSchema['company'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['phone'] = new sfValidatorString(array('required' => false));

    $this->widgetSchema->setLabels(array(
      'name' => sfContext::getInstance()->getI18N()->__('Имя'),
      'company' => sfContext::getInstance()->getI18N()->__('Компания'),
      'email' => sfContext::getInstance()->getI18N()->__('Email'),
      'message' => sfContext::getInstance()->getI18N()->__('Сообщение'),
      'phone' => sfContext::getInstance()->getI18N()->__('Телефон')
    ));

  }
}
