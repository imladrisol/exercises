<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <script type="text/javascript" src="<?php echo URL;?>public/js/verify.js"></script>
        <link rel="stylesheet" href="<?php echo URL;?>public/css/style.css" />
                
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="public/javascript/jquery.min.js"><\/script>')</script>
        <script type="text/javascript" src="<?php echo URL;?>public/js/zebra_datepicker.js"></script>
        <link rel="stylesheet" href="<?php echo URL;?>public/css/default.css" type="text/css">
        <script>
            $(document).ready(function() {

    $('input#datepicker').Zebra_DatePicker();

});</script>
   
    </head>
    <body>
        <div id="header">        
          
            <ul id="menu">
                <li><a href="<?php echo URL;?>index">HOME</a></li>
                <li><a href="<?php echo URL;?>dashboard">Просмотр маршрутов</a></li>      
                <li><a href="<?php echo URL;?>driver">Статистика по водителям</a></li>    
            </ul>
             <br class="spacer"/>
            
        </div>
       
        <div id="content">
        
