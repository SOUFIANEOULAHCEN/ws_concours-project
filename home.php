<?php
require_once './asset/connect.php';
?>
<!doctype html>
<html lang="en">

<head>
    <title>Liste_Produits</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="bg-dark text-light">
    <header class="container text-light text-center bg-danger  p-3 mt-4 mb-5 rounded">
        <h1>Liste des produits</h1>
    </header>
    <main class="container">
        <a href="./asset/addP.php" class="btn btn-danger w-25 my-2"><i class="fa-solid fa-plus mx-3"></i>Ajouter Produit</a>
        <!-- <table class="table  table-striped table-hover"> -->
        <table class="table table-dark table-striped text-center">
            <thead>
                <tr>
                    <th>reference</th>
                    <th>libellé</th>
                    <th>Prix</th>
                    <th>Quantité</th>
                    <th>Description</th>
                    <th>Type</th>
                    <th>Photo produit</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $requette = "SELECT * FROM `products`";
                $result = mysqli_query($conn, $requette);
                if (mysqli_num_rows($result) > 0) {
                    while ($data = mysqli_fetch_assoc($result)) {
                ?>
                        <tr>
                            <!-- $sql = "INSERT INTO products (id, RefPdt, LibPdt, Prix, Qte, description, image, type) -->
                            <td><?php echo $data['RefPdt']; ?></td>
                            <td><?php echo $data['LibPdt']; ?></td>
                            <td><?php echo $data['Prix'] . ' DH'; ?></td>
                            <td><?php echo $data['Qte']; ?></td>
                            <td><?php echo $data['description']; ?></td>
                            <td><?php echo $data['type']; ?></td>
                            <td><img src="./asset//images/<?php echo $data['image']; ?>" width="40px" alt=""></td>
                            <td>
                                <a class="btn btn-dark" href="./detail.php?id=<?php echo $data["id"]; ?>"> <i class="fa-solid fa-eye mx-1"></i></a>
                                <a class="btn btn-dark" href="./asset/delete.php?idD=<?php echo $data["id"]; ?>"> <i class="mx-1 fa-solid fa-square-xmark"></i></a>
                                <a class="btn btn-dark" href="./asset/edit.php?idE=<?php echo $data["id"]; ?>"> <i class="mx-1 fa-solid fa-rotate-right"></i></a>
                                <!-- <button class="btn btn-dark"><i class="mx-1 fa-solid fa-rotate-right"></i></button> -->
                            </td>
                        </tr>
                <?php
                    }
                }
                mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </main>
    <footer class="container mt-5">
        <a href="./index.php" class="btn btn-danger w-100"><i class="fa-solid fa-right-from-bracket mx-2"></i>Deconnexion</a>
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>