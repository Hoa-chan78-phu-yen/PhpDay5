<?php 
session_start(); 
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>

    <?php include_once(__DIR__ . '/../layouts/styles.php'); ?>

    <style>
        body {
            font-family: 'Open Sans', sans-serif;
        }
        img {
            max-width: 100%;
            height: auto;
            object-fit: contain;
        }
        .preview {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .preview-pic {
            max-height: 300px;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .preview-pic img {
            width: 40%;
            height: auto;
            object-fit: scale-down;
        }
        .preview-thumbnail.nav-tabs {
            border: none;
            margin-top: 15px;
        }
        .preview-thumbnail.nav-tabs li {
            width: 18%;
            margin-right: 2.5%;
        }
        .card {
            background: #f8f9fa;
            padding: 2em;
        }
        .product-title, .price, .sizes, .colors {
            text-transform: uppercase;
            font-weight: bold;
        }
        .checked {
            color: #ff9f1a;
        }
        .add-to-cart, .like {
            background: #ff9f1a;
            padding: 1.2em 1.5em;
            border: none;
            text-transform: uppercase;
            font-weight: bold;
            color: #fff;
            transition: background .3s ease;
        }
        .add-to-cart:hover, .like:hover {
            background: #b36800;
        }
        .alert {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <!-- Header -->
    <?php include_once(__DIR__ . '/../layouts/partials/header.php'); ?>

    <main role="main" class="container mt-4">

        <!-- Alert -->
        <div id="alert-container" class="alert alert-warning alert-dismissible fade d-none" role="alert">
            <div id="message">&nbsp;</div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        <!-- PHP xử lý -->
        <?php 
        include_once(__DIR__ . '/../../dbconnect.php');
        $id = intval($_GET['id']);
        $sql = "SELECT id, name, price, description, stock_quantity, image_url, category FROM products WHERE id=$id";
        $result = $conn->query($sql);
        $prod = $result->fetch_array(MYSQLI_NUM);
        $result->free_result();
        $conn->close();
        ?>

        <!-- Card hiển thị sản phẩm -->
        <div class="card">
            <div class="row">
                <div class="col-md-6 preview">
                    <div class="preview-pic">
                        <img src="<?= empty($prod[5]) 
                            ? '/demoshop/assets/shared/img/default-image_600.png' 
                            : '/demoshop/assets/' . $prod[5] ?>" 
                        alt="<?= htmlspecialchars($prod[1]) ?>">
                    </div>
                    <ul class="preview-thumbnail nav nav-tabs">
                        <li class="active">
                            <a data-bs-toggle="tab" href="#pic-1">
                                <img src="<?= empty($prod[5]) 
                                    ? '/demoshop/assets/shared/img/default-image_600.png' 
                                    : '/demoshop/assets/' . $prod[5] ?>" />
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="col-md-6 details">
                    <h3 class="product-title"><?= htmlspecialchars($prod[1]) ?></h3>
                    <div class="rating mb-2">
                        <div class="stars">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        </div>
                        <span class="review-no">999 ratings</span>
                    </div>
                    <p class="product-description"><?= nl2br(htmlspecialchars($prod[3])) ?></p>
                    <h4 class="price">Price: <span><?= number_format($prod[2], 0, ',', '.') ?>₫</span></h4>
                    <h5 class="sizes">sizes:
                        <span class="size" title="Small">s</span>
                        <span class="size" title="Medium">m</span>
                        <span class="size" title="Large">l</span>
                        <span class="size" title="XL">xl</span>
                    </h5>
                    <h5 class="colors">colors:
                        <span class="color orange"></span>
                        <span class="color green"></span>
                        <span class="color blue"></span>
                    </h5>

                    <input type="hidden" id="id" value="<?= $prod[0] ?>">
                    <input type="hidden" id="name" value="<?= htmlspecialchars($prod[1]) ?>">
                    <input type="hidden" id="price" value="<?= $prod[2] ?>">
                    <input type="hidden" id="image" value="<?= $prod[5] ?>">
                    <input type="hidden" id="category" value="<?= $prod[6] ?>">

                    <div class="form-group mb-3">
                        <label for="quantity">Quantity:</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" min="1" value="1">
                    </div>

                    <div class="action">
                        <button class="add-to-cart btn" id="btnAddCart">Add to Cart</button>
                        <a class="like btn btn-outline-secondary" href="#"><span class="fa fa-heart"></span></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mô tả chi tiết -->
        <div class="card mt-4">
            <div class="container-fluid">
                <h3>Product Details</h3>
                <div class="row">
                    <div class="col">
                        <p><?= nl2br(htmlspecialchars($prod[3])) ?></p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <?php include_once(__DIR__ . '/../layouts/partials/footer.php'); ?>
    <?php include_once(__DIR__ . '/../layouts/scripts.php'); ?>

    <script>
        function handleAddCart() {
            var data = {
                id: $('#id').val(),
                name: $('#name').val(),
                price: $('#price').val(),
                image: $('#image').val(),
                category: $('#category').val(),
                quantity: $('#quantity').val()
            };

            $.ajax({
                url: '/demoshop/frontend/api/addCart.php',
                method: "POST",
                dataType: 'json',
                data: data,
                success: function(res) {
                    $('#message').html(`Product added to Cart. <a href="/demoshop/frontend/pages/viewCart.php">View Cart</a>.`);
                    $('.alert').removeClass('d-none').addClass('show');
                },
                error: function() {
                    $('#message').html(`<h5>Cannot process your request</h5>`);
                    $('.alert').removeClass('d-none').addClass('show');
                }
            });
        }

        $('#btnAddCart').click(function(event) {
            event.preventDefault();
            handleAddCart();
        });
    </script>
</body>
</html>
