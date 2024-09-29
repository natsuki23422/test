<?php
    session_start();
    require "../classes/user.php";

    $user = new User;
    $all_users = $user->getAllUsers();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
        
    <div class="container w-50 mt-5">
        <h2 class="text-center text-uppercase">User List</h2>

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead>
                    <th><!-- for the photo --></th>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Username</th>
                    <th><!-- For the action buttons --></th>
                </thead>
                <tbody>
                    <?php
                        while($user = $all_users->fetch_assoc()){
                    ?>   
                        <tr>
                            <td>
                                <?php 
                                    if($user['photo']){
                                ?>
                                    <img src="../assets/images/<?= $user['photo']?>" alt="<?= $user['photo']?>" class="d-block mx-auto dashboard-photo">
                                <?php
                                    }else{
                                ?>
                                    <i class="fa-solid fa-user d-block mx-auto dashboard-icon"></i>
                                <?php
                                    }
                                ?>
                            </td>
                            <td><?= $user['id']?></td>
                            <td><?= $user['first_name']?></td>
                            <td><?= $user['last_name']?></td>
                            <td><?= $user['username']?></td>
                            <td>
                                <?php
                                if($_SESSION['id'] == $user['id']){
                                ?>
                                    <!-- localhost/the-company/edit-user?id=1 -->
                                    <a href="edit-user.php" class="btn btn-outline-warning" title="edit"><i class="fa-solid fa-square-pen"></i></a>
                                    <a href="delete-user.php" class="btn btn-outline-danger" title="Delete"><i class="fa-solid fa-trash-can"></i></a>
                                <?php
                                }
                                ?>
                            </td>
                        </tr>   
                    <?php        
                        }
                    ?>
                </tbody>
            </table>
        </div>


    </div>
</body>
</html>