<?php
  $name = 'Randall';
  $birthYear = 1996;
  $currentyear = date('Y');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>Week 11 Assignment - Basic PHP</title>
  <link rel="stylesheet" href="base.css">
</head>

<body>
  <nav>
    <div class="right">
      Randall Warners
    </div>
  </nav>

  <h1>Basic PHP</h1>

  <p>
    Name: <?=$name?>
  </p>

  <p>
    Age: <?=$currentyear - $birthYear?>
  </p>

</body>
</html>
