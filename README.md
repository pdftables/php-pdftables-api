# PHP PDFtables.com API example

Use the cURL library, with CURLFile to send the file. This example
converts the file `test.pdf` to XML. 

You may need to enable the curl plugin in order for the `curl_` functions to work. For example, if you're on a linux based system you might need to install packages relating to `php-curl`, or on Windows you may need to add `extension=php_curl.dll` to your php.ini. See [Fatal error: Call to undefined function curl_init() using Batch File](https://stackoverflow.com/questions/14724661/fatal-error-call-to-undefined-function-curl-init-using-batch-file) for more details.
