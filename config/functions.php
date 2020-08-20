<?php

function slug($text)
{
    // replace non-letter or digits by -
    $text = strtolower(preg_replace("/[^A-Za-z0-9]/", "-", $text));

    // trim
    $text = trim($text, '-');

    // tranliterate
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

    // remove unwanted characters
    $text = preg_replace('[^A-Za-z0-9-]', '', $text);

    return $text;
}


function validate_signup($post_firstname, $post_lastname, $post_email, $post_username, $post_password, $post_confirm_password, $msg, $err) {
    if (empty(trim($post_confirm_password)))
    {
        return $err = "Please confirm password.";
    }
    else
    {
        return $confirm_password = trim($post_confirm_password);
    }
    
    if (empty(trim($post_password)))
    {
        return $err = "Please enter password.";
    }
    else
    {
        return $password = trim($post_password);
    }
    
    if (empty(trim($post_username)))
    {
        return $err = "Please enter username.";
    }
    else
    {
        return $username = trim($post_username);
    }
    
    if (empty(trim($post_email)))
    {
        return $err = "Please enter email.";
    }
    else
    {
        return $email = trim($post_email);
    }

    if (empty(trim($post_lastname)))
    {
        return $err = "Please enter lastname.";
    }
    else
    {
        return $lastname = trim($post_lastname);
    }

    if (empty(trim($post_firstname)))
    {
        return $err = "Please enter firstname.";
    }
    else
    {
        return $firstname = trim($post_firstname);
    }
}
?>