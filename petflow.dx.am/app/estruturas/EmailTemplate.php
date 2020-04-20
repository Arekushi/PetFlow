<?php

namespace app\estruturas;

class EmailTemplate {
    
    public static function EmailtemplateConfirmaEmail($link, $nome) {
        $msg = "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
        <html style='width:100%;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;padding:0;Margin:0;'>
         <head> 
          <meta charset='UTF-8'> 
          <meta content='width=device-width, initial-scale=1' name='viewport'> 
          <meta name='x-apple-disable-message-reformatting'> 
          <meta http-equiv='X-UA-Compatible' content='IE=edge'> 
          <meta content='telephone=no' name='format-detection'> 
          <title>New email template 2019-11-21</title> 
          <!--[if (mso 16)]>
            <style type='text/css'>
            a {text-decoration: none;}
            </style>
            <![endif]--> 
          <!--[if gte mso 9]><style>sup { font-size: 100% !important; }</style><![endif]--> 
          <!--[if !mso]><!-- --> 
          <link href='https://fonts.googleapis.com/css?family=Roboto:400,400i,700,700i' rel='stylesheet'> 
          <!--<![endif]--> 
          <style type='text/css'>
        @media only screen and (max-width:600px) {p, ul li, ol li, a { font-size:14px!important; line-height:150%!important } h1 { font-size:22px!important; text-align:center; line-height:120%!important } h2 { font-size:20px!important; text-align:center; line-height:120%!important } h3 { font-size:18px!important; text-align:center; line-height:120%!important } h1 a { font-size:22px!important } h2 a { font-size:20px!important } h3 a { font-size:18px!important } .es-menu td a { font-size:13px!important } .es-header-body p, .es-header-body ul li, .es-header-body ol li, .es-header-body a { font-size:13px!important } .es-footer-body p, .es-footer-body ul li, .es-footer-body ol li, .es-footer-body a { font-size:13px!important } .es-infoblock p, .es-infoblock ul li, .es-infoblock ol li, .es-infoblock a { font-size:11px!important } *[class='gmail-fix'] { display:none!important } .es-m-txt-c, .es-m-txt-c h1, .es-m-txt-c h2, .es-m-txt-c h3 { text-align:center!important } .es-m-txt-r, .es-m-txt-r h1, .es-m-txt-r h2, .es-m-txt-r h3 { text-align:right!important } .es-m-txt-l, .es-m-txt-l h1, .es-m-txt-l h2, .es-m-txt-l h3 { text-align:left!important } .es-m-txt-r img, .es-m-txt-c img, .es-m-txt-l img { display:inline!important } .es-button-border { display:block!important } a.es-button { font-size:14px!important; display:block!important; border-left-width:0px!important; border-right-width:0px!important } .es-btn-fw { border-width:10px 0px!important; text-align:center!important } .es-adaptive table, .es-btn-fw, .es-btn-fw-brdr, .es-left, .es-right { width:100%!important } .es-content table, .es-header table, .es-footer table, .es-content, .es-footer, .es-header { width:100%!important; max-width:600px!important } .es-adapt-td { display:block!important; width:100%!important } .adapt-img { width:100%!important; height:auto!important } .es-m-p0 { padding:0px!important } .es-m-p0r { padding-right:0px!important } .es-m-p0l { padding-left:0px!important } .es-m-p0t { padding-top:0px!important } .es-m-p0b { padding-bottom:0!important } .es-m-p20b { padding-bottom:20px!important } .es-mobile-hidden, .es-hidden { display:none!important } .es-desk-hidden { display:table-row!important; width:auto!important; overflow:visible!important; float:none!important; max-height:inherit!important; line-height:inherit!important } .es-desk-menu-hidden { display:table-cell!important } table.es-table-not-adapt, .esd-block-html table { width:auto!important } table.es-social { display:inline-block!important } table.es-social td { display:inline-block!important } }
        #outlook a {
            padding:0;
        }
        .ExternalClass {
            width:100%;
        }
        .ExternalClass,
        .ExternalClass p,
        .ExternalClass span,
        .ExternalClass font,
        .ExternalClass td,
        .ExternalClass div {
            line-height:100%;
        }
        .es-button {
            mso-style-priority:100!important;
            text-decoration:none!important;
        }
        a[x-apple-data-detectors] {
            color:inherit!important;
            text-decoration:none!important;
            font-size:inherit!important;
            font-family:inherit!important;
            font-weight:inherit!important;
            line-height:inherit!important;
        }
        .es-desk-hidden {
            display:none;
            float:left;
            overflow:hidden;
            width:0;
            max-height:0;
            line-height:0;
            mso-hide:all;
        }
        </style> 
         </head> 
         <body style='width:100%;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;padding:0;Margin:0;'> 
          <div class='es-wrapper-color' style='background-color:#EFEFEF;'> 
           <!--[if gte mso 9]>
                    <v:background xmlns:v='urn:schemas-microsoft-com:vml' fill='t'>
                        <v:fill type='tile' color='#efefef'></v:fill>
                    </v:background>
                <![endif]--> 
           <table class='es-wrapper' width='100%' cellspacing='0' cellpadding='0' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;padding:0;Margin:0;width:100%;height:100%;background-repeat:repeat;background-position:center top;'> 
             <tr style='border-collapse:collapse;'> 
              <td valign='top' style='padding:0;Margin:0;'> 
               <table cellpadding='0' cellspacing='0' class='es-content' align='center' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;'> 
                 <tr style='border-collapse:collapse;'> 
                  <td align='center' style='padding:0;Margin:0;'> 
                   <table bgcolor='transparent' class='es-header-body' align='center' cellpadding='0' cellspacing='0' width='600' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;'> 
                     <tr style='border-collapse:collapse;'> 
                      <td style='Margin:0;padding-top:5px;padding-bottom:5px;padding-left:20px;padding-right:20px;background-position:center top;' align='left'> 
                       <table width='100%' cellspacing='0' cellpadding='0' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;'> 
                         <tr style='border-collapse:collapse;'> 
                          <td width='560' valign='top' align='center' style='padding:0;Margin:0;'> 
                           <table width='100%' cellspacing='0' cellpadding='0' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;'> 
                             <tr style='border-collapse:collapse;'> 
                              <td align='center' style='padding:0;Margin:0;'><a target='_blank' href='http://petflow.dx.am/' style='-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;font-size:14px;text-decoration:underline;color:#333333;'><img src='https://eixewo.stripocdn.email/content/guids/videoImgGuid/images/20871574297991294.png' alt style='display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic;' class='adapt-img' width='191'></a></td> 
                             </tr> 
                           </table></td> 
                         </tr> 
                       </table></td> 
                     </tr> 
                   </table></td> 
                 </tr> 
               </table> 
               <table class='es-content es-visible-simple-html-only' cellspacing='0' cellpadding='0' align='center' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;'> 
                 <tr style='border-collapse:collapse;'> 
                  <td align='center' style='padding:0;Margin:0;background-image:url(https://eixewo.stripocdn.email/content/guids/CABINET_b973b22d987cd123ef00929992e4a0fc/images/92761567150995235.png);background-position:center top;background-repeat:no-repeat;' background='https://eixewo.stripocdn.email/content/guids/CABINET_b973b22d987cd123ef00929992e4a0fc/images/92761567150995235.png'> 
                   <table class='es-content-body' width='600' cellspacing='0' cellpadding='0' bgcolor='transparent' align='center' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;'> 
                     <tr style='border-collapse:collapse;'> 
                      <td align='left' style='padding:0;Margin:0;padding-top:20px;padding-left:20px;padding-right:20px;'> 
                       <table width='100%' cellspacing='0' cellpadding='0' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;'> 
                         <tr style='border-collapse:collapse;'> 
                          <td class='es-m-p20b' width='560' valign='top' align='center' style='padding:0;Margin:0;'> 
                           <table width='100%' cellspacing='0' cellpadding='0' bgcolor='transparent' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;'> 
                             <tr style='border-collapse:collapse;'> 
                              <td align='center' height='62' style='padding:0;Margin:0;'></td> 
                             </tr> 
                             <tr style='border-collapse:collapse;'> 
                              <td align='center' height='24' style='padding:0;Margin:0;'></td> 
                             </tr> 
                             <tr style='border-collapse:collapse;'> 
                              <td bgcolor='transparent' align='center' style='padding:0;Margin:0;padding-left:5px;padding-right:5px;padding-top:10px;'><h2 style='Margin:0;line-height:31px;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;font-size:26px;font-style:normal;font-weight:bold;color:#333333;'>Estamos quase lá...</h2></td> 
                             </tr> 
                             <tr style='border-collapse:collapse;'> 
                              <td bgcolor='transparent' align='center' style='Margin:0;padding-bottom:5px;padding-top:10px;padding-left:20px;padding-right:20px;'><h3 style='Margin:0;line-height:26px;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;font-size:22px;font-style:normal;font-weight:bold;color:#333333;'>Olá,&nbsp;{$nome}!</h3></td> 
                             </tr> 
                             <tr style='border-collapse:collapse;'> 
                              <td bgcolor='transparent' align='center' style='padding:0;Margin:0;padding-bottom:5px;padding-left:10px;padding-right:10px;'><p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:16px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:24px;color:#333333;'>Estamos ansiosos para ter você na mais divertida rede social de pets!</p></td> 
                             </tr> 
                             <tr style='border-collapse:collapse;'> 
                              <td bgcolor='transparent' align='center' style='padding:0;Margin:0;padding-bottom:5px;padding-left:10px;padding-right:10px;'><p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:16px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:24px;color:#333333;'>Para continuar<strong></strong> com o cadastro e validar seu e-mail, <strong>clique no botão abaixo</strong>:</p></td> 
                             </tr> 
                             <tr style='border-collapse:collapse;'> 
                              <td align='center' class='es-m-txt-c' style='Margin:0;padding-top:10px;padding-left:10px;padding-right:10px;padding-bottom:20px;'><span class='es-button-border' style='border-style:solid;border-color:#2CB543;background:#FEC300;border-width:0px;display:block;border-radius:4px;width: 250px;'><a href='https://{$link}' class='es-button' target='_blank' style='mso-style-priority:100 !important;text-decoration:none;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;font-size:18px;color:#333333;border-style:solid;border-color:#FEC300;border-width:15px 0px 10px;display:block;background:#FEC300;border-radius:4px;font-weight:bold;font-style:normal;line-height:22px;width:250px;text-align:center;'>CONFIRMAR MINHA CONTA</a></span></td> 
                             </tr> 
                             </tr> 
                             <tr style='border-collapse:collapse;'> 
                              <td align='center' height='60' style='padding:0;Margin:0;'></td> 
                             </tr> 
                           </table></td> 
                         </tr> 
                         <tr style='border-collapse:collapse;'> 
                          <td class='es-m-p20b' width='560' valign='top' align='center' style='padding:0;Margin:0;'> 
                           <table width='100%' cellspacing='0' cellpadding='0' bgcolor='transparent' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;'> 
                             <tr style='border-collapse:collapse;'> 
                              <td align='center' style='padding:0;Margin:0;padding-top:5px;'><p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:12px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:18px;color:#333333;'>Se você não criou uma conta em nosso site utilizando este e-mail, apenas ignore esta mensagem.</p></td> 
                             </tr> 
                             <tr style='border-collapse:collapse;'> 
                              <td align='center' height='17' style='padding:0;Margin:0;'></td> 
                             </tr> 
                           </table></td> 
                         </tr> 
                                              <tr class='es-mobile-hidden' style='border-collapse:collapse;'> 
                              <td align='center' style='padding:0;Margin:0;padding-top:5px;'><p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:12px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:18px;color:#333333;'>Caso não funcione, copie e cole o link abaixo em seu navegador:</p></td> 
                             </tr> 
                             <tr style='border-collapse:collapse;'> 
                              <td align='center' style='padding:0;Margin:0;'><p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:12px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:18px;color:#FF8C00;'><u>http://{$link}</u></p></td> 
                       </table></td> 
                     </tr> 
                   </table></td> 
                 </tr> 
               </table> 
               <table cellpadding='0' cellspacing='0' class='es-footer' align='center' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;background-color:transparent;background-repeat:repeat;background-position:center top;'> 
                 <tr style='border-collapse:collapse;'> 
                  <td align='center' style='padding:0;Margin:0;'> 
                   <table bgcolor='rgba(0, 0, 0, 0)' class='es-footer-body' align='center' cellpadding='0' cellspacing='0' width='600' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;'> 
                     <tr style='border-collapse:collapse;'> 
                      <td align='left' style='padding:0;Margin:0;padding-left:20px;padding-right:20px;'> 
                       <table cellpadding='0' cellspacing='0' width='100%' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;'> 
                         <tr style='border-collapse:collapse;'> 
                          <td width='560' align='center' valign='top' style='padding:0;Margin:0;'> 
                           <table cellpadding='0' cellspacing='0' width='100%' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;'> 
                             <tr style='border-collapse:collapse;'> 
                              <td align='center' style='padding:20px;Margin:0;'> 
                               <table border='0' width='100%' height='100%' cellpadding='0' cellspacing='0' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;'> 
                                 <tr style='border-collapse:collapse;'> 
                                  <td style='padding:0;Margin:0px 0px 0px 0px;border-bottom:1px solid #CCCCCC;background:none;height:1px;width:100%;margin:0px;'></td> 
                                 </tr> 
                               </table></td> 
                             </tr> 
                           </table></td> 
                         </tr> 
                       </table></td> 
                     </tr> 
                     <tr style='border-collapse:collapse;'> 
                      <td align='left' style='padding:0;Margin:0;padding-left:20px;padding-right:20px;'> 
                       <!--[if mso]><table width='560' cellpadding='0' cellspacing='0'><tr><td width='200' valign='top'><![endif]--> 
                       <table cellpadding='0' cellspacing='0' class='es-left' align='left' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left;'> 
                         <tr style='border-collapse:collapse;'> 
                          <td width='200' class='es-m-p20b' align='left' style='padding:0;Margin:0;'> 
                           <table cellpadding='0' cellspacing='0' width='100%' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;'> 
                             <tr style='border-collapse:collapse;'> 
                              <td align='right' style='padding:0;Margin:0;'><img class='adapt-img' src='https://eixewo.stripocdn.email/content/guids/601abb93-4b7e-452e-a508-01f7747bfb51/images/81021574300426023.png' alt style='display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic;' width='75'></td> 
                             </tr> 
                           </table></td> 
                         </tr> 
                       </table> 
                       <!--[if mso]></td><td width='5'></td><td width='355' valign='top'><![endif]--> 
                       <table cellpadding='0' cellspacing='0' class='es-right' align='right' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:right;'> 
                         <tr style='border-collapse:collapse;'> 
                          <td width='355' align='left' style='padding:0;Margin:0;'> 
                           <table cellpadding='0' cellspacing='0' width='100%' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;'> 
                             <tr style='border-collapse:collapse;'> 
                              <td align='left' style='padding:0;Margin:0;padding-top:15px;padding-bottom:15px;padding-left:20px;'><p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:21px;color:#333333;'>Com &lt;3 da&nbsp;equipe <strong>Seventh One</strong></p><p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:21px;color:#FF8C00;'>💌&nbsp;<u>equipepetflow@gmail.com</u></p></td> 
                             </tr> 
                           </table></td> 
                         </tr> 
                       </table> 
                       <!--[if mso]></td></tr></table><![endif]--></td> 
                     </tr> 
                   </table></td> 
                 </tr> 
               </table></td> 
             </tr> 
           </table> 
          </div>  
         </body>
        </html>";
        
        return $msg;
    }
}