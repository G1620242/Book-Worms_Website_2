<?php
session_start();
include ("config.php");

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
       input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
     </style>
     <!--My Style Sheet-->
   <link href="css/mystylesheet.css" rel="stylesheet" type="text/css">

   </head>

   <body>
<div>
   <form action = "post.php" method="post" enctype="multipart/form-data">
     <input placeholder="Title" name="title" type="text" autofocus size ="48"<br /><br />
     <textarea placeholder = "Content" name="content" rows="20" cols="50"></textarea><br />
     <input name="post" type="submit" value="Post">
   </form>
 </div>
 </body>
 </html>
