<?php
   class Connection extends Mysqli{
    function __construct(){
        parent::__construct('localhost', 'root', 'mysql','mi_bd_canquilla');
        $this->set_charset('utf8');
        $this->connect_error == NULL ? 'Conexion exitosa':die('error al conectarese');

    }

   }