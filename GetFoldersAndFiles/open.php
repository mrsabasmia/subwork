<?php
// নিজের ভিডিও ফোল্ডারের ঠিকানা
$folder = __DIR__ . "/videos/";

// URL থেকে ফাইলের নাম নেওয়া
$id = $_GET['id'] ?? '';

// নিরাপদ ফাইলনাম যাচাই
if (!preg_match('/^[a-zA-Z0-9_-]+$/', $id)) {
    http_response_code(400);
    exit("Invalid file name");
}

// অনুমোদিত ভিডিও ফাইল খোঁজা
$file = $folder . $id . ".html";

if (is_file($file)) {
    header("Content-Type: video/mp4");
    header("Content-Disposition: inline; filename=\"" . $id . ".html"");
    readfile($file);
    exit;
}

http_response_code(404);
echo "File not found";
?>
