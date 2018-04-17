<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Daiki</title>
    <link rel="stylesheet" href="css/app.css"/>
    <script type="text/javascript">
        window.Laravel = window.Laravel || {};
        window.Laravel.csrfToken = "{{csrf_token()}}";
    </script>
</head>
<body>
<div id="app">
  <div id="container">
    <skip-button></skip-button>
    <div class="sections">
      <my_section tmpl_name="hello"></my_section>
      <my_section tmpl_name="p5canvas"></my_section>
      <divided-section tmpl_name="lightbar" class_name="lightbar"></divided-section>
      <divided-section tmpl_name="lightbar" class_name="lightbar2"></divided-section>
      <divided-section tmpl_name="index" class_name="main"></divided-section>
    </div>
  </div>
</div>

<script src="//cdnjs.cloudflare.com/ajax/libs/p5.js/0.5.4/p5.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/p5.js/0.5.4/addons/p5.dom.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/three.js/91/three.min.js"></script>
<script src="js/app.js"></script>
</body>
</html>