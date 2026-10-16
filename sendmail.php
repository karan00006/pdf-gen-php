<!-- zpjg kbnw mcvg zeia -->
<?php
require __DIR__ . '/vendor/autoload.php';

function getBaseUrl(): string
{
    $https = !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off';

    $scheme = $https ? 'https' : 'http';
    $host   = $_SERVER['HTTP_HOST'];

    return $scheme . '://' . $host;
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (($_SERVER['REQUEST_METHOD'] ?? 'GET') !== 'POST') {
    exit;
}


if (isset($_POST['submit']) && $_POST['submit'] == 'submit-form') {
    $N = $_POST['n'];
    $name = $N['Name'];

    $mail = new PHPMailer(true);
    try {
        $environment = parse_ini_file(__DIR__ . '/.env', false, INI_SCANNER_RAW);
        $username = $environment['MAIL_USERNAME'] ?? '';
        $password = $environment['MAIL_PASSWORD'] ?? '';

        if ($username === '' || $password === '') {
            throw new Exception('MAIL_USERNAME or MAIL_PASSWORD is missing from .env');
        }

        // SMTP settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = $username;
        $mail->Password = $password;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $caFile = ini_get('openssl.cafile');
        $caCandidates = [
            __DIR__ . '/assets/certs/php-ca-bundle.pem',
            $caFile,
            'D:/wamp64/bin/phpssl/cacert.pem',
            dirname(PHP_BINARY) . DIRECTORY_SEPARATOR . 'cacert.pem',
        ];
        $caFile = null;
        foreach ($caCandidates as $candidate) {
            if (is_string($candidate) && is_readable($candidate)) {
                $caFile = $candidate;
                break;
            }
        }

        if ($caFile === null) {
            throw new Exception('A readable CA certificate bundle was not found');
        }

        $mail->SMTPOptions = [
            'ssl' => [
                'cafile' => $caFile,
                'verify_peer' => true,
                'verify_peer_name' => true,
                'peer_name' => 'smtp.gmail.com',
            ],
        ];

        // Body of the Mail
       
        $image = getBaseUrl() . '/assets/images/image1.png';

        $mail->addEmbeddedImage(
            __DIR__ . '/assets/images/image1.png',
            'image1'
        );

        $body = ' 
            <h1>' . $name . '</h1>
            <hr>
            <p>HELLO! ' . $name . '</p>
            <img src="cid:image1" width="200" alt="Image" >
            ';
            
        // Sender & receiver
        $mail->setFrom('bitf25m506@pucit.edu.pk', 'PUCIT student body');
        $mail->addAddress('karan@cbrix.com');

        // Email content
        $mail->isHTML(true);
        $mail->Subject = 'Mail';
        $mail->Body = $body;

        $mail->send();
        header('Location: mail-form.php?sent=1');
    } catch (Exception $e) {
        echo "Error: {$mail->ErrorInfo}";
    }
}
