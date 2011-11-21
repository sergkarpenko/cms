/**
 * Provides a toolbar button and a dialog to add pasted html code for embed remote media,
 * or uploaded flv choose with file Browser played by  into edited contents.
 *
 * @author Vincent Mazenod   
 * @see doc on http://forge.clermont-universite.fr/wiki/ckmedia/Installation 
 * @see Based on http://github.com/n1k0/ckMediaEmbed
 * @license MIT
 *  
 */
(function() {

    var d = new Date();
    var config = {
        // General
        player: '/static/mediaplayer/player.swf',
        replacement: '/static/mediaplayer/images/replacement.gif',
        swfobject: '/static/mediaplayer/swfobject.js',
        yt: '/static/mediaplayer/yt.swf',
        player_id:'player_'+d.getTime(),
        div_id:'media_'+d.getTime(),
        version:'9',
        lang: 'ru',
        allowfullscreen:'true',
        allowscriptaccess:'always',
        wmode:'opaque',
    
        width:'',
        height:'',
    
    
        // TAB - single
        file: '',
        image:'',
        author:'',
        description:'',
        duration:'',
        start:'',
        title:'',
        provider:'',
        //TAB - playlist
        playlistfile:'',
        playlist:'',
        playlistsize:'',
        //TAB - player
        backcolor:'',
        frontcolor:'',
        lightcolor:'',
        screencolor:'',
        controlbar:'',
        dock:'',
        skin:'',
        autostart:'',
        bufferlength:'',
        icons:'',
        item:'',
        mute:'',
        quality:'',
        repeat:'',
        shuffle:'',
        stretching:'',
        volume:'',
        linktarget:'',
        plugins:'',
        streamer:''
    };
  
    function refreshConfig(key, value)
    {
        config[key] = value;
    }
  
    function processConfig()
    {
        code = "<script type='text/javascript' src='" + config['swfobject'] + "'></script>\n";
        code += "<div id='" + config['div_id'] + "'><img src='" + config['replacement'] + "' width='" + config['width'] + "' height='" + config['height'] + "'/></div>\n";
        code += "<script id='" + config['div_id'] + "_script' type='text/javascript'>\n";
        code += "  var so = new SWFObject('" + config['player'] + "','" + config['player_id'] + "','" + config['width'] + "','" + config['height'] + "','" + config['version'] + "');\n";
        code += "  so.addParam('allowfullscreen','" + config['allowfullscreen'] + "');\n";
        code += "  so.addParam('allowscriptaccess','" + config['allowscriptaccess'] + "');\n";
        code += "  so.addParam('wmode','" + config['wmode'] + "');\n";
        for(option in config)
        {
            if(config[option] && option != 'div_id' && option != 'player' && option != 'player_id' && option != 'width'
                && option != 'height' && option != 'version' && option != 'allowfullscreen' && option != 'allowscriptaccess'
                && option != 'wmode' && option != 'swfobject' && option != 'yt')
                {
                code += "  so.addVariable('" + option + "','" + config[option] + "');\n";
            }
        }
        code += "  so.write('" + config['div_id'] + "');\n";
        code += "</script>\n";
        return code;
    }

    CKEDITOR.plugins.add('Media', {
        lang: ['ru'],
        init: function (editor) {
            lang = editor.lang.Media;
            CKEDITOR.dialog.add('MediaDialog', function (editor) {
                return {
                    title : 'Media',
                    minWidth  : 500,
                    minHeight : 100,
                    onLoad : function()
                    {
                        dialog = this;
                    },
                    contents  : [{
                        /**
             *  TAB - code  
             *  simple copy / paste box for embed from youtube, vime, daylymotion etc ... 
             *  Or see Generated code for JW Player  
             */                          
                        id : 'code',
                        label : lang.embedMediaCode,
                        expand : true,
                        elements : [{
                            type :  'textarea',
                            id :    'Code_' + editor.name,
                            rows : 20
                        }]
                    },
                    {
                        /**
             *  TAB - single  
             *  Dialog for JWplayer plays a single FLV
             */
                        id : 'single',
                        label : lang.singleMediaFile,
                        expand : true,
                        elements : [{
                            // BTN - Browse Media File
                            type : 'hbox',
                            align : 'center',
                            widths : [ '80%', '20%'],
                            children :[{
                                id : 'MediaFile_' + editor.name,
                                type : 'text',
                                'default' : config['file'],
                                onBlur : function(){
                                    refreshConfig('file', this.getDialog().getContentElement('single', 'MediaFile_' + editor.name).getValue());
                                    this.getDialog().getContentElement('code', 'Code_' + editor.name).setValue(processConfig());
                                },
                                label : lang.mediaFile
                            },
                            {
                                id : 'BrowseMediaFile_' + editor.name,
                                type : 'button',
                                hidden : true,
                                filebrowser :
                                {
                                    action : 'Browse',
                                    onSelect : function(fileUrl, data)
                                    {
                                        this.getDialog().getContentElement('single', 'MediaFile_' + editor.name).setValue(fileUrl);
                                        refreshConfig('file', this.getDialog().getContentElement('single', 'MediaFile_' + editor.name).getValue());
                                        this.getDialog().getContentElement('code', 'Code_' + editor.name).setValue(processConfig());
                                    }
                                },
                                label : editor.lang.common.browseServer,
                                style : 'margin-top: 12px; float:right'
                            }]
                        },
                        {
                            // BTN - Browse Preview Image
                            type : 'hbox',
                            align : 'center',
                            widths : [ '80%', '20%'],
                            children :[{
                                id : 'MediaImage_' + editor.name,
                                type : 'text',
                                'default' : config['image'],
                                onBlur : function(){
                                    refreshConfig('image', this.getDialog().getContentElement('single', 'MediaImage_' + editor.name).getValue());
                                    this.getDialog().getContentElement('code', 'Code_' + editor.name).setValue(processConfig());
                                },
                                label : lang.previewImage
                            },
                            {
                                id : 'BrowseMediaImage_' + editor.name,
                                type : 'button',
                                hidden : true,
                                filebrowser :
                                {
                                    action : 'Browse',
                                    onSelect : function(fileUrl, data)
                                    {
                                        this.getDialog().getContentElement('single', 'MediaImage_' + editor.name).setValue(fileUrl);
                                        refreshConfig('image', this.getDialog().getContentElement('single', 'MediaImage_' + editor.name).getValue());
                                        this.getDialog().getContentElement('code', 'Code_' + editor.name).setValue(processConfig());
                                    }
                                },
                                label : editor.lang.common.browseServer,
                                style : 'margin-top: 12px; float:right'
                            }]
                        },
                        {
                            // BOX - 2 columns
                            type : 'hbox',
                            align : 'center',
                            widths : [ '50%', '50%'],
                            children :[{
                                type : 'vbox',
                                children :[{
                                    id:  'MediaWidth_' + editor.name,
                                    type: 'text',
                                    'default': config['width'],
                                    onBlur : function(){
                                        refreshConfig('width', this.getDialog().getContentElement('single', 'MediaWidth_' + editor.name).getValue());
                                        this.getDialog().getContentElement('code', 'Code_' + editor.name).setValue(processConfig());
                                    },
                                    label: lang.widthPx
                                },
                                {
                                    id:  'MediaHeight_' + editor.name,
                                    type: 'text',
                                    'default': config['height'],
                                    onBlur : function(){
                                        refreshConfig('height', this.getDialog().getContentElement('single', 'MediaHeight_' + editor.name).getValue());
                                        this.getDialog().getContentElement('code', 'Code_' + editor.name).setValue(processConfig());
                                    },
                                    label: lang.heightPx
                                },
                                {
                                    id:  'MediaDuration_' + editor.name,
                                    type: 'text',
                                    'default': config['duration'],
                                    onBlur : function(){
                                        refreshConfig('duration', this.getDialog().getContentElement('single', 'MediaDuration_' + editor.name).getValue());
                                        this.getDialog().getContentElement('code', 'Code_' + editor.name).setValue(processConfig());
                                    },
                                    label: lang.duration
                                },
                                {
                                    id:  'MediaStart_' + editor.name,
                                    type: 'text',
                                    'default': config['start'],
                                    onBlur : function(){
                                        refreshConfig('start', this.getDialog().getContentElement('single', 'MediaStart_' + editor.name).getValue());
                                        this.getDialog().getContentElement('code', 'Code_' + editor.name).setValue(processConfig());
                                    },
                                    label: lang.start
                                }]
                            },
                            {
                                type : 'vbox',
                                children :[{
                                    id:  'MediaAuthor_' + editor.name,
                                    type: 'text',
                                    'default': config['author'],
                                    onBlur : function(){
                                        refreshConfig('author', this.getDialog().getContentElement('single', 'MediaAuthor_' + editor.name).getValue());
                                        this.getDialog().getContentElement('code', 'Code_' + editor.name).setValue(processConfig());
                                    },
                                    label: lang.author
                                },
                                {
                                    id:  'MediaDescription_' + editor.name,
                                    type: 'text',
                                    'default': config['description'],
                                    onBlur : function(){
                                        refreshConfig('description', this.getDialog().getContentElement('single', 'MediaDescription_' + editor.name).getValue());
                                        this.getDialog().getContentElement('code', 'Code_' + editor.name).setValue(processConfig());
                                    },
                                    label: lang.description
                                },
                                {
                                    id:  'MediaTitle_' + editor.name,
                                    type: 'text',
                                    'default': config['title'],
                                    onBlur : function(){
                                        refreshConfig('title', this.getDialog().getContentElement('single', 'MediaTitle_' + editor.name).getValue());
                                        this.getDialog().getContentElement('code', 'Code_' + editor.name).setValue(processConfig());
                                    },
                                    label: lang.title
                                },
                                {
                                    id:  'MediaProvider_' + editor.name,
                                    type: 'text',
                                    'default': config['provider'],
                                    onBlur : function(){
                                        refreshConfig('provider', this.getDialog().getContentElement('single', 'MediaProvider_' + editor.name).getValue());
                                        this.getDialog().getContentElement('code', 'Code_' + editor.name).setValue(processConfig());
                                    },
                                    label: lang.provider
                                }]
                            }]
                        }]
                    },

                    {
                        /**
             *  TAB - playlist  
             *  Dialog for JWplayer plays multiple FLV
             */
                        id     : 'playlist',
                        label  : lang.mediaPlaylist,
                        expand : true,
                        elements : [{
                            // BTN - Browse Playlist URL
                            type : 'hbox',
                            align : 'center',
                            widths : [ '80%', '20%'],
                            children :[{
                                id : 'PlaylistFile_' + editor.name,
                                type : 'text',
                                'default' : config['playlistfile'],
                                onBlur : function(){
                                    refreshConfig('playlistfile', this.getDialog().getContentElement('playlist', 'PlaylistFile_' + editor.name).getValue());
                                    this.getDialog().getContentElement('code', 'Code_' + editor.name).setValue(processConfig());
                                },
                                label : lang.playlistUrl
                            },
                            {
                                id : 'BrowsePlaylistFile_' + editor.name,
                                type : 'button',
                                hidden : true,
                                filebrowser :
                                {
                                    action : 'Browse',
                                    onSelect : function(fileUrl, data)
                                    {
                                        this.getDialog().getContentElement('playlist', 'PlaylistFile_' + editor.name).setValue(fileUrl);
                                        refreshConfig('playlistfile', this.getDialog().getContentElement('playlist', 'PlaylistFile_' + editor.name).getValue());
                                        this.getDialog().getContentElement('code', 'Code_' + editor.name).setValue(processConfig());
                                    }
                                },
                                label : editor.lang.common.browseServer,
                                style : 'margin-top: 12px; float:right'
                            }]
                        },
                        {
                            // BOX - 2 columns
                            type : 'hbox',
                            align : 'center',
                            widths : [ '50%', '50%'],
                            children :[{
                                type : 'vbox',
                                children :[{
                                    id:  'PlaylistWidth_' + editor.name,
                                    type: 'text',
                                    labelLayout: 'horizontal',
                                    'default': config['width'],
                                    onBlur : function(){
                                        refreshConfig('width', this.getDialog().getContentElement('playlist', 'PlaylistWidth_' + editor.name).getValue());
                                        this.getDialog().getContentElement('code', 'Code_' + editor.name).setValue(processConfig());
                                    },
                                    label: lang.widthPx
                                },
                                {
                                    id:  'PlaylistHeight_' + editor.name,
                                    type: 'text',
                                    labelLayout: 'horizontal',
                                    'default': config['height'],
                                    onBlur : function(){
                                        refreshConfig('height', this.getDialog().getContentElement('playlist', 'PlaylistHeight_' + editor.name).getValue());
                                        this.getDialog().getContentElement('code', 'Code_' + editor.name).setValue(processConfig());
                                    },
                                    label: lang.heightPx
                                }]
                            },
                            {
                                type : 'vbox',
                                children :[{
                                    id:  'PlaylistView_' + editor.name,
                                    type: 'select',
                                    labelLayout: 'horizontal',
                                    'default': config['playlist'],
                                    onBlur : function(){
                                        refreshConfig('playlist', this.getDialog().getContentElement('playlist', 'PlaylistView_' + editor.name).getValue());
                                        this.getDialog().getContentElement('code', 'Code_' + editor.name).setValue(processConfig());
                                    },
                                    items:[
                                    [lang.none,'none'],
                                    [lang.bottom,'bottom'],
                                    [lang.over,'over'],
                                    [lang.right,'right'],
                                    [lang.left,'left'],
                                    [lang.top,'top']
                                    ],
                                    label: lang.playlistView
                                },
                                {
                                    id:  'PlaylistSize_' + editor.name,
                                    type: 'text',
                                    labelLayout: 'horizontal',
                                    'default': config['playlistsize'],
                                    onBlur : function(){
                                        refreshConfig('playlistsize', this.getDialog().getContentElement('playlist', 'PlaylistSize_' + editor.name).getValue());
                                        this.getDialog().getContentElement('code', 'Code_' + editor.name).setValue(processConfig());
                                    },
                                    label: lang.playlistSize
                                }]
                            }
                            ]
                        }]
                    },

                    {
                        /**
             *  TAB - player  
             *  Dialog for JWplayer options
             */
                        id     : 'player',
                        label  : lang.playerOptions,
                        expand : true,
                        elements : [{
                            type : 'hbox',
                            align : 'center',
                            widths : [ '50%', '50%'],
                            children :[{
                                type : 'vbox',
                                children :[{
                                    type: 'html',
                                    html: lang.layout
                                },
                                {
                                    id:  'PlayerControlbar_' + editor.name,
                                    type: 'select',
                                    labelLayout: 'horizontal',
                                    'default': config['controlbar'],
                                    onBlur : function(){
                                        refreshConfig('controlbar', this.getDialog().getContentElement('player', 'PlayerControlbar_' + editor.name).getValue());
                                        this.getDialog().getContentElement('code', 'Code_' + editor.name).setValue(processConfig());
                                    },
                                    items:[
                                    [lang.bottom,'bottom'],
                                    [lang.top,'top'],
                                    [lang.over,'over'],
                                    [lang.none,'none']
                                    ],
                                    label: lang.controlbar
                                },
                                {
                                    id:  'PlayerDock_' + editor.name,
                                    type: 'select',
                                    labelLayout: 'horizontal',
                                    'default': config['dock'],
                                    onBlur : function(){
                                        refreshConfig('dock', this.getDialog().getContentElement('player', 'PlayerDock_' + editor.name).getValue());
                                        this.getDialog().getContentElement('code', 'Code_' + editor.name).setValue(processConfig());
                                    },
                                    items:[
                                    [lang.vtrue, 'true'],
                                    [lang.vfalse, 'false']
                                    ],
                                    label: lang.dock
                                },
                                {
                                    id:  'PlayerSkin_' + editor.name,
                                    type: 'text',
                                    labelLayout: 'horizontal',
                                    'default': config['skin'],
                                    onBlur : function(){
                                        refreshConfig('skin', this.getDialog().getContentElement('player', 'PlayerSkin_' + editor.name).getValue());
                                        this.getDialog().getContentElement('code', 'Code_' + editor.name).setValue(processConfig());
                                    },
                                    label: lang.skin
                                },
                                {
                                    type: 'html',
                                    html: lang.colors
                                },
                                {
                                    id:  'PlayerBackcolor_' + editor.name,
                                    type: 'text',
                                    labelLayout: 'horizontal',
                                    'default': config['backcolor'],
                                    onBlur : function(){
                                        refreshConfig('backcolor', this.getDialog().getContentElement('player', 'PlayerBackcolor_' + editor.name).getValue());
                                        this.getDialog().getContentElement('code', 'Code_' + editor.name).setValue(processConfig());
                                    },
                                    label: lang.backcolor
                                },
                                {
                                    id:  'PlayerFrontcolor_' + editor.name,
                                    type: 'text',
                                    labelLayout: 'horizontal',
                                    'default': config['frontcolor'],
                                    onBlur : function(){
                                        refreshConfig('frontcolor', this.getDialog().getContentElement('player', 'PlayerFrontcolor_' + editor.name).getValue());
                                        this.getDialog().getContentElement('code', 'Code_' + editor.name).setValue(processConfig());
                                    },
                                    label: lang.frontcolor
                                },
                                {
                                    id:  'PlayerLightcolor_' + editor.name,
                                    type: 'text',
                                    labelLayout: 'horizontal',
                                    'default': config['lightcolor'],
                                    onBlur : function(){
                                        refreshConfig('lightcolor', this.getDialog().getContentElement('player', 'PlayerLightcolor_' + editor.name).getValue());
                                        this.getDialog().getContentElement('code', 'Code_' + editor.name).setValue(processConfig());
                                    },
                                    label: lang.lightcolor
                                },
                                {
                                    id:  'PlayerScreencolor_' + editor.name,
                                    type: 'text',
                                    labelLayout: 'horizontal',
                                    'default': config['screencolor'],
                                    onBlur : function(){
                                        refreshConfig('screencolor', this.getDialog().getContentElement('player', 'PlayerScreencolor_' + editor.name).getValue());
                                        this.getDialog().getContentElement('code', 'Code_' + editor.name).setValue(processConfig());
                                    },
                                    label: lang.screencolor
                                }]
                            },
                            {
                                type : 'vbox',
                                children :[{
                                    type: 'html',
                                    html: lang.behaviour
                                },
                                {
                                    id:  'PlayerAutostart_' + editor.name,
                                    type: 'select',
                                    labelLayout: 'horizontal',
                                    'default': config['autostart'],
                                    onBlur : function(){
                                        refreshConfig('autostart', this.getDialog().getContentElement('player', 'PlayerAutostart_' + editor.name).getValue());
                                        this.getDialog().getContentElement('code', 'Code_' + editor.name).setValue(processConfig());
                                    },
                                    items:[
                                    [lang.vfalse, 'false'],
                                    [lang.vtrue, 'true']                                  
                                    ],
                                    label: lang.autostart
                                },
                                {
                                    id:  'PlayerBufferLength_' + editor.name,
                                    type: 'text',
                                    labelLayout: 'horizontal',
                                    'default': config['bufferlength'],
                                    onBlur : function(){
                                        refreshConfig('bufferlength', this.getDialog().getContentElement('player', 'PlayerBufferLength_' + editor.name).getValue());
                                        this.getDialog().getContentElement('code', 'Code_' + editor.name).setValue(processConfig());
                                    },
                                    label: lang.bufferLength
                                },
                                {
                                    id:  'PlayerIcons_' + editor.name,
                                    type: 'select',
                                    labelLayout: 'horizontal',
                                    'default': config['icons'],
                                    onBlur : function(){
                                        refreshConfig('icons', this.getDialog().getContentElement('player', 'PlayerIcons_' + editor.name).getValue());
                                        this.getDialog().getContentElement('code', 'Code_' + editor.name).setValue(processConfig());
                                    },
                                    items:[
                                    [lang.vtrue, 'true'],
                                    [lang.vfalse, 'false']
                                    ],
                                    label: lang.icons
                                },
                                {
                                    id:  'PlayerItem_' + editor.name,
                                    type: 'text',
                                    labelLayout: 'horizontal',
                                    'default': config['item'],
                                    onBlur : function(){
                                        refreshConfig('item', this.getDialog().getContentElement('player', 'PlayerItem_' + editor.name).getValue());
                                        this.getDialog().getContentElement('code', 'Code_' + editor.name).setValue(processConfig());
                                    },
                                    label: lang.item
                                },
                                {
                                    id:  'PlayerMute_' + editor.name,
                                    type: 'select',
                                    labelLayout: 'horizontal',
                                    'default': config['mute'],
                                    onBlur : function(){
                                        refreshConfig('mute', this.getDialog().getContentElement('player', 'PlayerMute_' + editor.name).getValue());
                                        this.getDialog().getContentElement('code', 'Code_' + editor.name).setValue(processConfig());
                                    },
                                    items:[
                                    [lang.vfalse, 'false'],
                                    [lang.vtrue, 'true']
                                    ],
                                    label: lang.mute
                                },
                                {
                                    id:  'PlayerQuality_' + editor.name,
                                    type: 'select',
                                    labelLayout: 'horizontal',
                                    'default': config['quality'],
                                    onBlur : function(){
                                        refreshConfig('quality', this.getDialog().getContentElement('player', 'PlayerQuality_' + editor.name).getValue());
                                        this.getDialog().getContentElement('code', 'Code_' + editor.name).setValue(processConfig());
                                    },
                                    items:[
                                    [lang.vtrue, 'true'],
                                    [lang.vfalse, 'false']
                                    ],
                                    label: lang.quality
                                },
                                {
                                    id:  'PlayerRepeat_' + editor.name,
                                    type: 'select',
                                    labelLayout: 'horizontal',
                                    'default': config['repeat'],
                                    onBlur : function(){
                                        refreshConfig('repeat', this.getDialog().getContentElement('player', 'PlayerRepeat_' + editor.name).getValue());
                                        this.getDialog().getContentElement('code', 'Code_' + editor.name).setValue(processConfig());
                                    },
                                    items:[
                                    [lang.none,'none'],
                                    [lang.list,'list'],
                                    [lang.always,'always']
                                    ],
                                    label: lang.repeat
                                },
                                {
                                    id:  'PlayerShuffle_' + editor.name,
                                    type: 'select',
                                    labelLayout: 'horizontal',
                                    'default': config['shuffle'],
                                    onBlur : function(){
                                        refreshConfig('shuffle', this.getDialog().getContentElement('player', 'PlayerShuffle_' + editor.name).getValue());
                                        this.getDialog().getContentElement('code', 'Code_' + editor.name).setValue(processConfig());
                                    },
                                    items:[
                                    [lang.vfalse, 'false'],
                                    [lang.vtrue, 'true']
                                    ],
                                    label: lang.shuffle
                                },
                                {
                                    id:  'PlayerStretching_' + editor.name,
                                    type: 'select',
                                    labelLayout: 'horizontal',
                                    'default': config['stretching'],
                                    onBlur : function(){
                                        refreshConfig('stretching', this.getDialog().getContentElement('player', 'PlayerStretching_' + editor.name).getValue());
                                        this.getDialog().getContentElement('code', 'Code_' + editor.name).setValue(processConfig());
                                    },
                                    items:[
                                    [lang.uniform,'uniform'],
                                    [lang.fill,'fill'],
                                    [lang.exactfit,'exactfit'],
                                    [lang.none,'none']
                                    ],
                                    label: lang.stretching
                                },
                                {
                                    id:  'PlayerVolume_' + editor.name,
                                    type: 'text',
                                    labelLayout: 'horizontal',
                                    'default': config['volume'],
                                    onBlur : function(){
                                        refreshConfig('volume', this.getDialog().getContentElement('player', 'PlayerVolume_' + editor.name).getValue());
                                        this.getDialog().getContentElement('code', 'Code_' + editor.name).setValue(processConfig());
                                    },
                                    label: lang.volume
                                }]
                            }]
                        },
                        {
                            id:  'PlayerLinktarget_' + editor.name,
                            type: 'text',
                            labelLayout: 'horizontal',
                            'default': config['linktarget'],
                            onBlur : function(){
                                refreshConfig('linktagret', this.getDialog().getContentElement('player', 'PlayerLinktarget_' + editor.name).getValue());
                                this.getDialog().getContentElement('code', 'Code_' + editor.name).setValue(processConfig());
                            },
                            label: lang.linktarget
                        },
                        {
                            id:  'PlayerPlugins_' + editor.name,
                            type: 'text',
                            labelLayout: 'horizontal',
                            'default': config['plugins'],
                            onBlur : function(){
                                refreshConfig('plugins', this.getDialog().getContentElement('player', 'PlayerPlugins_' + editor.name).getValue());
                                this.getDialog().getContentElement('code', 'Code_' + editor.name).setValue(processConfig());
                            },
                            label: lang.plugins
                        },
                        {
                            id:  'PlayerStreamer_' + editor.name,
                            type: 'text',
                            labelLayout: 'horizontal',
                            'default': config['streamer'],
                            onBlur : function(){
                                refreshConfig('streamer', this.getDialog().getContentElement('player', 'PlayerStreamer_' + editor.name).getValue());
                                this.getDialog().getContentElement('code', 'Code_' + editor.name).setValue(processConfig());
                            },
                            label: lang.streamer
                        },
                        {
                            id:  'PlayerPlayerId_' + editor.name,
                            type: 'text',
                            labelLayout: 'horizontal',
                            'default': config['player_id'],
                            onBlur : function(){
                                refreshConfig('player_id', this.getDialog().getContentElement('player', 'PlayerPlayerId_' + editor.name).getValue());
                                this.getDialog().getContentElement('code', 'Code_' + editor.name).setValue(processConfig());
                            },
                            label: lang.playerId
                        },
                        {
                            id:  'PlayerDivId_' + editor.name,
                            type: 'text',
                            labelLayout: 'horizontal',
                            'default': config['div_id'],
                            onBlur : function(){
                                refreshConfig('div_id', this.getDialog().getContentElement('player', 'PlayerPlayerId_' + editor.name).getValue());
                                this.getDialog().getContentElement('code', 'Code_' + editor.name).setValue(processConfig());
                            },
                            label: lang.divId
                        }]
                    }],
                    onOk : function() {
                        editor.insertHtml("<div id='" + config['div_id'] + "_box'>" + dialog.getContentElement('code', 'Code_' + editor.name).getValue() + "</div>");
                    }
                };
            });

            editor.addCommand('Media', new CKEDITOR.dialogCommand('MediaDialog'));

            editor.ui.addButton('Media', {
                label:   lang.media,
                command: 'Media',
                icon:    this.path + 'images/add.gif'
            });

            if(editor.addMenuItems)
            {
                editor.addMenuItems(  //have to add menu item first
                {
                    removeMedia:  //name of the menu item
                    {
                        label: lang.media,
                        command: 'removeMedia',
                        icon:    this.path + 'images/remove.gif',
                        group: 'removeMedia'  //have to be added in config
                    }
                });
            }
      
            editor.addCommand( 'removeMedia', new CKEDITOR.removeMedia() );
      
            if(editor.contextMenu)
            {
                editor.contextMenu.addListener(function(element, selection)  //function to be run when context menu is displayed
                {
                    if(! element || !element.is('img') || element.getId() == element.getParent().getId())
                        return null;
            
                    return {
                        removeMedia: CKEDITOR.TRISTATE_OFF
                    };
                });
            }
        }
    });
})();

CKEDITOR.removeMedia = function(){};
CKEDITOR.removeMedia.prototype =
{
    /** @ignore */
    exec : function( editor )
    {
        editor.getSelection().getSelectedElement().getParent().getParent().remove();
    }
};
