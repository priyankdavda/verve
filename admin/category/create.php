```php id="qzc5ci"
<?php

include '../config/db.php';

if(isset($_POST['save']))
{
    $name = mysqli_real_escape_string(
        $conn,
        $_POST['name']
    );

    $slug = strtolower(
        preg_replace('/[^A-Za-z0-9]+/', '-', $name)
    );

    $status = $_POST['status'];

    $insert = mysqli_query(
        $conn,
        "INSERT INTO blog_categories
        (
            name,
            slug,
            status
        )
        VALUES
        (
            '$name',
            '$slug',
            '$status'
        )"
    );

    if($insert)
    {
        header("Location:index.php?success=1");
        exit;
    }
}

include '../includes/header.php';
include '../includes/sidebar.php';

?>

<div class="main-content">

    <div class="page-header">

        <h2 class="page-title">
            Add Category
        </h2>

    </div>

    <form method="POST">

        <div class="row">

            <div class="col-lg-8">

                <div class="blog-card">

                    <h5>
                        Category Information
                    </h5>

                    <div class="mb-3">

                        <label class="form-label">
                            Category Name
                        </label>

                        <input
                        type="text"
                        id="name"
                        name="name"
                        class="form-control"
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
                        readonly>

                    </div>

                </div>

            </div>

            <div class="col-lg-4">

                <div class="blog-card">

                    <h5>
                        Settings
                    </h5>

                    <div class="mb-3">

                        <label class="form-label">
                            Status
                        </label>

                        <select
                        name="status"
                        class="form-select">

                            <option value="active">
                                Active
                            </option>

                            <option value="inactive">
                                Inactive
                            </option>

                        </select>

                    </div>

                    <button
                    type="submit"
                    name="save"
                    class="save-btn">

                        Save Category

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
```
