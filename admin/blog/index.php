```php
<?php

include '../config/db.php';
include '../includes/header.php';
include '../includes/sidebar.php';

$result = mysqli_query(
    $conn,
    "SELECT * FROM blogs ORDER BY id DESC"
);

?>

<div class="main-content">

    <div class="page-header">

        <h2 class="page-title">
            Blog Management
        </h2>

        <a href="create.php" class="add-btn">
            + Add New Blog
        </a>

    </div>

    <?php if(isset($_GET['success'])){ ?>
        <div class="alert alert-success">
            Blog Saved Successfully
        </div>
    <?php } ?>

    <?php if(isset($_GET['deleted'])){ ?>

<div class="alert alert-danger">
    Blog Deleted Successfully
</div>

<?php } ?>

    <div class="blog-card">

        <div style="overflow-x:auto;">

        <table class="blog-table">

            <thead>
                <tr>
                    <th width="100">Image</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th width="180">Action</th>
                </tr>
            </thead>

            <tbody>

            <?php if(mysqli_num_rows($result) > 0){ ?>

                <?php while($row = mysqli_fetch_assoc($result)){ ?>

                <tr>

                    <td>

                    <?php if(!empty($row['featured_image'])){ ?>

                        <img
                        src="../uploads/blogs/<?=
                        $row['featured_image']; ?>"
                        class="table-image">

                    <?php } else { ?>

                        <img
                        src="https://via.placeholder.com/70x70"
                        class="table-image">

                    <?php } ?>

                    </td>

                    <td>

                        <strong>
                            <?= htmlspecialchars($row['title']); ?>
                        </strong>

                        <br>

                        <small style="color:#64748b;">
                            <?= htmlspecialchars($row['slug']); ?>
                        </small>

                    </td>

                    <td>
                        <?= htmlspecialchars($row['author_name']); ?>
                    </td>

                    <td>

                    <?php if($row['status']=='published'){ ?>

                        <span class="status-published">
                            Published
                        </span>

                    <?php } else { ?>

                        <span class="status-draft">
                            Draft
                        </span>

                    <?php } ?>

                    </td>

                    <td>
                        <?= date(
                            'd M Y',
                            strtotime($row['created_at'])
                        ); ?>
                    </td>

                    <td>

                        <a
                        href="edit.php?id=<?=
                        $row['id']; ?>"
                        class="edit-btn">

                        Edit

                        </a>

                        <a
                        href="delete.php?id=<?=
                        $row['id']; ?>"
                        onclick="return confirm('Delete this blog?')"
                        class="delete-btn">

                        Delete

                        </a>

                    </td>

                </tr>

                <?php } ?>

            <?php } else { ?>

                <tr>
                    <td colspan="6" align="center">
                        No Blogs Found
                    </td>
                </tr>

            <?php } ?>

            </tbody>

        </table>

        </div>

    </div>

</div>

<?php include '../includes/footer.php'; ?>
```
