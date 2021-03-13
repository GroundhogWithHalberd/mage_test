<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
<script src="https://cdn.jsdelivr.net/npm/vue"></script>

</head>
<body>

<div class="row">
  <div class="col-main">
      <div class="header">
      <header>
      <?php include 'header.html';?>
      </header>
          </div>
      <div class="content">
      <?php
if ($_POST != null) {
  @include 'inputcontroller.php';
  include 'views/sub.html';
}
else include 'views/main_2.html';
?>
          
      <div class="footer">
      <?php include 'footer.html';?>
          </div>
          </div>
  </div>
  <div class="col-side pine"/>
</div>
</body>
<script type="text/javascript" src="/js/validation.js"></script>
</html>