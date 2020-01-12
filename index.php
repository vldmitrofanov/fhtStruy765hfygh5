<?php
require_once 'init.php';

$formData = array();
if (!empty($_GET)) {
    $formData = filter_var_array($_GET, $inputFilter);
}
prefill_input($formData);
include('header.php');
?>

<div class="container">
    <div class="row">
        <h1 class="center">Creating a new lead</h1>
        <form method="post" action="post.php">
            <input type="hidden" value="<?php echo $appConfig['lead_campaign_name']; ?>" name="lead_campaign_name">
            <div class="col-md-6">
                <!-- 1 company_name -->
                <div class="form-group">
                    <label for="t0">Company name</label>
                    <input type="text" class="form-control" id="t0" placeholder="Company name here" value="<?php echo $formData['company_name']; ?>" name="company_name" required>
                </div>
                <!-- / -->

                <div style="display:grid;grid-gap:20px;grid-template-columns: 1fr 1fr;">
                    <!-- 2 zip -->
                    <div class="form-group">
                        <label for="t01">ZIP</label>
                        <input type="text" class="form-control" id="t01" placeholder="56789" value="<?php echo $formData['zip']; ?>" name="zip">
                    </div>
                    <!-- / -->

                    <!-- 3 gross_receipts -->
                    <div class="form-group">
                        <label for="t02">Gross receipts</label>
                        <input type="number" class="form-control" id="t02" placeholder="5000.." value="<?php echo $formData['gross_receipts']; ?>" name="gross_receipts" required>
                    </div>
                    <!-- / -->
                </div>

                <div style="display:grid;grid-gap:20px;grid-template-columns: 1fr 1fr;">
                    <!-- 4 sub_contract_cost -->
                    <div class="form-group">
                        <label for="t03">Subcontract cost</label>
                        <input type="text" class="form-control" id="t03" placeholder="" value="<?php echo $formData['sub_contract_cost']; ?>" name="sub_contract_cost" required>
                    </div>
                    <!-- / -->

                    <!-- 5 field_employees -->
                    <div class="form-group">
                        <label for="t03">No. of employees</label>
                        <input type="number" class="form-control" id="t03" placeholder="3" value="<?php echo $formData['field_employees']; ?>" name="field_employees">
                    </div>
                    <!-- / -->
                </div>

                <!-- 8 email -->
                <div class="form-group">
                    <label for="t08">Email address</label>
                    <input type="email" class="form-control" name="email" id="t08" value="<?php echo $formData['email']; ?>" placeholder="Email" required>
                </div>
                <!-- / -->

                <!-- 6 phone -->
                <div class="form-group">
                    <label for="t04">Phone</label>
                    <input type="text" class="form-control" id="t04" placeholder="" value="<?php echo $formData['phone']; ?>" name="phone">
                </div>
                <!-- / -->

                <div style="display:grid;grid-gap:20px;grid-template-columns: 1fr 1fr;">
                    <!-- 9 years_in_business -->
                    <div class="form-group">
                        <label for="t091">Class codes (ac refrigeration)</label>
                        <input type="text" class="form-control" id="t091" placeholder="" value="<?php $a = isset($formData['class_codes']) ? $formData['class_codes']['ac_refrigeration'] : '';
                                                                                                echo $a; ?>" name="class_codes[ac_refrigeration]">
                    </div>
                    <!-- / -->

                    <!-- 7 years_in_business -->
                    <div class="form-group">
                        <label for="t092">Class codes (concrete flat)</label>
                        <input type="text" class="form-control" id="t092" placeholder="" value="<?php $a = isset($formData['class_codes']) ? $formData['class_codes']['concrete_flat'] : '';
                                                                                                echo $a; ?>" name="class_codes[concrete_flat]">
                    </div>
                    <!-- / -->
                </div>

                <div class="form-group">
                    <label for="effectiveDate">Effective Date</label>
                    <input type="date" class="form-control" placeholder="2017-06-15" id="effectiveDate" name="effective_date" required>
                </div>
            </div>
            <div class="col-md-6">

                <!-- 1 first_name -->
                <div class="form-group">
                    <label for="t1">First name</label>
                    <input type="text" class="form-control" id="t1" placeholder="First name" value="<?php echo $formData['first_name']; ?>" name="first_name">
                </div>
                <!-- / -->

                <!-- 2 last_name -->
                <div class="form-group">
                    <label for="t12">Last name</label>
                    <input type="text" class="form-control" id="t12" placeholder="Last name" value="<?php echo $formData['last_name']; ?>" name="last_name">
                </div>
                <!-- / -->

                <!-- 3 limits_occurrence -->
                <div class="form-group">
                    <label for="t13">limits occurrence</label>
                    <input type="text" class="form-control" id="t13" placeholder="1 Million" value="<?php echo $formData['limits_occurrence']; ?>" name="limits_occurrence" required>
                </div>
                <!-- / -->

                <!-- 4 limits_aggregate -->
                <div class="form-group">
                    <label for="t14">limits aggregate</label>
                    <input type="text" class="form-control" id="t14" placeholder="2 Million" value="<?php echo $formData['limits_aggregate']; ?>" name="limits_aggregate" required>
                </div>
                <!-- / -->

                <!-- 5 limits_products_completed -->
                <div class="form-group">
                    <label for="t15">Limits products completed</label>
                    <input type="text" class="form-control" id="t15" placeholder="1 Million" value="<?php echo $formData['limits_products_completed']; ?>" name="limits_products_completed" required>
                </div>
                <!-- / -->

                <!-- 5 self_insured_retention -->
                <div class="form-group">
                    <label for="t15">Self insured retention</label>
                    <input type="text" class="form-control" id="t15" placeholder="$1,000" value="<?php echo $formData['self_insured_retention']; ?>" name="self_insured_retention">
                </div>
                <!-- / -->

                <div style="display:grid;grid-gap:10px;grid-template-columns: 1fr 1fr 1fr;">
                    <!-- 6 losses_in_5_years -->
                    <div class="form-group">
                        <label for="t16" class="small">Losses in 5 years</label>
                        <input type="text" class="form-control" id="t16" placeholder="3" value="<?php echo $formData['losses_in_5_years']; ?>" name="losses_in_5_years">
                    </div>
                    <!-- / -->

                    <!-- 7 structural_work -->
                    <div class="form-group">
                        <label for="t092" class="small">Structural work</label>
                        <input type="text" class="form-control" id="t092" placeholder="0" value="<?php echo $formData['structural_work']; ?>" name="structural_work">
                    </div>
                    <!-- / -->

                    <!-- 8 claims_made -->
                    <div class="form-group">
                        <label for="t092" class="small">Claims_made</label>
                        <input type="text" class="form-control" id="t092" placeholder="0" value="<?php echo $formData['claims_made']; ?>" name="claims_made">
                    </div>
                    <!-- / -->
                </div>

                <div class="form-group">
                <label for="total_payroll">estimated annual payroll</label>
                <select name="total_payroll" if="total_payroll" class="form-control">
                    <option value="Under 15k"<?php if($formData['total_payroll']=='Under 15k') echo ' selected'; ?>>Under 15k</option>
                    <option value="15k-30k"<?php if($formData['total_payroll']=='15k-30k') echo ' selected'; ?>>15k-30k</option>
                    <option value="30k-50k"<?php if($formData['total_payroll']=='30k-50k') echo ' selected'; ?>>30k-50k</option>
                    <option value="50k-70k"<?php if($formData['total_payroll']=='50k-70k') echo ' selected'; ?>>50k-70k</option>
                    <option value="70k-90k"<?php if($formData['total_payroll']=='70k-90k') echo ' selected'; ?>>70k-90k</option>
                    <option value="90k-110k"<?php if($formData['total_payroll']=='90k-110k') echo ' selected'; ?>>90k-110k</option>
                    <option value="110k-150k"<?php if($formData['total_payroll']=='110k-150k') echo ' selected'; ?>>110k-150k</option>
                    <option value="Over 150k"<?php if($formData['total_payroll']=='Over 150k') echo ' selected'; ?>>Over 150k</option>
                </select>
                </div>

                <?php
                /* need a checkbox?
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="checkboxInput"> Check me out
                    </label>
                </div>
                */
                ?>
                <button type="submit" class="btn btn-default">Submit</button>

            </div>
        </form>
    </div>


</div>
<?php

include('footer.php');

?>
