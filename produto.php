<?php 
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    $produto_id = $_GET["id"];

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
        
        $sql = "SELECT * FROM produto where id = " . $produto_id;
        
        $result = $conn->query($sql);
        $produto = $row = $result->fetch_assoc();

        $conn->close();
    
        $retorno = array(
            "status" => true,
            "error_message" => "",
            "data" => $produto
        );
    } catch (Exception $e) {
        $retorno = array(
            "status" => false,
            "error_message" => $e->getMessage(),
            "data" => []
        );
    }
    
    echo json_encode($retorno);