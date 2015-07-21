<h1><?php echo $this->msg;?></h1><br/>
<div id="dashboard">

    <form action="" method="post">
        <select name="driver">
            <?php foreach($this->drivers as $driver):?>
            <option value="<?=$driver['id']?>"><?=$driver['driver_name']?> <?=$driver['driver_surname']?></option>
            <?php  endforeach; ?>
        </select>
        <input type="submit" value="OK">
    </form>  
    <?php
        if(!empty($this->routs)){
           echo "<br/>{$this->routs[0]['driver_name']} {$this->routs[0]['driver_surname']} проработал "
           . "{$this->routs[0]['dat']} часов";
        }
    ?>
</div>
