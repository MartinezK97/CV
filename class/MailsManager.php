<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

use UserModel\User;
// require 'models/usermodel.php';
class MailsManager {
    //Create an instance; passing `true` enables exceptions
    protected $email;
    function __construct(){
        $this->email = new PHPMailer();
        //Server settings
        $this->email->SMTPDebug = 1;                      //Enable verbose debug output
        $this->email->isSMTP();                                            //Send using SMTP
        $this->email->Mailer     = 'smtp';                     
        $this->email->CharSet    = 'UTF-8';                     
        $this->email->Host       = CONSTANT('MAIL_HOST');                     //Set the SMTP server to send through
        $this->email->SMTPAuth   = true;                                   //Enable SMTP authentication
        $this->email->SMTPSecure = CONSTANT('MAIL_SMTPSecure');            //Enable implicit TLS encryption
        $this->email->Port       = CONSTANT('MAIL_PORT');                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        //Authentication
        $this->email->Username   = CONSTANT('MAIL_DIR');                    //SMTP username
        $this->email->Password   = CONSTANT('MAIL_PASS');                               //SMTP password
        
        // $this->email->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        
        //Recipients
           
    }


    function sendMailWithToken($token){
        try{ 
            //From
            $this->email->setFrom(CONSTANT('MAIL_DIR'), 'MiProximoAuto.com');
            $this->email->addAddress('kevinmartinez08.97@hotmail.com', 'Kevin Martinez');

            //Content
            $this->email->isHTML(true);                                  //Set email format to HTML
            $this->email->Subject = 'Restablecer constraseña';
            $this->email->Body    = 'Para recuperar su cuenta, haga click en el siguiente enlace <a href="http://localhost">Cambiar contraseña</a>'.$token;
            // $this->email->AltBody = 'This is the body in plain text for non-HTML mail clients';

            if(!$this->email->Send()) {
                print_r(["Mailer Error: " . $this->email->ErrorInfo]);
                exit;
                return false;
            }else{
                print_r("Correo electronico enviado");
                exit;
            }
        } catch (Exception $e) {
            echo "Email::sendMailWithToken() → Message could not be sent. Mailer Error: {$this->email->ErrorInfo}";
        }
    }


    function SendMailResetPassword($userId){
        // $user = new UserModel();
        // $email = $user->getEmail($userId);
        $token = bin2hex(random_bytes(16));
        $user = new UserModel();
        $user->setId($userId);
        $user->setToken($token);
        if($user->saveNewToken()){
            $token = $user->getToken();
            echo "El token guardado es $token";
            try{ 
                //From
                $this->email->setFrom(CONSTANT('MAIL_DIR'), 'MiProximoAuto.com');
                //To
                $this->email->addAddress('kevinmartinez08.97@hotmail.com', 'Kevin Martinez');

                //Content
                $this->email->isHTML(true);                                  //Set email format to HTML
                $this->email->Subject = 'Restablecer constraseña';
                $button = "<a href='".constant('URL')."login/resetPassword/$userId/$token'>Restablecer contraseña</a>";
                $this->email->Body    = "Para recuperar su cuenta, haga click en el siguiente botón $button";
                // $this->email->AltBody = 'This is the body in plain text for non-HTML mail clients';

                if(!$this->email->Send()) {
                    print_r(["Mailer Error: " . $this->email->ErrorInfo]);
                    exit;
                    return false;
                }else{
                    echo "Mail enviado correctamente";
                //    header('location:'. constant('URL').'login/');
                }
            } catch (Exception $e) {
                echo "Email::sendMailWithToken() → Message could not be sent. Mailer Error: {$this->email->ErrorInfo}";
            }
        }


        

        exit;
    }




}

?>
