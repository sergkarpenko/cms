<?php

/**
 * Gallery form.
 *
 * @package    si-invest
 * @subpackage form
 * @author     sergk
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class GalleryForm extends BaseGalleryForm
{
  public function configure()
  {
    $this->i18nInit();

    $this->widgetSchema['photo'] = new sfWidgetFormInputFileEditable(array(
      'file_src' => '/uploads/gallery/' . $this->getObject()->getPhoto(),
      'is_image' => true,
      'edit_mode' => !$this->isNew(),
      'template' => '<div>%file%</div><div>%input%</div><div>%delete% Удалить</div>',
    ));
    $this->widgetSchema->setLabel('photo', 'Фото');
    $this->widgetSchema->setHelp('photo',
      'Фотография для галереи размером 619px × 286px.
          Будет выполено автоматическое преобразование, если размер отличается.');

    $this->validatorSchema['photo'] = new sfValidatorFile(array(
      'required' => $this->isNew(),
      'path' => sfConfig::get('sf_upload_dir') . '/gallery',
      'mime_types' => 'web_images',
    ));

    $this->validatorSchema['photo_delete'] = new sfValidatorPass();

  }

  protected function processUploadedFile($field, $filename = null, $values = null)
  {
    $fname = parent::processUploadedFile($field, $filename, $values);
    if ($field == 'photo' and $values !== null)
    {
      require_once sfConfig::get('sf_lib_dir') . '/vendor/PHPThumb/ThumbLib.inc.php';
      $file = $values['photo']->getSavedName();
      $thumb = PhpThumbFactory::create($file);
      $thumb->adaptiveResize(619, 286);
      $thumb->save($file);
    }
    return $fname;
  }
}
