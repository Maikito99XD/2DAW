<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<title>Cubilete Poker</title>
<style>
    th{
        border = "1";
    }
</style>
<meta name="description" content="PHP">
<meta name="author" content="Mike">
</head>
<body>
    <h1>Cubilete Poker</h1>
    <form action="index.php" method="POST">
        <label>Numero de dados</label>
        <input type="number" name="number" /><br><br>
        <input type="submit" name="accion" value="Tira los dados"/><br><br>
    </form>
    <?php
        include("utils/ElementoQueSeTira.php");
        include("utils/DadoPoker.php");
        include("utils/Cubilete.php");
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            if(isset($_POST['accion'])){
                session_start();
                if($_POST['number'] >= 1){
                    if (!isset($_SESSION['cantidadTiradas'])){
                        $_SESSION['cantidadTiradas'] = '0';
                    }
                    echo "<h2>Numero total de tiradas: ".$_SESSION['cantidadTiradas']."</h2>";
                    $_SESSION['cantidadTiradas'] = ($_SESSION['cantidadTiradas'] + 1);
                    $cubi1 = new Cubilete();
                    $cubi1->creaDados($_POST['number']);
                    $cubi1->tira();
                    $_SESSION['LadosDados'] = $cubi1->getLadosDeLosDados();
                    echo "<table border='1' >";
                    echo "<tr>";
                    for($i = 0;$i<(count($_SESSION['LadosDados'])+1);$i++){
                        if($i == 0){
                            echo "<th>Num Tirada </th>";
                        }else{
                            echo "<th>Cara Dado ".$i."</th>"; 
                        }
                    }
                    echo "</tr>";
                    echo "<tr>";
                    $numeroTirada = 1;
                    
                    for($k = 0;$k<(count($_SESSION['LadosDados'])+1);$k++){
                        if($k == 0){
                            echo "<td>n_".$numeroTirada."</td>";
                            $numeroTirada++;
                        }else{
                            echo "<td>".$_SESSION['LadosDados'][$k-1]."</td>";
                        }
                    }
                    echo "</tr>";
                    echo "</table>";
                }else{
                    echo "Tienes que tener al menos un número en el dado! Desde el 1 hasta donde quieras.";
                }   
            }
        }
        if($_SERVER['REQUEST_METHOD'] === 'GET'){
            if(!isset($_GET)){
                session_destroy();
            }
        }
        
    ?>
</body>
</html>