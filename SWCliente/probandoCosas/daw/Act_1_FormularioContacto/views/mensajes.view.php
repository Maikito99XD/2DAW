<h1>Messages</h1>
<table border = 1>
<thead>
            <tr>
                <?php foreach ($arrayMensaje[0] as $key => $dato) : ?>
                    <th><?=$key?></th>
                <?php endforeach; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($arrayMensaje as $fila) : ?>
                <tr>
                    <?php foreach ($fila as $dato) : ?>
                        <td><?=$dato?></td>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>