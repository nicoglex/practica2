<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    	require('conexion.php');
 

        $nombre = $correo = $fechaNacimiento = "";
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre = test_input($_POST["nombre"]);
            $correo = test_input($_POST["correo"]);
            $fechaNacimiento = test_input($_POST["fechaNacimiento"]);


            echo "<h2>Informacion</h2>";
            echo "Nombre: ". $nombre . "<br>";
            echo "Correo: ". $correo . "<br>";
            echo "Fecha de Nacimiento: ". $fechaNacimiento . "<br>";
        }
        
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
 
            //--- Aplicable a Sentencias INSERT, UPDATE, DELETE ---//
            
            $sql = "INSERT INTO usuario (nombre, correo, fechaNacimiento)
            VALUES ($nombre, $correo, $fechaNacimiento)";
            
            // Utilizar exec() dado que no se regresan resultados
            $conn->exec($sql);
            
            //------------------------------------//
            //--- Aplicable a Sentencia SELECT ---//
            
            $sql = "SELECT * FROM usuario";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            
            // Configura los resultados como un arreglo asociativo
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            
            // $stmt->fetchAll() Obtiene el arreglo asociativo
            foreach ($stmt->fetchAll() as $row) {
                //...Implementar
            }
    ?>
</body>
</html>