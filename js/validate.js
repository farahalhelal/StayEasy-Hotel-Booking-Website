function checkRegister(){
let u=document.getElementById("regUser").value;
let p=document.getElementById("regPass").value;
if(u==""||p==""){alert("Fill all fields");return false;}
return true;}