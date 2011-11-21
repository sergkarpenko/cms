<?php

/**
 * News form.
 *
 * @package    si-invest
 * @subpackage form
 * @author     sergk
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class NewsForm extends BaseNewsForm
{
  public function configure()
  {
    unset($this['created_at'], $this['updated_at'], $this['slug']);
    $this->i18nInit();

    $this->widgetSchema['status'] = new sfWidgetFormChoice(array(
      'choices' => $this->statuses
    ));

    $this->widgetSchema['picture'] = new sfWidgetFormInputFileEditable(array(
      'file_src' => '/uploads/news/' . $this->getObject()->getPicture(),
      'is_image' => true,
      'edit_mode' => !$this->isNew(),
      'template' => '<div>%file%</div><div>%input%</div><div>%delete% Удалить</div>',
    ));
    $this->widgetSchema->setLabel('picture', 'Фото');
    $this->widgetSchema->setHelp('picture',
      'Изображение размером 35px × 35px для главной страницы.
          Будет выполено автоматическое преобразование, если размер отличается.');
    $this->validatorSchema['picture'] = new sfValidatorFile(array(
      'required' => $this->isNew(),
      'path' => sfConfig::get('sf_upload_dir') . '/news',
      'mime_types' => 'web_images',
    ));

    $this->validatorSchema['picture_delete'] = new sfValidatorPass();

  }

  protected function processUploadedFile($field, $filename = null, $values = null)
  {
    $fname = parent::processUploadedFile($field, $filename, $values);
    if ($field == 'picture' and $values !== null)
    {
      require_once sfConfig::get('sf_lib_dir') . '/vendor/PHPThumb/ThumbLib.inc.php';
      $file = $values['picture']->getSavedName();
      $thumb = PhpThumbFactory::create($file);
      $thumb->adaptiveResize(35, 35);
      $thumb->save($file);
    }
    return $fname;
  }
}
