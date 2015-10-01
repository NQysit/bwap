<!DOCTYPE html>
<html>
    <head>
        <title>XSS_1</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="stylesheet" href="../static/estilo.css" />
        <link rel="stylesheet" href="../static/bootstrap.css" />
        <link rel="stylesheet" href="../static/bootstrap-theme.css" />
        <link rel="stylesheet" href="../static/prism.css" />
    </head>
    <body>
        <form class="form-signin" id="retosForm" action="" method="GET" role="form">
            <h3>The search engine that doesn't track you.</h3>
            <input class="form-control" type="text" name="id" placeholder="Search...">
            <button class="btn btn-lg btn-primary btn-block" type="submit" name="search">Search</button>
            <?php
                if(isset($_GET['search'])){
                    $patron = '#^<script>[A-Za-z-0-9\(\)\'\"\.\_]+</script>$#i';
                    if (preg_match($patron, $_GET['id'])){
                        echo 'XSS detectado';
                    } else {
                        echo $_GET['id'];
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
                  Este código xa ten un pequeno filtro, faino buscan exactamente por algo que comece con $lt;script> e remate con &lt;/script>
                    <pre class="line-numbers">
                        <code class="language-php">
                            $patron = '#^<script>[A-Za-z-0-9\(\)\'\"\.\_]+</script>$#i';
                            if (preg_match($patron, $_GET['id'])){
                                echo 'XSS detectado';
                            } else {
                                echo $_GET['id'];
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
                O ataque é bastante sinxelo, bastaría con facer que xa non se cumpla de xeito estricto con ese patrón, é dicer, bastaría con engadir calqueira cousa por diante ou detrás da estrutura de script.
                    <pre class="line-numbers">
                    <code class="language-javascript">
                            [Calqueira cousa]&lt;script>alert('ola')&lt;/script>[Calqueira cousa]</code></pre>
                  </div>
                </div>
                </div>
            </div>
            <center><a class="btn btn-lg btn-primary" href="xss2.php" role="button">Seguinte reto XSS &raquo;</a></center>
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
