<?php

/*
  "company_name":"Viral's Pretty good Company",
  "zip":"92127",
  "gross_receipts":"500000",
  "sub_contract_cost":"60000",
  "field_employees":"1",
  "years_in_business":"10",
  "class_codes":{"ac_refrigeration":80,"concrete_flat":20},
  "email":"vmehta211+apitest@gmail.com",
  "first_name":"Viral",
  "last_name":"Mehta",
  "phone":"510-673-6413",
  "limits_occurrence":"1 Million",
  "limits_aggregate":"2 Million",
  "limits_products_completed":"1 Million",
  "self_insured_retention":"$1,000",
  "losses_in_5_years":"3",
  "structural_work":"0",
  "claims_made":"0",
  "effective_date":"2017-06-15",
  "lead_campaign_name":"email_econtractors_qq"
*/

$inputFilter = array(
    'company_name' => FILTER_SANITIZE_STRING,
    'zip' => FILTER_SANITIZE_STRING,
    'gross_receipts' => FILTER_SANITIZE_NUMBER_INT,
    'sub_contract_cost' => FILTER_SANITIZE_NUMBER_INT,
    'field_employees' => FILTER_SANITIZE_NUMBER_INT,
    'years_in_business' => FILTER_SANITIZE_NUMBER_INT,
    'email' => FILTER_SANITIZE_EMAIL,
    'first_name' => FILTER_SANITIZE_STRING,
    'last_name' => FILTER_SANITIZE_STRING,
    'phone' => FILTER_SANITIZE_NUMBER_INT,
    'limits_occurrence' => FILTER_SANITIZE_STRING,
    'limits_aggregate' => FILTER_SANITIZE_STRING,
    'limits_products_completed' => FILTER_SANITIZE_STRING,
    'self_insured_retention' => FILTER_SANITIZE_STRING,
    'losses_in_5_years' => FILTER_SANITIZE_NUMBER_INT,
    'structural_work' => FILTER_SANITIZE_NUMBER_INT,
    'claims_made' => FILTER_SANITIZE_NUMBER_INT,
    'effective_date' => FILTER_SANITIZE_STRING,
    'lead_campaign_name' => FILTER_SANITIZE_STRING,
    'total_payroll' => FILTER_SANITIZE_STRING,
);

$inputFilterClassCodes = array(
    'ac_refrigeration' => FILTER_SANITIZE_NUMBER_INT,
    'concrete_flat' => FILTER_SANITIZE_NUMBER_INT,
);
