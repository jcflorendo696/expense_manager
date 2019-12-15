let membersPassField  = document.getElementById("memberPassField");

function isEditable(){
    let isPasswordEditable = document.getElementById('txtPwEditable').checked;
    if( isPasswordEditable == true ){
        membersPassField.disabled   = false;
    }else{
        membersPassField.disabled   = true;
    }
}