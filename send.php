<?php
// Replace with your Telegram bot API token
$apiToken = "7409537739:AAGuSXPw1VvMS7hj_TC7pobtchQ7snH2ers";

// Replace with the Telegram channel ID
$chatId = "-1002181069342";

// Get form data
$fio = $_POST['fio'];
$tel = $_POST['tel'];
$email = $_POST['email'];

// Construct message text
$messageText = "**New Lead:**\n\n";
$messageText .= "**Name:** $fio\n";
$messageText .= "**Phone:** $tel\n";
$messageText .= "**Email:** $email\n";

// Prepare data for Telegram API request
$data = [
  'chat_id' => $chatId,
  'text' => $messageText,
  'parse_mode' => 'HTML', // Use HTML formatting for better presentation
];

// Construct URL for Telegram API request
$url = "https://api.telegram.org/bot{$apiToken}/sendMessage?" . http_build_query($data);

// Send message to Telegram channel using file_get_contents
$response = file_get_contents($url);

// Check response for success or error
if ($response !== false) {
  $message = "Message sent successfully to Telegram channel.";
} else {
  $message = "Error sending message to Telegram channel.";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teşekkür ederim!</title>
    <link rel="stylesheet" href="style.css">
    <!-- Keitaro tracking script -->
    <script type='application/javascript'>
    if (!window.KTracking){window.KTracking={collectNonUniqueClicks: false, multiDomain: false, R_PATH: 'https://gazenerya.com/T9XxWkFW', P_PATH:'https://gazenerya.com/0348b99/postback', listeners: [], reportConversion: function(){this.queued = arguments;}, getSubId: function(fn) {this.listeners.push(fn);}, ready: function(fn) {this.listeners.push(fn);} };}(function(){var a=document.createElement('script');a.type='application/javascript';a.async=true;a.src='https://gazenerya.com/js/k.min.js';var s=document.getElementsByTagName('script')[0];s.parentNode.insertBefore(a,s)})();
    </script><noscript><img height='0' width='0' alt='' src='https://gazenerya.com/T9XxWkFW'/></noscript>

    <script>
           const revenue = 0;
           const status = 'lead';
           const tid = Math.floor(Math.random() * 1000000000);
           KTracking.reportConversion(revenue, status, {tid});
    </script>
</head>
<body>
    <section id="thank-you">
        <div>
            <img src="/assets/Baykar-Logo.svg" alt=""><br>
            <h1>Teşekkür ederim!</h1>
            <p>Kişisel yöneticiniz kısa sürede sizinle iletişime geçecektir.</p>
            <p><?php echo $message; ?></p>
        </div>
    </section>
</body>
</html>
