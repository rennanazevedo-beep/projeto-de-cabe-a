<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     <h3> formulario de cadastro</h3>
     <form action="insere.php" method="post">
        <label for="nome">Nome: </label>
        <input type="text" name="nome"/>
        <br />
        <label for="user">user: </label>
        <input type="text" name="user" />
        <br />
        <label for="email">Email </label>
        <input type="text" name="email" />
        <br />
        <input type="submit" value="cadastrar" />
     </form>
</body>
</html>