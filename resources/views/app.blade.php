<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Hello Vue</title>
    <link rel="stylesheet" href="css/app.css"/>
    <script type="text/javascript">
        window.Laravel = window.Laravel || {};
        window.Laravel.csrfToken = "{{csrf_token()}}";
    </script>
</head>
<body>
<div id="app">
  <div id="container">
    <div class="sections">
      <my_section tmpl_name="example"></my_section>
      <my_section tmpl_name="p5canvas"></my_section>
    </div>
  </div>
</div>

<script src="//cdnjs.cloudflare.com/ajax/libs/p5.js/0.5.4/p5.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/p5.js/0.5.4/addons/p5.dom.js"></script>
<script src="js/app.js"></script>
</body>
</html>