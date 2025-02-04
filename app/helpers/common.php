<?php
use App\Models\Admin;
use Illuminate\Support\Facades\DB;

//email phpMailer.
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use App\Models\Sitecontent; 

function message(){
    return "hello";
}

 function getSiteSettings()
{
    return Admin::where('id', '=', 1)->first();
}

function makeZerOne($key){
    $ky=$key+1;
    if($ky < 10){
        return "0".$ky;
    }else{
        return $ky;
    }
    // $key+1 < 10 ? "0".$key+1 : $key+1
}

function get_site_image_src($path, $image, $type = '', $user_image = false)
{

    if (!empty($image) && Storage::disk('public')->exists($path . '/' . $type . '/' . $image)) {
        $filepath = Storage::url($path . '/' . $type . "/" . $image);
        // if (!empty($image) && @getimagesize($filepath)) {
        return url($filepath);
    } else if (!empty($image) && Storage::disk('public')->exists($path . '/' . $image)) {
        return url(Storage::url($path . '/' . $image));
    }
    return empty($user_image) ? asset('images/no-image.svg') : asset('images/no-user.svg');
}


//showing All Errors or Messages pr Status/Errors to User, 
function showMessage()
{
    $output = '';

    if (session('status')) {
        $output .= '<div class="alert bg-danger-subtle text-danger alert-dismissible fade show" role="alert">
                            <div class="d-flex align-items-center text-danger">
                                <i class="ti ti-info-circle me-2 fs-4"></i>
                                ' . session('status') . '
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
    }

    if (session('success')) {
        $output .= '<div class="alert bg-success-subtle text-success alert-dismissible fade show" role="alert">
                            <div class="d-flex align-items-center text-success">
                                <i class="ti ti-info-circle me-2 fs-4"></i>
                                ' . session('success') . '
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
    }

    if (session('error')) {
        $output .= '<div class="alert bg-danger-subtle text-danger alert-dismissible fade show" role="alert">
                            <div class="d-flex align-items-center text-danger">
                                <i class="ti ti-info-circle me-2 fs-4"></i>
                                ' . session('error') . '
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
    }

    if (!empty($errors) && count($errors) > 0) {
        $output .= '<div class="alert bg-danger-subtle text-danger alert-dismissible fade show" role="alert">
                            <div class="d-flex align-items-center text-danger">
                                <i class="ti ti-info-circle me-2 fs-4"></i>
                                <ul>';
        foreach ($errors->all() as $error) {
            $output .= '<li>' . $error . '</li>';
        }
        $output .= '</ul>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
    }

    return $output;
}
 

//send Emails.
function send_email($data, $template)
{
    require base_path("vendor/autoload.php");
    $mail = new PHPMailer(true);     // Passing `true` enables exceptions

    try {
        //Tell PHPMailer to use SMTP
        $mail->isSMTP();
        //Enable SMTP debugging
        $mail->SMTPDebug = 0;
        $mail->ContentType = 'text/html; charset=utf-8';
        //Ask for HTML-friendly debug output
        $mail->Debugoutput = 'html';
        //Set the hostname of the mail server
        $mail->Host = 'ssl://mail.herosolutions.com.pk';
        //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
        // I tried PORT 25, 465 too
        $mail->Port = 465;
        //Set the encryption system to use - ssl (deprecated) or tls
        $mail->SMTPSecure = 'tls';
        //Whether to use SMTP authentication
        $mail->SMTPAuth = true;
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        //Username to use for SMTP authentication - use full email address for gmail
        $mail->Username = "no-reply@herosolutions.com.pk";
        //Password to use for SMTP authentication
        // $mail->Password = ";FS2D)A$XRf}";
        $mail->Password = ';FS2D)A$XRf}';

        //Set who the message is to be sent from
        $mail->setFrom($data['email_from'], $data['email_from_name']);

        //Set who the message is to be sent to
        $mail->addAddress($data['email_to'], $data['email_to_name']);
        $mail->isHTML(true);
        //Set the subject line
        $mail->Subject = $data['subject'];

        $e_data['site_settings'] = getSiteSettings();
        $e_data['content'] = $data;
        // pr($e_data)
        $eMessage = view('includes/emails.' . $template, $e_data);
        // pr($eMessage);
        $mail->Body = $eMessage;
        //Replace the plain text body with one created manually
        $mail->AltBody = 'This is a plain-text message body';

        //send the message, check for errors
        if (!$mail->send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
            return false;
        } else {
            return true;
        }
    } catch (\Exception $e) {
        echo ($e);
        echo ("Message could not be sent. Error >> " . $e->getMessage());
        return false;
    }
}


function breadcrumb($currentPage, $url = '')
{
    if (!empty($url)) {
        $link = '
            <div class="">
                <a href="' . $url . '" class="btn btn-primary">Add New</a>
            </div>
            ';
    } else {
        $link = '
            <ol class="breadcrumb">
                                    <li class="breadcrumb-item d-flex align-items-center">
                                        <a class="text-muted text-decoration-none d-flex" href="' . url("admin/dashboard") . '">
                                            <iconify-icon icon="solar:home-2-line-duotone" class="fs-6"></iconify-icon>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item" aria-current="page">
                                        <span class="badge fw-medium fs-2 bg-primary-subtle text-primary">' . $currentPage . '</span>
                                    </li>
                                </ol>
            ';
    }
    return '
            <div class="card card-body py-3">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="d-sm-flex align-items-center justify-space-between">
                            <h4 class="mb-4 mb-md-0 card-title">' . $currentPage . '</h4>
                            <nav aria-label="breadcrumb" class="ms-auto">
                               ' . $link . ' 
                            </nav>
                        </div>
                    </div>
                </div>
            </div> 
        ';
}

//pages ki array,
function get_pages()
{
    return $page_arr = array('/' => 'Home', '/about' => 'About Us', '/portfolio' => 'Portfolio', '/contact' => 'Contact Us', '/services' => 'services', '/terms-conditions' => 'Terms & Conditions');
}

//exchanger. Remove Image from Storage folder.
function removeImage($path)
{
    if (file_exists("." . Storage::url($path))) {
        unlink("." . Storage::url($path));
    }
}


function get_page($key)
{
    $row = Sitecontent::where('ckey', $key)->first();
    
    return unserialize($row->code);
}

function getReadStatus($status)
{
    if ($status == 1) {
        return '<span class="badge bg-success-subtle text-success">Read</span>';
    } else {
        return '<span class="badge bg-danger-subtle text-danger">Unread</span>';
    }
}
?>