<?php
//namespace Csv;

interface CsvInterface {
  public static function open( $path );
  
}

class Csv {
  public static function open($path) {
    return fopen($path, "r");
  }

  public static function close($handle) {
    fclose( $handle );
  }

} // end class Csv



?>