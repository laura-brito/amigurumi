<?php
function calculateQuota($price, $quota)
{
    return number_format($price / $quota, 2, ",", ".");
}

function calculatePercentage($price, $percentage)
{
    if ($percentage == 0)
        return number_format($price, 2, ",", ".");
    ;

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
        if ($item['featured']) {
            $price = calculatePercentage($item['price'], $item['featured_price']);
            $total += $price * $item['quantity'];

        } else {

            $total += $item['price'] * $item['quantity'];
        }
    }


    if (isset($_SESSION['deliveryCost'])) {
        $total += $_SESSION['deliveryCost'];
    }

    return number_format($total, 2, ',', '.');
}

function calculateSubtotal($cart)
{
    $total = 0;

    foreach ($cart as $item) {
        if ($item['featured']) {
            $price = calculatePercentage($item['price'], $item['featured_price']);
            $total += $price * $item['quantity'];

        } else {

            $total += $item['price'] * $item['quantity'];
        }
    }


    return number_format($total, 2, ',', '.');
}

function generateTransactionId()
{
    return mt_rand(1, 1000);
}