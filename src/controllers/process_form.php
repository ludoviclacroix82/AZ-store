<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require '../../assets/vendor/PHPMailer/src/Exception.php';
require '../../assets/vendor/PHPMailer/src/PHPMailer.php';
require '../../assets/vendor/PHPMailer/src/SMTP.php';

var_dump($_POST);
$url = $_SERVER['HTTP_REFERER']; // url page precedent

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    session_start();
    $error = 0;

    //récuperation des data Post
    $gender = htmlspecialchars(trim($_POST['gender']));
    $genderSend = ($gender === 'noreply') ? '' : $gender; // Si le user n'a pas voulu mettre son genre 

    $captcha = isset($_POST['website']) ? htmlspecialchars(trim($_POST['website'])) : '';
    $gender = isset($_POST['gender']) ? htmlspecialchars(trim($_POST['gender'])) : '';
    $name = isset($_POST['name']) ? htmlspecialchars(trim($_POST['name'])) : '';
    $lastName = isset($_POST['lastName']) ? htmlspecialchars(trim($_POST['lastName'])) : '';
    $email = isset($_POST['email']) ? htmlspecialchars(trim($_POST['email'])) : '';
    $country = isset($_POST['country']) ? htmlspecialchars(trim($_POST['country'])) : '';
    $city = isset($_POST['city']) ? htmlspecialchars(trim($_POST['city'])) : '';
    $zip = isset($_POST['zip']) ? htmlspecialchars(trim($_POST['zip'])) : '';
    $adress = isset($_POST['adress']) ? htmlspecialchars(trim($_POST['adress'])) : '';


    $_SESSION['gender'] = $gender;
    $_SESSION['name'] = $name;
    $_SESSION['lastName'] = $lastName;
    $_SESSION['email'] = $email;
    $_SESSION['country'] = $country;
    $_SESSION['city'] = $city;
    $_SESSION['zip'] = $zip;
    $_SESSION['adress'] = $adress;


    $error += checkEmail($email);
    $error += issetInput($gender, 'gender', 'errorGender', 'Please note that the Gender field is mandatory.');
    $error += issetInput($name, 'name', 'errorName', 'Please note that the Name field is mandatory.');
    $error += issetInput($lastName, 'lastName', 'errorLastName', 'Please note that the last name field is mandatory.');
    $error += issetInput($country, 'country', 'errorCountry', 'Please note that the Country field is mandatory.');
    $error += issetInput($city, 'city', 'errorCity', 'Please note that the city field is mandatory.');
    $error += issetInput($zip, 'zip', 'errorZip', 'Please note that the zip field is mandatory.');
    $error += issetInput($adress, 'adress', 'errorAdress', 'Please note that the adress field is mandatory.');


    if ($error === 0 && $captcha === '') {
        // Initialisation de l'objet PHPMailer
        $mail = new PHPMailer(true);
        try {
            //Server settings
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();
            $mail->Host = 'smtp.office365.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'lac_ludo@hotmail.com';
            $mail->Password = '';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Destinataires
            $mail->setFrom('lac_ludo@hotmail.com', 'support AzStore');
            $mail->addAddress('lac_ludo@hotmail.com', 'support Hackeur Poulettes');
            $mail->addAddress($email, $name . ' ' . $lastName);


            // Contenu de l'email
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body = $genderSend . ' ' . $name . ' ' . $lastName . ' from:' . $country . '<br><br>' . $message;

            //$mail->send();
            $_SESSION['sendMail'] = 'send';

            // destroye $_Session
            unset($_SESSION['cart']);

            header("Location: $url");
        } catch (Exception $e) {
            //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            $_SESSION['sendMail'] = 'noSend';
            header("Location: $url");
        }
    } else {
        $_SESSION['sendMail'] = 'noEmpty';
        header("Location:  $url");
    }
} else {
    $_SESSION['sendMail'] = 'noSend';
    header("Location:  $url");
    exit();
}

function checkEmail(string $email)
{
    //verification d'email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['errorEmail'] = 'The email is not valid.';
        return 1;
    } else {
        $_SESSION['errorEmail'] = '';
        return 0;
    }
}

function issetInput(string $input, string $session, string $errorSession, string $errorMessage)
{
    if (empty($input)) {
        $_SESSION[$errorSession] = $errorMessage;
        return 1;
    } else {
        $_SESSION[$errorSession] = '';
        return 0;
    }
}
