<?php
/**
 * endSession function to end the current session.
 *
 * @return void
 */
function end_session()
{
  session_start();
  // Unsetting the session value.
  $SESSION = array();
  // Destroying the session.
  session_destroy();
}
