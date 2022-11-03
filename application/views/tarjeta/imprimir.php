<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<h1>Recorte su Tarjeta</h1>
<p>Codigo Tarjeta: <?php echo $codigo ?></p>
<p>Encargado: Juan</p>
<p>Monto: <?php echo $saldoMonetario ?> Bs</p>
<div id='qrcode' width="100" height="150" style="border: 5px solid darkblue ;width:150px ;height: 150px;"></div>
<button id="btnSave" onclick="imprimir('<?php echo $codigo ?>')">imprimir</button>

<script src="<?php echo base_url(); ?>scripts/qrcode.js"></script>
<script type="text/javascript">
    function generar_qr() {
        var qrcode = new QRCode(document.getElementById("qrcode"), {
            text: "<?php echo $codigo ?>",
            width: 150,
            height: 150,
            colorDark: "#000000",
            colorLight: "#ffffff",
            correctLevel: QRCode.CorrectLevel.H
        });
    }
    generar_qr();

    function imprimir(id) {
        document.getElementById('btnSave').style.display = 'none';
        window.print();
        console.log("Imprimir", id)
        window.location.href = "<?php echo base_url() . 'index.php/tarjeta' ?>";
    }
</script>