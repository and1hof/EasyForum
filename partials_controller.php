<?php

// default method signature, return file's code.
function get_content($file)
{
   $template = file_get_contents($file);
   return $template;
}

?>
