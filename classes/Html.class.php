<?php
  
  class Html {
    public static $header = '<!DOCTYPE html><html><head></head><body>';
    public static $content = "";
    public static $footer = "</body></html>";

    public static function render($page_type) {
      $headings = Csv::getFriendlyHeadings('csv/hd2013names.csv', TRUE, 5);
      $records = Csv::getRecords('csv/hd2013.csv', TRUE, $headings);

      if ( $page_type == "index" || !$page_type ) {
        self::$content = Actions::printLinks($records);
      } else if( $page_type == "fetch_record" ) {
        $record_key = $records[$_GET['school']];
        self::$content = Actions::displayRecord($record_key);
      }
      echo self::$header . self::$content . self::$footer;
    }

  }
?>