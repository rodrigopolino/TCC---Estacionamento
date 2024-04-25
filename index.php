<!DOCTYPE html>
<html>
    
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - ManagerPark</title>
    <link rel="stylesheet" type="text/css" href="css/main2.css">
    <link rel="shortcut icon" href="logo mp.png">
</head>

<body>
    <section class="hero is-success is-fullheight">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-4 is-offset-4">
                    
                    
                    <center>
                    <!--<div class="box">
                        <form action="login.php" method="POST">
                            <div class="field">
                                <div class="control">
                                    <input name="usuario" name="text" class="input is-large" autofocus="" placeholder="Nome de Usuario">
                                </div>
                            </div>
                            <br>
                            <div class="field">
                                <div class="control">
                                    <input name="senha" class="input is-large" type="password" placeholder="Sua Senha">
                                </div>
                            </div>
                            <br>
                            <input type="submit" name="Entrar" value="Entrar">
                        </form>
                    </div>
                    </center>
                </div>
                -->
                    
                <div class="herop">
                    <h3 class="title has-text-grey">ManagerPark</h3>
            <div class="form-box">
			<h2 align='center'> LOGIN </h2>
                <div class="button-box">
                    <div id="btn"></div>
                    <button type="button" class="toggle-btn" onclick="administrador()">Administrador</button>
                    <button type="button" class="toggle-btn" onclick="funcionario()">Funcionário</button>
                </div>
                <form id="administrador" class="input-group" method="post" action="verificar-login.php">
                    <input type="text" class="input-field" placeholder="Usuário" name="txAdm" required>
                    <input type="text" class="input-field" placeholder="Senha" name="txSenhaAdm" required>

                    <!--<input type="checkbox" class="chech-box"><span>Lembre minha senha</span>-->
                    <br>
                    <br>
					<button type="submit" class="submit-btn">Entrar</button>
                </form>
                <form id="funcionario" class="input-group" method="post" action="verificar-login-func.php">
                    <input type="text" class="input-field" placeholder="Usuário" name="txFunc" required>
                    <input type="text" class="input-field" placeholder="Senha" name="txSenhaFunc" required>
					<br>
                    <br>
                    <button type="submit" class="submit-btn">Entrar</button>
                </form>
            </div>
        </div>
        <script>
            var x = document.getElementById("administrador")
            var y = document.getElementById("funcionario")
            var z = document.getElementById("btn")

            function funcionario(){
                x.style.left = "-400px";
                y.style.left = "50px";
                z.style.left = "110px";
            }
            function administrador(){
                x.style.left = "50px";
                y.style.left = "450px";
                z.style.left = "0";
            }
        </script>

            </div>
        </div>
    </section>
</body>

</html>