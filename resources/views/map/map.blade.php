
@extends('master')

@section('content')

@include('cases.profile')
@include('cases.refer')
@include('casenotes.add')


<!-- Breadcrumb -->
<ol class="breadcrumb hidden-xs">
    <li><a href="#">Administration</a></li>
    <li class="active">Map</li>
</ol>

<h4 class="page-title">Map</h4>

<div class="block-area">


<body bgcolor="#1c1c1c" onload="resetControllers()" TEXT="#C0C0C0" LINK="#ffffff" VLINK="#ffffff" ALINK="#ffffff" style="margin:0;overflow:hidden;margin-bottom:0;margin-left:0;margin-right:0;margin-top:0">

<table cellpadding=0 cellspacing=0 style="width:100%;height:100%;border-collapse: collapse; border: 0px solid #1c1c1c">

<!--<table border=1 cellpadding=0 cellspacing=0 style="width:100%;height:100%;border-collapse: collapse;"> -->

    <tr height="31">
        <td align=left>
            <div style="z-index:5000">

                <table cellpadding=0 cellspacing=0 style="width:100%;border-collapse: collapse; border: 0px solid #1c1c1c;">
                    <tr style="opacity:1">
                    <td bgcolor="#1c1c1c" valign=middle align=center width=115 style="min-width:115px" title="Select a port ... " onmouseover="updateToolTip('Select a port ... ')" onmouseout="document.all.toolTip.innerHTML= ''">
                        <a href="#" onclick="switchMenu();this.blur()"><i class="fa fa-anchor fa-fw" style="color:#ffffff"></i></a>
                    </td>
                    <td bgcolor="#1c1c1c" valign=middle align=center width=115 style="min-width:115px">
                        <a href="#" onclick="switchMainMenu();this.blur()"><i class="fa fa-navicon fa-fw" style="color:#ffffff" title="Toggle main menu ... " onmouseover="updateToolTip('Toggle main menu')" onmouseout="document.all.toolTip.innerHTML= ''"></i></a>
                    </td>
                    <td bgcolor="#1c1c1c" valign=middle align="right" nowrap width=110 style="min-width:110px">
                        <input maxlength="10" type=text id="searchBox" name="searchBox" title="Search by case number" onmouseover="updateToolTip('Search by case number')" onmouseout="document.all.toolTip.innerHTML= ''" onkeyup="checkInput(this)" onkeydown="javascript:if (event.which || event.keyCode){if ((event.which == 13) || (event.keyCode == 13)) { animateMarker(document.all.searchBox.value); } };" style="text-align:center;width:100px;font-size:10pt;background:#000000;color:#ffffff;border-style:solid;border-color:#ffffff;border-width:1px">
                    </td>
                    <td bgcolor="#1c1c1c" valign=middle align=center width=25 style="min-width:25px">
                        <a href="#" onclick="this.blur();animateMarker(document.all.searchBox.value)"><i class="fa fa-search fa-fw" style="color:#ffffff" title="Click to search" onmouseover="updateToolTip('Click to search')" onmouseout="document.all.toolTip.innerHTML= ''"></i></a>
                    </td>
                    <td bgcolor="#1c1c1c" valign=middle align=center width=115 style="min-width:115px">
                        <a href="#" onclick="switchLayerMenu();this.blur()"><i class="fa fa-clone fa-fw" style="color:#ffffff" title="Toggle Location Layers Menu" onmouseover="updateToolTip('Toggle location layers menu')" onmouseout="document.all.toolTip.innerHTML= ''"></i></a>
                    </td>
                    <td bgcolor="#1c1c1c" valign=middle align=center width=30 style="min-width:30px">
                        <a href="#" onclick="repositionMarkers();this.blur()"><i class="fa fa-compress fa-fw" style="color:#ffffff" title="Reset Dragged and Spidered Markers" onmouseover="updateToolTip('Reset dragged markers')" onmouseout="document.all.toolTip.innerHTML= ''"></i></a>
                    </td>
                    <td bgcolor="#1c1c1c" valign=middle align=center width=30 style="min-width:30px">
                        <a href="#" onclick="closeInfoBoxes();this.blur()"><i class="fa fa-info fa-fw" style="color:#ffffff" title="Close all Info Boxes" onmouseover="updateToolTip('Close all info boxes')" onmouseout="document.all.toolTip.innerHTML= ''"></i></a>
                    </td>
                    <td bgcolor="#1c1c1c" valign=middle align=right width=400 style="min-width:285px">
                        <table border=0 cellpadding=0 cellspacing=0>
                            <td align=left>
                        <!--     http://jsfiddle.net/sumw4/13/ -->
                                <table cellpadding=1 cellspacing=0 border=0 style="border-collapse:collapse;border:0px solid #FFFFFF">

                                        <td align=right width=60 style="min-width:30px"><input type="checkbox" name="poCheckBox" id="poCheckBox"></td>
                                        <td align=right width=60 style="min-width:30px"><input type="checkbox" name="prCheckBox" id="prCheckBox"></td>
                                        <td align=right width=60 style="min-width:30px"><input type="checkbox" name="trCheckBox" id="trCheckBox"></td>
                                        <td align=right width=60 style="min-width:30px"><input type="checkbox" name="srCheckBox" id="srCheckBox"></td>
                                        <td align=right width=60 style="min-width:30px"><input type="checkbox" name="maCheckBox" id="maCheckBox"></td>
                                        <td align=right width=60 style="min-width:30px"><input type="checkbox" name="mcCheckBox" id="mcCheckBox"></td>


                                  <!--<td style="background:#e0e1e0" title="Toggle Port Ops Centre Markers"><input id="poCheckBox" type="checkbox" checked  title="Toggle port ops centre" onmouseover="updateToolTip(this.title)" onmouseout="document.all.toolTip.innerHTML= ''"></td>
                                    <td style="background:#999999" title="Toggle Property Markers"><input id="prCheckBox" type="checkbox" checked onclick="switchMarkers('pr');" title="Toggle property" onmouseover="updateToolTip(this.title)" onmouseout="document.all.toolTip.innerHTML= ''"></td>
                                    <td style="background:#000000" title="Toggle Traffic Management  Markers"><input id="trCheckBox" type="checkbox" checked onclick="switchMarkers('tr');" title="Toggle traffic management" onmouseover="updateToolTip(this.title)" onmouseout="document.all.toolTip.innerHTML= ''"></td>
                                    <td style="background:#ff0000" title="Toggle Safety / Risk / Fire Management  Markers"><input id="srCheckBox" type="checkbox" checked onclick="switchMarkers('sr');" title="Toggle safety / risk / fire" onmouseover="updateToolTip(this.title)" onmouseout="document.all.toolTip.innerHTML= ''"></td>
                                    <td style="background:#fe940a" title="Toggle Maintenance Mechanical Markers"><input id="maCheckBox" type="checkbox" checked onclick="switchMarkers('ma');" title="Toggle mech. maintenance" onmouseover="updateToolTip(this.title)" onmouseout="document.all.toolTip.innerHTML= ''"></td>
                                    <td style="background:#ffff00" title="Toggle Civil Maintanence Markers"><input id="mcCheckBox" type="checkbox" checked onclick="switchMarkers('mc');" title="Toggle civil maintenance" onmouseover="updateToolTip(this.title)" onmouseout="document.all.toolTip.innerHTML= ''"></td>
                                    <td style="background:#00cc00" title="Toggle Housekeeping Markers"><input id="hkCheckBox" type="checkbox" checked onclick="switchMarkers('hk');" title="Toggle housekeeping" onmouseover="updateToolTip(this.title)" onmouseout="document.all.toolTip.innerHTML= ''"></td>
                                    <td style="background:#009000" title="Toggle Environment Markers"><input id="enCheckBox" type="checkbox" checked onclick="switchMarkers('en');" title="Toggle environment" onmouseover="updateToolTip(this.title)" onmouseout="document.all.toolTip.innerHTML= ''"></td>
                                    <td style="background:#0df1ff" title="Toggle Health Markers"><input id="heCheckBox" type="checkbox" checked onclick="switchMarkers('he');" title="Toggle health" onmouseover="updateToolTip(this.title)" onmouseout="document.all.toolTip.innerHTML= ''"></td>
                                    <td style="background:#333dc7" title="Toggle Marine Maintanence Markers"><input id="mmCheckBox" type="checkbox" checked onclick="switchMarkers('mm');" title="Toggle marine maintenance" onmouseover="updateToolTip(this.title)" onmouseout="document.all.toolTip.innerHTML= ''"></td>
                                    <td style="background:#ff33a6" title="Toggle Electrical Maintanence Markers"><input id="meCheckBox" type="checkbox" checked onclick="switchMarkers('me');" title="Toggle elec. maintenance" onmouseover="updateToolTip(this.title)" onmouseout="document.all.toolTip.innerHTML= ''"></td>
                                    <td style="background:#8a1ec7" title="Toggle Security Markers"><input id="seCheckBox" type="checkbox" checked onclick="switchMarkers('se');" title="Toggle security" onmouseover="updateToolTip(this.title)" onmouseout="document.all.toolTip.innerHTML= ''"></td> -->
                                </table>
                            </td>
                            <td align=right width=30 style="min-width:30px">
                                <table cellpadding=1 cellspacing=0 border=1 style="border-collapse:collapse;border:1px solid #ffffff;">
                                    <!-- <td style="background:url('images/toggle_all.png')" align=center title="Toggle All Markers"><input ID="toggleCheckBox" TYPE="checkbox" checked onclick="toggleAllMarkers();" title="Toggle all markers" onmouseover="updateToolTip('Toggle All Markers')" onmouseout="document.all.toolTip.innerHTML= ''"></td> -->
                                </table>
                            </td>
                        </table>
                    </td>
                    <td bgcolor="#1c1c1c" valign=top align=right width=20 style="min-width:20px">
                        <a href="#" onclick="switchMarkerLegend();this.blur()"><i class="fa fa-map-marker fa-fw" style="color:#ffffff" title="Toggle Marker Legend" onmouseover="updateToolTip('Toggle marker legend')" onmouseout="document.all.toolTip.innerHTML= ''"></i></a>
                    </td>
                    <td bgcolor="#1c1c1c" valign=middle align=right width=25 style="min-width:25px">

                        <a href="#" id="newCaseIcon" onclick="document.getElementById('RUS').innerHTML = 'ARE YOU SURE?';switchNewCaseMarker('icon',this.id);this.blur()"><i id="addCase" class="fa fa-plus-square-o fa-lg fa-fw" style="color:#ffffff" title="Add a new case ..." onmouseover="updateToolTip(this.title)" onmouseout="document.all.toolTip.innerHTML= ''"></i></a>
                    </td>
                    <td bgcolor="#1c1c1c" valign=middle align=right><font style="font: 10pt 'arial'; color:#FFFFFF;"><span id="toolTip"></span></font>&nbsp;</td>
                    </tr>
                </table>

            </div>
        </td>
    </tr>


<script language="javascript">

//  height=560
var mapWindowHeight = window.innerHeight - 31;
document.write("<tr height=" + mapWindowHeight + ">");
document.write("<td height=" + mapWindowHeight + ">");
document.write("<div id='mapcontainer' style='height:100%;width:100%'>");


function launchMod()
{
    $('#modalCase').modal('show');
}

function launchAddCaseModal()
{
    $('#modalAddCaseModal').modal('show');
}


function initialize()
    {
        mapSA = new google.maps.LatLng(-31.438941, 25.111680);
        var options = {
            zoom: 6,
            center: mapSA,
            mapTypeControl: true,
            panControl: true,
            zoomControl: true,
            scaleControl: true,
            streetViewControl:true,
            overviewMapControl: true,
            navigationControlOptions: { style: google.maps.NavigationControlStyle.SMALL },
            mapTypeId: google.maps.MapTypeId.HYBRID
        };

        map = new google.maps.Map(document.getElementById("mapcontainer"), options);

// *****************  1st GPS up or down, 2nd GPS left or right

        var eightMileOverlayBounds = new google.maps.LatLngBounds(
        new google.maps.LatLng(-30.008609, 30.931000),
        new google.maps.LatLng(-29.759365, 31.234000));
        eightMileOverlay = new google.maps.GroundOverlay('images/8milezone.png', eightMileOverlayBounds);
        eightMileOverlay.setMap(null);

// START of Durban's 8 mile radius

        dbnEightMilePolly = new google.maps.Polygon({
            paths: dbnEightMilePollyCoords,
            strokeColor: '#5858a7',
            strokeOpacity: 0.6,
            strokeWeight: 1,
            fillColor: '#5858a7',
            fillOpacity: 0.4
          });

        dbnEightMilePolly.setMap(map);

// END of Durban's 8 mile radius

        var imageBounds = new google.maps.LatLngBounds(
        new google.maps.LatLng(-29.898100, 30.993350),
        new google.maps.LatLng(-29.860934, 31.056900));
        allLocalityOverlay = new google.maps.GroundOverlay('images/locality_overlay_all.png', imageBounds);
        allLocalityOverlay.setMap(null);
        yellowLocalityOverlay = new google.maps.GroundOverlay('images/locality_overlay_yellow.png', imageBounds);
        yellowLocalityOverlay.setMap(null);
        pinkLocalityOverlay = new google.maps.GroundOverlay('images/locality_overlay_pink.png', imageBounds);
        pinkLocalityOverlay.setMap(null);
        purpleLocalityOverlay = new google.maps.GroundOverlay('images/locality_overlay_purple.png', imageBounds);
        purpleLocalityOverlay.setMap(null);
        orangeLocalityOverlay = new google.maps.GroundOverlay('images/locality_overlay_orange.png', imageBounds);
        orangeLocalityOverlay.setMap(null);
        blueLocalityOverlay = new google.maps.GroundOverlay('images/locality_overlay_blue.png', imageBounds);
        blueLocalityOverlay.setMap(null);
        greenLocalityOverlay = new google.maps.GroundOverlay('images/locality_overlay_green.png', imageBounds);
        greenLocalityOverlay.setMap(null);

        var oms = new OverlappingMarkerSpiderfier(map, { markersWontMove: true, keepSpiderfied:true, circleSpiralSwitchover:20 });

<?php

use App\User;
use App\CaseReport;
use App\CaseNote;
use App\Category;
use App\Ship;
use App\Position;
use App\Department;
use App\Municipality;
use App\addressbook;


$cases = CaseReport::whereNotNull('gps_lat')
                    ->whereNotNull('gps_lng')
                    ->get();



foreach ($cases as $case) {



    if ($case->addressbook == 1)
    {
        $userObj          = addressbook::find($case->reporter);
        $ReporterName     = $userObj->FirstName .' '.$userObj->Surname;
        $ReporterPosition = "";
        $ReporterMobile   = $userObj->cellphone;
    }
    else
    {
        $userObj          = user::find($case->reporter);
        $ReporterName     = $userObj->name .' '.$userObj->surname;
        $RepPos           = Position::find($userObj->position);
        $ReporterPosition = $RepPos->name;
        $ReporterMobile   = $userObj->email;

    }


    $user         = User::find($case->user);
    $position     = Position::find($user->position);
    $ID           = $case->id;
    $GPS          = $case->gps_lat .','. $case->gps_lng;
    $Province     = 'KZN';
    $Port         = Municipality::find($case->precinct);
    $Port         = $Port->name;
    $precinctObj  = Municipality::find($case->precinct);
    $Precinct     = $precinctObj->name;
    $Submitted    = $case->created_at;
    $Status       = $case->status;
    $catObjCat    = Category::find($case->category);
    $Category     = $catObjCat->name;
    $PhotoURL     = "http://41.216.130.6:8080/siyaleader-dbnports-mobileApp-api/port_backend/public/".$case->img_url;
    $LastActivity = $case->updated_at;
    $Reporter     = $ReporterName;
    $Position     = $ReporterPosition;
    $Mobile       = $ReporterMobile;
    $Priority     = $case->priority;
    $Description  = $case->description;

    if($case->id)
    {

        $noteResult   = CaseNote::where('caseId','=',$case->id)
                    ->first();

    }


    if(sizeof($noteResult) > 0)
    {

        $noteUserObj = User::find($noteResult->user);
        $AuthDate = $noteResult->created_at;
        $Author   = $noteUserObj->name .' '.$noteUserObj->surname;
        $Note     = $noteResult->note;

    }
    else {

        $AuthDate = "";
        $Author   = "";
        $Note     = "";

    }

$imageStatus = "";
$catStatus   = "";

if($Status == "Pending")  {  $catStatus = "Pen";  $imageStatus = "_pen.png";  }
if($Status == "Allocated")  {  $catStatus = "All";  $imageStatus = "_all.png";  }
if($Status == "Referred")  {  $catStatus = "Ref";  $imageStatus = "_ref.png";  }
if($Status == "Actioned")  {  $catStatus = "Act";  $imageStatus = "_act.png";  }
if($Status == "Closure Requested")  {  $catStatus = "Clo";  $imageStatus = "_clo.png";  }
if($Status == "RESOLVED")  {  $catStatus = "Res";  $imageStatus = "_res.png";  }

if($Category == "Maintenance (Civil)")  {  $imageCategory = "mc";   echo "var infoBoxBorder = '#ffff00';";   }
if($Category == "Maintenance (Electrical)")  {  $imageCategory = "me";   echo "var infoBoxBorder = '#ff33a6';";  }
if($Category == "Maintenance (Mechanical)")  {  $imageCategory = "ma";   echo "var infoBoxBorder = '#fe940b';";  }
if($Category == "Maintenance (Marine)")  {  $imageCategory = "mm";   echo "var infoBoxBorder = '#333dc7';";  }
if($Category == "House Keeping")  {  $imageCategory = "hk";   echo "var infoBoxBorder = '#00ee00';";  }
if($Category == "Traffic Management")  {  $imageCategory = "tr";   echo "var infoBoxBorder = '#0a0c28';";  }

if($Category == "Environment")  {  $imageCategory = "en";   echo "var infoBoxBorder = '#009000';";  }
if($Category == "Health")  {  $imageCategory = "he";   echo "var infoBoxBorder = '#0df1ff';";  }
if($Category == "Port Operations Centre")  {  $imageCategory = "po";   echo "var infoBoxBorder = '#e1e1e1';";  }
if($Category == "Property")  {  $imageCategory = "pr";   echo "var infoBoxBorder = '#999999';";  }
if($Category == "Safety-Risk-Fire")  {  $imageCategory = "sr";   echo "var infoBoxBorder = '#ff0000';";  }
if($Category == "Security")  {  $imageCategory = "se";   echo "var infoBoxBorder = '#8a1ec7';";  }

$imageName = "" .$imageCategory. "" .$imageStatus. "";


echo 'var image = "markers/' .$imageName. '";';


?>

                    var co_ords_<?php echo $ID; ?> = new google.maps.LatLng(<?php echo $GPS; ?>);
                    co_ords.push(co_ords_<?php echo $ID; ?>);



                    var boxContent = "<div style='width:250px;height:200px;overflow-y:auto;overflow-x:hidden'>";

                    boxContent += "<table border=0 style='color:#ffd40e;width:235px' cellpadding=2 cellspacing=0>";
                    boxContent += "<tr><td align='left' valign='top' nowrap><B>Case No :</B></td><td align='left'><?php echo $ID; ?></td></tr>";
                    boxContent += "<tr><td align='left' valign='top' nowrap><B>GPS :</B></td><td align='left'><?php echo $GPS; ?></td></tr>"; // GPS coll
                    boxContent += "<tr><td align='left' valign='top' nowrap><B>Submitted :</B></td><td align='left'><?php echo $Submitted; ?></td></tr>"; // submit_date coll
                    boxContent += "<tr><td align='left' valign='top' nowrap><B>Priority :</B></td><td align='left'><?php echo $Priority; ?></td></tr>"; // prob_priority coll
                    boxContent += "<tr><td align='left' valign='top' nowrap><B>Category :</B></td><td align='left'><?php echo $Category; ?></td></tr>"; // prob_category coll
                    boxContent += "<tr><td align='left' valign='top' nowrap><B>Status :</B></td><td align='left'><?php echo $Status; ?></td></tr>"; // status coll

                    boxContent += "<tr><td align='left' valign='top' nowrap><B>Province :</B></td><td align='left'><?php echo $Province; ?></td></tr>"; // Province coll
                    boxContent += "<tr><td align='left' valign='top' nowrap><B>Port :</B></td><td align='left'><?php echo $Port; ?></td></tr>"; // District coll
                    boxContent += "<tr><td align='left' valign='top' nowrap><B>Precinct :</B></td><td align='left'><?php echo $Precinct; ?></td></tr>";  // Municipality coll

                    boxContent += "<tr><td align='left' valign='top' nowrap><B>Reporter :</B></td><td align='left'><?php echo $Reporter; ?></td></tr>";  // ccg_nam + ccg_sur
                    boxContent += "<tr><td align='left' valign='top' nowrap><B>Position :</B></td><td align='left'><?php echo $Position; ?></td></tr>";  // ccg_pos
                    boxContent += "<tr><td align='left' valign='top' nowrap><B>Contact No :</B></td><td align='left'><?php echo $Mobile; ?></td></tr>";  // ccg_mob
                    boxContent += "<tr><td align='left' valign='top' nowrap><B>Description :</B></td><td align='left'><?php echo $Description; ?></td></tr>";  // prob_exp
                    boxContent += "<tr><td align='left' valign='top' nowrap><B>Last Activity :</B></td><td align='left'><?php echo $LastActivity; ?></td></tr>";  // Last person to have interacted on CMC
                    boxContent += "<tr><td align='left' valign='top' nowrap><B>Author Date :</B></td><td align='left'><?php echo $AuthDate; ?></td></tr>";  // Last person to have interacted on CMC
                    boxContent += "<tr><td align='left' valign='top' nowrap><B>Author :</B></td><td align='left'><?php echo $Author; ?></td></tr>";  // Last person to have interacted on CMC
                    boxContent += "</table>";
                    boxContent += "</div>";

                    boxContent += "<table width=100% height=50 border=0 cellpadding=0 cellspacing=0><tr>";
                    boxContent += "<td align='center' valign='bottom'><a href='#' onclick='alert(\"Work in progress ... Watch this space ...\")'><img src='images/icon_trash.png' title='Remove Case' onmouseout='updateToolTip(\"\")'></a></td>";
                    boxContent += "<td align='center' valign='bottom'><a href='#' onclick='alert(\"Work in progress ... Watch this space ...\")'><img src='images/icon_join.png' title='Combine Duplicate Case'  onmouseout='updateToolTip(\"\")'></a></td>";
                    boxContent += "<td align='center' valign='bottom'><a href='#' onclick='alert(\"Work in progress ... Watch this space ...\")'><img src='images/icon_weather.png' title='Weather Conditions'  onmouseout='updateToolTip(\"\")'></a></td>";
                    boxContent += "<td align='center' valign='bottom'><a href='#' onClick='launchMod();launchCaseModal(<?php echo $ID; ?>);'><img src='images/icon_refer.png' title='Case Profile' onmouseout='updateToolTip(\"\")'></a></td>";
                    boxContent += "<td align='center' valign='bottom'><a href='#' onclick='showPhoto(\"<?php echo $PhotoURL; ?>\",\"" + infoBoxBorder +"\");killMenu();killLayerMenu()'><img id='photoIcon' src='images/icon_photo.png' title='View Photo' onmouseout='updateToolTip(\"\")'></a></td>";
                    boxContent += "</table>";

                    var boxText = document.createElement("div");
                    boxText.style.cssText = "border:2px solid " + infoBoxBorder + ";  margin-top: 0px; background: #1c1c1c; padding: 3px; box-shadow:4px 4px 4px #000000";
                    boxText.innerHTML = boxContent;

                    var infoBoxOptions = {
                        content: boxText
                        ,disableAutoPan: false
                        ,maxWidth: 0
                        ,pixelOffset: new google.maps.Size(-134, 0)
                        ,zIndex: null
                        ,boxStyle: {
                            opacity: 1
                            ,width: "268px"
                            }
                        ,closeBoxMargin: "3px 3px 3px 3px"
                        ,closeBoxURL: "images/closeX.png"
                        ,infoBoxClearance: new google.maps.Size(1, 1)
                        ,isHidden: false
                        ,pane: "floatPane"
                        ,enableEventPropagation: false
                        };

                        var ib_<?php echo $ID; ?> = new InfoBox(infoBoxOptions);

                        infoBoxArray.push(ib_<?php echo $ID; ?>);

                        marker_<?php echo $ID; ?> = new google.maps.Marker({ position: co_ords_<?php echo $ID; ?>, map: map, icon: image, title:"Case Number: <?php echo $ID; ?>",draggable:true });
                        markers.push(marker_<?php echo $ID; ?>);
                        oms.addMarker(marker_<?php echo $ID; ?>);

                        <?php echo $imageCategory; ?>Array.push(marker_<?php echo $ID; ?>);

                        <?php echo $imageCategory . $catStatus; ?>Array.push(marker_<?php echo $ID; ?>);

                        google.maps.event.addListener(marker_<?php echo $ID; ?>, 'click', function() {  ib_<?php echo $ID; ?>.open(map, marker_<?php echo $ID; ?>);  });


<?php

}

$ships = Ship::all();

foreach ($ships as $ship) {

    $ID          = $ship->id;
    $shipName    = $ship->shipName;
    $shipGPS     = $ship->shipGPS;
    $shipHeading = $ship->shipHeading;



?>

var shipID = "<?php echo $ID; ?>";
var shipName = "<?php echo $shipName; ?>";
var shipGPS = "<?php echo $shipGPS; ?>";
var shipHeading = "<?php echo $shipHeading; ?>";

var shipCoords_<?php echo $ID; ?> = new google.maps.LatLng(<?php echo $shipGPS; ?>);
shipCoords.push(shipCoords_<?php echo $ID; ?>);

var shipInfoBoxBorder;

if (google.maps.geometry.poly.containsLocation(shipCoords_<?php echo $ID; ?>, dbnEightMilePolly))
        {
            shipInfoBoxBorder = "#00ff00";
        }
else    {
            shipInfoBoxBorder = "#ffffff";
        }

var shipBoxContent = "<div style='width:200px;height:75px;overflow-y:auto;overflow-x:hidden'>";

shipBoxContent += "<table border=0 style='color:#ffd40e;width:235px' cellpadding=2 cellspacing=0>";
shipBoxContent += "<tr><td align='left' valign='top' nowrap><B>Name :</B></td><td align='left'><?php echo $shipName; ?></td></tr>";
shipBoxContent += "<tr><td align='left' valign='top' nowrap><B>GPS :</B></td><td align='left'><?php echo $shipGPS; ?></td></tr>";
shipBoxContent += "<tr><td align='left' valign='top' nowrap><B>Heading :</B></td><td align='left'><?php echo $shipHeading; ?></td></tr>";
shipBoxContent += "</table>";
shipBoxContent += "</div>";


var shipBoxText = document.createElement("div");
shipBoxText.style.cssText = "border:1px solid " + shipInfoBoxBorder + ";  margin-top: 0px; background: #1c1c1c; padding: 3px; box-shadow:4px 4px 4px #000000";
shipBoxText.innerHTML = shipBoxContent;

var shipInfoBoxOptions = {
    content: shipBoxText
    ,disableAutoPan: false
    ,maxWidth: 0
    ,pixelOffset: new google.maps.Size(0, 0)
    ,zIndex: null
    ,boxStyle: {
        opacity: 1
        ,width: "218px"
        }
    ,closeBoxMargin: "3px 3px 3px 3px"
    ,closeBoxURL: "images/closeX.png"
    ,infoBoxClearance: new google.maps.Size(1, 1)
    ,isHidden: false
    ,pane: "floatPane"
    ,enableEventPropagation: false
    };

    var sib_<?php echo $shipID; ?> = new InfoBox(shipInfoBoxOptions);

    shipInfoBoxArray.push(sib_<?php echo $shipID; ?>);

    var shipInZoneIcon = {
            path:google.maps.SymbolPath.FORWARD_CLOSED_ARROW,
            scale: 3,
            strokeWeight: 2,
            fillColor:'#00ff00',
            fillOpacity:1,
            strokeColor:'#00ff00',
            strokeOpacity:1,
            rotation:<?php echo $shipHeading; ?>
    }
    var shipOutZoneIcon = {
            path:google.maps.SymbolPath.FORWARD_CLOSED_ARROW,
            scale: 3,
            strokeWeight: 2,
            fillColor:'#ffffff',
            fillOpacity:1,
            strokeColor:'#ffffff',
            strokeOpacity:1,
            rotation:<?php echo $shipHeading; ?>
    }

    var icon;
    if (google.maps.geometry.poly.containsLocation(shipCoords_<?php echo $ID; ?>, dbnEightMilePolly))
            {
                icon = shipInZoneIcon;
            }
    else    {
                icon = shipOutZoneIcon;
            }

    shipMarker_<?php echo $shipID; ?> = new google.maps.Marker({ position: shipCoords_<?php echo $shipID; ?>, map: map, icon: icon, title:"<?php echo $shipName; ?>",draggable:false });
    shipMarkers.push(shipMarker_<?php echo $shipID; ?>);
    oms.addMarker(shipMarker_<?php echo $shipID; ?>);

    google.maps.event.addListener(shipMarker_<?php echo $shipID; ?>, 'click', function() {      sib_<?php echo $ID; ?>.open(map, shipMarker_<?php echo $ID; ?>);  });

<?php
 }
?>


    mcOptions = { gridSize: 50, maxZoom: 15 };
    markerCluster = new MarkerClusterer(map, markers, mcOptions);
    shipCluster = new MarkerClusterer(map, shipMarkers, mcOptions);
    google.maps.event.addListener(map,'zoom_changed', function ()  {  resetMarkerVisibility();  markerCluster = new MarkerClusterer(map, markers, mcOptions);   });
    google.maps.event.addListener(map,'zoom_changed', function ()  {  resetMarkerVisibility();  markerCluster = new MarkerClusterer(map, shipMarkers, mcOptions);   });


// START of Zone Selecter Module

function createZoneArray ()
    {
        document.getElementById('zoneGPSarray').style.display = "flex";
        var eightMileCoords = "";
        var cleanLatLng = "";
        var zoneMarker = "markers/zonemarker_green.png";
        map.setOptions({ draggableCursor: 'crosshair' });
        zoneListener = google.maps.event.addListener(map,'click', function(event)
            {
                eightMileCoords = "";
                cleanLatLng = event.latLng.toString();
                cleanLatLng = cleanLatLng.replace('(','');
                cleanLatLng = cleanLatLng.replace(')','');
                eightMileCoords += cleanLatLng;
                zoneNewMarker = new google.maps.Marker({ zindex:10000, position:event.latLng, icon:zoneMarker, draggable:false, map:map });
                zoneArrayMarkers.push(zoneNewMarker);
                document.getElementById('zoneGPSarray').value += "new google.maps.LatLng("+eightMileCoords+"),\n";
            });

        zoneListener = google.maps.event.addListener(eightMileOverlay,'click', function(event)
            {
                eightMileCoords = "";
                cleanLatLng = event.latLng.toString();
                cleanLatLng = cleanLatLng.replace('(','');
                cleanLatLng = cleanLatLng.replace(')','');
                eightMileCoords += cleanLatLng;
                zoneNewMarker = new google.maps.Marker({ zindex:10000, position:event.latLng, icon:zoneMarker, draggable:false, map:map });
                zoneArrayMarkers.push(zoneNewMarker);
                document.getElementById('zoneGPSarray').value += "new google.maps.LatLng("+eightMileCoords+"),\n";
            });
    }

    window.addEventListener("keydown", zoneKeysPressed, false);
    window.addEventListener("keyup", keysReleased, false);
    var keys = [];
    function zoneKeysPressed (e)
        {
            keys[e.keyCode] = true;
            if (keys[17] && keys[16] && keys[90])
                    {
                        toggleZoneSelector();
                    }
            else    {
                        return;
                    }
            e.preventDefault();
        }

    function keysReleased(e)
        {
            keys[e.keyCode] = false;
        }

    function toggleZoneSelector ()
        {
            if(selectZoneArray == 0)
                {
                    createZoneArray();
                    selectZoneArray = 1;
                }
        else    {
                    cleanLatLng = "";
                    eightMileCoords = "";
                    document.getElementById('zoneGPSarray').value="";
                    document.getElementById('zoneGPSarray').style.display = "none";
                    for(var i = 0; i < zoneArrayMarkers.length; i++)
                        {
                            zoneArrayMarkers[i].setMap(null);
                        }
                    zoneArrayMarkers = [];
                    google.maps.event.removeListener(zoneListener);
                    map.setOptions({ draggableCursor: null });
                    selectZoneArray = 0;
                }
        }





// end of zoneMaker Module





    }

// ^^^^^^^^^^^^^ End of initialize() function ^^^^^^^^^^^^^^^^^^^^


    google.maps.event.addDomListener(window, 'load', initialize);

                    </script>
                </div>
            </td>
        </tr>
</table>


<div id="markerLegend" class="markLegend" style="opacity:0.9;z-index:2;width:187px;height:433px;display:flex">
    <IMG SRC="images/marker_legend.png" WIDTH=187 HEIGHT=433 BORDER=0 onclick="switchMarkerLegend()">
</div>
<!--
<div id="weatherSticker" style="z-index:1;width:120px;position:fixed;opacity: 0.7;bottom:15px;right:5px;display:block">
    <href="#" onmouseover="this.style='cursor:pointer'" onclick="showWeather()" title="Click for Weather Forecast">
        <img style=" width:120px;border-radius:3px;" src="http://weathersticker.wunderground.com/weathersticker/cgi-bin/banner/ban/wxBanner?bannertype=wu_travel_ship1_metric&pwscode=IKWAZULU14&ForcedCity=Durban&ForcedState=South Africa&wmo=68588&language=EN">
    </a>
</div>
 -->
<div id="siyaleader" style="valign:top; z-index:3;position:fixed;bottom:28px;left:1px;width:77px;height:32px;display:block">
    <IMG SRC="images/siyaleader_google.png" WIDTH=77 height=32 BORDER=0 style="opacity: 1;">
</div>

<div id="poStatusSelect" style="opacity:0.9;box-shadow:6px 6px 6px #000000;z-index:108;position:fixed;top:31px;left:488px;display:none">
<table border=0 cellpadding=0 cellspacing=0 style="background:#1c1c1c;color:#ffffff;margin-top:0px;margin-bottom:0px;border-collapse:collapse;border-style:solid;border-top:0px solid #1C1C1C;border-left:6px solid #1C1C1C;border-bottom:6px solid #1C1C1C;border-right:6px solid #1C1C1C">
<td align=center>
    <table border=0 cellpadding=0 cellspacing=0 width="117">
        <td align=center><B>&#9660;</B></td>
    </table>
    <table cellpadding=1 cellspacing=0 border=0 style="width:116px;background:#1c1c1c;font: 10pt 'arial'; color:#ffffff;margin-top:0px;margin-bottom:0px;border-collapse:collapse;border:1px solid #ffffff;">
        <tr>
            <td style="background:#ff0000"><INPUT ID="poPenRadio" TYPE="radio" onclick="toggleRadio('poPen');switchStatusMarkers('poPen')" checked></td>
            <td>&nbsp; Pending &nbsp;</td>
        </tr><tr>
            <td style="background:#ff9600"><INPUT ID="poAllRadio" TYPE="radio" onclick="toggleRadio('poAll');switchStatusMarkers('poAll')"  checked></td>
            <td>&nbsp; Allocated &nbsp;</td>
        </tr><tr>
            <td style="background:#ffff00"><INPUT ID="poRefRadio" TYPE="radio" onclick="toggleRadio('poRef');switchStatusMarkers('poRef')"  checked></td>
            <td>&nbsp; Referred &nbsp;</td>
        </tr><tr>
            <td style="background:#00cc00"><INPUT ID="poActRadio" TYPE="radio" onclick="toggleRadio('poAct');switchStatusMarkers('poAct')"  checked></td>
            <td>&nbsp; Actioned &nbsp;</td>
        </tr><tr>
            <td style="background:#969696"><INPUT ID="poCloRadio" TYPE="radio" onclick="toggleRadio('poClo');switchStatusMarkers('poClo')"  checked></td>
            <td>&nbsp; Closure Req &nbsp;</td>
        </tr><tr>
            <td style="background:#000000"><INPUT ID="poResRadio" TYPE="radio" onclick="toggleRadio('poRes');switchStatusMarkers('poRes')"  checked></td>
            <td>&nbsp; Resolved &nbsp;</td>
        </tr>
    </table>
    <a href="#" onclick="hideStatusSelects()"><IMG SRC="images/closeX.png" BORDER=0 title="Close this Status Selector"></a>
</td>
</table>
</div>

<div id="prStatusSelect" style="opacity:0.9;box-shadow:6px 6px 6px #000000;z-index:108;position:fixed;top:31px;left:511px;display:none">
<table border=0 cellpadding=0 cellspacing=0 style="background:#1c1c1c;color:#ffffff;margin-top:0px;margin-bottom:0px;border-collapse:collapse;border-style:solid;border-top:0px solid #1C1C1C;border-left:6px solid #1C1C1C;border-bottom:6px solid #1C1C1C;border-right:6px solid #1C1C1C">
<td align=center>
    <table border=0 cellpadding=0 cellspacing=0 width="117">
        <td align=center><B>&#9660;</B></td>
    </table>
    <table cellpadding=1 cellspacing=0 border=0 style="width:116px;background:#1c1c1c;font: 10pt 'arial'; color:#ffffff;margin-top:0px;margin-bottom:0px;border-collapse:collapse;border:1px solid #ffffff;">
        <tr>
            <td style="background:#ff0000"><INPUT ID="prPenRadio" TYPE="radio" onclick="toggleRadio('prPen');switchStatusMarkers('prPen')" checked></td>
            <td>&nbsp; Pending &nbsp;</td>
        </tr><tr>
            <td style="background:#ff9600"><INPUT ID="prAllRadio" TYPE="radio" onclick="toggleRadio('prAll');switchStatusMarkers('prAll')"  checked></td>
            <td>&nbsp; Allocated &nbsp;</td>
        </tr><tr>
            <td style="background:#ffff00"><INPUT ID="prRefRadio" TYPE="radio" onclick="toggleRadio('prRef');switchStatusMarkers('prRef')"  checked></td>
            <td>&nbsp; Referred &nbsp;</td>
        </tr><tr>
            <td style="background:#00cc00"><INPUT ID="prActRadio" TYPE="radio" onclick="toggleRadio('prAct');switchStatusMarkers('prAct')"  checked></td>
            <td>&nbsp; Actioned &nbsp;</td>
        </tr><tr>
            <td style="background:#969696"><INPUT ID="prCloRadio" TYPE="radio" onclick="toggleRadio('prClo');switchStatusMarkers('prClo')"  checked></td>
            <td>&nbsp; Closure Req &nbsp;</td>
        </tr><tr>
            <td style="background:#000000"><INPUT ID="prResRadio" TYPE="radio" onclick="toggleRadio('prRes');switchStatusMarkers('prRes')"  checked></td>
            <td>&nbsp; Resolved &nbsp;</td>
        </tr>
    </table>
    <a href="#" onclick="hideStatusSelects()"><IMG SRC="images/closeX.png" BORDER=0 title="Close this Status Selector"></a>
</td>
</table>
</div>

<div id="trStatusSelect" style="opacity:0.9;box-shadow:6px 6px 6px #000000;z-index:108;position:fixed;top:31px;left:534px;display:none">
<table border=0 cellpadding=0 cellspacing=0 style="background:#1c1c1c;color:#ffffff;margin-top:0px;margin-bottom:0px;border-collapse:collapse;border-style:solid;border-top:0px solid #1C1C1C;border-left:6px solid #1C1C1C;border-bottom:6px solid #1C1C1C;border-right:6px solid #1C1C1C">
<td align=center>
    <table border=0 cellpadding=0 cellspacing=0 width="117">
        <td align=center><B>&#9660;</B></td>
    </table>
    <table cellpadding=1 cellspacing=0 border=0 style="width:116px;background:#1c1c1c;font: 10pt 'arial'; color:#ffffff;margin-top:0px;margin-bottom:0px;border-collapse:collapse;border:1px solid #ffffff;">
        <tr>
            <td style="background:#ff0000"><INPUT ID="trPenRadio" TYPE="radio" onclick="toggleRadio('trPen');switchStatusMarkers('trPen')" checked></td>
            <td>&nbsp; Pending &nbsp;</td>
        </tr><tr>
            <td style="background:#ff9600"><INPUT ID="trAllRadio" TYPE="radio" onclick="toggleRadio('trAll');switchStatusMarkers('trAll')"  checked></td>
            <td>&nbsp; Allocated &nbsp;</td>
        </tr><tr>
            <td style="background:#ffff00"><INPUT ID="trRefRadio" TYPE="radio" onclick="toggleRadio('trRef');switchStatusMarkers('trRef')"  checked></td>
            <td>&nbsp; Referred &nbsp;</td>
        </tr><tr>
            <td style="background:#00cc00"><INPUT ID="trActRadio" TYPE="radio" onclick="toggleRadio('trAct');switchStatusMarkers('trAct')"  checked></td>
            <td>&nbsp; Actioned &nbsp;</td>
        </tr><tr>
            <td style="background:#969696"><INPUT ID="trCloRadio" TYPE="radio" onclick="toggleRadio('trClo');switchStatusMarkers('trClo')"  checked></td>
            <td>&nbsp; Closure Req &nbsp;</td>
        </tr><tr>
            <td style="background:#000000"><INPUT ID="trResRadio" TYPE="radio" onclick="toggleRadio('trRes');switchStatusMarkers('trRes')"  checked></td>
            <td>&nbsp; Resolved &nbsp;</td>
        </tr>
    </table>
    <a href="#" onclick="hideStatusSelects()"><IMG SRC="images/closeX.png" BORDER=0 title="Close this Status Selector"></a>
</td>
</table>
</div>

<div id="srStatusSelect" style="opacity:0.9;box-shadow:6px 6px 6px #000000;z-index:108;position:fixed;top:31px;left:557px;display:none">
<table border=0 cellpadding=0 cellspacing=0 style="background:#1c1c1c;color:#ffffff;margin-top:0px;margin-bottom:0px;border-collapse:collapse;border-style:solid;border-top:0px solid #1C1C1C;border-left:6px solid #1C1C1C;border-bottom:6px solid #1C1C1C;border-right:6px solid #1C1C1C">
<td align=center>
    <table border=0 cellpadding=0 cellspacing=0 width="117">
        <td align=center><B>&#9660;</B></td>
    </table>
    <table cellpadding=1 cellspacing=0 border=0 style="width:116px;background:#1c1c1c;font: 10pt 'arial'; color:#ffffff;margin-top:0px;margin-bottom:0px;border-collapse:collapse;border:1px solid #ffffff;">
        <tr>
            <td style="background:#ff0000"><INPUT ID="srPenRadio" TYPE="radio" onclick="toggleRadio('srPen');switchStatusMarkers('srPen')" checked></td>
            <td>&nbsp; Pending &nbsp;</td>
        </tr><tr>
            <td style="background:#ff9600"><INPUT ID="srAllRadio" TYPE="radio" onclick="toggleRadio('srAll');switchStatusMarkers('srAll')"  checked></td>
            <td>&nbsp; Allocated &nbsp;</td>
        </tr><tr>
            <td style="background:#ffff00"><INPUT ID="srRefRadio" TYPE="radio" onclick="toggleRadio('srRef');switchStatusMarkers('srRef')"  checked></td>
            <td>&nbsp; Referred &nbsp;</td>
        </tr><tr>
            <td style="background:#00cc00"><INPUT ID="srActRadio" TYPE="radio" onclick="toggleRadio('srAct');switchStatusMarkers('srAct')"  checked></td>
            <td>&nbsp; Actioned &nbsp;</td>
        </tr><tr>
            <td style="background:#969696"><INPUT ID="srCloRadio" TYPE="radio" onclick="toggleRadio('srClo');switchStatusMarkers('srClo')"  checked></td>
            <td>&nbsp; Closure Req &nbsp;</td>
        </tr><tr>
            <td style="background:#000000"><INPUT ID="srResRadio" TYPE="radio" onclick="toggleRadio('srRes');switchStatusMarkers('srRes')"  checked></td>
            <td>&nbsp; Resolved &nbsp;</td>
        </tr>
    </table>
    <a href="#" onclick="hideStatusSelects()"><IMG SRC="images/closeX.png" BORDER=0 title="Close this Status Selector"></a>
</td>
</table>
</div>

<div id="maStatusSelect" style="opacity:0.9;box-shadow:6px 6px 6px #000000;z-index:108;position:fixed;top:31px;left:580px;display:none">
<table border=0 cellpadding=0 cellspacing=0 style="background:#1c1c1c;color:#ffffff;margin-top:0px;margin-bottom:0px;border-collapse:collapse;border-style:solid;border-top:0px solid #1C1C1C;border-left:6px solid #1C1C1C;border-bottom:6px solid #1C1C1C;border-right:6px solid #1C1C1C">
<td align=center>
    <table border=0 cellpadding=0 cellspacing=0 width="117">
        <td align=center><B>&#9660;</B></td>
    </table>
    <table cellpadding=1 cellspacing=0 border=0 style="width:116px;background:#1c1c1c;font: 10pt 'arial'; color:#ffffff;margin-top:0px;margin-bottom:0px;border-collapse:collapse;border:1px solid #ffffff;">
        <tr>
            <td style="background:#ff0000"><INPUT ID="maPenRadio" TYPE="radio" onclick="toggleRadio('maPen');switchStatusMarkers('maPen')" checked></td>
            <td>&nbsp; Pending &nbsp;</td>
        </tr><tr>
            <td style="background:#ff9600"><INPUT ID="maAllRadio" TYPE="radio" onclick="toggleRadio('maAll');switchStatusMarkers('maAll')"  checked></td>
            <td>&nbsp; Allocated &nbsp;</td>
        </tr><tr>
            <td style="background:#ffff00"><INPUT ID="maRefRadio" TYPE="radio" onclick="toggleRadio('maRef');switchStatusMarkers('maRef')"  checked></td>
            <td>&nbsp; Referred &nbsp;</td>
        </tr><tr>
            <td style="background:#00cc00"><INPUT ID="maActRadio" TYPE="radio" onclick="toggleRadio('maAct');switchStatusMarkers('maAct')"  checked></td>
            <td>&nbsp; Actioned &nbsp;</td>
        </tr><tr>
            <td style="background:#969696"><INPUT ID="maCloRadio" TYPE="radio" onclick="toggleRadio('maClo');switchStatusMarkers('maClo')"  checked></td>
            <td>&nbsp; Closure Req &nbsp;</td>
        </tr><tr>
            <td style="background:#000000"><INPUT ID="maResRadio" TYPE="radio" onclick="toggleRadio('maRes');switchStatusMarkers('maRes')"  checked></td>
            <td>&nbsp; Resolved &nbsp;</td>
        </tr>
    </table>
    <a href="#" onclick="hideStatusSelects()"><IMG SRC="images/closeX.png" BORDER=0 title="Close this Status Selector"></a>
</td>
</table>
</div>

<div id="mcStatusSelect" style="opacity:0.9;box-shadow:6px 6px 6px #000000;z-index:104;position:fixed;top:130px;left:850px;display:none">
<table border=0 cellpadding=0 cellspacing=0 style="background:#1c1c1c;color:#ffffff;margin-top:0px;margin-bottom:0px;border-collapse:collapse;border-style:solid;border-top:0px solid #1C1C1C;border-left:6px solid #1C1C1C;border-bottom:6px solid #1C1C1C;border-right:6px solid #1C1C1C">
<td align=center>
    <table border=0 cellpadding=0 cellspacing=0 width="117">
        <td align=center><B>&#9660;</B></td>
    </table>
    <table cellpadding=1 cellspacing=0 border=0 style="width:116px;background:#1c1c1c;font: 10pt 'arial'; color:#ffffff;margin-top:0px;margin-bottom:0px;border-collapse:collapse;border:1px solid #ffffff;">
        <tr>
            <td style="background:#ff0000"><INPUT ID="mcPenRadio" TYPE="radio" onclick="toggleRadio('mcPen');switchStatusMarkers('mcPen')" checked></td>
            <td>&nbsp; Pending &nbsp;</td>
        </tr><tr>
            <td style="background:#ff9600"><INPUT ID="mcAllRadio" TYPE="radio" onclick="toggleRadio('mcAll');switchStatusMarkers('mcAll')"  checked></td>
            <td>&nbsp; Allocated &nbsp;</td>
        </tr><tr>
            <td style="background:#ffff00"><INPUT ID="mcRefRadio" TYPE="radio" onclick="toggleRadio('mcRef');switchStatusMarkers('mcRef')"  checked></td>
            <td>&nbsp; Referred &nbsp;</td>
        </tr><tr>
            <td style="background:#00cc00"><INPUT ID="mcActRadio" TYPE="radio" onclick="toggleRadio('mcAct');switchStatusMarkers('mcAct')"  checked></td>
            <td>&nbsp; Actioned &nbsp;</td>
        </tr><tr>
            <td style="background:#969696"><INPUT ID="mcCloRadio" TYPE="radio" onclick="toggleRadio('mcClo');switchStatusMarkers('mcClo')"  checked></td>
            <td>&nbsp; Closure Req &nbsp;</td>
        </tr><tr>
            <td style="background:#000000"><INPUT ID="mcResRadio" TYPE="radio" onclick="toggleRadio('mcRes');switchStatusMarkers('mcRes')"  checked></td>
            <td>&nbsp; Resolved &nbsp;</td>
        </tr>
    </table>
    <a href="#" onclick="hideStatusSelects()"><IMG SRC="images/closeX.png" BORDER=0 title="Close this Status Selector"></a>
</td>
</table>
</div>

<div id="hkStatusSelect" style="opacity:0.9;box-shadow:6px 6px 6px #000000;z-index:107;position:fixed;top:31px;left:626px;display:none">
<table border=0 cellpadding=0 cellspacing=0 style="background:#1c1c1c;color:#ffffff;margin-top:0px;margin-bottom:0px;border-collapse:collapse;border-style:solid;border-top:0px solid #1C1C1C;border-left:6px solid #1C1C1C;border-bottom:6px solid #1C1C1C;border-right:6px solid #1C1C1C">
<td align=center>
    <table border=0 cellpadding=0 cellspacing=0 width="117">
        <td align=center><B>&#9660;</B></td>
    </table>
    <table cellpadding=1 cellspacing=0 border=0 style="width:116px;background:#1c1c1c;font: 10pt 'arial'; color:#ffffff;margin-top:0px;margin-bottom:0px;border-collapse:collapse;border:1px solid #ffffff;">
        <tr>
            <td style="background:#ff0000"><INPUT ID="hkPenRadio" TYPE="radio" onclick="toggleRadio('hkPen');switchStatusMarkers('hkPen')" checked></td>
            <td>&nbsp; Pending &nbsp;</td>
        </tr><tr>
            <td style="background:#ff9600"><INPUT ID="hkAllRadio" TYPE="radio" onclick="toggleRadio('hkAll');switchStatusMarkers('hkAll')"  checked></td>
            <td>&nbsp; Allocated &nbsp;</td>
        </tr><tr>
            <td style="background:#ffff00"><INPUT ID="hkRefRadio" TYPE="radio" onclick="toggleRadio('hkRef');switchStatusMarkers('hkRef')"  checked></td>
            <td>&nbsp; Referred &nbsp;</td>
        </tr><tr>
            <td style="background:#00cc00"><INPUT ID="hkActRadio" TYPE="radio" onclick="toggleRadio('hkAct');switchStatusMarkers('hkAct')"  checked></td>
            <td>&nbsp; Actioned &nbsp;</td>
        </tr><tr>
            <td style="background:#969696"><INPUT ID="hkCloRadio" TYPE="radio" onclick="toggleRadio('hkClo');switchStatusMarkers('hkClo')"  checked></td>
            <td>&nbsp; Closure Req &nbsp;</td>
        </tr><tr>
            <td style="background:#000000"><INPUT ID="hkResRadio" TYPE="radio" onclick="toggleRadio('hkRes');switchStatusMarkers('hkRes')"  checked></td>
            <td>&nbsp; Resolved &nbsp;</td>
        </tr>
    </table>
    <a href="#" onclick="hideStatusSelects()"><IMG SRC="images/closeX.png" BORDER=0 title="Close this Status Selector"></a>
</td>
</table>
</div>

<div id="enStatusSelect" style="opacity:0.9;box-shadow:6px 6px 6px #000000;z-index:108;position:fixed;top:31px;left:649px;display:none">
<table border=0 cellpadding=0 cellspacing=0 style="background:#1c1c1c;color:#ffffff;margin-top:0px;margin-bottom:0px;border-collapse:collapse;border-style:solid;border-top:0px solid #1C1C1C;border-left:6px solid #1C1C1C;border-bottom:6px solid #1C1C1C;border-right:6px solid #1C1C1C">
<td align=center>
    <table border=0 cellpadding=0 cellspacing=0 width="117">
        <td align=center><B>&#9660;</B></td>
    </table>
    <table cellpadding=1 cellspacing=0 border=0 style="width:116px;background:#1c1c1c;font: 10pt 'arial'; color:#ffffff;margin-top:0px;margin-bottom:0px;border-collapse:collapse;border:1px solid #ffffff;">
        <tr>
            <td style="background:#ff0000"><INPUT ID="enPenRadio" TYPE="radio" onclick="toggleRadio('enPen');switchStatusMarkers('enPen')" checked></td>
            <td>&nbsp; Pending &nbsp;</td>
        </tr><tr>
            <td style="background:#ff9600"><INPUT ID="enAllRadio" TYPE="radio" onclick="toggleRadio('enAll');switchStatusMarkers('enAll')"  checked></td>
            <td>&nbsp; Allocated &nbsp;</td>
        </tr><tr>
            <td style="background:#ffff00"><INPUT ID="enRefRadio" TYPE="radio" onclick="toggleRadio('enRef');switchStatusMarkers('enRef')"  checked></td>
            <td>&nbsp; Referred &nbsp;</td>
        </tr><tr>
            <td style="background:#00cc00"><INPUT ID="enActRadio" TYPE="radio" onclick="toggleRadio('enAct');switchStatusMarkers('enAct')"  checked></td>
            <td>&nbsp; Actioned &nbsp;</td>
        </tr><tr>
            <td style="background:#969696"><INPUT ID="enCloRadio" TYPE="radio" onclick="toggleRadio('enClo');switchStatusMarkers('enClo')"  checked></td>
            <td>&nbsp; Closure Req &nbsp;</td>
        </tr><tr>
            <td style="background:#000000"><INPUT ID="enResRadio" TYPE="radio" onclick="toggleRadio('enRes');switchStatusMarkers('enRes')"  checked></td>
            <td>&nbsp; Resolved &nbsp;</td>
        </tr>
    </table>
    <a href="#" onclick="hideStatusSelects()"><IMG SRC="images/closeX.png" BORDER=0 title="Close this Status Selector"></a>
</td>
</table>
</div>

<div id="heStatusSelect" style="opacity:0.9;box-shadow:6px 6px 6px #000000;z-index:108;position:fixed;top:31px;left:672px;display:none">
<table border=0 cellpadding=0 cellspacing=0 style="background:#1c1c1c;color:#ffffff;margin-top:0px;margin-bottom:0px;border-collapse:collapse;border-style:solid;border-top:0px solid #1C1C1C;border-left:6px solid #1C1C1C;border-bottom:6px solid #1C1C1C;border-right:6px solid #1C1C1C">
<td align=center>
    <table border=0 cellpadding=0 cellspacing=0 width="117">
        <td align=center><B>&#9660;</B></td>
    </table>
    <table cellpadding=1 cellspacing=0 border=0 style="width:116px;background:#1c1c1c;font: 10pt 'arial'; color:#ffffff;margin-top:0px;margin-bottom:0px;border-collapse:collapse;border:1px solid #ffffff;">
        <tr>
            <td style="background:#ff0000"><INPUT ID="hePenRadio" TYPE="radio" onclick="toggleRadio('hePen');switchStatusMarkers('hePen')" checked></td>
            <td>&nbsp; Pending &nbsp;</td>
        </tr><tr>
            <td style="background:#ff9600"><INPUT ID="heAllRadio" TYPE="radio" onclick="toggleRadio('heAll');switchStatusMarkers('heAll')"  checked></td>
            <td>&nbsp; Allocated &nbsp;</td>
        </tr><tr>
            <td style="background:#ffff00"><INPUT ID="heRefRadio" TYPE="radio" onclick="toggleRadio('heRef');switchStatusMarkers('heRef')"  checked></td>
            <td>&nbsp; Referred &nbsp;</td>
        </tr><tr>
            <td style="background:#00cc00"><INPUT ID="heActRadio" TYPE="radio" onclick="toggleRadio('heAct');switchStatusMarkers('heAct')"  checked></td>
            <td>&nbsp; Actioned &nbsp;</td>
        </tr><tr>
            <td style="background:#969696"><INPUT ID="heCloRadio" TYPE="radio" onclick="toggleRadio('heClo');switchStatusMarkers('heClo')"  checked></td>
            <td>&nbsp; Closure Req &nbsp;</td>
        </tr><tr>
            <td style="background:#000000"><INPUT ID="heResRadio" TYPE="radio" onclick="toggleRadio('heRes');switchStatusMarkers('heRes')"  checked></td>
            <td>&nbsp; Resolved &nbsp;</td>
        </tr>
    </table>
    <a href="#" onclick="hideStatusSelects()"><IMG SRC="images/closeX.png" BORDER=0 title="Close this Status Selector"></a>
</td>
</table>
</div>

<div id="mmStatusSelect" style="opacity:0.9;box-shadow:6px 6px 6px #000000;z-index:106;position:fixed;top:31px;left:695px;display:none">
<table border=0 cellpadding=0 cellspacing=0 style="background:#1c1c1c;color:#ffffff;margin-top:0px;margin-bottom:0px;border-collapse:collapse;border-style:solid;border-top:0px solid #1C1C1C;border-left:6px solid #1C1C1C;border-bottom:6px solid #1C1C1C;border-right:6px solid #1C1C1C">
<td align=center>
    <table border=0 cellpadding=0 cellspacing=0 width="117">
        <td align=center><B>&#9660;</B></td>
    </table>
    <table cellpadding=1 cellspacing=0 border=0 style="width:116px;background:#1c1c1c;font: 10pt 'arial'; color:#ffffff;margin-top:0px;margin-bottom:0px;border-collapse:collapse;border:1px solid #ffffff;">
        <tr>
            <td style="background:#ff0000"><INPUT ID="mmPenRadio" TYPE="radio" onclick="toggleRadio('mmPen');switchStatusMarkers('mmPen')" checked></td>
            <td>&nbsp; Pending &nbsp;</td>
        </tr><tr>
            <td style="background:#ff9600"><INPUT ID="mmAllRadio" TYPE="radio" onclick="toggleRadio('mmAll');switchStatusMarkers('mmAll')"  checked></td>
            <td>&nbsp; Allocated &nbsp;</td>
        </tr><tr>
            <td style="background:#ffff00"><INPUT ID="mmRefRadio" TYPE="radio" onclick="toggleRadio('mmRef');switchStatusMarkers('mmRef')"  checked></td>
            <td>&nbsp; Referred &nbsp;</td>
        </tr><tr>
            <td style="background:#00cc00"><INPUT ID="mmActRadio" TYPE="radio" onclick="toggleRadio('mmAct');switchStatusMarkers('mmAct')"  checked></td>
            <td>&nbsp; Actioned &nbsp;</td>
        </tr><tr>
            <td style="background:#969696"><INPUT ID="mmCloRadio" TYPE="radio" onclick="toggleRadio('mmClo');switchStatusMarkers('mmClo')"  checked></td>
            <td>&nbsp; Closure Req &nbsp;</td>
        </tr><tr>
            <td style="background:#000000"><INPUT ID="mmResRadio" TYPE="radio" onclick="toggleRadio('mmRes');switchStatusMarkers('mmRes')"  checked></td>
            <td>&nbsp; Resolved &nbsp;</td>
        </tr>
    </table>
    <a href="#" onclick="hideStatusSelects()"><IMG SRC="images/closeX.png" BORDER=0 title="Close this Status Selector"></a>
</td>
</table>
</div>

<div id="meStatusSelect" style="opacity:0.9;box-shadow:6px 6px 6px #000000;z-index:105;position:fixed;top:31px;left:718px;display:none">
<table border=0 cellpadding=0 cellspacing=0 style="background:#1c1c1c;color:#ffffff;margin-top:0px;margin-bottom:0px;border-collapse:collapse;border-style:solid;border-top:0px solid #1C1C1C;border-left:6px solid #1C1C1C;border-bottom:6px solid #1C1C1C;border-right:6px solid #1C1C1C">
<td align=center>
    <table border=0 cellpadding=0 cellspacing=0 width="117">
        <td align=center><B>&#9660;</B></td>
    </table>
    <table cellpadding=1 cellspacing=0 border=0 style="width:116px;background:#1c1c1c;font: 10pt 'arial'; color:#ffffff;margin-top:0px;margin-bottom:0px;border-collapse:collapse;border:1px solid #ffffff;">
        <tr>
            <td style="background:#ff0000"><INPUT ID="mePenRadio" TYPE="radio" onclick="toggleRadio('mePen');switchStatusMarkers('mePen')" checked></td>
            <td>&nbsp; Pending &nbsp;</td>
        </tr><tr>
            <td style="background:#ff9600"><INPUT ID="meAllRadio" TYPE="radio" onclick="toggleRadio('meAll');switchStatusMarkers('meAll')"  checked></td>
            <td>&nbsp; Allocated &nbsp;</td>
        </tr><tr>
            <td style="background:#ffff00"><INPUT ID="meRefRadio" TYPE="radio" onclick="toggleRadio('meRef');switchStatusMarkers('meRef')"  checked></td>
            <td>&nbsp; Referred &nbsp;</td>
        </tr><tr>
            <td style="background:#00cc00"><INPUT ID="meActRadio" TYPE="radio" onclick="toggleRadio('meAct');switchStatusMarkers('meAct')"  checked></td>
            <td>&nbsp; Actioned &nbsp;</td>
        </tr><tr>
            <td style="background:#969696"><INPUT ID="meCloRadio" TYPE="radio" onclick="toggleRadio('meClo');switchStatusMarkers('meClo')"  checked></td>
            <td>&nbsp; Closure Req &nbsp;</td>
        </tr><tr>
            <td style="background:#000000"><INPUT ID="meResRadio" TYPE="radio" onclick="toggleRadio('meRes');switchStatusMarkers('meRes')"  checked></td>
            <td>&nbsp; Resolved &nbsp;</td>
        </tr>
    </table>
    <a href="#" onclick="hideStatusSelects()"><IMG SRC="images/closeX.png" BORDER=0 title="Close this Status Selector"></a>
</td>
</table>
</div>

<div id="seStatusSelect" style="opacity:0.9;box-shadow:6px 6px 6px #000000;z-index:108;position:fixed;top:31px;left:741px;display:none">
<table border=0 cellpadding=0 cellspacing=0 style="background:#1c1c1c;color:#ffffff;margin-top:0px;margin-bottom:0px;border-collapse:collapse;border-style:solid;border-top:0px solid #1C1C1C;border-left:6px solid #1C1C1C;border-bottom:6px solid #1C1C1C;border-right:6px solid #1C1C1C">
<td align=center>
    <table border=0 cellpadding=0 cellspacing=0 width="117">
        <td align=center><B>&#9660;</B></td>
    </table>
    <table cellpadding=1 cellspacing=0 border=0 style="width:116px;background:#1c1c1c;font: 10pt 'arial'; color:#ffffff;margin-top:0px;margin-bottom:0px;border-collapse:collapse;border:1px solid #ffffff;">
        <tr>
            <td style="background:#ff0000"><INPUT ID="sePenRadio" TYPE="radio" onclick="toggleRadio('sePen');switchStatusMarkers('sePen')" checked></td>
            <td>&nbsp; Pending &nbsp;</td>
        </tr><tr>
            <td style="background:#ff9600"><INPUT ID="seAllRadio" TYPE="radio" onclick="toggleRadio('seAll');switchStatusMarkers('seAll')"  checked></td>
            <td>&nbsp; Allocated &nbsp;</td>
        </tr><tr>
            <td style="background:#ffff00"><INPUT ID="seRefRadio" TYPE="radio" onclick="toggleRadio('seRef');switchStatusMarkers('seRef')"  checked></td>
            <td>&nbsp; Referred &nbsp;</td>
        </tr><tr>
            <td style="background:#00cc00"><INPUT ID="seActRadio" TYPE="radio" onclick="toggleRadio('seAct');switchStatusMarkers('seAct')"  checked></td>
            <td>&nbsp; Actioned &nbsp;</td>
        </tr><tr>
            <td style="background:#969696"><INPUT ID="seCloRadio" TYPE="radio" onclick="toggleRadio('seClo');switchStatusMarkers('seClo')"  checked></td>
            <td>&nbsp; Closure Req &nbsp;</td>
        </tr><tr>
            <td style="background:#000000"><INPUT ID="seResRadio" TYPE="radio" onclick="toggleRadio('seRes');switchStatusMarkers('seRes')"  checked></td>
            <td>&nbsp; Resolved &nbsp;</td>
        </tr>
    </table>
    <a href="#" onclick="hideStatusSelects()"><IMG SRC="images/closeX.png" BORDER=0 title="Close this Status Selector"></a>
</td>
</table>
</div>


<div id="mainMenu" style="opacity:0.9;box-shadow:6px 6px 6px #000000;z-index:150;position:fixed;top:31px;left:115px;display:none">
    <table bgcolor="#1c1c1c" cellpadding=0 style="font: 11pt 'Arial';color: #ffffff;border-collapse: collapse; border: 6px solid #1c1c1c;">
        <td align=center>
            <table border=0 cellpadding=0 cellspacing=0 style="border-collapse: collapse; border: 1px solid #ffffff">
                <tr onclick="hidePhoto();switchMainMenu()" style="color:#ffffff;cursor:pointer" onmouseover="this.style.background='#ffffff';this.style.color='#1c1c1c'" onmouseout="this.style.background='#1c1c1c';this.style.color='#ffffff'">
                    <td valign=top>&nbsp;Case Console&nbsp;</td>
                </tr>
                <tr onclick="hidePhoto();switchMainMenu()" style="color:#ffffff;cursor:pointer" onmouseover="this.style.background='#ffffff';this.style.color='#1c1c1c'" onmouseout="this.style.background='#1c1c1c';this.style.color='#ffffff'">
                    <td valign=top>&nbsp;Address Book&nbsp;</td>
                </tr>
                <tr onclick="hidePhoto();switchMainMenu()" style="color:#ffffff;cursor:pointer" onmouseover="this.style.background='#ffffff';this.style.color='#1c1c1c'" onmouseout="this.style.background='#1c1c1c';this.style.color='#ffffff'">
                    <td valign=top>&nbsp;Live Reports&nbsp;</td>
                </tr>
                <tr onclick="hidePhoto();switchMainMenu()" style="color:#ffffff;cursor:pointer" onmouseover="this.style.background='#ffffff';this.style.color='#1c1c1c'" onmouseout="this.style.background='#1c1c1c';this.style.color='#ffffff'">
                    <td valign=top>&nbsp;My Profile&nbsp;</td>
                </tr>
                <tr onclick="switchMainMenu();location='logout.php'" style="color:#ffffff;cursor:pointer" onmouseover="this.style.background='#ffffff';this.style.color='#1c1c1c'" onmouseout="this.style.background='#1c1c1c';this.style.color='#ffffff'">
                    <td valign=top>&nbsp;Logout&nbsp;</td>
                </tr>
            </table>
            <a href="#" onclick="switchMainMenu()"><IMG SRC="{{ asset('/images/closeX.png') }}" BORDER=0 title="Close Main Menu"></a>
        </td>
    </table>
</div>


<div id="portsMenu" style="opacity:0.9;box-shadow:6px 6px 6px #000000;z-index:200;position:fixed;top:130px;left:250px;display:none">
    <table bgcolor="#1c1c1c" cellpadding=0 style="font: 11pt 'Arial';color: #FFFFFF;border-collapse: collapse; border: 6px solid #1c1c1c;">
        <td align=center>
            <table border=0 cellpadding=0 cellspacing=0 style="border-collapse: collapse; border: 1px solid #FFFFFF">
                <tr onclick="hidePhoto();switchToPort('SA:6');switchMenu()" style="color:#ffffff;cursor:pointer" onmouseover="this.style.background='#ffffff';this.style.color='#1c1c1c'" onmouseout="this.style.background='#1c1c1c';this.style.color='#ffffff'">
                    <td valign=top>&nbsp;South Africa&nbsp;</td>
                </tr>
                <tr onclick="hidePhoto();switchToPort('CT:14');switchMenu()" style="color:#ffffff;cursor:pointer" onmouseover="this.style.background='#ffffff';this.style.color='#1c1c1c'" onmouseout="this.style.background='#1c1c1c';this.style.color='#ffffff'">
                    <td valign=top>&nbsp;Cape Town&nbsp;</td>
                </tr>
                <tr onclick="hidePhoto();switchToPort('DBN:13');switchMenu()" style="color:#ffffff;cursor:pointer" onmouseover="this.style.background='#ffffff';this.style.color='#1c1c1c'" onmouseout="this.style.background='#1c1c1c';this.style.color='#ffffff'">
                    <td valign=top>&nbsp;Durban&nbsp;</td>
                </tr>
                <tr onclick="hidePhoto();switchToPort('EL:14');switchMenu()" style="color:#ffffff;cursor:pointer" onmouseover="this.style.background='#ffffff';this.style.color='#1c1c1c'" onmouseout="this.style.background='#1c1c1c';this.style.color='#ffffff'">
                    <td valign=top>&nbsp;East London&nbsp;</td>
                </tr>
                <tr onclick="hidePhoto();switchToPort('MOS:16');switchMenu()" style="color:#ffffff;cursor:pointer" onmouseover="this.style.background='#ffffff';this.style.color='#1c1c1c'" onmouseout="this.style.background='#1c1c1c';this.style.color='#ffffff'">
                    <td valign=top>&nbsp;Mossel Bay&nbsp;</td>
                </tr>
                        <tr onclick="hidePhoto();switchToPort('NG:14');switchMenu()" style="color:#ffffff;cursor:pointer" onmouseover="this.style.background='#ffffff';this.style.color='#1c1c1c'" onmouseout="this.style.background='#1c1c1c';this.style.color='#ffffff'">
                    <td valign=top>&nbsp;Ngqura&nbsp;</td>
                </tr>
                <tr onclick="hidePhoto();switchToPort('PE:14');switchMenu()" style="color:#ffffff;cursor:pointer" onmouseover="this.style.background='#ffffff';this.style.color='#1c1c1c'" onmouseout="this.style.background='#1c1c1c';this.style.color='#ffffff'">
                    <td valign=top>&nbsp;Port Elizabeth&nbsp;</td>
                </tr>
                <tr onclick="hidePhoto();switchToPort('RB:13');switchMenu()" style="color:#ffffff;cursor:pointer" onmouseover="this.style.background='#ffffff';this.style.color='#1c1c1c'" onmouseout="this.style.background='#1c1c1c';this.style.color='#ffffff'">
                    <td valign=top>&nbsp;Richards Bay&nbsp;</td>
                </tr>
                <tr onclick="hidePhoto();switchToPort('SAL:12');switchMenu()" style="color:#ffffff;cursor:pointer" onmouseover="this.style.background='#ffffff';this.style.color='#1c1c1c'" onmouseout="this.style.background='#1c1c1c';this.style.color='#ffffff'">
                    <td valign=top>&nbsp;Saldanha&nbsp;</td>
                </tr>
                <tr onclick="hidePhoto();switchToPort('SAL:12');switchMenu()" style="color:#ffffff;cursor:pointer" onmouseover="this.style.background='#ffffff';this.style.color='#1c1c1c'" onmouseout="this.style.background='#1c1c1c';this.style.color='#ffffff'">
                    <td valign=top><HR size=1 color="#ffffff" style="margin: 0px 0 0px 0"></td>
                </tr>
            </table>
            <a href="#" onclick="switchMenu()"><IMG SRC="{{ asset('/images/closeX.png') }}" BORDER=0 title="Close Main Menu"></a>
        </td>
    </table>
</div>

<div id="layerMenu" class="animated flipInY" style="opacity:0.9;box-shadow:6px 6px 6px #000000;z-index:130;position:fixed;top:31px;left:360px;display:none">
    <table bgcolor="#1c1c1c" cellpadding=0 style="font: 11pt 'Arial';color: #ffffff;border-collapse: collapse; border: 6px solid #1c1c1c;">
        <td align=center>
            <table border=0 cellpadding=0 cellspacing=0 style="border-collapse: collapse; border: 1px solid #ffffff">

                <tr onclick="switchAssetOverlay('yellow')" style="color:#ffffff;cursor:pointer" onmouseover="this.style.background='#ffffff';this.style.color='#1c1c1c'" onmouseout="this.style.background='#1c1c1c';this.style.color='#ffffff'">
                    <td valign=top align=center width=16><span id="yellowSpan">&#9744;</span></td>
                    <td valign=top>&nbsp;Dry Bulk&nbsp;</td>
                </tr>
                <tr onclick="switchAssetOverlay('blue')" style="color:#ffffff;cursor:pointer" onmouseover="this.style.background='#ffffff';this.style.color='#1c1c1c'" onmouseout="this.style.background='#1c1c1c';this.style.color='#ffffff'">
                    <td valign=top align=center width=16><span id="blueSpan">&#9744;</span></td>
                    <td valign=top>&nbsp;Break Bulk&nbsp;</td>
                </tr>
                <tr onclick="switchAssetOverlay('orange')" style="color:#ffffff;cursor:pointer" onmouseover="this.style.background='#ffffff';this.style.color='#1c1c1c'" onmouseout="this.style.background='#1c1c1c';this.style.color='#ffffff'">
                    <td valign=top align=center width=16><span id="orangeSpan">&#9744;</span></td>
                    <td valign=top>&nbsp;Multi-Purpose&nbsp;</td>
                </tr>
                <tr onclick="switchAssetOverlay('green')" style="color:#ffffff;cursor:pointer" onmouseover="this.style.background='#ffffff';this.style.color='#1c1c1c'" onmouseout="this.style.background='#1c1c1c';this.style.color='#ffffff'">
                    <td valign=top align=center width=16><span id="greenSpan">&#9744;</span></td>
                    <td valign=top>&nbsp;Automotive&nbsp;</td>
                </tr>
                <tr onclick="switchAssetOverlay('pink')" style="color:#ffffff;cursor:pointer" onmouseover="this.style.background='#ffffff';this.style.color='#1c1c1c'" onmouseout="this.style.background='#1c1c1c';this.style.color='#ffffff'">
                    <td valign=top align=center width=16><span id="pinkSpan">&#9744;</span></td>
                    <td valign=top>&nbsp;Liquid Bulk&nbsp;</td>
                </tr>
                <tr onclick="switchAssetOverlay('purple')" style="color:#ffffff;cursor:pointer" onmouseover="this.style.background='#ffffff';this.style.color='#1c1c1c'" onmouseout="this.style.background='#1c1c1c';this.style.color='#ffffff'">
                    <td valign=top align=center width=16><span id="purpleSpan">&#9744;</span></td>
                    <td valign=top>&nbsp;Containers&nbsp;</td>
                </tr>
                <tr onclick="switchAllAssetOverlay()" style="color:#ffffff;cursor:pointer" onmouseover="this.style.background='#ffffff';this.style.color='#1c1c1c'" onmouseout="this.style.background='#1c1c1c';this.style.color='#ffffff'">
                    <td valign=top align=center width=16><span id="allSpan">&#9744;</span></td>
                    <td valign=top>&nbsp;All Locations&nbsp;</td>
                </tr>
            </table>
            <a href="#" onclick="switchLayerMenu()"><IMG SRC="{{ asset('/images/closeX.png') }}" BORDER=0 title="Close Location Layers Menu"></a>
        </td>
    </table>
</div>

<div id="caseCapture" style="opacity:0.9;padding:6px;border-radius:3px;position:absolute;right:10px;top:80px;background:#1c1c1c;align:center;z-index:11;display:none;box-shadow:4px 4px 4px #000000">

    <table border=0 cellpadding=0 cellspacing=0>
        <tr>
            <td colspan=2>

               {!! Form::open(['url' => 'addCaseForm', 'method' => 'post', 'style' => 'margin:0px;padding:0px;', 'id'=>'captureForm' ]) !!}

                        {!! Form::hidden('caseSeverity',5,['id' => 'caseSeverity']) !!}
                        {!! Form::hidden('priority','Urgent',['id' => 'priority']) !!}

                        <table id="captureContainer" border=0 cellpadding=4 cellspacing=0 style="font: 11pt 'Arial';color:#ffffff;border-collapse:collapse;border:1px solid #ffffff">
                            <tr>
                                <td valign=top align=center nowrap style="font: 11pt 'Arial';color:#FFFFFF">
                                    GPS COORDINATES<BR>

                                    {!! Form::text('GPS',NULL,['class' => 'form-control','id' => 'GPS','title' =>'GPS Coordinates','onfocus' => 'this.blur()']) !!}
                                </td>
                            </tr>



                            <tr style="font: 11pt 'Arial';color:#ffffff">

                                    <td valign=middle align=center nowrap>
                                        REPORTER <BR>
                                        {!! Form::text('caseReporter',NULL,['class' => 'form-control','id' => 'caseReporter']) !!}

                                    </td>
                            </tr>


                            <tr style="font: 11pt 'Arial';color:#ffffff">
                                <td valign=middle>
                                    {!! Form::select('caseMunicipality',$selectMunicipalities,0,['class' => 'form-control','id' => 'caseMunicipality']) !!}
                                </td>
                            </tr>

                            <tr style="font: 11pt 'Arial';color:#ffffff">

                                <td valign=middle>
                                    {!! Form::select('caseCategory',$selectCategories,0,['class' => 'form-control','id' => 'caseCategory']) !!}
                                </td>
                            </tr>

                             <tr style="font: 11pt 'Arial';color:#ffffff">

                                <td valign=middle>
                                    {!! Form::select('caseSubCategory',$selectSubCategories,0,['class' => 'form-control','id' => 'caseSubCategory']) !!}
                                </td>
                            </tr>

                            <tr style="font: 11pt 'Arial';color:#ffffff">

                                <td valign=middle>
                                    {!! Form::select('caseSubSubCategory',$selectSubSubCategories,0,['class' => 'form-control','id' => 'caseSubSubCategory']) !!}
                                </td>
                            </tr>


                            <tr style="font: 11pt 'Arial';color:#ffffff">
                                <td valign=middle>
                                    <textarea name="caseDescription"  id="caseDescription" class="form-control" wrap="soft" style="resize:none;height:100px;text-align:left" placeholder="Case details ..."></textarea>
                                </td>
                            </tr>

                            <tr style="font: 11pt 'Arial';color:#ffffff">
                                <td valign=middle>
                                    Critical Emergency: &nbsp;<a href="#" onclick="switchPriority();this.blur()"><span id="prioritySpan" style="font-size:22px">&#9744;</span></a>
                                    &nbsp;
                                    <span id="severitySpan" style="display:none">
                                        <a href="#" class="pover" data-trigger="hover" data-toggle="popover" data-html="true" data-placement="left" title ="LEVEL 4 INCIDENT" data-content="<ul><li>Minor incidents, daily incident or safety occurrence.</li><li>Environmental incident that could result in service disruption with a lesser significance.</li></ul>" onclick="setSeverity('4');this.blur()"><span id="severitySpan4" style="font-size:20px;color:#00FF00">&#9315;</span></a>
                                        <a href="#" class="pover" data-trigger="hover" data-toggle="popover" data-html="true" data-placement="left" title ="LEVEL 3 INCIDENT" data-content="<ul><li>R100 000 asset damage Business interruption considered significant by the Executive of the Business Unit concerned.</li><li>Time lost incident.</li><li>Minor impact to physical or biological environment.</li><li>Release of material that has potential to cause illness.</li><li>Isolated complaints by interested and affected parties.</li></ul>" onclick="setSeverity('3');this.blur()"><span id="severitySpan3" style="font-size:20px;color:#FFFF00">&#9314;</span></a>
                                        <a href="#" class="pover" data-trigger="hover" data-toggle="popover" data-html="true" data-placement="left" title ="LEVEL 2 INCIDENT" data-content="<ul><li>Physical Harm that results in hospitalization.</li><li>R200 000 asset damage.</li><li>Serious business interruption Non-routine security response.</li><li>Significant Fraud or theft.</li><li>Changes in security risk.</li><li>Significant political or media/ reputation focus.</li><li>Environmental incident that result to moderate impact on the physical or biological environment.</li><li>An inconvenience disturbance/ disruption/annoyance (including odour, dust, noise, loss of water supply) of moderate effects.</li></ul>" onclick="setSeverity('2');this.blur()"><span id="severitySpan2" style="font-size:20px;color:#ff7800">&#9313;</span></a>
                                        <a href="#" class="pover" data-trigger="hover" data-toggle="popover" data-html="true" data-placement="left"   title ="LEVEL 1 INCIDENT" data-content="<ul><li>Fatality.</li><li>R500 000 Assets damage.</li><li>Impact on customers</li>.<li>Significant business interruption.</li><li>Significant dangerous substance spillage.</li><li>Exposure to any hazardous material.</li><li>Environmental incidents as defined by NEMA section 30 and National Water Act (36 of 1998) section 20(1), that result in a significant impact on the physical or biological environment (air, ground, water and habitat) with extensive or long term impairment of ecosystem functions.</li></ul>" onclick="setSeverity('1');this.blur()"><span id="severitySpan1" style="font-size:20px;color:#FF0000">&#9312;</span></a>
                                    </span>
                                </td>
                            </tr>
                        </table>



            </td>
        </tr><tr>
            <td align=left>
                <input id="askConfirmButton" style="font-size:12pt;width:90px;height:25px;border:0;background:#ffffff;color:#ff0000" type="button" value="Cancel" onclick="askConfirm(this.id);this.blur()">
            </td>
            <td align=right>

                  <a id="submitButton" class="btn btn-sm" onclick="submitCaptureForm(map.getCenter(),map.getZoom());this.blur()">Submit Case</a>
            </td>
        </tr>
    </table>
    {!! Form::close() !!}

</div>


<div id="caseCaptureSuccess" class="animated zoomInLeft" style="opacity:0.9;padding:6px;border-radius:3px;position:absolute;right:230px;top:31px;background:#1c1c1c;align:center;z-index:11;display:none;box-shadow:4px 4px 4px #000000">
    <table border=0 cellpadding=6 cellspacing=0 style="font: 12pt 'Arial';color: #ffffff;border-collapse:collapse;border:1px solid #ffffff;width:200px">
        <td valign=middle align=center>
            THANK YOU
        </td>
    </table>
</div>

<div id="ruSure" style="opacity:0.9;padding:6px;border-radius:3px;position:absolute;width:212px;right:250px;top:80px;background:#1c1c1c;align:center;z-index:12;display:none;box-shadow:4px 4px 4px #000000">
    <table border=0 cellpadding=3 cellspacing=0 style="width:100%;font: 12pt 'Arial';color: #ffffff;border-collapse:collapse;border:1px solid #ffffff">
        <tr>
            <td valign=middle align=center colspan=2>
                <span id="RUS">ARE YOU SURE?</span>
            </td>
        </tr><tr>
            <td align=left>
                <input id="oopsButton" style="width:90px;height:30px;border:0;background:#ffffff;color:#ff0000" type="button" value="Oops!" onclick="ruSure(this.value);this.blur()">
            </td>
            <td align=right>
                <input style="width:90px;height:30px;border:0;background:#ffffff;color:#000000" type="button" value="Yes" onclick="ruSure(this.value);this.blur()">
            </td>
        </tr>
    </table>
</div>

<div id="casePhoto" class="photoFrame" style="align:center;z-index:11;display:flex">
    <table id="photoContainer" border=0 cellpadding=0 cellspacing=0 style="margin-top:0px;margin-bottom:0px;border-collapse:collapse;border-style:solid;border-top:0px solid #1C1C1C;border-left:0px solid #1C1C1C;border-bottom:0px solid #1C1C1C;border-right:0px solid #1C1C1C">
        <tr>
            <td id="photoTD">
                <img id="thePhoto" SRC="images/no_photo.png" style="width:600;border-collapse:collapse;border-style:solid;border-top:1px solid #ffffff;border-left:1px solid #ffffff;border-bottom:1px solid #ffffff;border-right:1px solid #ffffff;border-radius: 0px;"/>
            </td>
        </tr><tr>
            <td id="photoToolbarTD">
                <table id="photoToolbar" border=0 cellpadding=6 cellspacing=0 style="width:100%;background:#1c1c1c;margin-top:0px;margin-bottom:0px;border-collapse:collapse;border-style:solid;border-top:0px solid #1C1C1C;border-left:0px solid #1C1C1C;border-bottom:0px solid #1C1C1C;border-right:0px solid #1C1C1C">
                    <td width=20>&nbsp;</td>
                    <td align=center valign=middle><a href="#" onclick="hidePhoto()"><IMG SRC="{{ asset('/images/closeX.png') }}" BORDER=0></a></td>
                    <td width=20>&nbsp;</td>

                <!--    <td width=20><a href="#" onclick="rotatePhoto()"><img src="images/rotate_photo.png" title="Rotate Photo 90&#176;"></a></td>  -->

                    </table>
            </td>
        </tr>
    </table>
</div>

<table ID="weatherFrame" class="weatherFrame" border=0 cellpadding=0 cellspacing=0 style="align:center;z-index:100;display:flex;background:#1c1c1c">
    <tr>
        <td colspan=3>

        <IFRAME id="wunderGround" SRC="blank.html" MARGINWIDTH=0 MARGINHEIGHT=0 SCROLLING=auto HSPACE=0 VSPACE=0 NORESIZE frameborder=0 style="border-radius:3px;width:800px;height:400px;"></IFRAME>

<!--    <IFRAME id="wunderGround" SRC="http://www.wunderground.com/cgi-bin/findweather/getForecast?query=zmw:00000.1.68588&bannertypeclick=wu_travel_ship1" MARGINWIDTH=0 MARGINHEIGHT=0 SCROLLING=auto HSPACE=0 VSPACE=0 NORESIZE frameborder=0 style="border-radius:3px;width:800px;height:400px;"></IFRAME>  -->

        </td>
    </tr><tr>
        <td width=300>
            &nbsp;
        </td>
        <td align=center valign=middle height=30>
            <a href="#" onclick="hideWeather()"><IMG SRC="{{ asset('/images/closeX.png') }}" BORDER=0 title="Click to hide weather"></a>
        </td>
        <td width=300 valign=middle align=right>
            <input id="weatherSlide" type="range" min="0.2" max="1" step="0.1" value="0.8" title="Slide to set weather opacity" onchange="document.all.weatherFrame.style.opacity=this.value">
        </td>
    </tr>
</table>

<IFRAME ID="cmcFrame" class="cmcFrame" SRC="blank.html"  MARGINWIDTH=0 MARGINHEIGHT=0 SCROLLING=no HSPACE=0 VSPACE=0 NORESIZE frameborder=0 style="position:absolute;align:center;width:80%;height:80%;z-index:1500;display:flex;background:#1c1c1c"></IFRAME>

<div id="closeFrameX" class="closeFrameX" border=0 cellpadding=0 cellspacing=0 style="border-top:0px;margin-top:0;position:absolute;align:center;top:43px;left:7px;20px;height:20px;z-index:1501;display:flex">
    <table width=20 border=0 cellpadding=0 cellspacing=0>
        <td align=center valign=top>
            <a href="#" onclick="hideCMC();closeFrameX.style.display='none'"><IMG id="closeXB" height=20 width=20 SRC="images/closeXB_off.png" BORDER=0 align=center title="Close Case Management Console"></a>
        </td>
    </table>
</div>

<textarea id='zoneGPSarray' class="formField" style='width:300px;height:45px;position:fixed;top:0px;right:0px;display:none'></textarea>

<!-- <IFRAME id="updateSocket" SRC="socket.php" MARGINWIDTH=0 MARGINHEIGHT=0 SCROLLING=auto HSPACE=0 VSPACE=0 NORESIZE frameborder=0 style="border-radius:3px;width:500px;height:400px;position:fixed;top:0px;right:0px;display:flex"></IFRAME> -->


</body>

</div>
@endsection


@section('footer')
<script>
   $(document).ready(function() {


    $("#caseReporter").tokenInput("getContacts",{tokenLimit:1});

    $("#caseCategory").on("change",function(){

        $.get("{{ url('/api/dropdownCategory/sub-category/category')}}",
        { option: $(this).val()},
        function(data) {
        $('#caseSubCategory').empty();
        $('#caseSubSubCategory').empty();
        /* $('#District').removeAttr('disabled');*/
        $('#caseSubCategory').append("<option value='0'>Select Sub Category</option>");
        $('#caseSubSubCategory').append("<option value='0'>Select Sub Sub Category</option>");

        $.each(data, function(key, element) {
        $('#caseSubCategory').append("<option value="+ key +">" + element + "</option>");
        });
        });

    });

     $("#caseSubCategory").on("change",function(){

        $.get("{{ url('/api/dropdownCategory/sub-sub-category/sub-category')}}",
        { option: $(this).val()},
        function(data) {
        $('#caseSubSubCategory').empty();
        /* $('#District').removeAttr('disabled');*/
        $('#caseSubSubCategory').append("<option value='0'>Select Sub Category</option>");
        $.each(data, function(key, element) {
        $('#caseSubSubCategory').append("<option value="+ key +">" + element + "</option>");
        });
        });

    });


   })
</script>

@endsection
