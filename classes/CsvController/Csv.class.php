<?php
namespace CsvController;

interface CsvInterface {
  public static function open( $path );
  public static function close( $handle );
  public static function getFriendlyHeadings($filepath, $ignore_first_row, $column);
  public static function getRecords($filepath, $ignore_first_row, $headings);
}




class Csv implements CsvInterface {


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
    self::close($handle);
    return $friendlyHeadings;
  } //end getFriendly Headings



  public static function getRecords($filepath, $ignore_first_row, $headings = NULL) {
    ini_set('auto_detect_line_endings', TRUE);
    if( $handle = self::open($filepath) ) {
      while( ($row = fgetcsv($handle, 1000, ",")) != FALSE ) {
        if( $ignore_first_row ) {
          $ignore_first_row = FALSE;
        } else {
          $record = array_combine($headings, $row);
          $records[$record['Institution (entity) name']] = $record;
        }      
      } //end while
    } //end if
    self::close($handle);
    return $records;
  } //end getRecords



} //end class Csv


?>