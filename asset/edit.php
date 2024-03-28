<!doctype html>
<html lang="en">

<head>
    <title>Edit Page</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body class="bg-dark text-light">
    <header class="container text-light text-center bg-danger  p-3 mt-4 mb-5 rounded">
        <h1>Modifier Le Produit</h1>
    </header>
    <main class="container">
        <?php
        require './connect.php';
        $idE = $_GET['idE'];
        // $sql = 'SELECT * FROM `products` WHERE  `id`=' . $idE;
        $sql = "SELECT * FROM `products` WHERE `id` = $idE";
        $resultat = mysqli_query($conn, $sql);
        if (mysqli_num_rows($resultat) == 1) {
            while ($data = mysqli_fetch_assoc($resultat)) {
        ?>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="col mb-1">
                        <label for="" class="form-label">Reference:</label>
                        <input type="text" name="ref" class="form-control" value="<?php echo $data['RefPdt']; ?>" required>
                    </div>
                    <div class="col mb-1">
                        <label for="" class="form-label">Libellé:</label>
                        <input type="text" name="libelle" class="form-control" value="<?php echo $data['LibPdt']; ?>" required>
                    </div>
                    <div class="row mb-1">
                        <div class="col">
                            <label for="" class="form-label">Prix:</label>
                            <input type="number" name="prix" class="form-control" value="<?php echo $data['Prix']; ?>" required>
                        </div>
                        <div class="col">
                            <label for="" class="form-label">Quantité:</label>
                            <input type="number" name="qte" class="form-control" value="<?php echo $data['Qte']; ?>" required>
                        </div>
                    </div>
                    <div class="col mb-1">
                        <label for="" class="form-label">Description:</label>
                        <input type="text" name="description" class="form-control" value="<?php echo $data['description']; ?>" required>
                    </div>
                    <div class="row mb-1">
                        <div class="col">
                            <label for="" class="form-label">Type:</label>
                            <select name="type" id="" class="form-select" required>
                                <option value="Electronique">Electronique</option>
                                <option value="Electricite">Electricite</option>
                                <option value="Informatique">Informatique</option>
                            </select>
                        </div>
                        <div class="col ">
                            <label for="" class="form-label">Photo de Produit:</label>
                            <input type="file" name="img" class="form-control" required>
                        </div>
                    </div>
                    <div class="col my-4 ">
                        <button class="btn btn-danger w-50 " name="modifier"><i class="fa-solid fa-plus mx-2"></i>Modifier</button>
                        <a href="../home.php" class="btn btn-danger w-25 "><i class="fa-solid fa-xmark mx-2"></i>Annuler</a>

                    </div>
                </form>
        <?php
            }
        }
        if (isset($_POST['modifier'])) {
            $ref = $_POST['ref'];
            $libelle = $_POST['libelle'];
            $prix = $_POST['prix'];
            $qte = $_POST['qte'];
            $description = $_POST['description'];
            $type = $_POST['type'];
            $img_name = $_FILES["img"]["name"];  // The file name
            $img_tmp = $_FILES["img"]["tmp_name"];
            $img_path = "./images" . $img_name;
            move_uploaded_file($img_tmp, "./images/" . $img_name);
            $sql = "INSERT INTO `products`(`id`, `RefPdt`, `LibPdt`, `Prix`, `Qte`, `description`, `image`, `type`) 
                VALUES (NULL ,'$ref','$libelle','$prix','$qte','$description','$img_name','$type')";

            $sql = "UPDATE `products` 
            SET `id`='$idE',`RefPdt`='$ref',`LibPdt`='$libelle',`Prix`='$prix',`Qte`='$qte',`description`='$description',`image`='$img_name',`type`='$type' 
            WHERE `id` = $idE";
            if (mysqli_query($conn, $sql)) {
                header('Location:../home.php');
                exit();
            } else {
                $e = mysqli_error($conn);
                echo '<div class="alert alert-danger" role="alert">
                    ' . $e . '
                  </div>';
                exit();
            }
        }
        ?>
    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>
