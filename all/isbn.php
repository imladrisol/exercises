<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Add a Task</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        $dbc = mysqli_connect('localhost', 'root', '', 'test');
        if(isset($_POST['submit'])){
            if(isset($_POST['parent_id']) && filter_var($_POST['parent_id'],FILTER_VALIDATE_INT,['min_range'=>1])){
                $parent_id = $_POST['parent_id'];
            }
            else{
                $parent_id = 0;
            }
            $task = mysqli_real_escape_string($dbc, strip_tags($_POST['task']));
            $q = "INSERT INTO tasks (parent_id, task) values ($parent_id, '$task')";
            $r = mysqli_query($dbc, $q);
            if(mysqli_affected_rows($dbc) == 1){
                header("Location : isbn.php");
            }
            else{
                echo 'The task could not to be added<br />';
            }
        }
    ?>
    
    <form method="post" action="isbn.php">
        <fieldset>
        <p>Task: <input type="text" name="task" size="60" maxlength="100" required></p>
        <p>Parent task: 
            <select name="parent_id">
                <option value="0">None</option>
                <?php
                    $q = "select task_id, parent_id, task from tasks";
                    $r = mysqli_query($dbc, $q);
                    
                    $tasks = [];
                    while(list($task_id, $parent_id, $task) = mysqli_fetch_array($r, MYSQLI_NUM)){
                        echo "<option value=\"$task_id\">$task</option>";
                        $tasks[$parent_id][$task_id] = $task;
                    }
                ?>
            </select>
        </p>
        <input type="submit" name="submit" value="Add this task">
        </fieldset>
    </form>
    <?php
    /*echo "<pre>";
    print_r($tasks);
    echo "</pre>";*/
        function parent_sort($x,$y){
            if($x['parent_id']==$y['parent_id']) return 0;
            return ($x['parent_id']>$y['parent_id'])? 1:-1;
        }
        
        function makeList($parent){
            global $tasks;
            //print_r($parent);
            echo "<ol>";
            foreach($parent as $key=>$val){
                
                echo <<<EOT 
                <li><input type="checkbox" name="tasks[$key]" value="done">$val
                EOT;
                //echo $tasks[$key];
                if(isset($tasks[$key])){
                    makeList($tasks[$key]);
                }
                echo '</li>';
            }
            echo "</ol>";
        }
        
    ?>
    <ul>
        <?php 
        /*usort($tasks,"parent_sort");
        foreach($tasks as $val){
            echo "<li>{$val['task']}</li>";
        }*/
     makeList($tasks[0]);
        ?>
    </ul>
</body>
</html>