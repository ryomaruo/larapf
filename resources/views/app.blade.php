<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Daiki</title>
    <link rel="stylesheet" href="css/app.css"/>
    <link rel="stylesheet" href="css/reset.css"/>
    <script type="text/javascript">
        window.Laravel = window.Laravel || {};
        window.Laravel.csrfToken = "{{csrf_token()}}";
    </script>
</head>
<body>
<div id="app">
  <div id="container">
    <clicked-circle></clicked-circle>
    <skip-button></skip-button>
    <menu-btn></menu-btn>
    <my_section tmpl_name="menu-content" is_menu="true" url="{{ $url }}"></my_section>
    <!-- <nav-content content="about"></nav-content>
    <nav-content content="works"></nav-content>
    <nav-content content="skill"></nav-content> -->
    <div class="sections">
      <my_section tmpl_name="hello"></my_section>
      <my_section tmpl_name="p5canvas" is_expand="true"></my_section>
      <divided-section tmpl_name="lightbar" class_name="lightbar"></divided-section>
      <divided-section tmpl_name="lightbar" class_name="lightbar2"></divided-section>
    </div>
    <div class="sections works-section">
      <my_section tmpl_name="rotatebox"></my_section>
    </div>
  </div>
</div>

<script src="//cdnjs.cloudflare.com/ajax/libs/p5.js/0.6.1/p5.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/p5.js/0.6.1/addons/p5.dom.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/three.js/91/three.min.js"></script>
<script src="js/app.js"></script>
</body>
</html>