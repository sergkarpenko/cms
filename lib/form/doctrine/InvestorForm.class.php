<?php

/**
 * Investor form.
 *
 * @package    si-invest
 * @subpackage form
 * @author     sergk
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class InvestorForm extends BaseInvestorForm
{
  public function configure()
  {
    unset($this['created_at'], $this['updated_at']);

    $this->validatorSchema['email'] = new sfValidatorAnd(array(
      $this->validatorSchema['email'],
      new sfValidatorEmail(),
    ));

    $list = array(
      sfContext::getInstance()->getI18N()->__('инвестором'),
      sfContext::getInstance()->getI18N()->__('соинвестором'),
      sfContext::getInstance()->getI18N()->__('посредником в привлечении инвестиций для этого проекта'),
      sfContext::getInstance()->getI18N()->__('экспертом проекта'),
    );

    $this->widgetSchema['role'] = new sfWidgetFormChoice(array(
      'choices' => array_combine($list, $list)
    ));
    $this->validatorSchema['role'] = new sfValidatorChoice(array(
      'choices' => $list,
      'required' => false
    ));

    $this->widgetSchema->setLabels(array(
      'whois' => sfContext::getInstance()->getI18N()->__('Форма обращения'),
      'name' => sfContext::getInstance()->getI18N()->__('Фамилия, имя'),
      'project' => sfContext::getInstance()->getI18N()->__('Наименование  проекта, который вызвал интерес'),
      'role' => sfContext::getInstance()->getI18N()->__('Вы готовы выступить'),
      'message' => sfContext::getInstance()->getI18N()->__('Примечание'),
      'phone' => sfContext::getInstance()->getI18N()->__('Телефон'),
    ));
    //sfContext::getInstance()->getI18N()->__('Заголовок новости'
  }
}
