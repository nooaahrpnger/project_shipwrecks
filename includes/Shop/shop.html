<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/jquery-3.7.1.js"></script>
    <link rel="stylesheet" href="styles/shop.css">
    <title>Document</title>
</head>
<body>
    <h1>Shop</h1>
    <div id="productContainer"></div>

    <!-- produkte aufteilen oder mit filter arbeiten -->

    <script>
        // AZeigen der Produkte
        $(document).ready(function(){
            $.ajax({
                url: 'includes/Shop/shop.php',
                type: 'GET',
                dataType: 'json',
                success: function(data){
                    var productContainer = $('#productContainer');
                    var productsInRow = 0;
                    $.each(data, function(index, product){
                        // Neue Zeile starten, wenn vier Produkte in der aktuellen Reihe sind
                        if (productsInRow === 4) {
                            productContainer.append('<div style="clear:both;"></div>'); // Neue Zeile
                            productsInRow = 0; // Zurücksetzen für neue Reihe
                        }
                        var productHTML = '<div class="product">';
                        productHTML += '<a href="product_details.php?id=' + product.idItem + '">';
                        productHTML += '<img src="includes/Shop/images/' + product.dtImage + '" alt="' + product.dtItemName + '" style="width:100%;">';
                        productHTML += '</a><br>';
                        productHTML += product.dtItemName + '<br>';
                        productHTML += '$' + product.dtPrice;
                        productHTML += '</div>';
                        productContainer.append(productHTML);
                        productsInRow++; // Produkt in aktueller Reihe erhöhen
                    });
                },
                error: function(xhr, status, error){
                    console.error(xhr.responseText);
                }
            });
        });
    </script>
    
</body>
</html>