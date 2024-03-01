<?php
/**
 * Generates questions using user input data.
 *
 * @param  mixed $pgno
 *   Page number which is asked by user.
 *
 * @return string
 *   Returning question details as per page number.
 */
function content(int $pgno): string {
$cont = "";
  switch ($pgno) {
    case 1:
      $cont = "<ul>
      <li>
      1. Create a form with below fields:
      <ul>
      <li>First Name - User will input only alphabets1</li>
      <li>Last Name - User will input only alphabets</li>
      <li>Full name: User cannot enter a value in Full name field. It will be disabled by default. When the first name and last name fields are filled, this field outputs the sum of the above 2 fields.</li>
      </ul>
      </li>
      <li>
      Submit Button:
          <ul>
          <li>On submit, the form gets submitted and the page will reload</li>
          <li>Hello [full-name] will appear on the page</li>
          </ul>
      </li>
      </ul>";
      break;
    case 2:
      $cont = "<p>2. Add a new field to accept user image in addition to the above fields. On submit store the image in the backend and display it with the full name below it.<p>";
      break;
    case 3:
      $cont = "<p>3. Add a text area to the above form and accept marks of different subjects in the format, English|80. One subject in each line. Once values entered and submitted, accept them to display the values in the form of a table.</>";
      break;
    case 4:
      $cont = "<p>4. Add a new text field to the above form to accept the phone number from the user. The number will belong to an Indian user. So, the number should begin with +91 and not be more than 10 digits.<p>";
      break;
    case 5:
      $cont = "<p>5. Add a new single text field to the above form that will accept email id. Do not use email id input field type.<p>";
      break;
    case 6:
      $cont = "<ul>
      <li>
      Email Syntax check:
      <ul>
      <li>User will enter email id and on submit, check if correct email id syntax has been used.</li>
      <li>Show a message on successful email syntax or show an error message on the wrong syntax.</li>
      </ul>
      </li>
      <ul>
              Valid Email id Check:
          <li>User will enter email id and on submit, use the following site http://www.mailboxlayer.com/ to check if the entered email id is valid.</li>
      </ul>
      </ul>";
      break;
    default:
      $cont = "Wrong page No.";
  }
  return $cont;
}

?>
