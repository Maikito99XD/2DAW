    <h1>Cubilete Poker</h1>
    <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
        <label for="nDados">Número de dados</label>
        <input type="number" name="nDados" value="<?=$_SESSION['numDados']?>">
        <p><input type="submit" name="Tirar" value="Tira los dados"></p>
    </form>