<?php session_start(); ?>
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
    if (isset($_GET['postID'])) {
        $post_id_to_update = $_GET['postID'];
        $post = mysqli_query($db, "SELECT * FROM posts WHERE id=$post_id_to_update");
        if (mysqli_num_rows($post) == 1) {
            foreach ($post as $item) {
                $title = $item['title'];
                $titleID = $item['id'];
                $desc = $item['description'];
            }
        }
    }

    $titleError = '';
    $descError = '';
    if (isset($_POST['update_post_button'])) {
        $postID = $_POST['post_id'];
        $title = $_POST['title'];
        $desc = $_POST['description'];

        if (empty($title)) {
            $titleError = 'This title field is required';
        }
        if (empty($desc)) {
            $descError = 'This description field is required';
        }

        if (!empty($title) && !empty($desc)) {
            $query = "UPDATE posts SET title='$title', description='$desc' WHERE id=$postID";
            mysqli_query($db, $query);
            $_SESSION['successMsg'] = 'A post updated successfully';
            header('location:index.php');
        }
    }




    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-2">
                <div class="card mt-5">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card-title fs-3">Posts Editon Form</div>
                            </div>
                            <div class="col-md-6 mt-2">
                                <a href="index.php" class="btn btn-dark float-end">
                                    << Back</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="post-edit.php" method="POST">
                            <input type="text" name="post_id" value="<?php if (!empty($titleID)) : ?> <?= $titleID ?><?php endif ?>">
                            <div class="form-group">
                                <div class="mb-3">
                                    <label for="">Title</label>
                                    <input type="text" name="title" class="form-control <?php if ($titleError != '') : ?> is-invalid<?php endif ?>" placeholder="Enter post title" value="<?php if (!empty($title)) : ?> <?= $title ?><?php endif ?>">
                                    <span class="text-danger"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="mb-3">
                                    <label for="">Description</label>
                                    <textarea name="description" cols="30" rows="5" class="form-control <?php if ($descError != '') : ?> is-invalid<?php endif ?>" placeholder="Enter description..."><?php if (!empty($desc)) : ?> <?= $desc ?><?php endif ?></textarea>
                                    <span class="text-danger"></span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <input type="submit" class="btn btn-dark float-end" name="update_post_button" value="Update"></input>
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