<html>
<head>
    <meta charset="utf-8">
    <title>Consultas</title>
    <meta name="description" content="PHP">
    <meta name="author" content="Mike">

    <style>
        label, input{display: block;}
    </style>

</head>
<body>
    <table border="1">
        <thead>
            <tr>
                <?php foreach($filas[0] as $key => $dato) : ?>               
                    <th><?=$key?></th>
                <?php endforeach; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach($filas as $fila) : ?>
                <tr>
                    <?php foreach($fila as $dato) : ?>
                        <td><?= $dato?></td>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>

    </table>
</body>
</html>