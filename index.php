<?php
include('inc/gen_data.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Data Generator</title>
    <link rel="stylesheet" href="inc/style.css">
  </head>
  <body>

    <div id="form">
      <form action="index.php" method="post">
        <label for="howMany">How many boxes do you want to generate? (Max is 50)</label>
        <input class="data" type="number" name="howMany" size="5" maxlength="2" min="1" max="50"><br>
        <label for="repeats">&nbsp; &nbsp;How many times should the data repeat? (Max is 50)</label>
        <input class="data" type="number" name="repeats" size="5" maxlength="2" min="1" max="50"><br>
        <input class="data" type="submit">
      </form>
      <?php
      if (isset($_POST)) {
        $howMany = filter_input(INPUT_POST, 'howMany' , FILTER_SANITIZE_STRING);
        $repeats = filter_input(INPUT_POST, 'repeats' , FILTER_SANITIZE_STRING);

        for ($i=0; $i<$howMany; $i++) {
            echo '<div id="data">';
            echo generateData($repeats);
            echo '</div>';
        }
      }

      ?>
    </div>

  </body>

  </html>
