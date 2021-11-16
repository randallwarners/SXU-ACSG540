<?php
include 'data.php';

$total = 0.0;
$taxrate = 0.062;
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
      <tr class="total">
        <td>SubTotal</td>
        <td>$<?=$total?></td>
      </tr>
      <tr>
        <td>Sales Tax</td>
        <td>$<?=round($total * $taxrate, 2)?></td>
      </tr>
      <tr class="total">
        <td>Total</td>
        <td>$<?=round($total * ($taxrate + 1), 2)?></td>
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
