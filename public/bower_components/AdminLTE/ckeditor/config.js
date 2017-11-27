CKEDITOR.editorConfig = function( config ) {
	config.toolbarGroups = [
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
		{ name: 'forms', groups: [ 'forms' ] },
		{ name: 'tools', groups: [ 'tools' ] },
		{ name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'others', groups: [ 'others' ] },
		{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
		{ name: 'links', groups: [ 'links' ] },
		{ name: 'styles', groups: [ 'styles' ] },
		{ name: 'colors', groups: [ 'colors' ] },
		{ name: 'about', groups: [ 'about' ] },
		{ name: 'insert', groups: [ 'insert' ] }
	];

	config.removeButtons = 'Underline,Subscript,Superscript,Italic,Strike,PasteFromWord,PasteText,Undo,Redo,Anchor,SpecialChar,HorizontalRule,Table,Maximize,Source,Blockquote,About,Format,Styles,RemoveFormat,Scayt';
	config.linkShowAdvancedTab = false;
	config.linkShowTargetTab = false;
	config.removeDialogTabs = 'image:advanced;image:Link;image:info';
};

// CUSTOMIZE THE IMAGE UPLOAD POPUP
CKEDITOR.on('dialogDefinition', function(ev) {
    // Take the dialog name and its definition from the event data.
    var dialogName = ev.data.name;
    var dialogDefinition = ev.data.definition;

    // Check if the definition is from the dialog we're
    // interested in (the 'image' dialog). This dialog name found using DevTools plugin
    if (dialogName == 'image') {
        // Remove the 'Link' and 'Advanced' tabs from the 'Image' dialog.
        // dialogDefinition.removeContents('Link');
        // dialogDefinition.removeContents('advanced');

        dialogDefinition.onShow = function () {
			// This code will open the Advanced tab.
			this.selectPage('Upload');
		};

        // // Get a reference to the 'Image Info' tab.
        // var infoTab = dialogDefinition.getContents('info');

        // // Remove unnecessary widgets/elements from the 'Image Info' tab.         
        // infoTab.remove('txtHSpace');
        // infoTab.remove('txtVSpace');
        // infoTab.remove('txtWidth');
        // infoTab.remove('txtHeight');
        // infoTab.remove('txtBorder');
        // infoTab.remove('cmbAlign');
        // infoTab.remove('cmbFloat');
        // infoTab.remove('ratioLock');
        // infoTab.remove('htmlPreview');
    }
});
