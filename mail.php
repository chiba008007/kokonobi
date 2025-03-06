<?php 
    var_dump($_REQUEST);
    // メール日本語対応
    mb_language("japanese");
    mb_internal_encoding("UTF-8");
    $name = $_REQUEST[ 'name' ];
    $to = $_REQUEST[ 'mail' ];
    $subject = "株式会社ココノビへお問い合わせ";
    $note = nl2br($_REQUEST[ 'note' ]);
    $message = "
".$name." 様<br>
<br>   
この度は、株式会社ココノビにお問い合わせいただき、誠にありがとうございます。<br>
以下の内容について、担当者が確認し次第、追ってご連絡させていただきます。<br>
-----------------------------<br>
・名前<br >
".$name."<br >
・連絡先<br >
".$to."<br >
・お問い合わせ内容<br >
".$note."<br>
-----------------------------<br>
<br>
今後ともよろしくお願い申し上げます。<br>
    ";
    $from = "info@coconobi.co.jp";
    // 文字コード設定 (HTML形式でUTF-8を使用)
    $headers = "From: ".$from."" . "\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8" . "\r\n";
    $headers .= "Content-Transfer-Encoding: 8bit" . "\r\n";


    // メール送信
    if (mb_send_mail($to, $subject, $message, $headers, "-f ".$from)) {
        // 管理者へメール
        mb_send_mail($from, $subject, $message, $headers, "-f ".$from);
    //    echo "HTMLメールが送信されました。";
            header("Location:contact.html");
    } else {
     //   echo "HTMLメール送信に失敗しました。";
        //header("Location:contact.html");
        echo "error";
    }
    exit();

?>
