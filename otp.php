   <?php
   require_once 'vendor/autoload.php'; // Pastikan path ke autoload benar
   use Twilio\Rest\Client;

   // Twilio credentials
   $account_sid = 'YOUR_ACCOUNT_SID';
   $auth_token = 'YOUR_AUTH_TOKEN';
   $twilio_number = 'YOUR_TWILIO_PHONE_NUMBER';

   // Penerima dan pesan OTP
   $recipient_number = 'TARGET_PHONE_NUMBER';
   $otp = rand(100000, 999999); // Generate OTP 6 digit

   // Inisialisasi Twilio Client
   $client = new Client($account_sid, $auth_token);

   // Kirim SMS OTP
   try {
       $message = $client->messages->create(
           $recipient_number,
           [
               'from' => $twilio_number,
               'body' => 'Your OTP code is: ' . $otp
           ]
       );
       echo "OTP sent successfully!";
   } catch (Exception $e) {
       echo "Failed to send OTP: " . $e->getMessage();
   }
   ?>
