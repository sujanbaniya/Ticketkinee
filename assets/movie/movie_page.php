<?php
    session_start();
?>

<?php

    if (isset($_GET['id'])){
        $id = $_GET['id'];
    }
    require_once 'connect.php';
    $sql = "SELECT * FROM movie where id=$id ;";
    $result = mysqli_query($conn ,$sql) ;  
    $rows = mysqli_num_rows($result);
    if ( $rows ){
        $rrr = mysqli_fetch_assoc($result);  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- <link rel="stylesheet" href="css/navbar.css"> -->
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/flash_message.css">
    <link rel="stylesheet" href="css/movie_page.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <title><?php echo 'Movie | '.$rrr['name'] ?></title>
    <link rel="icon" href="assets/logos/TicketKinee_favicon.png" type="image/ico">
</head>
<body>

<!-- NAVBAR -->

<?php
    include_once 'navbar.php';
?>
<!-- ---------------------------------------------------------------------------------------------------------- -->

<div class="movie_page_container">
    <div class="banner-img">
        <img src="images/uploads/<?php echo $rrr['banner'] ?>" alt="fast and furious">
        <div class="topic-image">
            <img src="images/uploads/<?php echo $rrr['image'] ?>">
        </div>
        <div class="buttons">
            <a href="book.php?id=<?php echo $rrr['id']?>"><button><i class="fas fa-ticket"></i> Book</button></a>
            <button class="youtubeBtnClick"><i class="fab fa-youtube"></i> Trailer</button>
        </div>
    </div>
    <div class="information-container">
        <div class="movie-details">
            <h2><?php echo $rrr['name'] ?></h2>
            <span>Genre : <?php echo $rrr['genre'] ?></span>
            <span>Run Time : 
                <?php
                    $str = $rrr['duration'];
                    $time = explode(":",$str) ;
                ?>
                <?php echo $time[0].' hr '. $time[1]. ' mins' ?>
            </span>
            <span>Director : <?php echo $rrr['director'] ?></span>
            <span>Casts : <?php echo $rrr['casts'] ?></span>
            <span>Synopsis : <p> <?php echo $rrr['sub_description'] ?></p></span>
        </div>
    </div>
</div>

<!-- <div class="youtube-div">
    <div class="youtube-video">
        <iframe width="853" height="480" src="https://www.youtube.com/embed/uisBaTkQAEs" id="player" class="abc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
</div> -->

<div class="youtube-div">
    <div id="player"></div>
</div>


<script>
    var youtubeDiv= document.querySelector(".youtube-div");
    var youtubeVideo= document.querySelector(".youtube-video");
    var trailerBtn = document.querySelector(".youtubeBtnClick");
    var mainMovieDiv = document.querySelector(".movie_page_container");
    var nav = document.querySelector("nav");
    
    
    trailerBtn.addEventListener("click", function(){
        youtubeDiv.style.visibility = "visible";
    });
    
    document.querySelector(".youtube-div").addEventListener('click', function(e){   
        if(e.target != document.querySelector(".youtube-video") ) {
            youtubeDiv.style.visibility = "hidden";
            player.stopVideo();
            // player.pauseVideo();
        }
    });

    // window.addEventListener('click', function(e){   
    //     if (!youtubeVideo.contains(e.target)){
    //         youtubeVideo.style.visibility = "hidden";
    //         mainMovieDiv.style.opacity = "1";
    //         nav.style.opacity = "1";
    //     }
    // });

</script>


<script>
    // 2. This code loads the IFrame Player API code asynchronously.
    var tag = document.createElement('script');

    tag.src = "https://www.youtube.com/iframe_api";
    var firstScriptTag = document.getElementsByTagName('script')[0];
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

    // 3. This function creates an <iframe> (and YouTube player)
    //    after the API code downloads.
    var player;
    function onYouTubeIframeAPIReady() {
    player = new YT.Player('player', {
        height: '480',
        width: '853',
        videoId: '<?php echo $rrr['video_id_youtube'] ?>',
        playerVars: {
        'playsinline': 1
        },
        events: {
        'onReady': onPlayerReady,
        'onStateChange': onPlayerStateChange
        }
    });
    }

    // 4. The API will call this function when the video player is ready.
    function onPlayerReady(event) {
    // event.target.playVideo();
    }

    // 5. The API calls this function when the player's state changes.
    //    The function indicates that when playing a video (state=1),
    //    the player should play for six seconds and then stop.
    var done = false;
    function onPlayerStateChange(event) {
    if (event.data == YT.PlayerState.PLAYING && !done) {
        setTimeout(stopVideo, 6000);
        done = true;
    }
    }
    function stopVideo() {
    player.stopVideo();
    }
</script>
   

<!-- FOOTER -->

<?php
    include_once 'footer.php';
?>

</body>
</html> 

<?php
    }
    else
    {
        header("location: main.php");
        exit();
    }
?>