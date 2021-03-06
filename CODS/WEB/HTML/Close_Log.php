<?php
    require_once 'PHP/Login_Cadastro.php';
    $u = new Usuario; 

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="CSS\Close_Log.css">
	<link rel="icon" type="imagem/png" href=".png"/>
</head>
<body>
    <div>
        <img>
    </div>
	<!--primeira div de corpo, div de acesso pessoal-->
	<div class="row justify-content-around">
        <div class="col-4" id="log">
		<form method="post" name="AP">
		<center><legend> Login </legend><br>
			<label for="l1">Usuário:</label><br>
			<input type="text" id="l1" name="usuário" placeholder="Digite o nome de usuário"><br><br>
			<label for="l2">Senha:</label><br>
			<input type="password" id="l2" name="senha" placeholder="Digite sua senha"><br><br><!-- lembra da vizualização da senha-->
			<input type="submit" value="Entrar" class="botao" onclick="MostrarNome()">
		</form><br>
        <?php
        if(isset($_POST['usuário']))
        {

            $nomeusuario = addslashes ($_POST['usuário']);
            $senha = addslashes ($_POST['senha']);
            $email = addslashes ($_POST['usuário']);
            if(!empty($nomeusuario) && !empty($senha))
            {
                $u->conexao("login", "localhost","root","");
                if($u->msgErro == ""){
                if($u->logar($nomeusuario, $senha, $email))
                {
                    
                    header("location: Close_Estudio.php");
                }else
                {
                    echo "Email e/ou senha incorretos!";
                }
                }else
                {
                    echo "Erro: ".$u->msgErro;
                }
            }
            else
            {
                echo"Preencha todos os campos!";
            }
        }
        ?>

        <a href>Esqueci minha senha</a></center>
        <br><br>
	</div>
	<!-- segunda div do corpo, formulário de cadastro-->
	<div class="col-4" id="cad">
		<form method="post" name="Cad">
            <legend> Novo por aqui? </legend><br>
            <h3>Faça seu cadastro agora, é rápido  fácil!</h3><br>
            <label id="leflab">Nome</label>  <label id="rigid">Sobrenome</label><br>
			<input type="text"  name="nome" placeholder="Digite o seu nome" maxlength="50">
            <input type="text" name="sbnome" placeholder="Digite seu sobrenome" maxlength="50"><br><br>
            <label id="leflab">Nome de Usuário</label>  <label id="rigid">Data de nascimento</label><br>
			<input type="text" name="nusuario" placeholder="Digite seu nome de usuário" maxlength="50">
            <input type="date" name="data" placeholder="DD/MM/AAAA"><br><br>
            <label id="leflab">Email</label><br>
            <input type="email" name="Email" placeholder="Digite seu email" class="em" style="width: 85%;" maxlength="100"><br><br>
            <label id="leflab">Senha</label>  <label id="rigid">Confirmação de senha</label><br>
            <input type="password" name="csenha" placeholder="Digite sua senha" maxlength="15">
			<input type="password" name="ccsenha" placeholder="Confirme sua senha" maxlength="15"> <br><br>
            <input type="submit" name="cadastro" value="Cadastrar" class="botao" onclick="Mensagem()">
            <!--Verifica se a pessoa clicou no botao-->
            <?php
                if(isset($_POST['nome']))
                {
                $nome = addslashes($_POST['nome']);
                $sobrenome = addslashes($_POST['sbnome']); 
                $nomeusuario = addslashes($_POST['nusuario']);
                $nascimento = addslashes($_POST['data']); 
                $email = addslashes($_POST['Email']);
                $senha = addslashes($_POST['csenha']);
                $confirmarSenha = addslashes($_POST['ccsenha']);

                //<!--VERIFICA SE NAO DEIXOU NADA VAZIO-->
                if(!empty($nome) && !empty($sobrenome) && !empty($nomeusuario) 
                && !empty($nascimento) && !empty($email) && !empty($senha) 
                && !empty($confirmarSenha))
                {
                    $u->conexao("login", "localhost","root","");
                    if($u->msgErro == "")
                    {
                        if($senha == $confirmarSenha)
                        {
                            if($u->verifica($email)){
                        if($u->cadastrar($nome, $sobrenome, $nomeusuario, $nascimento,
                        $email, $senha, $confirmarSenha))
                        {
                            echo "Cadastrado!";
                        }
                        else
                        {
                            echo "Usuario já cadastrado!";
                        }
                    }else{
                        echo "Esse e-mail já está sendo usado por outro usuário";
                    }
                        }      
                        else{
                            echo "As senhas diferem!";
                        } 
                    }
                    else
                    {
                        echo "Erro: ".$u->msgErro;    
                    }
                }
                else
                {
                    echo "Preencha todos os campos";
                }
                
                }
            ?>      
			
	</form>
    </div></div>
    <footer>
        <nav class="navbar navbar-default" role="navigation" id="rodp">
        <center>
          <ul>
            <li>
                <a href="">SOBRE</a>
            </li>
            <li>
                <a href="">AJUDA</a>
            </li>
            <li>
                <a href="">NÓS</a>
            </li>
            <li>
                <a href="">CONTATO</a>
            </li>
        </ul>
      </center>
    </nav>
    </footer>
</body>
</html>
