<?php
    require_once "config.php";
    $statement = $pdo->prepare ("SELECT * FROM todo");
    if ($statement->execute()) {
        $results = $statement->fetchAll(PDO::FETCH_OBJ);
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
            <h2>TODO HOME PAGE</h2>
            <a href="add.php" class="btn btn-primary my-4">Create New</a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($results): ?>
                        <?php foreach($results as $result): ?>
                            <tr>
                                <td><?php echo $result->id; ?></td>
                                <td><?php echo $result->title; ?></td>
                                <td><?php echo $result->description; ?></td>
                                <td><?php echo date('Y-m-d',strtotime($result->created_at)); ?></td>
                                <td>
                                    <a href="edit.php?id=<?php echo $result->id; ?>" class="btn btn-success btn-sm">Edit</a>
                                    <a href="delete.php?id=<?php echo $result->id; ?>" class="btn btn-outline-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>

                </tbody>
            </table>
        </div>
    </div>
</body>
</html>