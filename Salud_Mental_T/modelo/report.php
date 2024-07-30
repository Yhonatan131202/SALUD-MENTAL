<?php
require_once './dompdf/autoload.inc.php';

use Dompdf\Dompdf;
use Dompdf\Options;

// Crear una instancia del objeto DOMPDF
$options = new Options();
$options->set('isRemoteEnabled', true);
$dompdf = new Dompdf($options);

// HTML que deseas convertir a PDF
// $html = file_get_contents('./template/pdf.php');
require './template/pdf.php';


// Cargar el HTML en el objeto DOMPDF
$dompdf->loadHtml(ob_get_clean());

// (Opcional) Establecer el tamaño de papel y la orientación
$dompdf->setPaper('A4', 'portrait');

// Renderizar el HTML como PDF
$dompdf->render();

// Salida del PDF generado al navegador
$dompdf->stream("ejemplo_con_grafico_pastel.pdf", array("Attachment" => 0));