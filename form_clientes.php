<?php
if (isset($_POST["submit"])) {
    include_once("database.php");

    $nome = $_POST['nome'];
    $nome_pet = $_POST['nomepet'];
    $especie = $_POST['especie'];
    $raca = $_POST['raca'];
    $idade = $_POST['idade'];

    $sql = "INSERT INTO usuarios (nome, nome_pet, especie, raca, idade) VALUES (?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);

    
    if ($stmt) {
        $stmt->bind_param("sssss", $nome, $nome_pet, $especie, $raca, $idade);

       
        if ($stmt->execute()) {
            echo "<p></p>";
        } else {
            echo " " . $stmt->error . "</p>";
        }

       
        $stmt->close();
    } else {
        echo "" . $conn->error . "</p>";
    }

   
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário Pet Shop</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <form action="form_clientes.php" method="post">
        <div class="container">
            <h1>Formulário Pet Shop</h1>
            <div class="form-group">
                <input type="text" class="form-control" name="nome" placeholder="Seu nome:">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="nomepet" placeholder="Nome do pet:">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="especie" placeholder="Espécie do pet:">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="raca" placeholder="Raça do pet:">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="idade" placeholder="Idade do pet:">
            </div>
            <div class="form-btn">
                <input type="submit" class="btn btn-primary" value="Registrar" name="submit">
                <h1><a href="index.php" class="btn btn-primary" value="menu" name="submit">voltar</a></h1>
            
            </div>
        </div>
    </form>
</body>

</html>
