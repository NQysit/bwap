<!DOCTYPE html>
<html>
    <head>
        <title>XPATH</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="stylesheet" href="../static/estilo.css" />
        <link rel="stylesheet" href="../static/bootstrap.css" />
        <link rel="stylesheet" href="../static/bootstrap-theme.css" />
        <link rel="stylesheet" href="../static/prism.css" />
    </head>
    <body>
        <form class="form-signin" id="retosForm" action="" method="GET" role="form">
            <input class="form-control" type="text" name="user" placeholder="User">
            <input class="form-control" type="password" name="pass" placeholder="Pass">
            <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Login</button>

<?php
$user = $_GET["user"];
$pass = $_GET["pass"];
$string = <<<XML
<users>
    <user>
        <username>admin</username>
        <password>abc123.</password>
    </user>
</users>
XML;
$xml = new SimpleXMLElement($string);
$resultado = $xml->xpath("//users/user[username/text()='" . $user . "' and password/text()='" . $pass . "']");
if($resultado){
    echo 'Correcto';
}else{
    echo 'Incorrecto';
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
                  Almacena a contrasinal nunha estrutura XML e unha consulta, a simple vista similar a de SQL.
                    <pre class="line-numbers">
                        <code class="language-php">
                            &lt;users>
                                &lt;user>
                                    &lt;username>admin&lt;/username>
                                    &lt;password>abc123.&lt;/password>
                                &lt;/user>
                            &lt;/users>
                            XML;
                            $xml = new SimpleXMLElement($string);
                            $resultado = $xml->xpath("//users/user[username/text()='" . $user . "' and password/text()='" . $pass . "']");
                            if($resultado){
                                echo 'Correcto';
                            }else{
                                echo 'Incorrecto';
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
                  <div class="panel-body">
                  Cando se introduce un usuario normal evaluaría se o resultado e correcto ou incorrecto, se intentamos facer unha inxección estándar devolverá un erro relacionado con xpath de cando busca coincidencias e non atopa o nodo, empregando a seguinte solución:
                  <pre class="line-numbers">
                    <code class="language-php">
                            user: ' or 1='1
                            pass: ' or 1='1
                            /*A consulta quedaría*/
                            $resultado = $xml->xpath("//users/user[username/text()='' or 1='1' and password/text()='' or 1='1']"));
                            </code></pre>
                  Unha posíbel solución sería empregar os mesmos métodos que para <a href="../sqli/sqliok.php">SQLi</a>, pois é moi similar.
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
