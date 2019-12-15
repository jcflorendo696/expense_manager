let changePassFieldIsDisabled = true;
let membersField  = document.getElementById("memberPassField");
let btnChangePass = document.getElementById("btnMemberChangePass");

function memberChangePassword()
{
    if( changePassFieldIsDisabled == true){
        console.log(1);
        membersField.disabled = false;
        changePassFieldIsDisabled = false;
        btnChangePass.innerHTML = "<i class='fas fa-user-edit'></i> Update Password";
    }else{
        membersField.disabled = true;
        changePassFieldIsDisabled = true;
        btnChangePass.innerHTML = "<i class='fas fa-user-edit'></i> Edit Password";
    }
}