<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Ryo</title>
    <link rel="stylesheet" href="css/app.css"/>
    <link rel="stylesheet" href="css/reset.css"/>
    <script type="text/javascript">
        window.Laravel = window.Laravel || {};
        window.Laravel.csrfToken = "{{csrf_token()}}";
    </script>
  <script>
      // ページの読み込みを待つ
      window.addEventListener('load', init);
      function init() {
        // サイズを指定
        const width = 960;
        const height = 540;
        // レンダラーを作成
        const renderer = new THREE.WebGLRenderer({
          canvas: document.querySelector('#myCanvas'),
          antialias: true
        });
        renderer.setPixelRatio(window.devicePixelRatio);
        renderer.setSize(width, height);
        // シーンを作成
        const scene = new THREE.Scene();
        // カメラを作成
        const camera = new THREE.PerspectiveCamera(45, width / height);
        camera.position.set(0, 0, +1000);
        // ドーナツを作成
        const geometry = new THREE.TorusGeometry(300, 100, 64, 100);
        // マテリアルを作成
        const material = new THREE.MeshBasicMaterial({color: 0x6699FF});
        // メッシュを作成
        const mesh = new THREE.Mesh(geometry, material);
        // 3D空間にメッシュを追加
        scene.add(mesh);
        tick();
        // 毎フレーム時に実行されるループイベントです
        function tick() {
          // メッシュを回転させる
          mesh.rotation.x += 0.01;
          mesh.rotation.y += 0.01;
          // レンダリング
          renderer.render(scene, camera);
          requestAnimationFrame(tick);
        }
      }
    </script>
</head>
<body>
  <canvas id="myCanvas"></canvas>
</body>
</html>

<script src="//cdnjs.cloudflare.com/ajax/libs/p5.js/0.6.1/p5.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/p5.js/0.6.1/addons/p5.dom.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/three.js/91/three.min.js"></script>
<script src="js/rotategeo.js"></script>
</body>
</html>