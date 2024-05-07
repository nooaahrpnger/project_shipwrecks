<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cart</title>
  <link rel="stylesheet" href="styles/checkout.css">
  <style>
    button.qty-btn 
    {
      padding: 1rem;
      border: none;
 
    }
    img.cart-item-image 
    {
      width: 100px;
      height: auto;
    }
    form 
    {
      display: flex;
      gap: 10px;
    }

    #save-button:hover, button[type="submit"]:hover 
    {
      background-color: #444;
    }

    #save-button:focus, button[type="submit"]:focus 
    {
      outline: none;
      box-shadow: none;
    }

    #save-button, .save-button
    {
        background-color: #333333;
        color: #ffffff;
        border: none;
        padding: 12px 24px;
        font-size: 16px;
        cursor: pointer;
        border-radius: 5px;
        font-weight: bold;
    }
    button.qty-btn 
    {
        padding: 1rem;
        border: none;
        background: none;
        outline: none;
        cursor: pointer;
    }

  </style>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      document.querySelectorAll('.qty-btn').forEach(function(button) {
        button.addEventListener('click', function(event) {
          var btn = event.currentTarget;
          var productId = btn.getAttribute('data-product-id');
          var action = btn.getAttribute('data-action');
          var qtySpan = btn.parentNode.querySelector('.qty');
          var currentQty = parseInt(qtySpan.textContent);

          if (action === 'plus') {
            qtySpan.textContent = currentQty + 1;
          } else if (action === 'minus' && currentQty > 1) {
            qtySpan.textContent = currentQty - 1;
          }

          var xhr = new XMLHttpRequest();
          xhr.open('POST', 'Backend/updateCart.php', true);
          xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
          xhr.send('productId=' + productId + '&quantity=' + qtySpan.textContent);

          xhr.onload = function() {
            if (xhr.status === 200) {
              console.log('Warenkorb aktualisiert');
            } else {
              console.error('Fehler bei der Aktualisierung');
            }
          };
        });
      });

      document.getElementById('save-button').addEventListener('click', function() {
        location.reload();
      });
    });
  </script>
</head>
<body>
<?php
    require_once "db_credentials.php";
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PW, DB_NAME);
    if (!$dbc) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

    echo '<div class="checkout-page">';
    echo '<h1>Cart</h1>';
    if (!empty($cart)) {
        echo '<ul>';
        foreach ($cart as $productId => $quantity) {
            $query = "SELECT dtItemName, dtImage FROM shipwrecks_Items WHERE idItem = ?";
            $stmt = mysqli_prepare($dbc, $query);
            mysqli_stmt_bind_param($stmt, "i", $productId);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if ($result && mysqli_num_rows($result) > 0) {
                $item = mysqli_fetch_assoc($result);
                echo '<li>';
                echo '<img src="images/' . $item['dtImage'] . '" alt="' . $item['dtItemName'] . '" class="cart-item-image">';
                echo '<p>Item: ' . $item['dtItemName'] . '</p>';
                echo '<p>Quantity: ';
                echo '<button type="button" class="qty-btn" data-product-id="'.$productId.'" data-action="minus"><i class="fa-solid fa-minus"></i></button>';
                echo '<span class="qty">'.$quantity.'</span>';
                echo '<button type="button" class="qty-btn" data-product-id="'.$productId.'" data-action="plus"><i class="fa-solid fa-plus"></i></button>';
                echo '</p>';
                echo '</li>';
            }
        }
        echo '</ul>';
        echo '<form action="Backend/orderProcess.php" method="POST">';
        echo '<button type="submit" class="save-button">Purchase</button>';
        echo '<button id="save-button" type="button">Save</button>';
        echo '</form>';
    } else {
        echo '<p class="empty-cart">Your cart is empty.</p>';
    }
    echo '</div>';
    mysqli_close($dbc);
?>
</body>
</html>
