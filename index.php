<?php
require_once './asset/connect.php';


//  else {
//             header('location:./signup.php');
//             exit;
//         }
//     }
// }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./asset/style.css">
    <style>

    </style>
    <title>login</title>
</head>

<body class="bg-dark">
    <div class="container">
        <h1>login page</h1>
        <div class="inputs">
            <form action="" method="post">
                <label for="username">Utilisateur: </label><br>
                <input type="text" name="username" id="username" placeholder="enter your username" required><br>
                <label for="password">Mot de passe: </label><br>
                <input type="password" name="password" id="password" placeholder="enter your password" required><br>
                <input type="submit" value="Login" name="login" id="login"><a href="./signup.php">inscrire </a><br>
            </form>
            <?php
            if (!empty($_POST['username']) && !empty($_POST['password'])) {

                if (isset($_POST['login'])) {
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    if ($password == "admin") {
                        $sql = "SELECT * FROM login WHERE login='" . $username . "' AND password='" . $password . "' AND type='administrateur'";
                    } else {
                        $sql = "SELECT * FROM login WHERE login='" . $username . "' AND password='" . $password . "' AND type='user'";
                    }
                    //check username and password in database
                    // $sql = "SELECT * FROM login WHERE login='" . $username . "' AND password='" . $password . "'";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) == 1) {
                        $data = mysqli_fetch_assoc($result);
                        if ($data['type'] == 'administrateur') {
                            header('location:home.php');
                            exit;
                        } elseif ($data['type'] == 'user') {
                            header('Location:UserPage.php');
                            exit;
                        }
                    } else {
            ?>
            <?php
                        // header('location:./signup.php');
                        // exit;
                        echo "Vous n'avez pas de compte. Veuillez vous inscrire d'abord.";
                    }
                }
            }
            ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

</body>

</html>