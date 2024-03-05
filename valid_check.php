<?php
/**
 * This function check if any session is exits or not.
 *
 * @return bool
 *  Return true if session exit else false.
 */
function check_valid(): bool{
  session_start();
  if (isset($_SESSION['user_name']) && isset($_SESSION['password'])) {
    return true;
  }
  return false;
}
?>
