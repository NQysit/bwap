<!DOCTYPE html>
<html>
    <head>
        <title>SQL_OK</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="stylesheet" href="../static/estilo.css" />
        <link rel="stylesheet" href="../static/bootstrap.css" />
        <link rel="stylesheet" href="../static/bootstrap-theme.css" />
        <link rel="stylesheet" href="../static/prism.css" />
    </head>
    <body>
            <form class="form-signin" id="retosForm" action="" method="GET" role="form">
            <h3>Benvido ao Banco de Ferro!</h3>
            <input class="form-control" type="text" name="nome" placeholder="User">
            <input class="form-control" type="password" name="pass" placeholder="Pass">
            <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Login</button>
            
            <?php
                if (isset($_REQUEST['login'])){
                    include '../conexion.php';
                    connect();
                    $nome = mysql_real_escape_string($_REQUEST['nome']);
                    $pass = md5($_REQUEST['pass']);
                    $consulta = "select nome, pass from sqli0 where nome='$nome' and pass='$pass'";
		            $con = mysql_query($consulta);
		            $row = mysql_fetch_array($con);
		            
		            if ($row){
			            echo 'Logeado con exito.'.'<br>';
			            echo 'Benvido: '.$row['nome'].'<br>';
			            while ($row = mysql_fetch_array($con)){
                            echo 'Benvido: '.$row['nome'].'<br>';
                        }
		            } else{
		                echo 'erro ao logear';
		            }
                    mysql_close($conexion);
                }
            ?>
        </form>
        
        <div class="panel-group" id="accordion">
            <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#Codigo">
                      Código
                    </a>
                  </h4>
                </div>
                <div id="Codigo" class="panel-collapse collapse">
                  <div class="panel-body">
                  Unha boa solución sería en caso de variabeis numéricas, id por exemplo, empregar a funcion intval/floatval($variableNumerica) que evaluaría se o introducido é un número como tal ou ben, en caso de datos alfanuméricos, empregaremos a función mysql_real_escape_string($variableInsegura) que o que fai é 'escapar' todos os caracteres facendo que non teñan ningún significado especial.
                    <pre class="line-numbers">
                        <code class="language-php">
                            $nome = mysql_real_escape_string($_REQUEST['nome']);
                            $pass = md5($_REQUEST['pass']);
                            $consulta = "select nome, pass from sqli0 where nome='$nome' and pass='$pass'";
                        </code>
                    </pre>
                  A día de hoxe, polo xeral a función mysql_real_escape_string está quedando obsoleta e comézase a empregar para prácticamente todo as funcións mysqli, que xa evitan de por si a maioría das inxeccións.
                  </div>
                </div>
                </div>
            </div>
            <center><a class="btn btn-lg btn-primary" href="../index.html" role="button">Volver á web principal &raquo;</a></center>
        </div>
        
        <!-- Bootstrap core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="../static/jquery-1.10.2.min.js"></script>
		<script src="../static/bootstrap.js"></script>
		<script src="../static/docs.min.js"></script>
		<script src="../static/js.js"></script>
		<script src="../static/prism.js"></script>
        
    </body>
</html>
