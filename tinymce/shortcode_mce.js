(function() {
  tinymce.PluginManager.add('KvbfShortcodes', function( editor, url ) {
    editor.addButton( 'kvbf_shortcodes_button', {
      text: 'Shortcodes',
      icon: false,
			type: 'menubutton',
      menu:
      [
        {
  				text: 'YouTube beágyazás',
  				value: '[youtube videoid="xxxxxxxxxx"]',
  				onclick: function() {
  					editor.insertContent(this.value());
  				}
  			},
        {
          text: 'Gomb beágyazás',
          value: '[button link="http://valami.hu" szoveg="Gomb szövege" ujoldal="igen/nem"]',
          onclick: function() {
            editor.insertContent(this.value());
          }
        }
      ]
    });
  });
})();
