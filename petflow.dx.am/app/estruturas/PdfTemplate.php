<?php

namespace app\estruturas;

class PdfTemplate {

    public static function gerarPdf(
            $dia, $totalUsuarioMes, $totalUsuarioDia, $totalUsuariosSemana,
            $totalBanimentosMes, $totalBanimentosDia, $totalBanimentosSemana,
            $totalAnimaisMes, $totalAnimaisDia, $totalAnimaisSemana,
            $totalPostMes, $totalPostDia, $totalPostSemana
        ) {
        $pdf = 
        "<html>
        <head>
            <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
            <meta content='width=device-width, initial-scale=1.0' name='viewport'>
            <meta http-equiv='content-type' content='text-html; charset=utf-8'>
        </head>
        
        <body>       
            <section>
                <div class='details'>
                    <div class='client left'>
                        <figure>
                            <img class='logo' src='../../../assets/img/logo2.png'>
                        </figure>   
                    </div>
                    <div class='data right'>
                        <div class='title'>Relatório Administrador</div>
                        <div class='date'>
                            Dia: $dia<br>
                        </div>
                    </div>
                </div>

                <div class='container'>
                    <div class='table-wrapper'>

                        <table>
                            <tbody class='head'>
                                <tr>
                                    <th class='no'></th>
                                    <th class='desc'><div>Descrição</div></th>
                                    <th class='qty'><div>Total dia</div></th>
                                    <th class='unit'><div>Total semana</div></th>
                                    <th class='total'><div>Total mês</div></th>
                                </tr>
                            </tbody>

                            <tbody class='body'>
                                <tr>
                                    <td class='no'>01</td>
                                    <td class='desc'>Total de usuários</td>
                                    <td class='qty'>$totalUsuarioDia</td>
                                    <td class='unit'>$totalUsuariosSemana</td>
                                    <td class='total'>$totalUsuarioMes</td>
                                </tr>
                                <tr>
                                    <td class='no'>02</td>
                                    <td class='desc'>Usuários banidos</td>
                                    <td class='qty'>$totalBanimentosDia</td>
                                    <td class='unit'>$totalBanimentosSemana</td>
                                    <td class='total'>$totalBanimentosMes</td>
                                </tr>
                                <tr>
                                    <td class='no'>03</td>
                                    <td class='desc'>Total animais</td>
                                    <td class='qty'>$totalAnimaisDia</td>
                                    <td class='unit'>$totalAnimaisSemana</td>
                                    <td class='total'>$totalAnimaisMes</td>
                                </tr>
                                <tr>
                                    <td class='no'>04</td>
                                    <td class='desc'>Total posts</td>
                                    <td class='qty'>$totalPostDia</td>
                                    <td class='unit'>$totalPostSemana</td>
                                    <td class='total'>$totalPostMes</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class='no-break'>
                    </div>
                </div>
            </section>
        
            <footer>
                <div class='container' style='margin-top: 50px'>
                    <div class='end'>Obrigado :)</div>
                </div>
            </footer>
        
        </body>
        
        </html>";

        return $pdf;
    }
}