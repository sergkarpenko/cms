<?php decorate_with(false) ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
    "http://www.w3.org/TR/html4/strict.dtd">

<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Браузер файлов elFinder</title>
  <link rel="stylesheet" href="/js/elfinder/ui-themes/base/ui.all.css" type="text/css" media="screen" title="no title"
        charset="utf-8">
  <link rel="stylesheet" href="/css/elfinder.css" type="text/css" media="screen" title="no title" charset="utf-8">


  <script src="/js/jquery-1.4.3.min.js" type="text/javascript" charset="utf-8"></script>
  <script src="/js/jquery-ui-1.8.5.custom.min.js" type="text/javascript" charset="utf-8"></script>

  <script src="/js/elfinder/elfinder.min.js" type="text/javascript" charset="utf-8"></script>
  <script src="/js/elfinder/i18n/elfinder.ru.js" type="text/javascript" charset="utf-8"></script>

  <style type="text/css">
    #close, #open, #dock, #undock {
      width: 100px;
      position: relative;
      display: -moz-inline-stack;
      display: inline-block;
      vertical-align: top;
      zoom: 1;
      *display: inline;
      margin: 0 3px 3px 0;
      padding: 1px 0;
      text-align: center;
      border: 1px solid #ccc;
      background-color: #eee;
      margin: 1em .5em;
      padding: .3em .7em;
      border-radius: 5px;
      -moz-border-radius: 5px;
      -webkit-border-radius: 5px;
      cursor: pointer;
    }
  </style>


  <script type="text/javascript" charset="utf-8">
    $().ready(function() {
      var funcNum = window.location.search.replace(/^.*CKEditorFuncNum=(\d+).*$/, "$1");
      var langCode = window.location.search.replace(/^.*langCode=([a-z]{2}).*$/, "$1");

      var f = $('#finder').elfinder({
        url : '/backend.php/elfinder/connector',
        lang : langCode,

        editorCallback : function(url) {
          window.opener.CKEDITOR.tools.callFunction(funcNum, url);
          window.close();
        }
      })


    })
  </script>

</head>
<body>
<div id="finder">finder</div>
</body>
</html>
