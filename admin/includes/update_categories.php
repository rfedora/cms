<form action="" method="post">
    <div class="form-group">
        <label for="cat_title">Edit Category</label>
        <?php

        // update category

        if(isset($_GET['edit']))
        {
            $cat_id = $_GET['edit'];

            $query = "SELECT * FROM categories WHERE cat_id = $cat_id";
            $EditCategoriesResult = mysqli_query($connection,$query);

            while($row = mysqli_fetch_assoc($EditCategoriesResult))
            {
                $catID = $row['cat_id'];
                $catTitle = $row['cat_title'];

        ?>

                <input value="<?php if(isset($catTitle)){echo $catTitle;} ?>" type="text" class="form-control" name="cat_title">
        <?php   }} ?>

        <?php

        // update category
        if(isset($_POST['update_category']))
        {
            $update_catTitle = $_POST['cat_title'];

            $query = "UPDATE categories SET cat_title = '$update_catTitle' WHERE cat_id = {$cat_id}";
            $update_query = mysqli_query($connection, $query);

            if(!$update_query)
            {
                die("UPDATE NOT SUCCESSFUL " . mysqli_error($connection));
            }
            unset($_GET['edit']);
            header('Location: categories.php');
        }

        ?>
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_category" value="Update Category">
    </div>

</form>
