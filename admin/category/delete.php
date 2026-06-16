
<?php

include '../config/db.php';

$id = (int)$_GET['id'];

mysqli_query(
    $conn,
    "DELETE FROM blog_categories WHERE id='$id'"
);

header("Location:index.php?deleted=1");
exit;
