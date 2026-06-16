<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../config/db.php';


if (isset($_POST['save'])) {

    $title = mysqli_real_escape_string(
        $conn,
        $_POST['title']
    );

    $slug = strtolower(
        preg_replace('/[^A-Za-z0-9]+/', '-', $title)
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
    $blog_date = $_POST['blog_date'];

    $featured_image = '';

    if (!empty($_FILES['featured_image']['name'])) {

        $featured_image =
            time() . '_' . basename(
                $_FILES['featured_image']['name']
            );

        move_uploaded_file(
            $_FILES['featured_image']['tmp_name'],
            '../uploads/blogs/' . $featured_image
        );
    }

$sql = "INSERT INTO blogs
(
    category_id,
    title,
    slug,
    short_description,
    description,
    featured_image,
    author_name,
    blog_date,
    status
)
VALUES
(
    '$category_id',
    '$title',
    '$slug',
    '$short_description',
    '$description',
    '$featured_image',
    '$author_name',
    '$blog_date',
    '$status'
)";


    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location:index.php?success=1");
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
            Add New Blog
        </h2>
    </div>

    <form method="POST" enctype="multipart/form-data">

        <div class="row">

            <!-- Left Side -->

            <div class="col-lg-8">

                <div class="blog-card">

                    <h5>Blog Content</h5>

                    <div class="mb-3">
                        <label class="form-label">
                            Blog Title
                        </label>

                        <input type="text" class="form-control" id="title" name="title">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">
                            Slug
                        </label>

                       <input
type="text"
class="form-control"
id="slug"
name="slug"
readonly>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">
                            Short Description
                        </label>

                        <textarea name="short_description" class="form-control"></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">
                            Blog Description
                        </label>

                        <textarea id="description" name="description"></textarea>
                    </div>

                </div>

            </div>

            <!-- Right Side -->

            <div class="col-lg-4">

                <div class="blog-card">

                    <h5>Publish Settings</h5>

                    <div class="mb-3">
                        <label class="form-label">
                            Status
                        </label>

                        <select name="status" class="form-select">

                            <option value="published">
                                Published
                            </option>

                            <option value="draft">
                                Draft
                            </option>

                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Category</label>

                        <select name="category_id" class="form-select">
                            <option value="">
                                Select Category
                            </option>

                            <?php while ($cat = mysqli_fetch_assoc($categories)) { ?>

                                <option value="<?= $cat['id']; ?>">

                                    <?= htmlspecialchars($cat['name']); ?>

                                </option>

                            <?php } ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">
                            Author
                        </label>

                        <input type="text" name="author_name" class="form-control">
                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            Featured Image
                        </label>

                        <input type="file" name="featured_image" class="form-control" onchange="previewImage(event)">

                        <img id="preview" class="preview-image">

                    </div>
                    <div class="mb-3">

                        <label class="form-label">
                            Blog Date
                        </label>

                        <input type="date" name="blog_date" class="form-control" value="<?= date('Y-m-d'); ?>">

                    </div>

                    <button type="submit" name="save" class="btn btn-primary">

                        Save Blog

                    </button>

                </div>

            </div>

        </div>

    </form>

</div>

<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>

<script>
    CKEDITOR.replace('description');
</script>
<script>
document.getElementById('title').addEventListener('keyup', function(){

    let slug = this.value
        .toLowerCase()
        .replace(/[^a-z0-9]+/g,'-')
        .replace(/^-|-$/g,'');

    document.getElementById('slug').value = slug;
});
</script>

<script>
    function previewImage(event) {

        let reader = new FileReader();

        reader.onload = function () {

            let output =
                document.getElementById('preview');

            output.src = reader.result;
            output.style.display = 'block';

        }

        reader.readAsDataURL(
            event.target.files[0]
        );

    }
</script>

</body>

</html>