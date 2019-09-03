<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../styles/style.css">
    <title>ToDos</title>
</head>
<body>
    <!-- style in html, just this one time -->
    <form method="POST" action="signout.php" style="border: none; background: none;">
    <button type="submit" class="logout_btn">Logout</button>
    </form>

    <div class="db">
    <?php                  
        require_once("getdb.php");
        getDB();
    ?>
    </div>
    
    <div class="heading">
        <h1>ToDo list</h1>
        <div id="Date">
        </div>
    </div>
    <form method="POST" action="new_task.php">
        <input type="text" name="task" class="task_input">
        <button type="submit" class="add_btn" name="submit">Add To Do</button>
    </form>
    <ul id="to_do_list">
    <?php
    require_once("list_gen.php");
    getUpdate();
    ?>
    </ul> 
    

</body>
</html>