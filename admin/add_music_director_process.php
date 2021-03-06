<?php
if($_POST){
    include 'db.php';
    
    $name = $_POST['name'];
    $name = ucwords($name);
    
    //Check to see if star name already exist
    $query = sprintf("SELECT * FROM music_directors WHERE name='%s'", $name);
    $result = mysqli_query($link, $query) or die(mysqli_error($link));
    if (mysqli_num_rows($result) > 0) {
        echo '<script> window.location.href="add_music_director.php?status=1"; </script>';
        die();
    }
    
    //PHP Upload Script
    if (!is_dir("directors")) {
        mkdir("directors");
    }

    $uploadpath = 'directors/';  // directory to store the uploaded files
    $max_size = 30000;          // maximum file size, in KiloBytes
    $allowtype = array('jpg', 'jpeg');        // allowed extensions

    if (isset($_FILES['image']) && strlen($_FILES['image']['name']) > 1) {

        $sepext = explode('.', strtolower($_FILES['image']['name']));
        $type = end($sepext);       // gets extension
        $err = '';         // to store the errors
        // Checks if the file has allowed type and size
        if (!in_array($type, $allowtype)) {
            $err .= 'The file: <b>' . $_FILES['image']['name'] . '</b> not has the allowed extension type.';
        }
        if ($_FILES['image']['size'] > $max_size * 1000) {
            $err .= '<br/>Maximum file size is: ' . $max_size . ' KB.';
        }

        $file = $name . '.' . $type;
        $uploadpath = $uploadpath . '/' . $file;     // gets the file name
        // If no errors, upload the image, else, output the errors
        if ($err == '') {
            /* Code to delete file if exists
            if (file_exists($uploadpath)) {
                chmod($uploadpath, 0755); //Change the file permissions if allowed
                unlink($uploadpath); //remove the file
            }
            */
            if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadpath)) {
                
            } else {
                //header('Location: add_movie.php?status=2');
                echo '<script> window.location.href="add_music_director.php?status=2"; </script>';
            }
        } else {
            //header('Location: add_movie.php?status='.$err.'');
            echo '<script> window.location.href="add_music_director.php?status=' . $err . '"; </script>';
        }
    }
    
    $query = sprintf("INSERT INTO music_directors SET name='%s',image='%s'", $name,$file);
    $result = mysqli_query($link, $query) or die(mysqli_error($link));
    
    echo '<script> window.location.href="add_music_director.php?status=0"; </script>';
    
    
    
}

