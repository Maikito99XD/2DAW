    
    <?= require_once 'utils/classes/ImagenGaleria.php'?>
    
    <h2>Galeria de Imágenes</h2>
    
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Imagen</th>
                <th>Visualizaciones</th>
                <th>Likes</th>
                <th>Descargas</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($imagenes as $imagen) : ?>
                <tr>
                    <th><?=$imagen->getID()?></th>
                    <td>
                        <img src="<?= $imagen->getUrlGallery()?>"
                            alt="<?= $imagen->getDescripcion()?>"
                            title="<?= $imagen->getDescripcion()?>"
                            width="100px">
                    </td>
                    <td><?= $imagen->getNumVisualizaciones()?></td>
                    <td><?= $imagen->getNumLikes()?></td>
                    <td><?= $imagen->getNumDownload()?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
