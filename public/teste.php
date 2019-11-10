<?php

require '../vendor/autoload.php';

use Dompdf\Dompdf;

$html = "
   <table border='1' width='100%'>
       <tr>
           <th>Nome</th>
           <th>Descrição</th>
       </tr>
       <tr>
            <td>Chiquim</td>
            <td>bla bla bla bla</td>
       </tr>
       <tr>
            <td>Chiquim</td>
            <td>bla bla bla bla</td>
       </tr>
       <tr>
            <td>Chiquim</td>
            <td>bla bla bla bla</td>
       </tr>
   </table>
   <br><br>
   
   <a href='http://google.com'>Clique aqui</a>
";

$dompdf = new Dompdf();
$dompdf->loadHtmlFile($html);


$dompdf->render();

$filename = date('dmY-His');

$dompdf->stream("$filename.pdf", [
    'Attachment' => 0,
]);