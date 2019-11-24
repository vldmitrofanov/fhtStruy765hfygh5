<?php

require_once 'init.php';

use Carbon\Carbon;


$timestamp = time();

$formData = array();
if (!empty($_POST)) {
    $formData = filter_var_array($_POST, $inputFilter);
    if (!empty($_POST['class_codes'])) {
        $formData['class_codes'] = filter_var_array($_POST['class_codes'], $inputFilterClassCodes);
    }
    if (!empty($formData['effective_date'])) {
        $formData['effective_date'] = Carbon::parse($formData['effective_date'])->toDateString();
    }
} else {
    header('Location: inddex.php');
}

//var_dump($formData);

$signature = signature($formData, $timestamp);

$url = $appConfig['end_point']
    . '/api/createApp/?key_id='
    . $appConfig['api_key_id']
    . '&timestamp=' . $timestamp
    . '&signature=' . $signature;

$curl = new \MyApp\Http\CurlPost($url);

try {
    // execute the request
    $result =  $curl($formData);
} catch (\RuntimeException $ex) {
    // catch errors
    die(sprintf('Http error %s with code %d', $ex->getMessage(), $ex->getCode()));
}

$_SESSION['last_amp_data_result'] = $result;

header('Location: result.php');
