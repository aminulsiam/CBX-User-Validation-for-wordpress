<?php

namespace Frontend\Validate;

/**
 *  validation class
 */
class Validation
{
    // validation
    function validate($data)
    {
        $data = trim($data," ");
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        $data   = preg_replace('/[^A-Za-z0-9\. -]/','', $data);
        return $data;
    }
}
