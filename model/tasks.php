<?php

/**
 * Task Class: All functionalities the deals with the tasks are done here
 */
 class Tasks extends DB {

   /**
   * get_tasks_name(): Get the name of the all tasks
   */
   public function get_tasks_name() {
     $sql = $this->connect()->query("SELECT task_name FROM testIntranet.task_info");

     while ($row = $sql->fetch_array()) {
      $tasks[] = $row;
     }
     return $tasks;
   }

   /**
   * get_tasks(): Get the tasks the duration and the users incharge
   */
   public function get_tasks() {

     $sql = $this->connect()->query("SELECT task_info.task_name, task_info.duration_of_task, personal_info.first_name, personal_info.last_name FROM testIntranet.task_allocation INNER JOIN testIntranet.task_info  ON task_allocation.task_id = task_info.task_id INNER JOIN testIntranet.personal_info ON task_allocation.personal_id = personal_info.personal_id");

     //$results = $sql->fetch_array(MYSQLI_ASSOC);

     while($rows = $sql->fetch_array(MYSQLI_ASSOC)) {
       $results [] = $rows;
     }

     return $results;
   }
 }
?>
