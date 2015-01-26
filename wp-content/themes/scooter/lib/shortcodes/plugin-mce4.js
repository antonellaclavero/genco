(function ()
{
	function createStyleElement(text)
	{
		var style       = document.createElement('style');
		style.type      = 'text/css';
		style.innerHTML = text;
		document.getElementsByTagName('head')[0].appendChild(style);
	}
	
	function addPopupMenuButton ( title, id ) 
	{
		return {text: title, onclick: function(){
                jQuery.pxmodal({
                    title: title,
                    url:   ajaxurl + "?action=px_sc_popup&type=" + id,
                    load:  jQuery.px.scpopup.load
                });
		}};
	}
	
	function addImmediateMenuButton (ed, title, text ) 
	{
		return {text: title, onclick: function(){
            ed.insertContent(text);
		}};
	}

	tinymce.PluginManager.add( 'pxShortcodes', function( editor, url ) {
		//Create icon class
		createStyleElement('.mce-i-px-btn{ background-image: url('+url+'/images/icon.png) !important; }');
	
		var menus = [ 
		{text:"Page Elements", menu:[
		
			addPopupMenuButton("LayerSlider", "layerslider"),
			addPopupMenuButton("Video YouTube", "video_youtube"),
			addPopupMenuButton("Video Vimeo", "video_vimeo"),
			addPopupMenuButton("Audio SoundCloud", "audio_soundcloud"),

			addPopupMenuButton("Image Box", "imagebox"),
			addPopupMenuButton("Text Box", "textbox"),
			addPopupMenuButton("Icon Box", "iconbox"),
		
			addPopupMenuButton("CounterBox", "conterbox"),
			addPopupMenuButton("Pie chart", "piechart"),
			
			addPopupMenuButton("Social Link", "socialLink"),
			addPopupMenuButton("Button", "button"),

			addPopupMenuButton("Separator", "separator"),
			addPopupMenuButton("Title Separator", "title_separator"),
	
		]},
		{text: "Tabs and Toggles", menu:[
			addImmediateMenuButton(editor, "Tab Group", "[tab_group]<br />[/tab_group]"),
            addImmediateMenuButton(editor, "Tab", "[tab title='Tab'][/tab]"),
			
			addImmediateMenuButton(editor, "Accordion", "[accordion]<br />[/accordion]"),
            addPopupMenuButton("Accordion Tab", "accordion_tab"),
			
			addImmediateMenuButton(editor, "Toggle", "[toggle]<br />[/toggle]"),
            addPopupMenuButton("Toggle Tab", "toggle_tab")
		]},
		{text: "Team Member", menu:[
			addPopupMenuButton("Team Member", "team_member"),
			addPopupMenuButton("Team Member Icon", "team_icon"),
		]},
		{text: "Testimonial", menu:[
			addPopupMenuButton("Testimonial Group", "testimonial_group"),
			addPopupMenuButton("Testimonial", "testimonial"),
		]},
		{text: "Layout Elements", menu:[
			
			addPopupMenuButton("1/2 + 1/2", "row66"),
			addPopupMenuButton("1/3 + 1/3 + 1/3", "row444"),
			addPopupMenuButton("2/3 + 1/3", "row84"),
			addPopupMenuButton("1/4 + 1/4 + 1/4 + 1/4", "row3333"),
			addPopupMenuButton("3/4 + 1/4", "row93"),

			//addImmediateMenuButton(editor, "1/2 + 1/2", "[row topSpace='' bottomSpace='']<br />[span6][/span6]<br />[span6][/span6]<br />[/row]"),
            //addImmediateMenuButton(editor, "1/3 + 1/3 + 1/3", "[row topSpace='' bottomSpace='']<br />[span4][/span4]<br />[span4][/span4]<br />[span4][/span4]<br />[/row]"),
            //addImmediateMenuButton(editor, "2/3 + 1/3", "[row topSpace='' bottomSpace='']<br />[span8][/span8]<br />[span4][/span4]<br />[/row]"),
            //addImmediateMenuButton(editor, "1/4 + 1/4 + 1/4 + 1/4", "[row topSpace='' bottomSpace='']<br />[span3][/span3]<br />[span3][/span3]<br />[span3][/span3]<br />[span3][/span3]<br />[/row]"),
            //addImmediateMenuButton(editor, "3/4 + 1/4", "[row topSpace='' bottomSpace='']<br />[span9][/span9]<br />[span3][/span3]<br />[/row]"),
			
			addImmediateMenuButton(editor, "Container", "[container]<br />[/container]"),
			addPopupMenuButton("Color Section", "section_alt"),

            addPopupMenuButton("Row", "row"),
			//addImmediateMenuButton(editor, "Row", "[row topSpace='' bottomSpace='']<br />[/row]")
		]}
		];//menus
		
		//Add span shortcodes
		for(var i=1; i<=12;i++)      
			menus[4].menu.push(addImmediateMenuButton(editor, "Span " + i, "[span"+i+" offset=''][/span"+i+"]"));
	
		editor.addButton('px_button', {
			type: 'menubutton',
			icon: 'px-btn',
			menu: menus
		});//addButton
	});//plugin

})();