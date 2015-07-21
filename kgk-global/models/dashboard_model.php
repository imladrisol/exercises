<?php

class Dashboard_Model extends Model{

    function __construct() {
        parent::__construct();
    }

    public function selDrivers(){
        $sth = $this->db->prepare("SELECT  * FROM   drivers ");
        $sth->execute();
        $data = $sth->fetchAll();
        return $data;
    }

    public function routesInfo(){

      
        $sth = $this->db->prepare(""
                . "SELECT cars.car_name, drivers.driver_name, routes.date_start, routes.date_end FROM "
                . "routes "
                    . "left join cars on cars.id=routes.car_id "
                    . "left join drivers on drivers.id = routes.driver_id");
        $sth->execute();
        
        $data = $sth->fetchAll();
        
        $count =  $sth->rowCount();
        
        if($count>0){
            return $data;
        } else{
            //show error
            header('location: '.URL.'error');
        }
        
    }
    
    public function run(){
        if(isset($_POST['datepicker'])){
           
           // $_POST['datepicker'] = '2015-02-14';
            $sth = $this->db->prepare( "SELECT 
                                            cars.car_name, drivers.driver_name,drivers.driver_surname, 
                                            routes.date_start, routes.date_end 
                                        FROM 
                                            routes 
                                                left join cars on cars.id=routes.car_id 
                                                left join drivers on drivers.id = routes.driver_id 

                                        WHERE 
                                        routes.driver_id = :driver 

                                        AND  (   
                                            ((date_start between :date1 and :date2) and (date_end between :date1 and :date2)    )
                                            or
                                            (date_start < :date1  and date_end between :date2 and :date2)
                                            or
                                            (date_start between :date1 and :date2 and date_end > :date1)
                                            or
                                            (date_start < :date1 and date_end > :date2)
                                        )
                     ");
            //print_r($_POST); die;
            $sth->execute(array(
                ':driver' => $_POST['driver'],
                ':date1' => $_POST['datepicker'].' 00:00:00',
                ':date2' => $_POST['datepicker'].' 23:59:59'
            ));

            $data = $sth->fetchAll();

            return $data;
        }
    
    }
}

