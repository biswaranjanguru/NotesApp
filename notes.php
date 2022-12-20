<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>notes app</title>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <style>
.form{
    border: 2px solid black;
    padding: 1rem;
    border-radius: 8px
}
  </style>

</head>
<body>
<?php include "./navBar.php"?>
<?php include "./db.php"?>
<?php include "./editModal.php"?>
<?php
if(isset($_POST["submit"])){
    $title=$_POST["title"];
    $desc=$_POST["desc"];
    $sql="INSERT INTO `notes`(`title`, `description`) VALUES ('$title','$desc')";
    $res=mysqli_query($con,$sql);
   

}
?>
<div class="container my-3">
    <div class="row justify-content-center">
        <div class="col-lg-10">

        <form class="form" method="POST">
            <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" placeholder="enter title.." name="title">
            </div>

        <div class="mb-3">
        <label for="desc" class="form-label">description</label>
        <textarea class="form-control" id="desc" rows="3" placeholder="enter description.."name="desc"></textarea>
        </div>
  
        <button type="submit" class="btn btn-primary" name="submit">Add Note</button>
        </form>

        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <h1>Your Notes</h1>
       <?php
       $sql="SELECT * FROM `notes`"  ;
       $res=mysqli_query($con,$sql);
       while($fetch=mysqli_fetch_assoc($res)){
        echo' <div class="card">
        
      
        <div class="card-body">
          <h5 class="card-title">'.$fetch["title"].'</h5>
          <p class="card-text">'.$fetch["description"].'</p>
          <button type="button" class="btn btn-primary edit" data-bs-toggle="modal" data-bs-target="#exampleModal" >
         edit
        </button>
          <a href="./delete.php?id='.$fetch["sno"].'" class="btn btn-danger">Delete</a>
        </div>
      </div>';
       }
       ?>
        </div>
    </div>
</div>
  <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script>
const edit=document.querySelectorAll(".edit");
const editTitle=document.getElementById("edittitle");
const editdesc=document.getElementById("editdesc");

edit.forEach(element=>{  
element.addEventListener("click",()=>{

    var titleText = element.parentElement.children[0].innerText;
    var descText = element.parentElement.children[1].innerText;
    console.log(titleText);
    editTitle.value=titleText;
    editTitle.value=titleText;
    editdesc.value=descText;
  
});
});

</script>

</body>
</html>