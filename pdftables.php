<?php
$c = curl_init();
$cfile = curl_file_create('test.pdf', 'application/pdf');

curl_setopt($c, CURLOPT_URL, '{{ .FullURL }}/api?key={{ .DisplayAPIKey }}&format=xml');
curl_setopt($c, CURLOPT_POSTFIELDS, array('file' => $cfile));
curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
curl_setopt($c, CURLOPT_ENCODING, "gzip,deflate");

$result = curl_exec($c);
if (curl_errno($c)) {
    print('Error calling PDFTables: ' . curl_error($c));
}

// save the XML we got from PDFTables to a file
file_put_contents ("test.xml", $result);

curl_close($c);
