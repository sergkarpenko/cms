<?php

/**
 * feedback actions.
 *
 * @package    si-invest
 * @subpackage feedback
 * @author     sergk
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class feedbackActions extends sfActions
{
  public function preExecute()
  {
    $response = $this->getResponse();
    $response->setTitle($this->getContext()->getI18N()->__('ОБРАТНАЯ СВЯЗЬ'));
  }

  /**
   * Executes index action
   *
   * @param sfRequest $request A request object
   */
  public function executeIndex(sfWebRequest $request)
  {
    $this->form = new FeedbackForm();

    if ($request->isMethod('post'))
    {
      $this->form->bind($request->getParameter('feedback'));

      if ($this->form->isValid())
      {
        $this->form->save();

        $admin = Doctrine_Core::getTable('sfGuardUser')
            ->createQuery('u')
            ->where('u.username = ?', 'admin')
            ->fetchOne();

        $to = $admin->email_address;

        $body = $this->getPartial('mail', array('form' => $this->form->getValues()));

        $this->getMailer()->composeAndSend(
          array('noreply@site.org' => 'Сайт site.org'),
          $to,
          'Оставлено сообщение на сайте',
          $body
        );

        $this->redirect('@feedback_successfull');
      }
    }

  }

  public function executeSuccessfull(sfWebRequest $request)
  {

  }
}
