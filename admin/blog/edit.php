```php
<?php

include '../config/db.php';

$id = (int) $_GET['id'];

$result = mysqli_query(
    $conn,
    "SELECT * FROM blogs WHERE id='$id'"
);

$blog = mysqli_fetch_assoc($result);

if (!$blog) {
    die("Blog not found");
}

if (isset($_POST['update'])) {
    $title = mysqli_real_escape_string(
        $conn,
        $_POST['title']
    );

    $slug = mysqli_real_escape_string(
        $conn,
        $_POST['slug']
    );

    $category_id = (int) $_POST['category_id'];

    $author_name = mysqli_real_escape_string(
        $conn,
        $_POST['author_name']
    );

    $short_description = mysqli_real_escape_string(
        $conn,
        $_POST['short_description']
    );

    $description = mysqli_real_escape_string(
        $conn,
        $_POST['description']
    );

    $status = $_POST['status'];

    $featured_image = $blog['featured_image'];

    if (!empty($_FILES['featured_image']['name'])) {
        $uploadDir = '../uploads/blogs/';

        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        if (!empty($blog['featured_image'])) {
            $oldFile =
                $uploadDir . $blog['featured_image'];

            if (file_exists($oldFile)) {
                unlink($oldFile);
            }
        }

        $featured_image =
            time() . '_' . $_FILES['featured_image']['name'];

        move_uploaded_file(
            $_FILES['featured_image']['tmp_name'],
            $uploadDir . $featured_image
        );
    }

    $update = mysqli_query(
        $conn,
        "UPDATE blogs SET

        category_id='$category_id',
        title='$title',
        slug='$slug',
        short_description='$short_description',
        description='$description',
        featured_image='$featured_image',
        author_name='$author_name',
        status='$status'

        WHERE id='$id'"
    );

    if ($update) {
        header("Location:index.php?success=2");
        exit;
    } else {
        echo mysqli_error($conn);
    }
}

include '../includes/header.php';
include '../includes/sidebar.php';
$categories = mysqli_query(
    $conn,
    "SELECT * FROM blog_categories
     WHERE status='active'
     ORDER BY name ASC"
);
?>

<div class="main-content">

    <div class="page-header">
        <h2 class="page-title">
            Edit Blog
        </h2>
    </div>

    <form method="POST" enctype="multipart/form-data">

        <div class="row">

            <div class="col-lg-8">

                <div class="blog-card">

                    <h5>Blog Content</h5>

                    <div class="mb-3">

                        <label class="form-label">
                            Blog Title
                        </label>

                        <input type="text" id="title" name="title" class="form-control"
                            value="<?= htmlspecialchars($blog['title']); ?>" required>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            Slug
                        </label>

                        <input type="text" id="slug" name="slug" class="form-control"
                            value="<?= htmlspecialchars($blog['slug']); ?>">

                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            Short Description
                        </label>

                        <textarea name="short_description"
                            class="form-control"><?= htmlspecialchars($blog['short_description']); ?></textarea>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            Description
                        </label>

                        <textarea id="description"
                            name="description"><?= htmlspecialchars($blog['description']); ?></textarea>

                    </div>

                </div>

            </div>

            <div class="col-lg-4">

                <div class="blog-card">

                    <h5>Publish Settings</h5>

                    <div class="mb-3">

                        <label class="form-label">
                            Status
                        </label>

                        <select name="status" class="form-select">

                            <option value="published" <?= ($blog['status'] == 'published') ? 'selected' : ''; ?>>
                                Published
                            </option>

                            <option value="draft" <?= ($blog['status'] == 'draft') ? 'selected' : ''; ?>>
                                Draft
                            </option>

                        </select>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            Category
                        </label>

                        <select name="category_id" class="form-select">

                            <option value="1" <?= ($blog['category_id'] == 1) ? 'selected' : ''; ?>>
                                Technology
                            </option>

                            <option value="2" <?= ($blog['category_id'] == 2) ? 'selected' : ''; ?>>
                                Business
                            </option>

                        </select>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            Author
                        </label>

                        <input type="text" name="author_name" class="form-control"
                            value="<?= htmlspecialchars($blog['author_name']); ?>">

                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            Current Image
                        </label>

                        <?php if (!empty($blog['featured_image'])) { ?>

                            <img src="../uploads/blogs/<?= $blog['featured_image']; ?>" class="preview-image"
                                style="display:block;">

                        <?php } ?>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            Replace Image
                        </label>

                        <input type="file" name="featured_image" class="form-control" onchange="previewImage(event)">

                    </div>

                    <button type="submit" name="update" class="save-btn">

                        Update Blog

                    </button>

                </div>

            </div>

        </div>

    </form>

</div>

<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>

<script>
    CKEDITOR.replace('description', {
        height: 350
    });

    document.getElementById('title')
        .addEventListener('keyup', function () {

            let slug = this.value
                .toLowerCase()
                .replace(/[^a-z0-9]+/g, '-')
                .replace(/^-|-$/g, '');

            document.getElementById('slug').value = slug;

        });

    function previewImage(event) {

        let reader = new FileReader();

        reader.onload = function () {

            let output =
                document.querySelector('.preview-image');

            output.src = reader.result;
            output.style.display = 'block';

        }

        reader.readAsDataURL(
            event.target.files[0]
        );

    }
</script>

<?php include '../includes/footer.php'; ?>
```