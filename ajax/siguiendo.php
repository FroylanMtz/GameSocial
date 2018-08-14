<?php

include '../config.php';
include '../db.php';
include '../session.php';

$usuario = $_SESSION['usuario_actua'];

?>

<div class="row">


    <div class="col-md-12 mt-2">
        <div class="card">
            <div class="card-body" style="text-align: center;">

                <h4> Personas a las que sigue </h4>
                
                <?php

                    echo '<h1> usuario acutal: '. $usuario .' </h1>';
                
                ?>
            </div>
        </div>
    </div>

</div>