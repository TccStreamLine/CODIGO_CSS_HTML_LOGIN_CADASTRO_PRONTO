<?php
session_start();
include_once('config.php');

if (isset($_POST['submit'])) {
    $acesso = trim($_POST['acesso']); // Nome da empresa
    echo "<script>console.log('" . $acesso . "')</script>";
    $cnpj = $_POST['cnpj'];
    echo "<script>console.log('" . $cnpj . "')</script>";
    $senha = $_POST['senha'];
    echo "<script>console.log('" . $senha . "')</script>";

    try {
        $stmt = $pdo -> prepare('SELECT * FROM usuarios where nome_empresa = :empresa');
        $stmt -> bindValue(':empresa', $acesso);
        $stmt -> execute();
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        echo "<script>console.log('" . var_dump($usuario) . "')</script>";


        header('Location: sistema.php');
        if ($usuario) {
            if (strcasecmp($usuario['nome_empresa'], $acesso) !== 0) {
                $_SESSION['erro_login'] = 'Nome da empresa não confere.';
                header('Location: login.php');
                exit;
            }

            if (password_verify($senha, $usuario['senha'])) {
                $_SESSION['id'] = $usuario['id'];
                $_SESSION['nome_empresa'] = $usuario['nome_empresa'];
                $_SESSION['cnpj'] = $usuario['cnpj'];
                echo 'password confere';
                exit;
            } else {
                $_SESSION['erro_login'] = 'Senha incorreta.';
                header('Location: login.php');
                exit;
            }
            
        } else {
            echo "<script>console.log('" . $usuario . "')</script>";
            $_SESSION['erro_login'] = 'CNPJ não encontrado.';
            header('Location: login.php');
            exit;
        }

    } catch (PDOException $e) {
        $_SESSION['erro_login'] = 'Erro ao tentar fazer login.';
        echo "<script>console.log('" . $_SESSION['erro_login'] . "')</script>";
        header('Location: login.php');
        exit;
    }

} else {
    header('Location: login.php');
    exit;
}
