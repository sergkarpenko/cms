CKEDITOR.editorConfig = function(config)
{
    config.extraPlugins = "Media";
    config.toolbar = "Full";
    config.uiColor = '#85B5D9';
    //config.contentsCss = "/static/css/ck.css";
    //config.stylesCombo_stylesSet = "common:/static/js/ck.js";

    config.toolbar_Full =
            [
                ['Source','-','Save','NewPage','Preview','-','Templates'],
                ['Cut','Copy','Paste','PasteText','PasteFromWord','-','Print', 'SpellChecker', 'Scayt'],
                ['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
                '/',
                ['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
                ['NumberedList','BulletedList','-','Outdent','Indent','Blockquote','CreateDiv'],
                ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
                ['Link','Unlink','Anchor'],
                ['Image','Flash','Media','Table','HorizontalRule','Smiley','SpecialChar','PageBreak'],
                '/',
                ['Styles','Format','Font','FontSize'],
                ['TextColor','BGColor'],
                ['Maximize', 'ShowBlocks']
            ];
    config.menu_groups = "clipboard,form,tablecell,tablecellproperties,tablerow,tablecolumn,table,anchor,link,image,flash,checkbox,radio,textfield,hiddenfield,imagebutton,button,select,textarea,removeMedia";
    config.language = 'ru';
    config.filebrowserBrowseUrl = "/backend.php/elfinder/ckeditor";
    config.filebrowserUploadUrl = "/backend.php/elfinder/upload?type=file";
    config.filebrowserImageUploadUrl = "/backend.php/elfinder/upload?type=image";
    config.filebrowserFlashUploadUrl = "/backend.php/elfinder/upload?type=flash";
};
