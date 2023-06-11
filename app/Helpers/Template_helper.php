<?php

function getValidationImageType($img)
{
  if ($img->getMimeType() == 'image/jpeg' || $img->getMimeType() == 'image/jpg' || $img->getMimeType() == 'image/png') {
    return true;
  }

  return false;
}

function uploadFileProduct($img)
{
  $imgName = $img->getRandomName();
  $img->move('uploads/product/', $imgName);

  return $imgName;
}

function uploadFilePayment($img)
{
  $imgName = $img->getRandomName();
  $img->move('uploads/payment/', $imgName);

  return $imgName;
}

function formatRupiah($value)
{
  return 'Rp' . number_format($value, 0, ',', '.');
}

function getPaymentMethod($value)
{
  if ($value == 1) {
    $result = 'Transfer Bank';
  } else {
    $result = 'bayar di Kasir';
  }

  return $result;
}

function generateInvoiceNumber($field, $table, $parse, $digitCount)
{
  $NOL = "0";
  $query = "Select " . $field . " from " . $table . " where " . $field . " like '" . $parse . "%' order by " . $field . " DESC LIMIT 0,2";

  $db = \Config\Database::connect();
  $data = $db->query($query)->getResultArray();

  $counter = 2;
  if (sizeof($data) == 0) {
    while ($counter < $digitCount) {
      $NOL = "0" . $NOL;
      $counter++;
    }

    return $parse . $NOL . "1";
  } else {
    $R = $data[0][$field];
    $K = sprintf("%d", substr($R, -$digitCount));
    $K = $K + 1;
    $L = $K;

    while (strlen($L) != $digitCount) {
      $L = $NOL . $L;
    }

    return $parse . $L;
  }
}
