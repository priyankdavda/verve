<?php

include '../config/db.php';

$id = (int)$_GET['id'];

$blog = mysqli_fetch_assoc(
    mysqli_query(
        $conn,
        "SELECT * FROM blogs WHERE id='$id'"
    )
);

if(!empty($blog['image']))
{
    @unlink(
        '../uploads/blogs/' .
        $blog['image']
    );
}

mysqli_query(
    $conn,
    "DELETE FROM blogs WHERE id='$id'"
);

header("Location:index.php");
exit;