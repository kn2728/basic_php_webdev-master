<?php
require('../app/functions.php'); //読み込まれないと処理が止まる
include('../app/_parts/_header.php'); //止まらない



$today = date('Y-m-d H:i:s l');
$names = [
  'Taro',
  'Jiro',
  'Saburo'
];

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
    <button>SEND</button>
  </form>

  <?php include('../app/_parts/_footer.php'); //処理が止まらない