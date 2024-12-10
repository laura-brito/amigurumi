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

function calculateTotal($price, $quantity)
{
    $result = $price * $quantity;
    return number_format($result, 2, ",", ".");
}

function calculateDelivery($weight, $distance, $cep, $baseRate = 10)
{
    $distance = strlen($cep) * 10;
    $ratePerKm = 0.05;
    $ratePerKg = 2;
    $deliveryCost = $baseRate + ($ratePerKm * $distance) + ($ratePerKg * $weight);

    return number_format($deliveryCost, 2, ',', '.');
}

function calculateCartTotal($cart)
{
    $total = 0;

    foreach ($cart as $item) {
        $total += $item['price'] * $item['quantity'];
    }

    return number_format($total, 2, ',', '.');
}

function generateTransactionId()
{
    return mt_rand(1, 1000);
}