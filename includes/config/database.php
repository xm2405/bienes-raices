<?php
function conectBD(): mysqli {
  $db = new mysqli('localhost', 'root', '', 'bienes_raices');
  $db->set_charset('utf8');
  if (!$db) {
    echo "Se conectó correctamente";
  }
  return $db;
}
