<?php

class clientsModel{
        var $result;
        var $conn;

public function __construct()
        {
            require_once('bd/ConnectClass.php');
            $Oconn = new connectClass();
            $Oconn -> openConnect();
            $this -> conn = $Oconn ->getConn();

        }
public function getClients() {
 
            $sql = 'SELECT * FROM clients';

            $this -> result = $this -> conn -> query($sql);

        }

public function insertClient($arrayClient) //inserir dados no array pro banco
        {
            $sql = "
                INSERT INTO clients
                    (name, phone, email, address)
                VALUES(
                    '{$arrayClient['name']}',
                    '{$arrayClient['phone']}',
                    '{$arrayClient['email']}',
                    '{$arrayClient['address']}'
                )
            ";

            $this -> conn -> query($sql);
        }
public function getClient($idClient)
        {
            $sql = "
            SELECT * FROM clients 
            WHERE idClient = {$idClient} 
           ";
          $this -> result = $this -> conn -> query($sql);
        }

public function updateClient($arrayClient)
{
          $sql="
               UPDATE clients 
                    set 
                        name='{$arrayClient['name']}',
                        email='{$arrayClient['email']}',
                        phone='{$arrayClient['phone']}',
                        address='{$arrayClient['address']}',
                    where 
                        idClient={$arrayClient ['idClient']}
                
                 ";
                 var_dump($sql);
          $this -> conn -> query($sql);
     
    }
   

public function deleteClient($idClient)
{
    $sql="
       DELETE FROM clients 
          where 
          idClient = {$idClient}
         
    ";
    $this -> conn -> query($sql);
}


public function getConsult()
    {
            return $this -> result;
            
    }
}
?>
