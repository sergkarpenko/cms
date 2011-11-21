(function($) {
    /**
     * Создание url'а для ЧПУ на основе текста из объекта src
     * @param {jQuery} src
     */
    $.fn.slug = function(src) {
        var self = $(this),
                isEditedObj = ($(this).val() != '');

        src.bind('keyup', function() {
            if (!isEditedObj)
            {
                self.val(convert(src.val()));
            }
        });

        $(this).bind('change', function() {
            isEditedObj = (self.val() != '');
        });

        /**
         * Преобразование текста в url
         * @param {String} src
         * @return url, состоящий из латиницы и "-"
         * @type {String}
         */
        function convert(src) {

            var rusChars = ['А','Б','В','Г','Д','Е','Ё','Ж','З','И','Й','К','Л','М','Н','О','П','Р','С','Т','У','Ф','Х','Ч','Ц','Ш','Щ','Э','Ю','Я','Ы','Ъ','Ь',
                'а','б','в','г','д','е','ё','ж','з','и','й','к','л','м','н','о','п','р','с','т','у','ф','х','ч','ц','ш','щ','э','ю','\я','ы','ъ','ь', ' ', '.', ',', ':', '?', '"', '/'],
                    transChars = ['a','b','v','g','d','e','jo','zh','z','i','j','k','l','m','n','o','p','r','s','t','u','f','h','ch','c','sh','csh','e','ju','ja','y','\`','\'',
                        'a','b','v','g','d','e','jo','zh','z','i','j','k','l','m','n','o','p','r','s','t','u','f','h','ch','c','sh','csh','e','ju','ja','y','','', '-','','','', '', '', '-'],
                    result = "", len = src.length, character, isRus;

            for (i = 0; i < len; i++)
            {
                character = src.charAt(i, 1);
                isRus = false;
                for (j = 0; j < rusChars.length; j++)
                {
                    if (character == rusChars[j])
                    {
                        isRus = true;
                        break;
                    }
                }
                result += (isRus) ? transChars[j] : character;
            }
            return result;
        }
    }
}(jQuery));
