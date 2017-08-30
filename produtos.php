<?php 
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    try {
        // throw new Exception('Erro ao acessar banco de dados.');
        $servername = "localhost";
        $username = "root";
        $password = "root";
        $dbname = "apifeirinha";
        
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        $sql = "SELECT * FROM produto";
        $result = $conn->query($sql);
        
        $produtos = array();
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $produtos[] = $row;
            }
        }
        $conn->close();
    
        $retorno = array(
            "status" => true,
            "error_message" => "",
            "data" => $produtos
        );
    } catch (Exception $e) {
        $retorno = array(
            "status" => false,
            "error_message" => $e->getMessage(),
            "data" => []
        );
    }
    
    echo json_encode($retorno);