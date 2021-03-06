<?php
require('../app/functions.php'); //読み込まれないと処理が止まる

$colorFromGet = filter_input(INPUT_GET, 'color') ?? 'transparent';
// setcookie('color',$colorFromGet);
$_SESSION['color'] = $colorFromGet;

include('../app/_parts/_header.php'); //止まらない



$today = date('Y-m-d H:i:s l');
$names = [
  'Taro',
  'Jiro',
  'Saburo'
];

$message = trim(filter_input(INPUT_GET,'message'));
$message = $message !== '' ? $message : '...';
$username = filter_input(INPUT_GET,'username');
$username = $username !== '' ? $username : '名無し';

$colors = filter_input(INPUT_GET,'colors',FILTER_DEFAULT,FILTER_REQUIRE_ARRAY);
$colors = empty($colors) ? 'None selected!' : implode(',',$colors);

$numbers = filter_input(INPUT_GET,'numbers',FILTER_DEFAULT,FILTER_REQUIRE_ARRAY);
$numbers = empty($numbers) ? 'None selected!' : implode(',',$numbers);

$number = filter_input(INPUT_GET, 'number') ?? 'None selected!';
// $number = isset($number) ? $number : 'None selected!'; 何も選択されていない時の書き方１
// $number = $number ?? 'None selected!';　選択なし２



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

  <p><?= nl2br(h($message)); ?> by <?= h($username); ?></p>
  <p><?= h($colors); ?></p>
  <p><?= h($numbers); ?></p>
  <p><?= h($number); ?></p>
  <p><?= h($colorFromGet); ?></p>


  <p><a href="index.php">BACK</a></p>
      <p>Message added!</p>
  <?php include('../app/_parts/_footer.php'); //処理が止まらない