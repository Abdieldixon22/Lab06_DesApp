<?php
        $mensaje = "Estimado(a) *" . $nombres . " " . $apellidos . "* lamentamos informarle " .
        "de la penosa decisión de removerlo de nuestra lista de empleados " .
        "en el aplicativo *Employee App*";
$urlFile = "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRfBcxb0uOEUtlYjYOxWOvFsq8ahkF16cw1xUe6POnNqsvZaXnW8MbTt3wZHcBwmPcQaYk";
$fileName = "fired.png";
$tipoEnvio = 'sendFileByUrl';
$data1 = [
 "caption" => $mensaje,
 "urlFile" => $urlFile,
 "fileName" => $fileName
];
?>