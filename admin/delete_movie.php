<?php
if($_GET){
    include 'db.php';
    $id = $_GET['id'];
    
    $query = sprintf("SELECT * FROM songs WHERE movie_id=%d",$id);
    $result = mysqli_query($link, $query) or die(mysqli_error($link));
    if(mysqli_num_rows($result)>0){
        echo '<script> window.location.href="view_movie.php?status=Cannot delete Movie because a Song exists for this Movie. Delete those songs to Continue!";</script>';
        die();
    }
    
    $query = sprintf("DELETE FROM movies WHERE id=%d",$id);
    $r = mysqli_query($link, $query);
    if(!$r){
        echo '<script> window.location.href="view_song.php?status=Deletion at movies Table failed"; </script>';
        die();
    }
    
    $query = sprintf("DELETE FROM movie_directed_by WHERE movie_id=%d",$id);
    $r = mysqli_query($link, $query);
    if(!$r){
        echo '<script> window.location.href="view_song.php?status=Deletion at movie_directed_by Table failed"; </script>';
        die();
    }
    
    $query = sprintf("DELETE FROM starred_by WHERE movie_id=%d",$id);
    $r = mysqli_query($link, $query);
    if(!$r){
        echo '<script> window.location.href="view_song.php?status=Deletion at starred_by Table failed"; </script>';
        die();
    }
    
    echo '<script> window.location.href="view_song.php?status=1"; </script>';
    
}else{
    echo '<h1>ACCESS DENIED!!!</h1>';
}

