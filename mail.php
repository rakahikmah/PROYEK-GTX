<?php
$statusMsg = '';
$msgClass = '';
if(isset($_POST['submit'])){
    // Get the submitted form data
    $email = $_POST['email'];
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $message = $_POST['desc'];
    
    // Cek apakah ada data yang belum diisi
    if(!empty($email) && !empty($name) && !empty($subject) && !empty($message)){
        
        if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
            $statusMsg = 'Please enter your valid email.';
            $msgClassk = 'errordiv';
        }else{
            // Pengaturan penerima email dan subjek email
            $toEmail = 'contactme@mohagustiar.info'; // Ganti dengan alamat email yang Anda inginkan
            $emailSubject = 'Subject : '.$subject;
            $htmlContent = '<h2> Pesan dari kontak form</h2>
                <h4>Isi Pesan</h4><p>'.$message.'</p>';
            
            // Mengatur Content-Type header untuk mengirim email dalam bentuk HTML
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            
            // Header tambahan
            $headers .= 'From: '.$name.'<'.$email.'>'. "\r\n";
            
            // Send email
            if(mail($toEmail,$emailSubject,$htmlContent,$headers)){
                
                header('refresh : 3; url=index.html');
                

            }else{
                $statusMsg = 'Maaf pesan Anda gagal terkirim, silahkan ulangi lagi.';
                $msgClass = 'errordiv';
                echo $statusMsg;
                echo $msgClass;
            }
        }
    }else{
        $statusMsg = 'Harap mengisi semua field data';
        $msgClass = 'errordiv';
    }
}
?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="description" content="cv mohammad agustiar">
		<meta name="keywords" content="HTML,CSS,cv">
		<meta name="author" content="Mohammad Agustiar">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Latest compiled and minified CSS -->
		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link href="style.css" rel="stylesheet">
		<link href="font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
		 
		 
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/zzlibs/animate.css/3.5.2/animate.min.css">
		<link href="https://fonts.googleapis.com/css?social family=Anton" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script>
		<script src="website/js/validation.js"></script>
		
		<link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.min.css" rel="stylesheet">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.min.js"></script>
      
	</head>
<body>
    
    
    
    
    
    
    
    
    
    
</body>

<script>
    swal({
  title: "Your Message has been sent !",
  text: "You'll direct to homepage in 3 seconds.",
  type: "success",
  timer: 3000,
  showConfirmButton: false
});
</script>


</html>

