<?php
    session_start(); 
    include_once("db.php");    

    if((isset($_POST['email'])) && (isset($_POST['senha']))){
        $email = mysqli_real_escape_string($conn, $_POST['email']); 
        $senha = mysqli_real_escape_string($conn, $_POST['senha']);
        
        $result_usuario = "SELECT * FROM usuario WHERE email = '$email' && senha = '$senha'";
        $resultado_usuario = mysqli_query($conn, $result_usuario);
        $resultado = mysqli_fetch_assoc($resultado_usuario);

        if(isset($resultado)){
            $_SESSION['usuarioId'] = $resultado['id'];
            $_SESSION['usuarioNome'] = $resultado['nome'];
            $_SESSION['usuarioNiveisAcessoId'] = $resultado['nivel'];
            $_SESSION['usuarioEmail'] = $resultado['email'];
            if($_SESSION['usuarioNiveisAcessoId'] == "1"){
                header("Location: homeAdm.php");
				$_SESSION['message_type'] = 'success';
				$_SESSION['message'] = 'LOGADO!';
            }elseif($_SESSION['usuarioNiveisAcessoId'] == "0"){
                header("Location: listagemProjetosUser.php");
				$_SESSION['message_type'] = 'success';
				$_SESSION['message'] = 'LOGADO!';
            }else{
                header("Location: login.php");
            }
        }else{    
            $_SESSION['loginErro'] = "Usuário ou senha Inválido";
			$_SESSION['message_type'] = 'danger';
            header("Location: login.php");		
        }
    }else{
        $_SESSION['loginErro'] = "Usuário ou senha inválido";
        $_SESSION['message_type'] = 'danger';
        header("Location: login.php");
    }
?>