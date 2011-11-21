<?php

class newlanguageTask extends sfBaseTask
{
  protected function configure()
  {

    $this->addArguments(array(
      new sfCommandArgument('lang', sfCommandArgument::REQUIRED, 'Новый язык'),
    ));

    $this->addOptions(array(
      new sfCommandOption('application', null, sfCommandOption::PARAMETER_OPTIONAL, 'The application name', null),
      new sfCommandOption('env', null, sfCommandOption::PARAMETER_REQUIRED, 'The environment', 'dev'),
    ));

    $this->namespace = 'cms';
    $this->name = 'new-language';
    $this->briefDescription = 'Добавление нового языка в сайт';
    $this->detailedDescription = <<<EOF
[new-language|INFO] помогает перевести и создать поля с многоязычным содержимым для указанного языка:

  [php symfony new-language <язык>|INFO]

Дополнительные необходимые действия:
    - Прописать язык в config/app.yml
    - Создать файл apps/i18n/<язык>/messages.xml
    - Разместить иконку флага в web/images/flags/<язык>.png
EOF;
  }

  protected function execute($arguments = array(), $options = array())
  {
    // initialize the database connection
    $databaseManager = new sfDatabaseManager($this->configuration);
    #$connection = $databaseManager->getDatabase($options['connection'])->getConnection();

    $lang = $arguments['lang'];
    $newss = Doctrine_Core::getTable('News')->createQuery()->execute();
    foreach ($newss as $news)
    {
      $news->Translation[$lang]->name = $this->translate($news->Translation['ru']->name, $lang);
      $news->Translation[$lang]->annotation = $this->translate($news->Translation['ru']->annotation, $lang);
      $news->Translation[$lang]->content = $this->translate($news->Translation['ru']->content, $lang);
      $news->save();
    }

    $pages = Doctrine_Core::getTable('Page')->createQuery()->execute();
    foreach ($pages as $page)
    {
      $page->Translation[$lang]->name = $this->translate($page->Translation['ru']->name, $lang);
      $page->Translation[$lang]->content = $this->translate($page->Translation['ru']->content, $lang);
      $page->Translation[$lang]->keywords = $this->translate($page->Translation['ru']->keywords, $lang);
      $page->Translation[$lang]->description = $this->translate($page->Translation['ru']->description, $lang);
      $page->Translation[$lang]->title = $this->translate($page->Translation['ru']->title, $lang);
      $page->save();
    }

    $items = Doctrine_Core::getTable('Gallery')->createQuery()->execute();
    foreach ($items as $item)
    {
      $item->Translation[$lang]->name = $this->translate($item->Translation['ru']->name, $lang);
      $item->save();
    }

    $items = Doctrine_Core::getTable('Menu')->createQuery()->execute();
    foreach ($items as $item)
    {
      $item->Translation[$lang]->name = $this->translate($item->Translation['ru']->name, $lang);
      $item->save();
    }
    $items = Doctrine_Core::getTable('Block')->createQuery()->execute();
    foreach ($items as $item)
    {
      $item->Translation[$lang]->content = $this->translate($item->Translation['ru']->content, $lang);
      $item->save();
    }
  }

  private function translate($str, $lang)
  {
    if (strlen($str) > 1000)
    {
      return $str;
    }
    $base_url = "http://ajax.googleapis.com/ajax/services/language/translate";
    $params = array('langpair' => 'ru|' . $lang, 'v' => '1.0');
    $params['q'] = $str;
    $content = file_get_contents($base_url . '?' . http_build_query($params));
    $result = json_decode($content);

    if (isset($result->responseData) AND isset($result->responseData->translatedText))
    {
      return $result->responseData->translatedText;
    }
    else
    {
      return $str;
    }

  }
}
