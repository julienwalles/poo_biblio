<?php
    require 'request.php';
    require 'autoloader.php';

    autoloader::register();

    try {
        $db = new PDO('mysql:host=localhost;dbname=biblio','root','');
    }

    catch (Exception $e) {
        die('Error:' .$e->getMessage());
    }

    template_index();

    $rayon = new Rayon();
  
?>
    <div class="content read">
	<h2>Liste rayons</h2>

<a href="create_rayon.php" class="create-contact">Créer un rayon</a>
	<table>
        <thead>
            <tr>
                <td>#</td>
                <td>Nom</td>
                <td>Référence</td>
            </tr>
        </thead>
        <tbody>
<?php
        foreach ($rayon as $rows) {
?>
            <tr>
                <td><?php echo $rows->id(); ?></td>
                <td><?php echo $rows->nom(); ?></td>
                <td><?php echo $rows->reference(); ?></td>
                
                <td class="actions">
                    <a href="update.php?id=<?php echo $rows->id() ?> " class="edit"><i class="fas fa-pen fa-xs"></i></a>
                    <a href="delete.php?id=<?php echo $rows->id(); ?> " class="trash"><i class="fas fa-trash fa-xs"></i></a>
                </td>
            </tr>
<?php
        }
?>
        </tbody>
    </table>
</div>

<?php
    template_footer(); 

?>