<?php
include 'data.php';

$total = 0.0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>Week 12 Assignment - 9.10</title>
  <link rel="stylesheet" href="base.css">
</head>

<body>
  <nav>
    <div class="right">
      Randall Warners
    </div>
  </nav>
  <h1>Order Checkout</h1>
  <p>Name: <?=$_POST['name']?></p>
  <p>Card Type: <?=$cards[$_POST['cardtype']]['description']?></p>

  <?php if (array_key_exists('bulb', $_POST)) { ?>

  <table>
    <caption>Bulbs</caption>
    <thead>
      <tr>
        <th>Item</th>
        <th>Price</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($_POST['bulb'] as $bulb) {
      $total += $bulbs[$bulb]['price']; ?>
      <tr>
        <td><?=$bulbs[$bulb]['description']?></td>
        <td>$<?=$bulbs[$bulb]['price']?></td>
      </tr>
      <?php } ?>
    </tbody>
    <tfoot>
      <tr>
        <td>Total</td>
        <td>$<?=$total?></td>
      </tr>
    </tfoot>
  </table>

  <?php } else { ?>

  <p>No items selected!</p>

  <?php } ?>

  <p>
    <a href="index.php">Back to Order</a>
  </p>
</body>
</html>
