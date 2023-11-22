<?php
session_start();
include_once("database.php");

if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit(); 
}

$sql = "SELECT * FROM usuarios ORDER BY id DESC";

$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Deshboard Clientes</title>
</head>
<body>
    <h1><a href="login.php">Sair</a></h1> 
    <h1> <a href="form_clientes.php">adicionar</a></h1>
    <div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Nome dono</th>
                    <th scope="col">Nome pet</th>
                    <th scope="col">especie</th>
                    <th scope="col">Raça do pet</th>
                    <th scope="col">Idade</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                   while ($user_data = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>".$user_data['id']."</td>";
                        echo "<td>".$user_data['nome']."</td>"; 
                        echo "<td>".$user_data['nome_pet']."</td>"; 
                        echo "<td>".$user_data['especie']."</td>";
                        echo "<td>".$user_data['raca']."</td>"; 
                        echo "<td>".$user_data['idade']."</td>";  
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>    
</body>
</html>
