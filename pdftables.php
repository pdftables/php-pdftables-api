<?php
$c = curl_init();
$cfile = curl_file_create('test.pdf', 'application/pdf');
$apikey = 'YOUR_API_KEY'; // from https://pdftables.com/api
curl_setopt($c, CURLOPT_URL, "https://pdftables.com/api?key=$apikey&format=csv");
curl_setopt($c, CURLOPT_POSTFIELDS, array('file' => $cfile));
curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
curl_setopt($c, CURLOPT_FAILONERROR,true);
curl_setopt($c, CURLOPT_ENCODING, "gzip,deflate");
$result = curl_exec($c);
if (curl_errno($c) > 0) {
    print('Error calling PDFTables: '.curl_error($c).PHP_EOL);
} else {
  // save the CSV we got from PDFTables to a file
  file_put_contents ("test.csv", $result);
}
curl_close($c);
?>
