(function ($) {
    "use strict";
    // menu items
    var arrayjson = $('#menu_data').val();
    // icon picker options
    var iconPickerOptions = {searchText: "Search...", labelHeader: "{0}/{1}"};
    // sortable list options
    var sortableListOptions = {
    	placeholderCss: {'background-color': "#cccccc"}
    };

    var editor = new MenuEditor('myEditor', {listOptions: sortableListOptions, iconPicker: iconPickerOptions});
    editor.setForm($('#frmEdit'));
    editor.setUpdateButton($('#btnUpdate'));
    $('#btnReload').on('click', function () {
    	editor.setData(arrayjson);
    });

    $('#btnOutput').on('click', function () {
    	var str = editor.getString();
    	$("#out").text(str);
    });

    $("#btnUpdate").on('click',function(){
    	if ($('#text').val() != '' && $('#href').val() != '') {
    		editor.update();
    	}	
    });

    $('#btnAdd').on('click',function(){
    	if ($('#text').val() != '' && $('#href').val() != '') {
    		editor.add();
    	}
    	
    });

    $('#form-button').on('click',function(){
    	$("#data").val(editor.getString());
    })
    editor.setData(arrayjson);
})(jQuery);	
