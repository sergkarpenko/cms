CKEDITOR.editorConfig = function(config)
{
    config.toolbar = "Full";
    config.toolbar_Full =
            [
                ['Bold','Italic','Underline','Strike'],
                ['Cut','Copy','Paste','PasteText','PasteFromWord'],
                ['NumberedList','BulletedList'],
                ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
                ['Link','Unlink','Anchor'], ['Maximize']                
            ];
    config.menu_groups = "clipboard,form,tablecell,tablecellproperties,tablerow,tablecolumn,table,anchor,link,image,flash,checkbox,radio,textfield,hiddenfield,imagebutton,button,select,textarea,removeMedia";
    config.language = 'ru';
    config.resize_enabled = false;
    config.toolbarCanCollapse = false;
};
