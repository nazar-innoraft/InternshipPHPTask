<?php
session_start();
/**
 * endSession function to end the current session.
 *
 * @return void
 */
function end_session() {
  if ($_SESSION['userName']) {
    // Unsetting the session value.
    session_unset();
    // Destroying the session.
    session_destroy();
  }
}
