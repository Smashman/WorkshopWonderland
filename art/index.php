<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Workshop Wonderland</title>
        <link rel="stylesheet" type="text/css" media="screen" href="../css/main.css">
        <link rel="shortcut icon" href="../favicon.ico">
                <script>
                    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
                    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

                    ga('create', 'UA-53670757-3', 'auto');
                    ga('send', 'pageview');

                </script>
    </head>
    <body>
        <div class="container" id="art_container">
            <div class="content" id="art_content">
                <a class="button" id="back" href="..#art"></a>
                <?php
                    $art_id = $_GET['id'];
                    if (!$art_id) {
                        $art_id = 1;
                    }
                    $credits = [
                        1  => 223976371,
                        2  => 109208338,
                        3  => 125948669,
                        4  => 77737195,
                        5  => 98612134,
                        6  => 119051773,
                        7  => 143799368,
                        8  => 83527684,
                        9  => 106682175,
                        10 => 203984915,
                        11 => 82489742,
                        12 => 134324669,
                        13 => 119019787,
                        14 => 119019787,
                        15 => 93946450,
                        16 => 11390639,
                        17 => 7508825,
                        18 => 193342335,
                        20 => 45176684,
                        22 => 77956547,
                        23 => 46762167,
                        24 => 112049695,
                        25 => 42147009,
                        26 => 98912174,
                        27 => 112203169,
                        28 => 158613105,
                        29 => 100851125,
                        30 => 75909945
                    ];
                    include '../php/credits.php';
                    $artist_id = $credits[$art_id];
                    if ($artist_id) {
                        get_credit_data([$artist_id]);
                    }
                ?>
                <div class="display">
                    <img class="artwork" src="../images/gallery/gallery_art_<?php print $art_id ?>.png"/>
                    <?php if ($artist_id) {
                        echo '<div id="credits">
                    <div class="row">';
                        echo steam_block($artist_id);
                        echo '</div>
                </div>';
                    }?>
                </div>
            </div>
        </div>
    </body>
</html>
