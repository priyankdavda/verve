<?php

include '../config/db.php';
include '../includes/header.php';
include '../includes/sidebar.php';

$result = mysqli_query(
    $conn,
    "SELECT * FROM blog_categories
    ORDER BY id DESC"
);

?>

<div class="main-content">

    <div class="page-header">

        <h2 class="page-title">
            Categories
        </h2>

        <a href="create.php" class="add-btn">

            + Add Category

        </a>

    </div>
    <?php if (isset($_GET['success'])) { ?>

        <div class="alert alert-success">
            Category Added Successfully
        </div>

    <?php } ?>

    <?php if (isset($_GET['updated'])) { ?>

        <div class="alert alert-success">
            Category Updated Successfully
        </div>

    <?php } ?>

    <?php if (isset($_GET['deleted'])) { ?>

        <div class="alert alert-danger">
            Category Deleted Successfully
        </div>

    <?php } ?>

    <div class="blog-card">

        <table class="blog-table">

            <thead>

                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>

            </thead>

            <tbody>

                <?php while ($row = mysqli_fetch_assoc($result)) { ?>

                    <tr>

                        <td>
                            <?= $row['id']; ?>
                        </td>

                        <td>
                            <?= $row['name']; ?>
                        </td>

                        <td>
                            <?= $row['slug']; ?>
                        </td>

                        <td>

                            <?php if ($row['status'] == 'active') { ?>

                                <span class="status-published">
                                    Active
                                </span>

                            <?php } else { ?>

                                <span class="status-draft">
                                    Inactive
                                </span>

                            <?php } ?>

                        </td>

                        <td>

                            <a href="edit.php?id=<?=
                                $row['id']; ?>" class="edit-btn">

                                Edit

                            </a>

                            <a href="delete.php?id=<?=
                                $row['id']; ?>" onclick="return confirm('Delete Category?')" class="delete-btn">

                                Delete

                            </a>

                        </td>

                    </tr>

                <?php } ?>

            </tbody>

        </table>

    </div>

</div>

<?php include '../includes/footer.php'; ?>