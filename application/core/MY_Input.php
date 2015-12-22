<?php
class MY_Input extends CI_Input {
function _clean_input_keys($str)
{
if ( ! preg_match("/^[a-z0-9:_\/-]+$/i", $str) )
{
$str = preg_replace("/^[^a-z0-9:_\/-]+$/i", '', $str);
}
// Clean UTF-8 if supported
if (UTF8_ENABLED === TRUE)
{
$str = $this->uni->clean_string($str);
}
return $str;
}

// By Gouda to solve problem of content editor.
function _clean_input_data($str)
{
    if (is_array($str))
    {
        $new_array = array();
        foreach ($str as $key => $val)
        {
            $new_array[$this->_clean_input_keys($key)] = $this->_clean_input_data($val);
        }
        return $new_array;
    }

    // We strip slashes if magic quotes is on to keep things consistent
    if (get_magic_quotes_gpc())
    {
        $str = stripslashes($str);
    }

    /*
    // Should we filter the input data?
    if ($this->use_xss_clean === TRUE)
    {
        $str = $this->xss_clean($str);
    }
	$str = strip_tags($str);
	*/
    
    
    // Standardize newlines
    if (strpos($str, "\r") !== FALSE)
    {
        $str = str_replace(array("\r\n", "\r"), "\n", $str);
    }

    return $str;
}


}