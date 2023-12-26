 <link rel="stylesheet" href="<?= base_url('assets/css/pages/auth.css'); ?>" />
 <style>
  @media screen and (min-width: 540px) {
   .shadow-2-strong {
    box-shadow: 0 2px 10px 0 rgba(0, 0, 0, 0.21);
   }
  }
 </style>

 <?php
 $message = $this->session->flashdata('message');
 if ($message) {
  echo sweetAllert();
 }
 ?>

 <!--  -->
 <div st id="auth">

  <div class="row d-flex justify-content-center align-items-center h-100">
   <div class="col-11 col-sm-6 col-md-5 col-lg-4 col-xl-3 shadow-2-strong" style="border-radius: 1rem">
    <div id="auth-left" class="p-1 p-sm-3 p-lg-4">
     <div class="text-center">
      <img class=" img-fluid" src="<?= base_url('assets/images/logo/logo.png'); ?>" alt="">
     </div>
     <div id="form-login">
      <form class="my-3" method="POST" action="<?= base_url('login/autentikasi'); ?>">
       <div class=" mb-2">
        <label class="form-label mb-0 <?= !empty($_SESSION['errMsg']['username']['err']) ? 'text-danger' : ''; ?>">Username *</label>
        <input autocomplete="off" value="<?= !empty($_SESSION['errMsg']['username']['err']) || !empty($_SESSION['errMsg']['password']['err'])  ? $_SESSION['errMsg']['username']['value'] : ''; ?>" name="username" type="text" class="form-control <?= !empty($_SESSION['errMsg']['username']['err']) ? 'is-invalid' : ''; ?>" placeholder="Masukan Username" />
        <?php if (!empty($_SESSION['errMsg']['username']['err'])) {
        ?>
         <div class="invalid-feedback">
          <?php echo $_SESSION['errMsg']['username']['err'] ?>
         </div>
        <?php } ?>
       </div>
       <div>
        <label class="form-label mb-0 <?= !empty($_SESSION['errMsg']['username']['err']) ? 'text-danger' : ''; ?>">Password *</label>
        <input autocomplete="off" value="<?= !empty($_SESSION['errMsg']['password']['err']) || !empty($_SESSION['errMsg']['username']['err']) ? $_SESSION['errMsg']['password']['value'] : ''; ?>" name="password" type="password" class="form-control <?= !empty($_SESSION['errMsg']['password']['err']) ? 'is-invalid' : ''; ?>" placeholder="Masukan Password" />
        <?php if (!empty($_SESSION['errMsg']['password']['err'])) {
        ?>
         <div class="invalid-feedback">
          <?php echo $_SESSION['errMsg']['password']['err'] ?>
         </div>
        <?php }
        unset($_SESSION["errMsg"]);
        ?>
       </div>
       <!--  -->
       <div class="text-end text-lg fs-6 mt-1">
        <p id="button-lupa-password" style="cursor: pointer;" class="text-gray-600">
         Lupa password ?
        </p>
       </div>
       <!--  -->
       <button class="btn mt-1 btn-primary btn-block shadow-lg">
        Log in
       </button>
      </form>
      <div class="text-center mt-3 text-lg fs-6">
       <p class="text-gray-600">
        Belum punya akun ?
        <a style="color: #fbc02d;" href="<?= base_url('daftar'); ?> " class="font-bold">Daftar</a>
       </p>
      </div>
     </div>

     <!--  -->
     <form action="" id="form-lupa-password">
      <label class="form-label mb-0" for=" media_tanam">Email</label>
      <input id="email" autocomplete="off" required name="media_tanam" type="text" class="form-control" id="media_tanam" placeholder="Masukan email">
      <div class="text-end text-lg fs-6 mt-1">
       <p id="button-batal-lupa-password" style="cursor: pointer;" class="text-gray-600">
        Batal ?
       </p>
      </div>
      <button id="kirim-email" type="button" class="btn btn-primary btn-block shadow-lg">Kirim</button>
     </form>
    </div>
   </div>
  </div>
 </div>


 </div>

 </div>


 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
 <!--  -->
 <!--  -->


 <script>
  $(document).ready(function() {

   $("#form-lupa-password").hide();
   $("#button-lupa-password").click(function() {
    $("#form-login").hide();
    $("#form-lupa-password").show();
   });
   //
   $("#button-batal-lupa-password").click(function() {
    $("#form-lupa-password")[0].reset();
    $("#form-lupa-password").hide();
    $("#form-login").show();
   });
   //
   $('#kirim-email').click(function() {
    var email = $('#email').val();
    $.ajax({
     type: "POST",
     url: "Login/LupaPassword",
     data: {
      email: email
     },
     success: function(response) {
      dataResponse = JSON.parse(response);
      if (!dataResponse.error) {
       showMessage(dataResponse.success, '#435EBE');
       $("#form-lupa-password")[0].reset();
       $("#form-lupa-password").hide();
       $("#form-login").show();
      } else {
       showMessage(dataResponse.error, '#F3616D');
      }
     }
    });
   });
  });
 </script>
 <script>
  function showMessage(text, background) {
   Toastify({
    text: text,
    duration: 3000,
    destination: "https://github.com/apvarun/toastify-js",
    newWindow: true,
    close: true,
    gravity: "top", // `top` or `bottom`
    position: "right", // `left`, `center` or `right`
    stopOnFocus: true, // Prevents dismissing of toast on hover
    style: {
     background: background, // bisa menggunakan gradient cth: "linear-gradient(to right, #00b09b, #96c93d)"
    },
    onClick: function() {} // Callback after click
   }).showToast();
  }

  function visibleModal(visible) {
   $(document).ready(function() {
    if (visible === "show") {
     var myModal = new bootstrap.Modal(document.getElementById("staticBackdrop"));
     myModal.show();
    } else {
     const truck_modal = document.querySelector('#staticBackdrop');
     const modal = bootstrap.Modal.getInstance(truck_modal);
     modal.hide()
    };
   });
  }
 </script>
 </body>

 </html>