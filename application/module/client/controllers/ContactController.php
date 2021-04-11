<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class ContactController extends Controller
{
    public function __construct($arrParams)
    {
        parent::__construct($arrParams);
        $this->_templateObj->setFolderTemplate('client/main/');
        $this->_templateObj->setFileTemplate('index.php');
        $this->_templateObj->setFileConfig('template.ini');
        $this->_templateObj->load();
    }
    //INDEX CONTACT
    public function indexAction()
    {
        $this->_view->title         = ucfirst($this->_arrParam['controller']);
        $this->_view->_title        = strtoupper($this->_arrParam['controller']);
        if(isset($this->_arrParam['form']['token']) > 0){
            $valid = new Validate($this->_arrParam['form']);
            $valid  ->addRule('name', 'string', ['min' => 3 , 'max' => 255])
                    ->addRule('subject' ,'string',['min' => 10 , 'max' => 255])
                    ->addRule('email', 'email');
            $valid  ->run();
            $result = $this->_arrParam['form'] = $valid->getResult();
            //CHECK LỖI GỬI MAILER
            if($valid->isValid() == false){
                $this->_view->errors = $valid->showErrors();
            }
            //GỬI MAILER
            else{
                require_once SCRIPT_PATH . 'vendor' . DS . 'autoload.php';
                echo SCRIPT_PATH . 'vendor' . DS . 'autoload.php';
                require_once SCRIPT_PATH . 'PHPMailer-6.2.0' . DS . 'src' . DS . 'PHPMailer.php';
                require_once SCRIPT_PATH . 'PHPMailer-6.2.0' . DS . 'src' . DS . 'Exception.php';
                require_once SCRIPT_PATH . 'PHPMailer-6.2.0' . DS . 'src' . DS . 'OAuth.php';
                require_once SCRIPT_PATH . 'PHPMailer-6.2.0' . DS . 'src' . DS . 'POP3.php';
                require_once SCRIPT_PATH . 'PHPMailer-6.2.0' . DS . 'src' . DS . 'SMTP.php';
                
                //khai báo class mailer
                $mail = new PHPMailer();
                //Server settings
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
                $mail->isSMTP();                                            // Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                $mail->Username   = 'dangvy202@gmail.com';                     // SMTP username
                $mail->Password   = 'afqjtwjovegotzmj';                               // SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                $mail->Port       = 465;
                $mail->isHTML(true);
                $mail->setFrom('dangvy202@gmail.com', 'Vy Tran');
                
                $arrParam = $this->_arrParam['form'];
                
                $result = true;
                try {
                    $mail->setFrom('dangvy202@gmail.com');
                    $mail->addAddress('dangvy202@gmail.com');
                    $mail->Subject = $arrParam['subject'];
                    $mail->Body    = '  <div class="row">
                                            <div class="col-12">
                                                <h1 style="text-align: center;">Mail</h1>
                                            </div>
                                            <p>Tên gửi  :'.$arrParam['email'].'</p>
                                            <p>Nội dung :'.$arrParam['message'].'</p>
                                        </div>';
                    $mail->send();
                    $this->_view->successMail = HelperBackend::setNotify('success', SUCCESS_MAIL);
                    // URL::redirect('client','contact','index');
                } catch (Exception $e) {
                    $result = false;
                }
            }
            
        }
        $this->_view->render('contact/index');
    }
}
