<?php
require_once './asset/connect.php';
$sql = "SELECT * FROM `products`";
$result = mysqli_query($conn, $sql);
?>

<!doctype html>
<html lang="en">

<head>
    <title>User Page</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <style>
        .card-img-top {
            height: 200px;
            /* Adjust the height of the image */
            object-fit: cover;
            /* Ensure the image covers the entire space */
        }
    </style>
</head>

<body class="bg-dark text-light">
    <header class="container bg-danger text-center rounded my-4 py-3">
        <h1 class="fw-bolder">Bienvenue Sur Notre Page</h1>
    </header>
    <main class="container mt-4">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            <?php if (mysqli_num_rows($result) > 0) {
                while ($data = mysqli_fetch_assoc($result)) { ?>
                    <div class="col">
                        <div class="card h-100">
                            <img src="./asset/images/<?php echo $data['image']; ?>" class="card-img-top" alt="produit">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $data['LibPdt']; ?></h5>
                                <p class="card-text"><?php echo $data['description']; ?></p>
                                <a href="#" class="btn btn-primary">Acheter</a>
                            </div>
                        </div>
                    </div>
            <?php }
            } ?>
        </div>
    </main>
    <footer class="container mt-5">
        <a href="./index.php" class="btn btn-danger w-100"><i class="fa-solid fa-right-from-bracket mx-2"></i>Deconnexion</a>
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>