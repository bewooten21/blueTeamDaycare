<?php
$compId= filter_input(INPUT_POST, 'companyId');



$company=company_db::get_company_by_id($compId);
$compName=$company->getCompanyName();

echo $compId;
echo $compName;

