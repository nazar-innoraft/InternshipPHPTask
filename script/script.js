let first_name = document.querySelector("#firstName");
let last_name = document.querySelector("#lastName");

function set_fullname() {
  document.querySelector("#fullname").value = first_name.value + " " + last_name.value;
}
first_name.addEventListener("input", () => {
  set_fullname();
});
last_name.addEventListener("input", () => {
  set_fullname();
});
