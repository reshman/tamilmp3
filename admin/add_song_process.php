<?php

if ($_POST) {
    include 'db.php';

    $movie_id = $_POST['movie_name'];
    $music_directors = $_POST['music_directors'];
    $singers = $_POST['singers'];
    $song_name = ucwords($_POST['song_name']);
    $status = 0;

    if (!is_numeric($movie_id)) {

        $year = $_POST['year'];
        $director = $_POST['director'];
        $starring = $_POST['starring'];

        //Adding Movie name and year to the table movies
        $movie_id = ucwords($movie_id);
        $movie_name = $movie_id;
        $query = sprintf("INSERT INTO movies SET name='%s',year=%d", $movie_id, $year);
        mysqli_query($link, $query) or die(mysqli_error($link));
        $movie_id = mysqli_insert_id($link);

        //Adding new directors if not already present
        foreach ($director as $each_director) {
            if (!is_numeric($each_director)) {
                $each_director = ucwords($each_director);

                $query = sprintf("SELECT * FROM directors WHERE name='%s'", $each_director);
                $result = mysqli_query($link, $query);
                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    $director_id = $row['id'];
                } else {
                    $query = sprintf("INSERT INTO directors SET name='%s'", $each_director);
                    mysqli_query($link, $query) or die(mysqli_error($link));
                    $director_id = mysqli_insert_id($link);
                }
            } else {
                $director_id = $each_director;
            }
            //Updating movie_directed_by Table
            $query = sprintf("INSERT INTO movie_directed_by SET director_id=%d,movie_id=%d", $director_id, $movie_id);
            mysqli_query($link, $query) or die(mysqli_error($link));
        }

        //Adding new Stars if Not already present

        foreach ($starring as $star) {
            if (!is_numeric($star)) {
                $star = ucwords($star);

                $query = sprintf("SELECT * FROM stars WHERE name='%s'", $star);
                $result = mysqli_query($link, $query);
                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    $star_id = $row['id'];
                } else {
                    $query = sprintf("INSERT INTO stars SET name='%s'", $star);
                    mysqli_query($link, $query) or die(mysqli_error($link));
                    $star_id = mysqli_insert_id($link);
                }
            } else {
                $star_id = $star;
            }
            //Updating starred_by Table
            $query = sprintf("INSERT INTO starred_by SET star_id=%d,movie_id=%d", $star_id, $movie_id);
            mysqli_query($link, $query) or die(mysqli_error($link));
        }
    } else {
        $query = sprintf("SELECT * FROM songs WHERE name='%s' AND movie_id='%s'", $song_name, $movie_id);
        if (mysqli_num_rows(mysqli_query($link, $query)) > 0) {
            echo '<script> window.location.href="add_song.php?status=Song with Same Name already Exists."; </script>';
            die();
        }

        $query = sprintf("SELECT name FROM movies WHERE id='%s'", $movie_id);
        $row = mysqli_fetch_assoc(mysqli_query($link, $query));
        $movie_name = $row['name'];
    }

    //PHP Upload Script
    if (!is_dir("upload")) {
        mkdir("upload");
    }

    $uploadpath = 'upload/' . $movie_name;      // directory to store the uploaded files
    if (!is_dir($uploadpath)) {
        mkdir($uploadpath);
    }
    $max_size = 30000;          // maximum file size, in KiloBytes
    $allowtype = array('wav', 'mp3');        // allowed extensions

    if (isset($_FILES['song_file']) && strlen($_FILES['song_file']['name']) > 1) {

        $sepext = explode('.', strtolower($_FILES['song_file']['name']));
        $type = end($sepext);       // gets extension
        $err = '';         // to store the errors
        // Checks if the file has allowed type and size
        if (!in_array($type, $allowtype)) {
            $err .= 'The file: <b>' . $_FILES['song_file']['name'] . '</b> doesnot not have the allowed extension type.';
        }
        if ($_FILES['song_file']['size'] > $max_size * 1000) {
            $err .= '<br/>Maximum file size is: ' . $max_size . ' KB.';
        }

        $file = $song_name . '.' . $type;
        $uploadpath = $uploadpath . '/' . $file;     // gets the file name
        // If no errors, upload the image, else, output the errors
        if ($err == '') {
            if (move_uploaded_file($_FILES['song_file']['tmp_name'], $uploadpath)) {
                
            } else {
                //header('Location: add_song.php?status=2');
                echo '<script> window.location.href="add_song.php?status=2"; </script>';
            }
        } else {
            //header('Location: add_song.php?status='.$err.'');
            echo '<script> window.location.href="add_song.php?status=' . $err . '"; </script>';
        }
    }

    //Adding new song to the Table songs
    $query = sprintf("INSERT INTO songs SET name='%s',movie_id=%d,file='%s'", $song_name, $movie_id, $file);
    mysqli_query($link, $query) or die(mysqli_error($link));
    $song_id = mysqli_insert_id($link);

    //Adding new singer to the Table singers
    foreach ($singers as $singer) {
        if (!is_numeric($singer)) {
            $singer = ucwords($singer);

            $query = sprintf("SELECT * FROM singers WHERE name='%s'", $singer);
            $result = mysqli_query($link, $query);
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $singer_id = $row['id'];
            } else {
                $query = sprintf("INSERT INTO singers SET name='%s'", $singer);
                mysqli_query($link, $query) or die(mysqli_error($link));
                $singer_id = mysqli_insert_id($link);
            }
        } else {
            $singer_id = $singer;
        }
        //Updating sung_by Table
        $query = sprintf("INSERT INTO sung_by SET song_id=%d,singer_id=%d,movie_id=%d", $song_id, $singer_id, $movie_id);
        mysqli_query($link, $query) or die(mysqli_error($link));
    }

    //Adding new Music Director to Table music_directors
    foreach ($music_directors as $music_director) {
        if (!is_numeric($music_director)) {
            $music_director = ucwords($music_director);

            $query = sprintf("SELECT * FROM music_directors WHERE name='%s'", $music_director);
            $result = mysqli_query($link, $query);
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $music_director_id = $row['id'];
            } else {
                $query = sprintf("INSERT INTO music_directors SET name='%s'", $music_director);
                mysqli_query($link, $query) or die(mysqli_error($link));
                $music_director_id = mysqli_insert_id($link);
            }
        } else {
            $music_director_id = $music_director;
        }
        //Updating directed_by Table
        $query = sprintf("INSERT INTO directed_by SET song_id=%d,director_id=%d,movie_id=%d", $song_id, $music_director_id, $movie_id);
        mysqli_query($link, $query) or die(mysqli_error($link));
    }

    //header('Location: add_song.php?status=0');
    echo '<script> window.location.href="add_song.php?status=0"; </script>';
} else {
    echo '<h1>ACCESS DENIED!!!</h1>';
}

