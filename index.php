<!DOCTYPE html>
<html>
  <head>
    <title>Instascan</title>
   
    <script type="text/javacsript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>
    <script type="text/javacsript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
    <!-- <script type="text/javacsript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script> -->
    <script type="text/javacsript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script type="text/javascript" src="instascan.min.js"></script>

  </head>
  <body>

    <div class="container">
      <div class="row">
        <div class="col-sm-6">
          <video id="preview" width="100%"></video>

        </div>
        <div class="col-sm-6">
          <label>Scan Qr COde</label>
          <input type="text" id="text" readonly="" placeholder="scan qrcode" class="form-control">

        </div>
      </div>
    </div>
    <script type="text/javascript">
      let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
     
      Instascan.Camera.getCameras().then(function (cameras) {
        if (cameras.length > 0) {
          scanner.start(cameras[0]);
        } else {
          console.error('No cameras found.');
        }
      }).catch(function (e) {
        console.error(e);
      });
      scanner.addListener('scan', function (c) {
        document.getElementById('text').value=c;
      });
    </script>
  </body>
</html>