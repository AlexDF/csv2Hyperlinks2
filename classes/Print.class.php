<?php
  class Actions {
    public static function printLinks($records) {
      $output = "";
      foreach( $records as $record ) {
        $output .= '<a href="index.php?school=' . $record['Institution (entity) name'] . '">' . $record['Institution (entity) name'] . '</a>' . '<br>';
      }
      return $output;
    }

    

    public static function displayRecord( $record ) {
      echo '<h2 id="recordTitle">' . $_GET['school'] . '</h2>';
    echo '<a class="back-btn-link" href="index.php"><div class="back-btn">Back</div></a>';
      echo "<table>";
      foreach( $record as $key => $value ) {
        echo "<tr>";
        echo "<th>" . $key . "</th>";
        echo "<td>" . $value . "</td>";
        echo "</tr>";
      }
      echo "</table>";


    }




  }



?>