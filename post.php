<?php

require_once 'init.php';

use Carbon\Carbon;

session_start();

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

$data = json_decode($result, TRUE);
include('header.php');
?>
<div class="container">
    <div class="row">
        <div class="col-md-12" style="margin-top: 150px;">
            <?php
            if (isset($data['response'])) {
                ?>
                <div class="alert alert-success">
                    <strong>Success!</strong> The lead has been created. Transaction ID: <?php echo $data['transaction_id']; ?> App ID: <?php echo $data['app_id']; ?>
                </div>

            <?php
            }
            ?>

        </div>
    </div>
</div>

<?php
include('footer.php');
?>