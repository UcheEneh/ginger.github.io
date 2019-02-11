<html>
<body>

Welcome <?php 

$target_dir = "./images/";
$target_file = $target_dir . basename($_FILES['fileToUpload']['name']) ;
$uploadOk = 1;

// Check if file already exists or if file is empty
if (file_exists($target_file)) { //this is first because if file is empty this condition would still be satisfied

    if ($_FILES['fileToUpload']['size'] == 0 && $_FILES['fileToUpload']['error'] == 0){
            echo "Sorry, no image selected to upload. <br>";
            $uploadOk = 0;
    }
    else{
            echo "Sorry, file ". basename($_FILES['fileToUpload']['name']). " already exists. <br>";
            $uploadOk = 0;
    }           
}

//Size condition: not more than 10MB
if ($_FILES["fileToUpload"]["size"] > 10000000) {
    echo "Sorry, your file is too large. <br>";
    $uploadOk = 0;
}

//This is our limit file type condition
if ($_FILES["fileToUpload"]["type"] == "php") {
        echo "No PHP files <br>";
        $uploadOk = 0;
}

//Here we check that $ok was not set to 0 by an error
if ($uploadOk == 0) {
        echo "Sorry your file was not uploaded <br>";
}

//If everything is ok we try to upload it to server and database
else {
        if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file)) {
                echo "The file ". basename( $_FILES['fileToUpload']['name']). " has been successfully uploaded to server <br>";
        }
        else {
                echo "Sorry, there was a problem uploading your file. <br>";
        }
}

?>



<div class = "gallery">
<h2> Uploaded Images </h2>

<?php      
$image = $_FILES["fileToUpload"]["name"]
//$imageURL = $target_dir . $image;
$imageURL = 'images/' . $image;
?>
        <img src="<?php echo $imageURL; ?>"/>
<?php
        echo "Image contained in images folder ""<br>";
    }
} else {
?>
        <p> No result found </p>
<?php
}

?>
</div>

</body>
</html>
