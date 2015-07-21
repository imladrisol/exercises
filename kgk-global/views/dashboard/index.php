
<h1><?php echo $this->msg;?></h1><br/>
<div id="dashboard">

    <form action="" method="post">
    <select name="driver">
        <?php foreach($this->drivers as $driver):?>
        <option value="<?=$driver['id']?>"><?=$driver['driver_name']?> <?=$driver['driver_surname']?></option>
        <?php  endforeach; ?>
    </select>
<input id="datepicker" name="datepicker" type="text">
<input type="submit" value="OK">
    </form>  
    
    <?php
        if(!empty($this->routs)){
            ?>
    <style>
       table { 
        width: 100%; 
        border: 4px double black;
        border-collapse: collapse; 
       }
       th { 
        text-align: left; 
        background: #ccc; 
        padding: 5px; 
        border: 1px solid black; 
       }
       td { 
        padding: 5px; 
        border: 1px solid black; 
       }
        </style>
    <?php
            echo "<br/><table >";
            echo "<thread><tr>"
            . "<td>Автомобиль</td>"
                    . "<td>Водитель</td>"
                    . "<td>Дата начала</td>"
                    . "<td>Дата конца</td>"
                    
                    . "</tr></thread>";
            foreach ($this->routs as $r) {
                echo "<tr>";
                echo "<td>{$r['car_name']}</td> "
                . " <td>{$r['driver_name']} {$r['driver_surname']}</td> "
                . " <td>{$r['date_start']}</td> "
                . "<td>{$r['date_end']}</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
    ?>
</div>
