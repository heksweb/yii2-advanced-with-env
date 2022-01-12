<?php
return [
    'adminEmail'   => $_ENV['ADMIN_EMAIL'],
    'supportEmail' => $_ENV['SUPPORT_EMAIL'],
    'senderEmail'  => $_ENV['SENDER_EMAIL'],
    'senderName'   => $_ENV['SENDER_NAME'],
    'user.passwordResetTokenExpire' => 3600,
    'user.passwordMinLength' => 8,
];
