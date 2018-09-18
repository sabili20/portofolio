<?php
if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $name = $_POST['nama'];
    $subject = $_POST['subject'];
    $message = $_POST['pesan'];

    if(!empty($email) && !empty($name) && !empty($subject) && !empty($message)){

        if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
            $statusMsg = 'Please enter your valid email.';
            echo "<script>alert('Email yang anda Masukkan Tidak Valid'); window.location = 'utama.html#kontak'</script> ";
        }else{
            $toEmail = 'sabil.soft20@gmail.com';
            $emailSubject = 'Perihal'.$subject;
            $htmlContent = '<h2> via Form Kontak Website</h2>
                <h4>Name</h4><p>'.$name.'</p>
                <h4>Email</h4><p>'.$email.'</p>
                <h4>Subject</h4><p>'.$subject.'</p>
                <h4>Message</h4><p>'.$message.'</p>';

            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            $headers .= 'From: '.$name.'<'.$email.'>'. "\r\n";

            if(mail($toEmail,$emailSubject,$htmlContent,$headers)){
                echo "<script>alert('Pesan berhasil di Kirim!'); window.location = 'index.php'</script> ";
            }else{
                echo "<script>alert('Pesan gagal di Kirim!'); window.location = 'utama.html#kontak'</script> ";
            }
        }
    }else{
        echo "<script>alert('Pesan Yang Anda Masukkan Kosong!'); window.location = 'utama.html#kontak'</script> ";
    }
}
?>
