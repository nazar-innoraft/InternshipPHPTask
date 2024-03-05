<?php

/**
 * This function validates marks format.
 *
 * @param  string $markString
 *  This parameter contains marks as a string.
 *
 * @return bool
 *  Return true if marks contains valid format.
 */
function valid_mark(string $markString): bool {
  $pattern11 = '/[^a-z0-9|\n]/i';
  $pattern12 = '/^[a-z0-9|]+$/i';
  if (preg_match($pattern11, trim($markString)) || !preg_match($pattern12, trim($markString))) {
    return false;
  }
  $marks = explode("\n", trim($markString));
  foreach ($marks as $mark) {

    $pattern21 = '/[^a-z0-9|]/i';
    $pattern22 = '/^[a-z0-9|]+$/i';
    if (preg_match($pattern21, trim($mark)) || !preg_match($pattern22, trim($mark))) {
      return false;
    }

    list($subject, $score) = explode("|", $mark);

    $pattern31 = '/[^a-z]/i';
    $pattern32 = '/^[a-z]+$/i';
    if (preg_match($pattern31, trim($subject)) || !preg_match($pattern32, trim($subject))) {
      return false;
    }

    $pattern41 = '/[^0-9]/';
    $pattern42 = '/^[0-9]+$/';
    if (preg_match($pattern41, trim($score)) || !preg_match($pattern42, trim($score))) {
      return false;
    }
  }
  return true;
}
?>
