
<!-- update list from DB -->

<?php
// session_start();
function getUpdate() {
    require_once("../private/config.php");
    $db = mysqli_connect(SERVER, USER, PW, DB);
    // $sql = "SELECT * FROM tasks";
    $sql = "SELECT * FROM tasks WHERE uid = '$_SESSION[uid]'";

    $result = $db->query($sql);
    $mydata = $result->fetch_all(MYSQLI_ASSOC);

    foreach($mydata as $key => $row) {
        // create list
        echo "<li class='todo_list_item'>"; 
        // šī ir 3 rinda, lai uzstartētu listu no nulles
        // echo $row['task'];



        // edit tasks
        echo "<form id='edit_task' method='POST' action='edit_task.php'>";
        echo "<input type='hidden' name='task_id' value='$row[id]'>";
        echo "<input class='edit_task' type='text' name='edit_task' value='$row[task]'>";
        echo "</form>";


        // delete button
        echo "<form id='delete_task' method='POST' action='delete_task.php'>";
        echo "<input type='hidden' name='task_id' value='$row[id]'>";
        echo "<button class='delete_button' type='submit'>";
        echo "delete</button>";
        echo "</form>";

        echo "</li>";
    }
    mysqli_close($db);


}

?>