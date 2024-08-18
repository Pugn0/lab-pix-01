<?php
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

if ($username === 'pugno' && $password === 'senhaforte123') {
    $_SESSION['loggedin'] = true;
    header('Location: transfer.php');
} else {
    echo "Usuário ou senha incorretos. <a href='login.php'>Tente novamente.</a>";
}
?>
