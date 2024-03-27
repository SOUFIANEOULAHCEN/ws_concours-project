<?php
require_once './asset/connect.php';

$id = $_GET['id'];
$sql = "SELECT * FROM products WHERE id = " . $id;
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);
?>
<!doctype html>
<html lang="en">

<head>
    <title>details</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body class="bg-dark text-light">
    <header>
        <!-- place navbar here -->
    </header>
    <main class="container">
        <h1 class="text-center bg-danger px-5 py-3 mt-3">Information Sur Le produit : <?php echo $data['RefPdt']; ?></h1>
        <div class="row">
            <div class="col-1"></div>
            <div class="col-5 my-5">
                <img src="./asset/images/<?php echo $data['image'] ?>" class="rounded" width="350px" alt="">
            </div>
            <div class="col-4 my-5  text-center d-flex align-items-center justify-content-center flex-column">
                <table class="table table-dark" >
                    <tr class="">
                        <td>Reference produit :</td>
                        <td><?php echo $data['RefPdt']; ?></td>
                    </tr>
                    <tr>
                        <td>Libellé produit:</td>
                        <td><?php echo $data['LibPdt']; ?></td>
                    </tr>
                    <tr>
                        <td>Prix produit:</td>
                        <td><?php echo $data['Prix']; ?></td>
                    </tr>
                    <tr>
                        <td>Quantité produit :</td>
                        <td><?php echo $data['Qte']; ?></td>
                    </tr>
                    <tr>
                        <td>Description produit:</td>
                        <td><?php echo $data['description']; ?></td>
                    </tr>
                    <tr>
                        <td>Type produit:</td>
                        <td><?php echo $data['type']; ?></td>
                    </tr>
                </table>
            </div>
            <form action="" method="post">
                <button class="btn btn-danger w-100" name="retour"><i class="fa-solid fa-turn-down mx-2"></i>Retour</button>
                <?php
                if (isset($_POST['retour'])) {
                    header('Location: ./home.php');
                }
                ?>
            </form>
        </div>
    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>