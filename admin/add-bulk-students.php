<?php
session_start();
include_once 'includes/dbh.inc.php';
if (strlen($_SESSION['adminname']) == "") {
    header("Location: /admin");
  } else {
include('includes/header.php');

?>

<style>
#indicatorContainerWrap {
    position: absolute;
    display: inline-block;
    left:40%;
    top:20%;
    color: #111;
}

.rad-cntnt {
    position: absolute;
    display: table;
    vertical-align: middle;
    text-align: center;
    color: #111;
    width: 100%;
    top: 50%;
    -webkit-transform: translateY(-50%);
    -moz-transform: translateY(-50%);
    -ms-transform: translateY(-50%);
    -o-transform: translateY(-50%);
    transform: translateY(-50%);
    font-size: 20px;
    line-height: 24px
}

#prgFileSelector {
    position: absolute;
    width: 100%;
    height: 100%;
    color: #111;
    opacity: 0;
    top: 0;
    left: 0;
    z-index: 10;
    cursor: pointer;
}
</style>
<?php
include('includes/sidenav.php');
?>

<div id="content-wrapper" class="d-flex flex-column">

<!-- Main Content -->
<div id="content">

<?php include('includes/topnav.php'); ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">
<div id="indicatorContainerWrap">
    <div class="rad-prg" id="indicatorContainer"></div>
    <div class="rad-cntnt">Click / Drop file to select.</div> <input type="file" id="prgFileSelector" />
</div>



  

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

<?php
 include('includes/scripts.php');
 ?>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/radialIndicator/1.4.0/radialIndicator.js"></script>
 <script>
$(document).ready(function(){

//file upload example
var container = $('#indicatorContainerWrap'),
msgHolder = container.find('.rad-cntnt'),
containerProg = container.radialIndicator({
radius: 100,
percentage: true,
displayNumber: false
}).data('radialIndicator');


container.on({
'dragenter': function (e) {
msgHolder.html("Drop here");
},
'dragleave': function (e) {
msgHolder.html("Click / Drop file to select.");
},
'drop': function (e) {
e.preventDefault();
handleFileUpload(e.originalEvent.dataTransfer.files);
}
});

$('#prgFileSelector').on('change', function () {
handleFileUpload(this.files);
});

function handleFileUpload(files) {
msgHolder.hide();
containerProg.option('displayNumber', true);

var file = files[0],
fd = new FormData();

fd.append('file', file);


$.ajax({
url: 'service/upload.php',
type: 'POST',
data: fd,
processData: false,
contentType: false,
success: function () {
containerProg.option('displayNumber', false);
msgHolder.show().html('File upload done.');
},
xhr: function () {
var xhr = new window.XMLHttpRequest();
//Upload progress
xhr.upload.addEventListener("progress", function (e) {
if (e.lengthComputable) {
var percentComplete = (e.loaded || e.position) * 100 / e.total;
//Do something with upload progress
console.log(percentComplete);
containerProg.animate(percentComplete);
}
}, false);

return xhr;
}
});

}


});
</script>
 <?php 
 include('includes/footer.php');  
} ?>
 