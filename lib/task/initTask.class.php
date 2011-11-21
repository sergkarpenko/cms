<?php

class initTask extends sfBaseTask
{
  protected function configure()
  {

    $this->namespace = 'cms';
    $this->name = 'init';
    $this->briefDescription = 'Подготовка проекта. Создание нужных папок, раздача прав';
    $this->detailedDescription = <<<EOF
[init|INFO] подготавливает проект:

  [php symfony init|INFO]

  Создает папки, раздает права
  
EOF;
  }

  protected function execute($arguments = array(), $options = array())
  {

    $log_dir = sfConfig::get('sf_root_dir') . '/log';
    if (!file_exists($log_dir))
    {
      mkdir($log_dir, 0777, true);
    }

    $cache_dir = sfConfig::get('sf_root_dir') . '/cache';
    if (!file_exists($cache_dir))
    {
      mkdir($cache_dir, 0777, true);
    }

    $folders = array(
      '/uploads/news/preview',
      '/uploads/gallery',
      '/uploads/custom/file',
      '/uploads/custom/image',
      '/uploads/custom/flash',
    );

    $wd = sfConfig::get('sf_web_dir');

    foreach ($folders as $folder)
    {
      if (!file_exists($wd . $folder))
      {
        mkdir($wd . $folder, 0777, true);
      }
    }

    $this->log('Папки созданы.');

    $cc = new sfCacheClearTask($this->dispatcher, $this->formatter);
    $cc->run();
    $this->log('Кеш очищен.');

    $pp = new sfProjectPermissionsTask($this->dispatcher, $this->formatter);
    $pp->run();
    $this->log('Разрешения выставлены.');

  }
}
