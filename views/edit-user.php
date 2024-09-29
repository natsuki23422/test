<?php
    session_start();
    require "../classes/user.php";

    // $id = $_GET['id'];
    $userRecord = new User;
    $user = $userRecord->getUser();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
<nav class="navbar navbar-expand navbar-dark bg-dark" style="margin-bottom: 80px;">
        <div class="container">
            <a href="dashboard.php" class="navbar-brand">
                <h1 class="h3">The Company</h1>
            </a>
            <div class="navbar-nav">
                <span class="navbar-text"><?= $_SESSION['full_name'] ?></span>
                <form action="../actions/logout.php" method="post" class="d-flex ms-2">
                    <button type="submit" class="text-danger bg-transparent border-0">Log out</button>
                </form>
            </div>
        </div>
    </nav>
   <div class="container w-25 mt-5">
    <h2 class="text-center mb-4 text-uppercase">Edit User</h2>

    <form action="../actions/edit-user.php" method="post">
        <div class="mb-2">
            <?php
                if($user['photo']){
            ?>
                <img src="../assets/images/<?= $user['photo']?>" alt="<?= $user['photo']?>" class="d-block mx-auto edit-photo">
            <?php
                }else{
            ?>
                <i class="fa-solid fa-user d-block mx-auto edit-icon"></i>

            <?php        
                }
            ?>

            <input type="file" name="photo" class="form-control mt-2" accept="image/*"> </input>
        </div>
        <div class="mb-3">
            <label for="first_name" class="form-label">First Name</label>
            <input type="text" id="first-name" name="first_name" class="form-control" value="<?= $user['first_name']?>" required autofocus>
        </div>
        <div class="mb-3">
            <label for="last_name" class="form-label">Last Name</label>
            <input type="text" name="last_name" id="last-name" class="form-control" value="<?= $user['last_name']?>" required>
        </div>
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" name="username" id="username" class="form-control" value="<?= $user['username']?>" required>
        </div>
        <div class="mb-3 text-end">
            <a href="dashboard.php" class="btn btn-secondary btn-sm">Cancel</a>
            <button type="submit" class="btn btn-warning btn-sm px-4">Save</button>
        </div>
    </form>
   </div> 
</body>
</html>