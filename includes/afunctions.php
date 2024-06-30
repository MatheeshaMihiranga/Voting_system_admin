<?php
function validate($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

//function to validate NIC format
function validateNIC($data)
{
    // Remove any whitespace from the input
    $data = trim($data);

    // Check if the NIC is in the old format (9 digits + 1 letter)
    if (preg_match('/^\d{9}[Vv]$/', $data)) {
        return true;
    }
    // Check if the NIC is in the new format (12 digits)
    elseif (preg_match('/^\d{12}$/', $data)) {
        return true;
    } else {
        return false;
    }
}
//check for integers - false if integers are available true if not available
function noIntegers($text)
{
    return !preg_match('/\d/', $text);
}
