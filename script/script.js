let firstName = document.querySelector("#firstName");
let lastName = document.querySelector("#lastName");

/**
 * Function used to concat first name and last name and display it on input.
 */
function setFullName() {
  document.querySelector("#fullname").value = firstName.value + " " + lastName.value;
}
firstName.addEventListener("input", () => {
  setFullName();
});
lastName.addEventListener("input", () => {
  setFullName();
});
