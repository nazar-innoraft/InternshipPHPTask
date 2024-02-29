let fname = document.querySelector("#firstName");
let lname = document.querySelector("#lastName");

/**
 * function used to concat first name and last name and display it on input.
 *
 * no parameter here.
 */
function full() {
  document.querySelector("#fullname").value = fname.value + " " + lname.value;
}
fname.addEventListener("input", () => {
  full();
});
lname.addEventListener("input", () => {
  full();
});
