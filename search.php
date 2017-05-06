<!-- Database Connection -->
<?php include "includes/db.php"; ?>
<!-- Header -->
<?php include "includes/header.php"; ?>

<!-- Navigation -->
<?php include "includes/navigation.php"; ?>


    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                
        
<?php
  
    if(isset($_POST['submit']))
    {
        $search =  $_POST['search'];       
    
        $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%' ";
        $search_query = mysqli_query($connection, $query);

        if(!$search_query)
        {
            die("QUERY FAILED" . mysqli_error($connection));
        }
        
        $count = mysqli_num_rows($search_query);

        if($count == 0)
        {
            echo "<h1> NO RESULT</h1>";
        }
        else
        {

//          $query = "SELECT * FROM posts";
//          $dbPostsResult = mysqli_query($connection,$query);

//          while($row = mysqli_fetch_assoc($dbPostsResult))
            while($row = mysqli_fetch_assoc($search_query))
            {
                $postTitle = $row['post_title'];
                $postAuthor = $row['post_author'];
                $postDate = $row['post_date'];
                $postImage = $row['post_image'];
                $postContent = $row['post_content'];

?>

                        <h1 class="page-header">Page Heading <small>Secondary Text</small></h1>

                        <!-- First Blog Post -->
                        <h2>
                            <a href="#"><?php echo $postTitle ?></a>
                        </h2>
                        <p class="lead">
                            by <a href="index.php"><?php echo $postAuthor ?></a>
                        </p>
                        <p><span class="glyphicon glyphicon-time"></span> <?php echo $postDate ?></p>
                        <hr>
                        <img class="img-responsive img-scale" src="images/<?php echo $postImage ?>" alt="">
                        <hr>
                        <p><?php echo $postContent ?></p>
                        <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                        <hr>

<?php
            
            }
        }
     }
        
?>        

            </div>

<!-- Blog Sidebar Widgets Column -->
<?php include "includes/sidebar.php"; ?>

        </div>
        <!-- /.row -->

        <hr>
<!-- Footer -->
<?php include "includes/footer.php"; ?>
