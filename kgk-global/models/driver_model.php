<?php

class Driver_Model extends Model{

    function __construct() {
        parent::__construct();
    }

    public function selDrivers(){
         $sth = $this->db->prepare("SELECT  * FROM drivers ");
        $sth->execute();
        $data = $sth->fetchAll();
        return $data;
    }

  
    
    public function run(){
        if(isset($_POST['driver'])){
  
            $sth = $this->db->prepare( "SELECT 
                                            cars.car_name, drivers.driver_name, 
                                            drivers.driver_surname,
		floor(sum(UNIX_TIMESTAMP( date_end ) - UNIX_TIMESTAMP( date_start ))/3600) as dat
 
                                        FROM 
                                            routes 
                                                left join cars on cars.id=routes.car_id 
                                                left join drivers on drivers.id = routes.driver_id 

                                        WHERE 
                                        routes.driver_id = :driver
                                        GROUP BY driver_id
                     ");
            
            //print_r($_POST); die;
            $sth->execute(array(
                ':driver' => $_POST['driver']   
            ));

            $data = $sth->fetchAll();
            return $data;
        }
    
    }
}

