<?php  include 'include/commonheader.php'; ?>
<?php 
// Email configuration 
$toEmail = 'vkeyphad@gmail.com'; 
$fromName = 'Sender Name'; 
$formEmail = 'sender@example.com'; 
 
$postData = $statusMsg = $valErr = ''; 
$status = 'error'; 
 
// If the form is submitted 
if(isset($_POST['submit'])){ 
    // Get the submitted form data 
    
    $postData = $_POST; 
    $name = trim($_POST['name']); 
    $email = trim($_POST['email']); 
    $subject = trim($_POST['subject']); 
    $message = trim($_POST['message']); 
     
    // Validate form fields 
    if(empty($name)){ 
         $valErr .= 'Please enter your name.<br/>'; 
    } 
    if(empty($email) || filter_var($email, FILTER_VALIDATE_EMAIL) === false){ 
        $valErr .= 'Please enter a valid email.<br/>'; 
    } 
    if(empty($subject)){ 
        $valErr .= 'Please enter subject.<br/>'; 
    } 
    if(empty($message)){ 
        $valErr .= 'Please enter your message.<br/>'; 
    } 
     
    if(empty($valErr)){ 
        // Send email notification to the site admin 
        $subject = 'New contact request submitted'; 
        $htmlContent = " 
            <h2>Contact Request Details</h2> 
            <p><b>Name: </b>".$name."</p> 
            <p><b>Email: </b>".$email."</p> 
            <p><b>Subject: </b>".$subject."</p> 
            <p><b>Message: </b>".$message."</p> 
        "; 
        
         
        // Always set content-type when sending HTML email 
        $headers = "MIME-Version: 1.0" . "\r\n"; 
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
        // Header for sender info 
        $headers .= 'From:'.$fromName.' <'.$formEmail.'>' . "\r\n"; 
         
        // Send email 
        @mail($toEmail, $subject, $htmlContent, $headers); 
         
        $status = 'success'; 
        $statusMsg = 'Thank you! Your contact request has submitted successfully, we will get back to you soon.'; 
        $postData = ''; 
    }else{ 
        $statusMsg = '<p>Please fill all the mandatory fields:</p>'.trim($valErr, '<br/>'); 
    } 
}
?>

<section class="hero-wrap hero-wrap-2" style="background-image: url('images/contactus.jpg');">
<div class="overlay"></div>
<div class="container">
<div class="row no-gutters slider-text align-items-center justify-content-center">
       <div class="col-md-9 pt-5 text-center">
                    <p class="breadcrumbs"><span class="me-2"><a href="index.php">Home <i class="fa fa-chevron-right"></i></a></span> <span> Contact us <i class="fa fa-chevron-right"></i></span></p>
                    <h1 class="mb-0 bread">Contact us</h1>
      </div>
</div>
</div>
</section>
<section class="ftco-section contact-section bg-light">
<div class="container-xl">
<div class="row d-flex mb-5 contact-info justify-content-center">
<div class="col-md-10">
<div class="row">
<div class="col-md-12 mb-4">
<h2 class="h3">Contact Information</h2>
</div>
<div class="col-md-12">
<div class="row">
<div class="col-md-3">
<p style="color: #EC691F;"><span style="color:#3d424a;">Address :</span>  </br> Sr. No. 30/19, Unity Industrial Estate, Near Prabhat Press, Narhe Dhayari Road,
Dhayari, Pune - 411 041</p>
</div>
<div class="col-md-3">
<p><span>Phone :</span> </br><a href="tel://+91 99606 08858">+91 99606 08858</a></p>
</div>
<div class="col-md-3">
<p><span>Email :</span></br><a href="mailto:anil@parkpro.in">anil@parkpro.in </a></p>
</div>
<div class="col-md-3">
<p><span>Website :</span></br> <a href="index.php">www.parkpro.com</a></p>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="row g-md-0 block-9">
<div class="col-md-6 order-md-last d-flex">
<form  class="bg-white p-5 contact-form" action="" method="post">
    <h2 class="mb-4 appointment-head">Drop A Message</h2>
<div class="form-group">
<input type="text" name="name" class="form-control" placeholder="Your Name" required>
</div>
<div class="form-group">
<input type="email"  name="email" class="form-control" placeholder="Your Email" required>
</div>
<div class="form-group">
<input type="text" name="subject" class="form-control" placeholder="Subject" required>
</div>
<div class="form-group">
<textarea  cols="30" name="message" rows="7" class="form-control" placeholder="Message" required></textarea>
</div>
<div class="form-group">
<input type="submit" value="Send Message" name="submit" class="btn btn-primary py-3 px-5 submit">
</div>
</form>
</div>
<div class="col-md-6 d-flex">
<div class="img w-100" style="background-image: url('images/contactus1.jpg');"> </div>
</div>
</div>
</div>
</section>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>

$('.submit').on('click',function(){
     //$('#form_id').submit();
     alert('hi');
 });
// $('.submit').Click(){
//         Swal.fire(
//     'The Internet?',
//     'That thing is still around?',
//     'question'
//     )
// }


    </script>
<?php include'include/footer.php' ?>