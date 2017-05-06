<?php

    function insert_categories()
    {
        global $connection;

        if (isset($_POST['submit']))
        {
            $catTitle = $_POST['cat_title'];

            if ($catTitle == "" || empty($catTitle))
            {
                echo "This field should not be empty";
            }
            else
            {
                $query = "INSERT INTO categories(cat_title)";
                $query .= "VALUE('{$catTitle}')";

                $create_category_query = mysqli_query($connection, $query);

                if (!$create_category_query)
                {
                    die('QUERY FAILED ' . mysqli_error($connection));
                }
            }
        }
    }


    function findAllCategories()
    {

        global $connection;

        $query = "SELECT * FROM categories";
        $dbCategoriesResult = mysqli_query($connection,$query);

        while($row = mysqli_fetch_assoc($dbCategoriesResult))
        {
            $catID = $row['cat_id'];
            $catTitle = $row['cat_title'];

            echo "<tr>";
            echo "<td>{$catID}</td>";
            echo "<td>{$catTitle}</td>";
            echo "<td><a href='categories.php?delete={$catID}'>Delete</a></td>";
            echo "<td><a href='categories.php?edit={$catID}'>Edit</a></td>";
            echo "</tr>";
        }
    }


    function deleteCategories()
    {

        global $connection;

        if(isset($_GET['delete']))
        {
            $catIdDEL = $_GET['delete'];

            $query = "DELETE FROM categories WHERE cat_id = {$catIdDEL}";
            $delete_query = mysqli_query($connection, $query);
            header('Location: categories.php');
        }


    }

?>