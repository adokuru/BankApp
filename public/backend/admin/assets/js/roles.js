"use strict";	

function checkPermissionByGroup(className, checkThis){
    const groupIdName = $("#"+checkThis.id);
    const classCheckBox = $('.'+className+' input');
    if(groupIdName.is(':checked')){
            classCheckBox.prop('checked', true);
    }else{
        classCheckBox.prop('checked', false);
    }
}