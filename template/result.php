<div class="row">
    <div class="m-t-f-p m-b-f-p-l">

        <ul class="top-filter-select">

            <li> <a href="#" class="active" data-pid="106" data-lang="tamil" data-toggle="tootltip" title="" data-original-title="Latest Releases"> SEARCH RESULT </a> </li>

        </ul>

    </div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class = "m-b-f-p2" id = "a-zlist-affix">
            <!--            <div class="resp-tabs-list">
                            <div  class="resp-tab-item " aria-controls="tab_item-0" role="tab">ALBUMS</div>
                            <div class="resp-tab-item active" aria-controls="tab_item-1" role="tab"><span>SONGS</span></div>
                            <div class="clear"> </div>
                        </div>-->
            <ul class="nav nav-tabs s_h">
                <li ng-class="{'active':tab}" ng-click="tab = true"><a>ALBUMS</a></li>
                <li ng-class="{'active':!tab}" ng-click="tab = false"><a>SONGS</a></li>
            </ul>
            <div class="f_d" ng-show="tab">
                <div class="f_d1" ng-show="!noalbum">
                    <div class="category_name" ng-repeat = "dir in result track by $index" ng-show="check($index,'album')">
                        <span>Category : {{ dir.in}}</span> <br>
                        <div class="album_name" ng-repeat="album in dir.albums track by $index">
                            <a href = "Album/{{ dir.in | removeSpaces }}/{{ album}}" ng-if="dir.in != 'Devotional Collections'"> {{ album}}</a>
                            <a href = "{{ album | removeSpaces }}" ng-if="dir.in == 'Devotional Collections'"> {{ album}}</a>
                        </div>
                    </div>

                    <a href="#" class="button pull-right" ng-class="{'disabled':pagination.albumpage>=(pagination.albumlimit-2)}" ng-click="next('album')">Next ></a>
                    <a href="#" class="button" ng-class="{'disabled':pagination.albumpage==0}" ng-click="prev('album')">< Previous</a>

                </div>
                <div class="f_d1" ng-show="noalbum">
                    NO ALBUMS FOUND
                </div>
                <!--div class="n_p">
                <div class="show_more"><a href="#">Next</a></div>
                        <div class="show_more sss"><a href="#">Previous</a></div>
        </div-->
            </div>
            <div class="f_d" ng-show="!tab">
                <div class="f_d1" ng-show="!nosong">
                    <div class="category_name" ng-repeat = "category in songs track by $index" ng-show="check($index,'song')">
                        <a class="album_name" href = "Album/{{ category.name | removeSpaces }}/{{ album.name}}" ng-repeat = "album in category.albums track by $index">
                            <span>Album : {{ album.name}}</span><span class="pull-right">Category : {{ category.name}}</span>
                            <div class="song_name" ng-repeat = "song in album.songs track by $index">
                                {{ song}}
                            </div>
                        </a>
                    </div>
                    <a href="#" class="button pull-right" ng-class="{'disabled':pagination.songpage>=(pagination.songlimit-2)}" ng-click="next('song')">Next ></a>
                    <a href="#" class="button " ng-class="{'disabled':pagination.songpage==0}" ng-click="prev('song')">< Previous</a>

                </div>
                <div class="f_d1" ng-show="nosong">
                    NO SONGS FOUND
                </div>
                <!--div class="n_p">
                <div class="show_more"><a href="#">Next</a></div>
                        <div class="show_more sss"><a href="#">Previous</a></div>
        </div-->
            </div>

        </div> 

    </div>
</div>