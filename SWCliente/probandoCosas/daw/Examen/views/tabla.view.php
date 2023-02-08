
        <h3>Número total de tiradas: <?=$numTiradas?></h3>

        <table border="1">
            <tr>
                <th>Num Tirada</th>
                <?php for ($n=1; $n<=$max_tirada; $n++) : ?>
                    <th>Cara Dado <?=$n?></th>
                <?php endfor?>
            </tr>

            <?php foreach($historicoTiradas as $key=>$tirada) : ?>
                <tr>
                    <td align="center">n_ <?=$key?></td>
                    <?php foreach($tirada as $dado) : ?>
                        <td align="center"><?=$dado?></td>
                    <?php endforeach?>
                </tr>
            <?php endforeach?>
        </table>