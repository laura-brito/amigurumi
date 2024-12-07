<?php
function calculateQuota($price, $quota)
{
    return number_format($price / $quota, 2, ",", ".");
}

function calculatePercentage($price, $percentage)
{
    $percentageValue = $price * ($percentage / 100);
    $result = $price - $percentageValue;

    return number_format($result, 2, ",", ".");
}
?>