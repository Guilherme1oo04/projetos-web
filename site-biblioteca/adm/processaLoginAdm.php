<?php
    session_start();

    $nomeAdm = $_POST['nomeadm'];
    $senhaAdm = $_POST['senhaadm'];

    if (!isset($nomeAdm) || !isset($senhaAdm)){
        $_SESSION['loginErro'] = 'Login inválido!';
        header("location: index.php");
    }
    else{
        if ($nomeAdm == 'adm' && $senhaAdm == 'senha1234adm'){
            $_SESSION['nomeadm'] = $nomeAdm;
            $_SESSION['senhaadm'] = $senhaAdm;
            header("location: adm.php");
        }
        else{
            $_SESSION['loginErro'] = 'Login inválido!';
            header("location: index.php");
        }
    }
?>
