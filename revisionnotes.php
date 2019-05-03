<?php
session_start();
include ("config.php");
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!--My Style Sheet-->
  <link href="css/mystylesheet.css" rel="stylesheet" type="text/css">

  </head>

  <body>


    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <!--Navigation-->
     <header>
       <nav class="navbar navbar-expand-md navbar-dark fixed-top">
         <button class="navbar-toggler navbar-light" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">

         <ul class="navbar-nav">
            <li class="nav-item dropdown">
             <a class="nav-link dropdown-toggle" href="#" id="dropdown08" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Texts</a>
             <div class="dropdown-menu" aria-labelledby="dropdown08">
               <a class="dropdown-item" href="an_inspector_calls_page.html">An Inspector Calls</a>
               <a class="dropdown-item" href="romeo_and_juliet_page.html">Romeo and Juliet</a>
               <a class="dropdown-item" href="a_christmas_carol_page.html">A Christmas Carol</a>
             </div>
           </li>
           <li class="nav-item">
             <a class="nav-link" href="revisionnotes.php">Revision Notes</a>
           </li>
           <li class="nav-item">
             <a class="nav-link" href="mock_test.html">Mock Tests</a>
           </li>
         </ul>
     </div>
       </nav>
 </header>

 <main role="main">

   <div class="container marketing">
<hr class="featurette-divider">
     <h2 class="featurette-heading">Revision Notes</h2>
     <hr class="featurette-divider">
   <div class="row featurette">
<div class="col-md-12">
  <?php

  if(isset($_POST['post'])) {
    $title = strip_tags($_POST['title']);
    $content = strip_tags($_POST['content']);

    $title = mysqli_real_escape_string($conn, $title);
    $content = mysqli_real_escape_string($conn,$content);

    $date = date('l jS \of F Y h:i:s A');

    $sql = "INSERT into posts (title, content, date) VALUES ('$title', '$content', '$date')";

    if ($title == "" || $content = ""){
      echo "Please Finish your Note";
      return;
    }

    mysqli_query($conn, $sql);

    header("Location: revisionnotes.php");
  }

  ?>
  <form action = "post.php" method="post" enctype="multipart/form-data">
    <input placeholder="Title" name="title" type="text" autofocus size ="48"<br /><br />
    <textarea placeholder = "Content" name="content" rows="10" cols="50"></textarea><br />
    <input name="post" type="submit" value="Post">
  </form>
 <hr class="featurette-divider">
  <?php
  $sql = "SELECT * FROM posts ORDER BY id DESC";

  $res = mysqli_query($conn, $sql) or die(mysqli_error());
  $posts = "";
  if(mysqli_num_rows($res) > 0){
    while($row = mysqli_fetch_assoc($res)){
      $id = $row['id'];
      $title = $row['title'];
      $content = $row['content'];
      $date = $row['date'];
      $admin ="<div><a href='del_post.php?pid=$id'>Delete</a></div>";

      $posts .= "<div><h2><b>$title</b></h2><h4>$date</h4><p>$content</p>$admin</div> <br>";
    }
    echo $posts;
  } else {
    echo "There are no Notes";
    }
  ?>
      </div>
    </div>
   </div>

</body>
</html>
