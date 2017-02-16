
<style>
    /* Always set the map height explicitly to define the size of the div
     * element that contains the map. */
    #map-canvas {
        width:90%;height: 70%;
        left: 5%;
        top:10%;
        border: 2px solid #333;
    }
    /* Optional: Makes the sample page fill the window. */
    html, body {
        height: 100%;
        margin: 0;
        padding: 0;

    }
    #legend{
        margin:100px 10px 10px 55px;

    }
    #marker{
        float: left;

    }
    label{
        display: inline;
        margin: 0;
    }
</style>

<div id="map-canvas"  ></div>

<div id="legend"> 
    <img src='<?php echo base_url(); ?>assets/img/status_ico/yellow.png' class="marker"   />
    <label for="open" class="marker">Open</label> | 
    <img src='<?php echo base_url(); ?>assets/img/status_ico/red.png' class="marker"   />
    <label for="open" class="marker">In Progress</label> | 
    <img src='<?php echo base_url(); ?>assets/img/status_ico/green.png' class="marker"   />
    <label for="open" class="marker">Completed</label> 



</div>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCYkZXV8pCcj00uf0q9tM-tvq75udy2sf4"></script>
<script src="<?php echo base_url(); ?>assets/js/map.js" type="text/javascript" charset="utf-8"></script>