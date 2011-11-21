<?php

class elfinderActions extends sfActions
{

  public function executeIndex(sfWebRequest $request)
  {

  }

  public function executeCkeditor(sfWebRequest $request)
  {

  }

  public function executeConnector(sfWebRequest $request)
  {
    require_once sfConfig::get('sf_root_dir') . '/lib/elfinder/connector.php';
    return sfView::NONE;
  }

  public function executeUpload(sfWebRequest $request)
  {

    $type = $request->getGetParameter('type', 'file');
    switch ($type)
    {
      case 'file':
      case 'flash':
      case 'image':
      case 'media':
        $dir = $type;
        break;
      default:
        exit;
    }

    $upload_dir = sfConfig::get('sf_web_dir') . '/uploads/custom/';

    if (!is_dir($to_dir = $upload_dir . '/' . $dir))
    {
      mkdir($to_dir, 0777, true);
    }

    $filename = $_FILES['upload']['name'];

    if (move_uploaded_file($_FILES['upload']['tmp_name'], $to_dir . '/' . $filename))
    {
      echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction(2, '/" .
          '/uploads/custom/' . $dir . '/' . $filename . "', '');</script>";
    }

    return sfView::NONE;
  }

  private function freeFilename()
  {
    $dir = rtrim($dir, '/') . '/';

    $fileName = mb_strtolower($fileName, 'utf-8');
    $strlen = mb_strlen($fileName, 'utf-8');
    $dotPos = mb_strrpos($fileName, '.', null, 'utf-8');
    $fname = mb_substr($fileName, 0, mb_strrpos($fileName, '.', null, 'utf-8'), 'utf-8');
    $format = mb_substr($fileName, $dotPos + 1, ($strlen - $dotPos), 'utf-8');

    $fname = $this->translit($fname);
    $f = $fname . '.' . $format;

    if (file_exists($dir . $f))
    {
      if (false !== ($pos = strrpos($f, '_')) && !in_array($f{$pos + 1}, array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9)))
      {
        $symname = substr($f, 0, $pos);
      }
      else
      {
        $symname = $fname;
      }


      $symname = $fname;

      $i = 0;
      $exist = true;
      while ($exist && ++$i < 777)
      { // :)
        $new_name = $symname . '_' . $i . $format;
        if (!file_exists($dir . $new_name))
        {
          $exist = false;
          $f = $new_name;
        }
      }
    }

    return $f;
  }

  private function translit($input_string)
  {
    $trans = array();
    $ch1 = "/\r\n-абвгдеёзийклмнопрстуфхцыэАБВГДЕЁЗИЙКЛМНОПРСТУФХЦЫЭABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $ch2 = "    abvgdeeziyklmnoprstufhcyeabvgdeeziyklmnoprstufhcyeabcdefghijklmnopqrstuvwxyz";
    for ($i = 0; $i < mb_strlen($ch1); $i++)
    {
      $trans[mb_substr($ch1, $i, 1)] = mb_substr($ch2, $i, 1);
    }
    $trans["Ж"] = "zh";
    $trans["ж"] = "zh";
    $trans["Ч"] = "ch";
    $trans["ч"] = "ch";
    $trans["Ш"] = "sh";
    $trans["ш"] = "sh";
    $trans["Щ"] = "sch";
    $trans["щ"] = "sch";
    $trans["Ъ"] = "";
    $trans["ъ"] = "";
    $trans["Ь"] = "";
    $trans["ь"] = "";
    $trans["Ю"] = "yu";
    $trans["ю"] = "yu";
    $trans["Я"] = "ya";
    $trans["я"] = "ya";
    $trans["\\\\"] = " ";
    $trans["[^\. a-z0-9]"] = " ";
    $trans["^[ ]+|[ ]+$"] = "";
    $trans["[ ]+"] = "-";
    foreach ($trans as $from => $to)
    {
      $input_string = mb_ereg_replace(str_replace("\\", "\\", $from), $to, $input_string);
    }
    return $input_string;
  }


}