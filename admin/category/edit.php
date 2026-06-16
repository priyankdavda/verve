<?php

include '../config/db.php';

$id = (int)$_GET['id'];

$result = mysqli_query(
    $conn,
    "SELECT * FROM blog_categories WHERE id='$id'"
);

$category = mysqli_fetch_assoc($result);

if(!$category){
    die("Category not found");
}

if(isset($_POST['update']))
{
    $name = mysqli_real_escape_string(
        $conn,
        $_POST['name']
    );

    $slug = strtolower(
        preg_replace('/[^A-Za-z0-9]+/', '-', $name)
    );

    $status = $_POST['status'];

    $update = mysqli_query(
        $conn,
        "UPDATE blog_categories SET

        name='$name',
        slug='$slug',
        status='$status'

        WHERE id='$id'"
    );

    if($update){
        header("Location:index.php?updated=1");
        exit;
    }
}

include '../includes/header.php';
include '../includes/sidebar.php';
?>

<div class="main-content">

    <div class="page-header">
        <h2 class="page-title">
            Edit Category
        </h2>
    </div>

    <form method="POST">

        <div class="row">

            <div class="col-lg-8">

                <div class="blog-card">

                    <h5>Category Information</h5>

                    <div class="mb-3">

                        <label class="form-label">
                            Category Name
                        </label>

                        <input
                        type="text"
                        id="name"
                        name="name"
                        class="form-control"
                        value="<?= htmlspecialchars($category['name']); ?>"
                        required>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            Slug
                        </label>

                        <input
                        type="text"
                        id="slug"
                        class="form-control"
                        value="<?= htmlspecialchars($category['slug']); ?>"
                        readonly>

                    </div>

                </div>

            </div>

            <div class="col-lg-4">

                <div class="blog-card">

                    <h5>Settings</h5>

                    <div class="mb-3">

                        <label class="form-label">
                            Status
                        </label>

                        <select
                        name="status"
                        class="form-select">

                            <option value="active"
                            <?= ($category['status']=='active')?'selected':''; ?>>
                                Active
                            </option>

                            <option value="inactive"
                            <?= ($category['status']=='inactive')?'selected':''; ?>>
                                Inactive
                            </option>

                        </select>

                    </div>

                    <button
                    type="submit"
                    name="update"
                    class="save-btn">

                        Update Category

                    </button>

                </div>

            </div>

        </div>

    </form>

</div>

<script>
document.getElementById('name')
.addEventListener('keyup',function(){

let slug=this.value
.toLowerCase()
.replace(/[^a-z0-9]+/g,'-')
.replace(/^-|-$/g,'');

document.getElementById('slug').value=slug;

});
</script>

<?php include '../includes/footer.php'; ?>

