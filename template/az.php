<div class="m-t-f-p m-b-f-p-l">

    <ul class="top-filter-select">

        <li> <a href="azlisting/{{ renameLocation(listlocation,listlocationname) }}/A" class="active" data-pid="106" data-lang="tamil" data-toggle="tootltip" title="" data-original-title="Latest Releases"> {{ listlocationname }} </a> </li>

    </ul>

</div>

<div class="m-b-f-p">
    <ul class="station-select">
        <?php foreach (range('A', 'Z') as $char): ?>
        <li> <a href="azlisting/{{ renameLocation(listlocation,listlocationname) }}/<?php echo $char; ?>" ng-class="{alphabets:true,current:currentAlpha('<?= $char ?>')}"> <?php echo $char; ?> </a> </li>
        <?php endforeach; ?>
        <li> <a href = "azlisting/{{ renameLocation(listlocation,listlocationname) }}/num" ng-class="{alphabets:true,current:currentAlpha('num')}" data-pid = "126" data-lang = "tamil" data-toggle = "tootltip" title = "" data-original-title = "Tamil Private Albums"> 1-9 </a> </li>

    </ul>
</div>

<div class = "m-b-f-p" id = "a-zlist-affix">
    <div class = "col-md-4 col-sm-4 col-xs-12">
        <ul class = "lineup">
            <li ng-repeat = "name in list1 track by $index">
                <div class = "lineup-artist">
                    <a href = "Album/{{ listlocation }}/{{name.name}}"> {{ name.name}}
                        <span ng-if="name.year!=null">[{{name.year}}]</span>
                    </a>
                    <span class="new" ng-show="checknew(name.name)">New</span>
                </div>
            </li>
        </ul>
    </div>
    <div class = "col-md-4 col-sm-4 col-xs-12">
        <ul class = "lineup">
            <li ng-repeat = "name in list2 track by $index">
                <div class = "lineup-artist">
                    <a href = "Album/{{ listlocation }}/{{name.name}}"> {{ name.name}}
                        <span ng-if="name.year!=null">[{{name.year}}]</span>
                    </a>
                    <span class="new" ng-show="checknew(name.name)">New</span>
                </div>
            </li>
        </ul>
    </div>
    <div class = "col-md-4 col-sm-4 col-xs-12">
        <ul class = "lineup">
            <li ng-repeat = "name in list3 track by $index">
                <div class = "lineup-artist">
                    <a href = "Album/{{ listlocation }}/{{name.name}}"> {{ name.name}}
                        <span ng-if="name.year!=null">[{{name.year}}]</span>
                    </a>
                    <span class="new" ng-show="checknew(name.name)">New</span>
                </div>
            </li>
        </ul>
    </div>
</div>

