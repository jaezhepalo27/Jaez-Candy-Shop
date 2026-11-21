<?php
declare(strict_types=1);

// Multidimensional array: key = product name, value = [price in Php, stock level]
$candies = [
    'Toffee'    => ['price' => 3,  'stock' => 12],
    'Mints'     => ['price' => 2,  'stock' => 26],
    'Fudge'     => ['price' => 4,  'stock' => 8],
    'Lollipops' => ['price' => 5,  'stock' => 40],
    'Gummies'   => ['price' => 6,  'stock' => 9],
    'Caramels'  => ['price' => 3,  'stock' => 15],
];

// Global variable for the tax rate (percent)
$tax_rate = 20;

// Returns "Yes" if stock is below 10, otherwise "No"
function get_reorder_message(int $stock): string
{
    return ($stock < 10) ? 'Yes' : 'No';
}

// Total value of stock for one product
function get_total_value(float $price, int $quantity): float
{
    return $price * $quantity;
}

// Tax due when all remaining stock is sold
function get_tax_due(float $price, int $quantity, int $tax_rate = 0): float
{
    $total = $price * $quantity;
    return $total * ($tax_rate / 100);
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Stock Control</title>
    <link rel="stylesheet" href="css/styles.css">
  </head>
  <body>
    <h1>Jaez Candy Shop</h1>
    <h2>Stock Control</h2>
    <table>
      <tr>
        <th>Product</th>
        <th>Stock</th>
        <th>Re-order</th>
        <th>Total Value</th>
        <th>Tax Due</th>
      </tr>
      <?php foreach ($candies as $product_name => $data) { ?>
        <tr>
          <td><?= $product_name ?></td>
          <td><?= $data['stock'] ?></td>
          <td><?= get_reorder_message($data['stock']) ?></td>
          <td>&#8369;<?= number_format(get_total_value($data['price'], $data['stock']), 2) ?></td>
          <td>&#8369;<?= number_format(get_tax_due($data['price'], $data['stock'], $tax_rate), 2) ?></td>
        </tr>
      <?php } ?>
    </table>
  </body>
</html>
