<?php
namespace Csv;

interface CsvInterface {
  public static function open( $path );
  public static function get($option, $filepath, $ignore_first_row = FALSE, $discard_row = FALSE, $column = NULL);
}

class Csv {
  public static function open($path) {
    return fopen($path, "r");
  }

  public static function get($option, $filepath, $ignore_first_row = FALSE, $discard_row = FALSE, $column = NULL) {
    ini_set('auto_detect_line_endings', TRUE);
    if( $handle = self::open( $filepath ) ) {
      while( ($row = fgetcsv($handle, 1000, ",")) != FALSE ) {
        if( !$ignore_first_row ) {
          if( !$discard_row ) {
            $column_headings = $row;
          } // end if
          $ignore_first_row = TRUE;
        } 
      } end while  
    }
  } // end public static function get


} // end class Csv

?>