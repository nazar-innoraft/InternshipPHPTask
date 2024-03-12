const pass = document.getElementById('pass');
const c_pass = document.getElementById('c_pass');

function check_pass(){
  console.log(pass.value);
  if (pass.value != c_pass.value ) {
    document.getElementById("submit").disabled = true;
    document.getElementById("wrong").innerHTML = "password not matched";
  } else {
    if (pass.value.length < 4){
      document.getElementById("wrong").innerHTML = "password must be greater than 3";
      document.getElementById("submit").disabled = true;
    } else {
      document.getElementById("submit").disabled = false;
      document.getElementById("wrong").innerHTML = "";
    }
  }
}
pass.addEventListener('input', check_pass);
c_pass.addEventListener('input', check_pass);
