<?php

session_start();

if (!isset($_SESSION["user"])) {
   header("Location: login.php");
   exit();
}

require_once "database.php";

if (isset($_POST['delete'])) {
    $id = $_POST['delete'];
    $sql = "DELETE FROM users WHERE id = '$id'";
    mysqli_query($conn, $sql);
}

$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);

$table_html = "<table>
                    <tr >
                        <th >ID.</th>
                        <th>Name.</th>
                        <th>Email.</th>
                        <th>Password</th>
                        <th>Action</th>
                    </tr>";

while ($row = mysqli_fetch_assoc($result)) {
    $id = $row['id'];
    $full_name = $row['full_name'];
    $email = $row['email'];
    $password = $row['password'];
    $table_html .= "<tr >
                        <td>$id</td>
                        <td>$full_name</td>
                        <td>$email</td>
                        <td>$password</td>
                        <td>
                            <form method='post'>
                                <button type='submit' class='btn btn-danger' name='delete' value='$id'>Delete</button>
                            </form>
                        </td>
                    </tr>";
}

$table_html .= "</table>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Table</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    
</head>
<body style="background-image: url('https://media.istockphoto.com/id/1363217414/video/grey-white-smooth-glossy-wavy-abstract-motion-background.jpg?s=640x640&k=20&c=6CyVEyKGS3gjZebE9RocaWRcAG7v17KsDr4PrZKKsWU=');  background-size: cover;">
    <h2>Admin Table</h2>

    <div class="container">
        <?php echo $table_html; ?>
    </div>

    <p8 style="
       position: fixed;
       bottom: 0;
       right: 0;
       margin: 10px"
    }><b><a href="#">Privacy | policy |Copyright©️ 2023</a></p8>
</body>
</html>
