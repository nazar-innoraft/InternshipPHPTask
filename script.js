let firstName = document.querySelector("#firstName");
let lastName = document.querySelector("#lastName");

/**
 * function used to concat first name and last name and display it on input.
 *
 * no parameter here.
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
