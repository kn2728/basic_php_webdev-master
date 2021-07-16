<?php
require('../app/functions.php'); //読み込まれないと処理が止まる
include('../app/_parts/_header.php'); //止まらない



$today = date('Y-m-d H:i:s l');
$names = [
  'Taro',
  'Jiro',
  'Saburo'
];

createToken();

define('FILENAME', '../app/messages.txt');

if($_SERVER['REQUEST_METHOD'] === 'POST'){
  validateToken();
  
  $mes = trim(filter_input(INPUT_POST,'mes'));
  $mes = $mes !== '' ? $mes : '...';
  // $filename = '../app/messages.txt';
  $fp = fopen(FILENAME, 'a');
  fwrite($fp, $mes . "\n");
  fclose($fp);

  header('Location: http://localhost:8080/result.php');
  exit;
}

// $filename = '../app/messages.txt';
$messages = file(FILENAME, FILE_IGNORE_NEW_LINES);
?>


  <p>Today: <?= $today; ?></p> 
  <ul>

  <?php if(empty($names)): ?>
    <li>Nobody!</li>
  <?php else: ?>
    <?php foreach($names as $name): ?>
      <li><?= h($name); ?></li>
    <?php endforeach; ?>
  <?php endif; ?>
  </ul>

  <form action="result.php" method="get">
    <textarea name="message"></textarea>
    <input type="text" name="username">
    <select name="colors[]" multiple>
      <option value="pink">PINK</option>
      <option value="orange">ORANGE</option>
      <option value="gold">GOLD</option>
    </select>
    <label><input type="checkbox" name="numbers[]" value="1">1</label>
    <label><input type="checkbox" name="numbers[]" value="2">2</label>
    <label><input type="checkbox" name="numbers[]" value="3">3</label>
    <label><input type="radio" name="number" value="5">5</label>
    <label><input type="radio" name="number" value="6">6</label>
    <label><input type="radio" name="number" value="7">7</label>
    <p>bg-color:</p>
    <label><input type="radio" name="color" value="pink">PINK</label>
    <label><input type="radio" name="color" value="gold">GOLD</label>
    <label><input type="radio" name="color" value="orange">ORANGE</label>

    <button>SEND</button>

    <a href="reset.php">[reset]</a>
  </form>


  <ul>
    <?PHP foreach($messages as $mes): ?>
      <li><?= h($mes); ?></li>
      <?php endforeach; ?>
  </ul>
  <form action="" method="post">
    <input type="text" name="mes">
    <button>POST</button>
    <input type="hidden" name="token" value="<?= h($_SESSION['token']); ?>">
  </form>

  <?php include('../app/_parts/_footer.php'); //処理が止まらない