<?php
include "db_conn.php";
$id = $_GET["id"];

if (isset($_POST["submit"])) {
  $Description = $_POST['Description'];
  $Sizes = $_POST['Sizes'];
  $Price = $_POST['Price'];

  $sql = "UPDATE `shoes` SET `Description`='$Description',`Sizes`='$Sizes',`Price`='$Price' WHERE id = $id";
  $result = mysqli_query($conn, $sql);

  if ($result) {
    header("Location: index.php?msg=Data updated successfully");
  } else {
    echo "Failed: " . mysqli_error($conn);
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <title>Edit Product</title>
</head>

<body>
  <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #ADD8E6;">
    Edit Product
  </nav>

  <div class="container">
    <div class="text-center mb-4">
      <h3>Edit Product</h3>
    </div>

    <?php
    $sql = "SELECT * FROM `shoes` WHERE id = $id LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>

    <div class="container d-flex justify-content-center">
      <form action="" method="post" style="width:50vw; min-width:300px;">
        <div class="row mb-3">
          <div class="col">
            <label class="form-label">Description:</label>
            <input type="text" class="form-control" name="Description" value="<?php echo $row['Description'] ?>">
          </div>

          <div class="col">
            <label class="form-label">Sizes:</label>
            <input type="text" class="form-control" name="Sizes" value="<?php echo $row['Sizes'] ?>">
          </div>
        </div>

        <div class="mb-3">
          <label class="form-label">Price:</label>
          <input type="text" class="form-control" name="Price" value="<?php echo $row['Price'] ?>">
        </div>

        <div>
          <button type="submit" class="btn btn-success" name="submit">Save</button>
          <a href="index.php" class="btn btn-danger">Cancel</a>
        </div>
      </form>
    </div>
  </div>

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>