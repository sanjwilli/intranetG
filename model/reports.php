<?php

/**
* Reports Class: All functionalities that deal with the reports are done here
*
*/
Class Report extends DB {

  /**
  * Get Weekly Re
  *
  */
  public function get_weekly_reports() {

    $sql = $this->connect()->query("SELECT report_overview.report_overview, Weekly_Report.Date_, technical_scope_activities.tsa FROM testIntranet.Weekly_Report INNER JOIN testIntranet.report_overview ON Weekly_Report.overview_id = report_overview.overview_id INNER JOIN testIntranet.technical_scope_activities ON Weekly_Report.tsa_id = technical_scope_activities.tsa_id");

    $results = $sql->fetch_array(MYSQLI_BOTH);

    return $results;
  }

  public function get_weekly_report_date() {

    $sql = $this->connect()->query("SELECT date_ FROM testIntranet.Weekly_Report");

    $results = $sql->fetch_array(MYSQLI_BOTH);

    return $results['date_'];
  }
}
?>
