<?php
include 'data.php';
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
  <h1>Order Form</h1>
  <form method="post" action="submit.php">

    <label>
      Name
      <input type="text" name="name" required>
    </label>

    <fieldset class="bulbs">
      <legend>Bulbs</legend>

      <?php foreach ($bulbs as $bulb_id => $bulb) { ?>
      <label>
        <input type="checkbox" name="bulb[]" value="<?=$bulb_id?>">
        <?=$bulb['description']?> for $<?=$bulb['price']?>
      </label>
      <?php } ?>

    </fieldset>

    <fieldset>
      <legend>Card Type</legend>

      <?php foreach ($cards as $card_id => $card) { ?>
      <label>
        <input type="radio" name="cardtype" value="<?=$card_id?>" required>
        <?=$card['description']?>
      </label>
      <?php } ?>

    </fieldset>

    <input type="submit" value="Submit">
    <input type="reset" value="Reset">

  </form>
</body>
</html>
