<?php
  
  namespace HtmlController;

  interface HtmlInterface {
    public static function render( $page_type );
  }


  class Html implements HtmlInterface {
    public static $header = '<!DOCTYPE html><html><head><link type="text/css" rel="stylesheet" href="css/style.css"/></head><body><h1>School Directory</h1><hr>';
    public static $content = "";
    public static $footer = "</body></html>";

    public static function render($page_type) {
      $headings = \CsvController\Csv::getFriendlyHeadings('csv/hd2013names.csv', TRUE, 5);
      $records = \CsvController\Csv::getRecords('csv/hd2013.csv', TRUE, $headings);

      if ( $page_type == "index" || !$page_type ) {
        self::$content = \ActionsController\Actions::printLinks($records);
      } else if( $page_type == "fetch_record" ) {
        $record_key = $records[$_GET['school']];
        self::$content = \ActionsController\Actions::displayRecord($record_key);
      }
      echo self::$header . self::$content . self::$footer;
    }

  }
?>