var admin = {

    dtFormat: "%Y-%m-%d %H:%M",
    dFormat: "%Y-%m-%d",

    onReady: function() {

        $('ul.sf-menu').superfish({ delay:  500, speed: 'fast'});
//        $("#created").dynDateTime({
//            showsTime: true,
//            ifFormat: admin.dtFormat,
//            daFormat: admin.dtFormat
//        });
//
//        $(".date").dynDateTime({
//            ifFormat: admin.dFormat,
//            daFormat: admin.dFormat
//        });

        $('table.ui-widget tr').mouseover(function() {
            $(this).addClass('ui-highlight');
        });
        $('table.ui-widget tr').mouseleave(function() {
            $(this).removeClass('ui-highlight');
        });

    },

    confirmDelete: function(url) {
        var $form = $('<div title="Удаление записи" ><p>Вы уверены?</p></div>');
        $form.dialog({
            resizable: false,
            modal: true,
            buttons: {
                'Отмена': function() {
                    $(this).dialog('close');
                },
                'Ок': function() {
                    $(this).dialog('close');
                    document.location.href = url;
                }
            }
        });
    },

    createButton: function(id, url, icon) {
        $('#' + id).button({
            text: false,
            icons: { primary: icon }
        }).bind('click', function() {
            if ($(this).hasClass('delete'))
            {
                admin.confirmDelete(url);
            } else
            {
                document.location.href = url;
            }
        });

    },

    createLinkButton: function(id, url, icon, text) {
        $('#' + id).button({
            text: true,
            label: text,
            icons: { primary: 'ui-icon-' + icon }
        }).click(function() {
            document.location.href = url;
            return false;
        });
    }

}

$(document).ready(admin.onReady);
