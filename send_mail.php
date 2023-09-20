<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Http;
require 'PHPMailer/PHPMailer/src/Exception.php';
require 'PHPMailer/PHPMailer/src/PHPMailer.php';
require 'PHPMailer/PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] === "POST" ){
    
    //Email validation and sending mail
    
    echo "<script>console.log('".$_POST['_id']."')</script>";
    echo "<script>alert('".$_POST['_id']."')</script>";
    if(filter_var('manjusk1793@gmail.com',FILTER_VALIDATE_EMAIL)){
        
        $api_='https://imdb-api.projects.thetuhin.com/title/'.$_POST['_id'];
        
        /* APi Call uing CUrl */
        // Initialize the curl object
            $curl = curl_init();
    
            // Set the curl options
            curl_setopt($curl, CURLOPT_URL, $api_);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    
            // Execute the curl request
            $response = curl_exec($curl);
    
            // Close the curl object
            curl_close($curl);
    
            // Decode the JSON response
            $jsonData = json_decode($response);
            echo "<script>alert(Title: ".$jsonData->title.")</script>";

    try{

        $mailid=new PHPMailer(true);
        $mailid->isSMTP();
        $mailid->Host='smtp.gmail.com';
        $mailid->SMTPAuth=true;
        $mailid->Username='manjusk017@gmail.com';
        $mailid->Password='leesgvgvagpsuqbu';
        $mailid->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mailid->Port=465;
        $mailid->AltBody='Hi '.ucfirst($_POST['user_name']).'.'.' (Since Html Document cannot be loaded),
        here are the details about your added content: Name:,
        Year:,Rating:';

$mailid->setFrom('manjusk017@gmail.com','Manjunath SK');

$mailid->addAddress('manjusk1793@gmail.com',$_POST['user_name']);
$mailid->isHTML(true);

$mailid->Subject='Thank you for Using the website';
$mailid->Body='Hi <b>'.ucfirst($_POST['user_name']).'<b>.<br>'.

'
<!doctype html>
<html lang="en">

<head>
  <title>IMDbzClone</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>
<body style="background-color:#000;color:#fff;margin:5px 15px;">
    <nav>
        <div style="background-color: #f5c518; width: fit-content;border:1px solid #fff;border-radius:10px;">
            <label ><span style="color:#000;font-size: 2em;">IMDB</span>Clone</label>
        </div>
      </nav>

<div class="heading" style="text-align: center;">
<p>
        Thank you for using the website <br>Here is the recent content added to wishlist
    </p>
</div>

<table style="width: 100%;background-color:#121212;border-radius:1vw;">

        <tr style=" margin:3px 5px;border-radius: 5px;border:1px; ">
            <td style="padding: 2px 5px;width: 50%;">
            <article style="margin:5px 1px;text-align: center;">
                <img src="'.$api_['image'].'" style="border-radius:1vw;" width="200" height="300" loading="eager" alt="">
            </article>
        </td>
        <td style="text-align:justify;left:0;margin:3px 5px;">

            <div style="text-align: center;">
                <label style="color:#f5c518;font-size: 1.5em">Description</label>
            </div>
            <br>
            <div style="color:#f5c518;">
                <label >Name:   &nbsp;&nbsp;<span  style="color:#fff;">"'.$api_['title'].'"</span></label><br>
                <label >Year:   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span  style="color:#fff;">'.$api_['year'].'</span></label><br>
                <label >Rating: &nbsp;<span style="color:#fff;" >"'.$api_["rating"]["star"].'"</span></label><br>
            </div>

    </td>
</tr>

</table>

</div>

</body>

</html>
'  ;

$mailid->send();

echo "<script> alert('Message sent! we will send you a confirmation mail.');
        document.location.href='index.html';
      </script>";
    }
    catch(Exception $e){
        echo "error: " .$mailid->ErrorInfo;
    }

}else{
    echo("Given Email is not correct!");
    echo "<script>alert('mail couldnot be sent!Check mail id');</script>";
}

}
else{
    echo "<script>alert('failed to load POST')</script>";

}

?>
