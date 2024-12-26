<?php

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;


function storeImageProducts($image)
{
    $filename = uniqid() . '_' . time() . '.' . $image->getClientOriginalExtension();
    $filePath = Storage::disk('public')->putFileAs('product', $image, $filename);

    return 'storage/' . $filePath;
}
function storeImageCategory($image)
{
    $filename = uniqid() . '_' . time() . '.' . $image->getClientOriginalExtension();
    $filePath = Storage::disk('public')->putFileAs('category', $image, $filename);

    return 'storage/' . $filePath;
}

function moneyFormat($value)
{
    return number_format($value, 2, ',', '.') . ' ₺';
}
function moneyFormatProduct($value)
{
    return number_format($value, 2, '.', ',');
}
