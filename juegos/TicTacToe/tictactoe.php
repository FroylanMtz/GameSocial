<?php

include '../../session.php';

$idUsuario = $_SESSION['usuario_id'];
$idJuego = 4;

?>

<script>  
	var idUsuario = '<?php echo $idUsuario;?>'; 
	var idJuego = '<?php echo $idJuego;?>';
</script>

<div class="col-md-12 mt-2">
    <div class="card">
        <div class="card-header" style=" display:inline; ">
            <h1>TicTacToe</h1>          
        </div>

        <div class="card-body">
            <table id="GridGato">
                <tbody>
                    <tr>
                        <td><input id="b_0_0" type="button" value="" class="btnTictactoe" /></td>
                        <td><input id="b_0_1" type="button" value="" class="btnTictactoe" /></td>
                        <td><input id="b_0_2" type="button" value="" class="btnTictactoe" /></td>
                    </tr>
                    <tr>
                        <td><input id="b_1_0" type="button" value="" class="btnTictactoe" /></td>
                        <td><input id="b_1_1" type="button" value="" class="btnTictactoe" /></td>
                        <td><input id="b_1_2" type="button" value="" class="btnTictactoe" /></td>
                    </tr>
                    <tr>
                        <td><input id="b_2_0" type="button" value="" class="btnTictactoe" /></td>
                        <td><input id="b_2_1" type="button" value="" class="btnTictactoe" /></td>
                        <td><input id="b_2_2" type="button" value="" class="btnTictactoe" /></td>
                    </tr>
                </tbody>
            </table>
            
            <script src="../../js/jquery.js"></script>
            <script src="juegos/TicTacToe/js/tictactoe.js"></script>
    
        </div>

    </div>

    
</div>

        

