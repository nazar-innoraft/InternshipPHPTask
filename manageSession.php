<?php
session_start();

function endSession() {
  if ($_SESSION['userName']) {
    // Unsetting the session value.
    session_unset();
    // Destroying the session.
    session_destroy();
  }
}
