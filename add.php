<?php
    require_once 'config.php';
    if ($_POST) {
        $title = $_POST['title'];
        $desc = $_POST['description'];
        $statement = $pdo->prepare("
        INSERT INTO todo (title, description) VALUES
        (:title, :description)
        ");
        $statement->bindParam(":title", $_POST['title']);
        $statement->bindParam(":description", $_POST['description']);
        if($statement->execute()) {
            header("location:index.php");
        } 
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
    <div class="card">
        <div class="card-body">
            <h2>Create New ToDo</h2>
            <form action="add.php" method="POST">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    <textarea name="description" cols="30" rows="8" class="form-control"></textarea>
                </div>
                <div class="form-group mt-4">
                    <input type="submit" class="btn btn-info" name="" value="Submit">
                    <a href="index.php" class="btn btn-danger">Back</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>