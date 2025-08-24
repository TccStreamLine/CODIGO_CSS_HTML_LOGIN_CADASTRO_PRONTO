<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Senha</title>
    <link rel="stylesheet" href="stylelogin.css">
</head>
<body>
    <div class="main-container">
        <div class="left-panel">
            <h1>Recuperar Senha</h1>
            <p>Digite seu e-mail cadastrado para receber o link de redefinição.</p>
            
            <?php
                if (!empty($_SESSION['msg_recuperar'])) {
                    echo "<p class='error-message'>" . $_SESSION['msg_recuperar'] . "</p>";
                    unset($_SESSION['msg_recuperar']);
                }
            ?>

            <form action="enviar_link.php" method="POST">
                <div class="input-group">
                    <input type="email" name="email" placeholder="Seu e-mail" required>
                </div>
                <button type="submit" class="inputSubmit">Enviar Link</button>
            </form>

            <a href="login.php" class="forgot">Voltar para o login</a>
        </div>
    </div>
</body>
</html>
