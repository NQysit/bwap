<!DOCTYPE html>
<html>
    <head>
        <title>SQL_3</title>
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
                    $nome = $_REQUEST['nome'];
                    $pass = md5($_REQUEST['pass']);
                    $patron = '#(and)|(or)#i';
                    if (preg_match($patron, $nome)){
                        echo 'Posible inxeccion, non se aceptan "and" ou "or"';
                    } else {
                        $consulta = "select nome, pass from sqli0 where nome='$nome'";
		                $con = mysql_query($consulta);
		                $num_resultados = mysql_num_rows($con);
		                $row = mysql_fetch_array($con);
		                
		                if ($num_resultados == 1){
		                    if ($pass == $row['pass']){
			                    echo 'Logeado con exito.'.'<br>';
			                    echo 'Benvido: '.$row['nome'].'<br>';
			                    while ($row = mysql_fetch_array($con)){
                                    echo 'Benvido: '.$row['nome'].'<br>';
                                }
                            }
		                } elseif ($num_resultados > 1){
		                    echo 'Varios resultados, inxeccion detectada';
		                } else {
		                    echo 'Erro ao logear';
		                }
                        mysql_close($conexion);
                    }
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
                Agora temos unha posíbel solución pero segue sen ser segura, neste caso só hai unha conidicón e comparamos a contrasinal obtida coa almacenada.
                  <div class="panel-body">
                    <pre class="line-numbers">
                        <code class="language-php">
                            $consulta = "select nome, pass from sqli0 where nome='$nome'";
		                        $con = mysql_query($consulta);
		                        $num_resultados = mysql_num_rows($con);
		                        $row = mysql_fetch_array($con);
		                        
		                        if ($num_resultados == 1){
		                            if ($pass == $row['pass']){
			                            echo 'Logeado con exito.'.'<br>';
			                            echo 'Benvido: '.$row['nome'].'<br>';
			                            while ($row = mysql_fetch_array($con)){
                                            echo 'Benvido: '.$row['nome'].'<br>';
                                        }
                                    }
		                        }
                        </code>
                    </pre>
                  </div>
                </div>
                </div>
                <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#Solucion">
                      Solución
                    </a>
                  </h4>
                </div>
                <div id="Solucion" class="panel-collapse collapse">
                <pre class="line-numbers">
                Neste caso o bypass é máis complexo pois precisaremos obter por intuición a consulta ou ben saber o código, é dicer, que sería sinxelo de detectar en aplicacións de código aberto.
                O que facemos é concatenar outra consulta que mediante select creará unha saída temporal na base de datos coa estrutura que lle pasemos. Neste caso pasaremos un nome calquera e unha contrasinal mediante unha función md5 que é como, grazas ao código, saberemos que almacena as contrasinais. Con por esa mesma contrasinal en limpo no outro campo poderemos logearnos. En caso de ter máis campos como o nivel de privilexios sería cuestión de dar co desexado.
                  <div class="panel-body">
                    <code class="language-php">
                            ' union select 'nomequesequeira', md5('contrasinalquesequeira'); -- 
                            Logo por contrasinalquesequeira no sitio do contrasinal </code></pre>
                  </div>
                </div>
                </div>
            </div>
            <center><a class="btn btn-lg btn-primary" href="sqliok.php" role="button">Ver posíbel solución de SQLi &raquo;</a></center>
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
