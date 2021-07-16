<?php 

require('../app/functions.php');

// setcookie('color','');
unset($_SESSION['color']);

header('Location: http://localhost:8080/index.php');
// Location 大文字　:のあとスペース　httpから始める