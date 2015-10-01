<!DOCTYPE html>
<html>
    <head>
        <title>SQL_2</title>
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
                        $consulta = "select nome, pass from sqli0 where nome='$nome' and pass='$pass'";
		                $con = mysql_query($consulta);
		                $num_resultados = mysql_num_rows($con);
		                $row = mysql_fetch_array($con);
		                
		                if ($num_resultados == 1){
			                echo 'Logeado con exito.'.'<br>';
			                echo 'Benvido: '.$row['nome'].'<br>';
			                while ($row = mysql_fetch_array($con)){
                                echo 'Benvido: '.$row['nome'].'<br>';
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
                  <div class="panel-body">
                  Amplíase o filtro, similar ao anterior mais neste caso o erro é por obter máis dun resultado, que é o que pasa cando se aplica que 1='1', que saen N resultados.
                    <pre class="line-numbers">
                        <code class="language-php">
                            $patron = '#(and)|(or)#i';
                            if (preg_match($patron, $nome)){
                                echo 'Posible inxeccion, non se aceptan "and" ou "or"';
                            } else {
                                $consulta = "select nome, pass from sqli0 where nome='$nome' and pass='$pass'";
	                            $con = mysql_query($consulta);
	                            $num_resultados = mysql_num_rows($con);
	                            $row = mysql_fetch_array($con);
	                            
	                            if ($num_resultados == 1){
		                            echo 'Logeado con exito.'.'<br>';
		                            echo 'Benvido: '.$row['nome'].'<br>';
		                            while ($row = mysql_fetch_array($con)){
                                        echo 'Benvido: '.$row['nome'].'<br>';
                                    }
	                            } elseif ($num_resultados > 1){
	                                echo 'Varios resultados, inxeccion detectada';
	                            } else {
	                                echo 'Erro ao logear';
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
                Para saltarnos este novo filtro bastará con limitar os resultados a 1.
                  <div class="panel-body">
                    <code class="language-php">
                            ' || 1='1' limit 0,1; -- </code></pre>
                  </div>
                </div>
                </div>
            </div>
            <center><a class="btn btn-lg btn-primary" href="sqli3.php" role="button">Seguinte reto SQLi &raquo;</a></center>
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
