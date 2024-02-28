let fname = document.querySelector("#fname");
let lname = document.querySelector("#lname");

function full() {
    document.querySelector("#fullname").value = fname.value + " " + lname.value;
}
fname.addEventListener("input", () =>{
    full();
});
lname.addEventListener("input", () =>{
    full();
});
