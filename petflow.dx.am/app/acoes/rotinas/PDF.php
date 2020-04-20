<?php

require_once '../../../vendor/autoload.php';

if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}

\app\acoes\login\VerificaLoginEfetuado::verificaAdministrador();


$totalUsuariosMes = \app\crud\UsuarioDao::getUsuariosMes(); 
$totalUsuariosDia = \app\crud\UsuarioDao::getUsuariosDia();
$totalUsuariosSemana = \app\crud\UsuarioDao::getUsuariosSemana();

$totalBanimentoMes = \app\crud\BanimentoDao::getBanidosMes();
$totalBanimentoDia = \app\crud\BanimentoDao::getBanidosDia();
$totalBanimentoSemana = \app\crud\BanimentoDao::getBanidosSemana();

$totalAnimaisMes = \app\crud\AnimalDao::readMes();
$totalAnimaisDia = \app\crud\AnimalDao::readDia();
$totalAnimaisSemana = \app\crud\AnimalDao::readSemana();

$totalPostMes = \app\crud\PostDao::selectPostsMes();
$totalPostDia = \app\crud\PostDao::selectPostsDia();
$totalPostSemana = \app\crud\PostDao::selectPostsSemana();

$dia = new DateTime("now");
$dia = $dia->format("d/m/Y H:i:s");

$css = file_get_contents("../../../assets/css/pdfstyle.css");
$html = \app\estruturas\PdfTemplate::gerarPdf(
    $dia, $totalUsuariosMes, $totalUsuariosDia, $totalUsuariosSemana,
    $totalBanimentoMes, $totalBanimentoDia, $totalBanimentoSemana,
    $totalAnimaisMes, $totalAnimaisDia, $totalAnimaisSemana,
    $totalPostMes, $totalPostDia, $totalPostSemana
);
$mpdf= new \Mpdf\Mpdf();
$mpdf->SetDisplayMode('fullpage');
$mpdf->WriteHTML($css, 1);
$mpdf->WriteHTML($html);
$mpdf->Output();
    