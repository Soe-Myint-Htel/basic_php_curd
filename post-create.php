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
    <?php

    include './connect.php';

    if (isset($_POST['create_post_button'])) {
        $title = $_POST['title'];
        $desc = $_POST['description'];

        $query = "INSERT INTO posts(title,description) VALUES ('$title', '$desc')";
        mysqli_query($db, $query);

    }

    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-2">
                <div class="card mt-5">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card-title fs-3">Create Posts Form</div>
                            </div>
                            <div class="col-md-6 mt-2">
                                <a href="index.php" class="btn btn-dark float-end">
                                    << Back</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="post-create.php" method="POST">
                            <div class="mb-3">
                                <label for="">Title</label>
                                <input type="text" name="title" class="form-control" placeholder="Enter post title">
                            </div>
                            <div class="mb-3">
                                <label for="">Description</label>
                                <textarea name="description" cols="30" rows="5" class="form-control"></textarea>
                            </div>
                            <div class="mb-3">
                                <input type="submit" class="btn btn-dark float-end" name="create_post_button"></input>
                            </div>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</html>