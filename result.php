<?php

require_once 'init.php';

session_start();

$data = json_decode($_SESSION['last_amp_data_result'], TRUE);

$_SESSION['last_amp_data_result'] = null;

include('header.php');
?>
<div class="container">
    <div class="row">
        <div class="col-md-12" style="margin-top: 150px;">
            <?php
            if (isset($data['response']) && $data['response']['status_code'] == 0) {
                ?>
                <div class="alert alert-success">
                    <strong>Success!</strong> The lead has been created. Transaction ID: <?php echo $data['transaction_id']; ?> App ID: <?php echo $data['app_id']; ?>
                </div>

            <?php
            } else {
                ?>
                <div class="alert alert-danger">
                    <strong>Error!</strong> an unknown error has occurred!
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