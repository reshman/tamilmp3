<?php //ini_set('opcache.enable', 0); ?>
<!--<meta property="og:url"                content="demox.imrokraft.com/tamilmp3" />-->
<meta property="og:title"              content="Friends Tamil MP3" />
<meta property="og:image"              content="http://www.demox.imrokraft.com/tamilmp3/images/ogimage.jpg" />
<meta property="og:type"               content="website" />
<meta property="og:description"        content="Tamil Music Search Ends Here" />
<div class="col-md-8 col-sm-8 col-xs-12">

    <div class="ftm-alb-title"><h2>FEATURED ALBUM </h2></div>
    <div class="sp-comments-box" ng-repeat = "name in listmovie">

        <div class="single_comment">
            <div class="single_comment_pic">
                <a href="Album/A-ZMovieSongs/{{name.name}}">
                    <img alt="Friends Tamil Mp3" ng-src="Filesystem/A-Z Movie Songs/{{ name.name}}/Folder.jpg" >
                </a>
            </div>
            <div class="single_comment_text">
                <div class="sp_title">
                    <a href="Album/A-ZMovieSongs/{{name.name}}"><h4 >{{ name.name}}</h4></a> <span class="new" ng-show="checknew(name.name)">New</span>
                </div>
                <p>Starring : {{ name.star}}</p>
                <p>Music : {{ name.music}}</p>
                <p>Director : {{ name.director}}</p>
                <p>Year: {{ name.year }}</p>
            </div>
        </div>
    </div>
    </div>

    <?php
    include_once '../right_section.php';