<?php

class RequestCleaner
{
    public static function cleanTextInput(string $input)
    {
        $inputString = $input;

        $pattern = ['<script>', '</script>'];
        $replace = ['&nbsp;'];

        $inputString = preg_replace($pattern, $replace, $inputString);
        $inputString = htmlspecialchars($inputString);
        $inputString = htmlentities($inputString);

        return $inputString;
    }
}
