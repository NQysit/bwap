<?php

$nome = $_POST['nome'];
$email = $_POST['email'];
$mensaxe = $_POST['mensaxe'];
$para = '';
$titulo = $_POST['titulo'];
$header = 'From: ' . $email;
$msxCorreo = "Nome: $nome\n E-Mail: $email\n Mensaxe:\n $mensaxe";
        
if (mail($para, $titulo, $msxCorreo, $header)) {
    echo "<script language='javascript'>
    alert('Mensaxe enviada con exito');
    window.location.href = 'index.html';
    </script>";
} else {
    echo "<script language='javascript'>
    alert('Non se puido enviar a mensaxe');
    window.location.href = 'index.html';
    </script>";
}
?>
