<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basic PHP CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-2">
                <div class="card mt-5">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card-title fs-3">Post's Lists</div>
                            </div>
                            <div class="col-md-6 mt-2">
                                <a href="post-create.php" class="btn btn-dark float-end">+ Add New</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    include './connect.php';
                                    $query = 'SELECT * FROM posts';
                                    $posts = mysqli_query($db, $query);
                                    
                                    foreach($posts as $post){
                                ?>
                                    <tr>
                                    <td><?= $post['id']?></td>
                                    <td><?= $post['title']?></td>
                                    <td><?= $post['description']?></td>
                                    <td>
                                        <a href="">Edit</a> |
                                        <a href="">Delete</a>
                                    </td>
                                    </tr>
                                <?php
                                }
                                ?>
                                
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</html>