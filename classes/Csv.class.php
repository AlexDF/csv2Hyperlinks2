<?php
//namespace Csv;

interface CsvInterface {
  public static function open( $path );
  public static function close( $handle );
  public static function getFriendlyHeadings($filepath, $ignore_first_row, $column);
}

class Csv {

  public static function open($path) {
    return fopen($path, "r");
  }

  public static function close($handle) {
    fclose( $handle );
  }

  public static function getFriendlyHeadings($filepath, $ignore_first_row, $column) {
    ini_set('auto_detect_line_endings', TRUE);
    if( $handle = self::open($filepath) ) {
      while( ($row = fgetcsv($handle, 1000, ",")) != FALSE ) {
        if( $ignore_first_row ) {
          $ignore_first_row = FALSE;
        } else {
          $friendlyHeadings[] = $row[$column];
        } //end if-else
      } //end while
    } //end if
    return $friendlyHeadings;
  } //end getFriendly Headings

} // end class Csv



?>