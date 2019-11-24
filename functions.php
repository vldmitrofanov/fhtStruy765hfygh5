<?php

function signature($array, $timestamp)
{
    //MD5("amp/createApp/?key_id=this_is_your_key_id&timestamp=1232132|{all your post data goes here}|this_is_your_key_value")

    global $appConfig;
    $string = $appConfig['prepend'] . $appConfig['api_key_id'] . '&timestamp=' . $timestamp;
    $postDataString = json_encode($array); //'';
    return md5($string . '|' . $postDataString . '|' . $appConfig['api_key']);
}

function prefill_input(&$array)
{
    global $inputFilter, $inputFilterClassCodes;
    foreach ($inputFilter as $key => $val) {
        if (empty($array[$key])) {
            $array[$key] = '';
        }
    }
    if (empty($array['class_codes'])) {
        $array['class_codes'] = array();
    }

    foreach ($inputFilterClassCodes as $key => $val) {
        if (empty($array['class_codes'][$key])) {
            $array['class_codes'][$key] = '';
        }
    }
}
