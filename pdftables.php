<?php

$pdf_file = 'test.pdf';

if (!is_readable($pdf_file)) {
        print("Error: file does not exist or is not readable: $pdf_file\n");
        return;
}

$c = curl_init();

$cfile = curl_file_create($pdf_file, 'application/pdf');

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
  file_put_contents ($pdf_file . ".csv", $result);
}

curl_close($c);

?>
