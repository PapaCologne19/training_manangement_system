<?php
function insert_value($data)
{
  // Replace with your Google Apps Script web app URL
  $script_url = 'https://script.google.com/macros/s/AKfycbxCGGqvXjwvgDF9cjc3UZRdr6W3R9tJlG9v7ZJkGITVeShbK-pL32Ln9cL6yMB_xAlJ/exec';

  // Append the data to the URL as query parameters
  $url = $script_url . '?callback=ctrlq&' . http_build_query($data) . '&action=insert';

  // Create cURL session
  $ch = curl_init($url);

  // Set cURL options
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

  // Ignore SSL certificate verification (use this cautiously)
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

  // Execute cURL session and get the response
  $response = curl_exec($ch);

  // Check for cURL errors
  if (curl_errno($ch)) {
    echo 'Curl error: ' . curl_error($ch);
  }

  // Close cURL session
  curl_close($ch);

  // Output the response
  echo $url;
  echo $response;
}
