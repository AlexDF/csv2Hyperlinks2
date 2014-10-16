<?php
  namespace ActionsController;

  interface ActionsInterface {
    public static function printLinks( $records );
    public static function displayRecord( $record );
  }


  class Actions implements ActionsInterface {
    private static $output="";
  
    public static function printLinks($records) {
      foreach( $records as $record ) {
        self::$output .= '<a href="index.php?page_type=fetch_record&&school=' .
          $record['Institution (entity) name'] . '">' .
          $record['Institution (entity) name'] . '</a>' . '<br>';
      }
      return self::$output;
    }

    

    public static function displayRecord( $record ) {
      
      self::$output .= '<h2 id="recordTitle">' . $_GET['school'] .
        '</h2><a class="back-btn-link" href="index.php?page_type=index">' .
        '<div class="back-btn">Back</div></a><table>';

      foreach( $record as $key => $value ) {
        self::$output .= '<tr>' . '<th>' . $key . '</th>' .
          '<td>' . $value . '</td>'. '</tr>';
      }
      self::$output .= '</table>';

      return self::$output;
    }




  }



?>