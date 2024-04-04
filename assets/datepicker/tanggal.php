<!DOCTYPE html>
<html>
<head>
	<title>DATEPICKER</title>
  <link rel="icon" type="image/png" href="../img/icon.png" />

  <link rel="stylesheet" type="text/css" href="fontawesome-free/css/all.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/jquery-ui.css">
</head>

<body>
 <div class="container ml-4">
 	<div class="row">
    <div class="col-md-4 mt-4">
      <div class="page-header">
        <h4><span class="far fa-calendar-alt fa-lg" style="color: #1cc88a"></span>
            <strong>&nbsp;&nbsp;Membuat Datepicker</strong>
        </h4>
        <hr>
      </div>
      <label class="control-label">Tanggal</label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text far fa-calendar-alt"></span>
        </div>
            <input type="text" class="form-control" id="tanggal" placeholder="Tanggal">
      </div>
    </div>
 	</div>
 </div>

<script src="js/jquery-1.12.4.js"></script>
<script src="js/jquery-ui.js"></script>
  <script>
    $( function() {
      $( "#tanggal" ).datepicker({
        showAnim : "slide",
        changeMonth: true,
        changeYear: true,
        autoclose : true
      });
    } );
  </script>

</body>
</html>