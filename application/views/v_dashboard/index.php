<style>
 .coban {
  border-radius: 5px;
  box-shadow: rgba(9, 30, 66, 0.25) 0px 1px 1px, rgba(9, 30, 66, 0.13) 0px 0px 1px 1px;
 }
</style>
<div id="main">
 <header class="mb-3 d-flex justify-content-between">
  <a href="#" class="burger-btn d-block">
   <i class="bi bi-justify fs-3"></i>
  </a>
  <?php if (!empty($_SESSION['status'])) { ?>
   <div class="burger-btn d-flex align-items-center">
    <img style="cursor: text;" class="img-fluid" src="<?= base_url('assets/images/logo/pengguna-icon.png'); ?>" alt="">
    <div class="fs-6 text-text-muted fw-bolder text-uppercase"><?= $_SESSION['nama']; ?></div>
    <div id="button-ubah-pengguna"></div>
   </div>

  <?php } ?>
 </header>

 <div class="page-heading">
  <section class="section">
   <div class="card">
    <div class="card-body">
     <div class="fs-3 text-center my-4 fw-bolder">SELAMAT DATANG<div class="fs-6 fw-bolder">Di Knowledge Management System Dalam Budidaya Tanaman <span style="color: #fbc02d;">Lemon</span> </div>
     </div>
     <div id="carouselExampleCaptions" class="carousel slide d-none d-md-block" data-bs-ride="carousel">

      <div class="carousel-inner">
       <div class="carousel-item active">
        <img src="<?= base_url('assets/images/carousel/lemon1.jpg'); ?>" class="d-block w-100" alt="...">
       </div>
       <div class="carousel-item">
        <img src="<?= base_url('assets/images/carousel/lemon2.jpg'); ?>" class="d-block w-100" alt="...">
       </div>
       <div class="carousel-item">
        <img src="<?= base_url('assets/images/carousel/lemon3.jpg'); ?>" class="d-block w-100" alt="...">
       </div>
      </div>

     </div>
     <div class="form-group position-relative has-icon-left">
      <input id="cari-pengetahuan-live" type="text" class="form-control mt-4" placeholder="Cari pengetahuan berdasarkan teknik budidaya">
      <div class="form-control-icon">
       <i class="bi bi-search"></i>
      </div>
     </div>
     <div class="row my-4">
      <div id="content"></div>
     </div>


     <!--  -->

     <!-- Modal -->
     <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
       <div class="modal-content">
        <div class="modal-header">
         <h1 style="color: #fbc02d;" class="modal-title fs-5" id="modalTitleLabel">Data pengguna</h1>
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form class="needs-validation" novalidate id="form-data-pengguna" method="POST">
         <div class="modal-body">
          <input id="id-pengguna" type="hidden" name="id_pengguna" value="">
          <div class="form-group">
           <label for="basicInput">Email</label>
           <input id="email-old" readonly type="text" name="email-old" class="form-control form-control-sm" value="">
           <input autocomplete="off" id="email-new" type="email" name="email-new" class="form-control form-control-sm mt-2" placeholder="Masukan email baru" value="">
          </div>
          <div class="form-group">
           <label for="basicInput">Username</label>
           <input id="username-old" readonly type="text" name="username-old" class="form-control form-control-sm" value="">
           <input autocomplete="off" id="username-new" data-v-min-length="5" type=" text" name="username-new" class="form-control form-control-sm mt-2" placeholder="Masukan username baru" value="">
          </div>
          <div class="form-group">
           <label for="basicInput">Password</label>
           <input id="password-old" type="hidden" name="password-old" class="form-control" placeholder="Masukan Password" value="">
           <input autocomplete="off" id="password-new" type="password" data-v-min-length="5" name="password-new" class="form-control form-control-sm" placeholder="Masukan password baru" value="">
          </div>
          <input id="role" type="hidden" name="role" class="form-control" value="">
          <input type="hidden" name="type" class="form-control" value="azax">
         </div>
         <div class="modal-footer">
          <button id="batal-kirim" type="button" class="btn btn-sm btn-outline-secondary">batal</button>
          <button id="kirim" type="button" class="btn btn-sm btn-success">kirim</button>
         </div>
        </form>
       </div>
      </div>
     </div>
     <script>
      $(document).ready(function() {
       showBtnUpdatePengguna();
       // showPengetahuan();
       $("#cari-pengetahuan-live").keyup(function() {
        let key = $(this).val();
        if (key != "") {
         $('#content').show();
         $.ajax({
          type: "POST",
          url: "arsip/searchPengetahuanLive",
          data: {
           key: key
          },
          success: function(response) {
           $('#content').html(response);
          }
         });
        } else {
         $('#content').hide();
        }
       });
       // 
       $("#kirim").click(function() {
        if ($("#username-new").val() == "") {
         if (validateEmail($("#email-new").val())) {
          var dataForm = $('#form-data-pengguna').serialize();
          $.ajax({
           type: "POST",
           url: "pengguna/updatePengguna",
           data: dataForm,
           success: function(response) {
            dataResponse = JSON.parse(response);
            if (!dataResponse.error) {
             $("#form-data-pengguna")[0].reset();
             showMessage(dataResponse.success, '#435EBE');
             visibleModal("hide");
             showBtnUpdatePengguna();
            } else {
             showMessage(dataResponse.error, '#F3616D');
            }
           }
          });
         }
        } else {
         let username = $("#username-new").val();
         var reWhiteSpace = new RegExp("\\s+");
         //   
         if ($("#username-new").val().length >= 5 && username.indexOf(' ') <= 1 && validateEmail($("#email-new").val())) {
          var dataForm = $('#form-data-pengguna').serialize();
          $.ajax({
           type: "POST",
           url: "pengguna/updatePengguna",
           data: dataForm,
           success: function(response) {
            dataResponse = JSON.parse(response);
            if (!dataResponse.error) {
             $("#form-data-pengguna")[0].reset();
             showMessage(dataResponse.success, '#435EBE');
             visibleModal("hide");
             showBtnUpdatePengguna();
            } else {
             showMessage(dataResponse.error, '#F3616D');
            }
           }
          });
         }
        }


       });
       // 
       $('#batal-kirim').click(function() {
        $("#form-data-pengguna")[0].reset();
        visibleModal("hide");
       });
      });

      function validateEmail($email) {
       var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
       return emailReg.test($email);
      }

      function showPengetahuan() {
       $.ajax({
        type: "GET",
        url: "arsip/showAllToPengunjung",
        success: function(response) {
         $('#content').html(response);
        }
       });
      }
      // 
      // ----------------------
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
      // 
      function updatePengguna(idPengguna, email, username, password, role) {
       $('#email-new').removeClass('is-valid');
       $('#username-new').removeClass('is-valid');
       $('#password-new').removeClass('is-valid');
       // 
       $('#email-new').removeClass('is-invalid');
       $('#username-new').removeClass('is-invalid');
       $('#password-new').removeClass('is-invalid');
       // 
       $('#id-pengguna').val(idPengguna);
       $('#email-old').val(email);
       $('#username-old').val(username);
       $('#password-old').val(password);
       $('#role').val(role);
       visibleModal("show");
      }
      // 
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
      // 
      function showBtnUpdatePengguna() {
       $.ajax({
        url: "pengguna/editAzax",
        method: "GET",
        success: function(response) {
         $('#button-ubah-pengguna').html(response);
        }
       })
      }
     </script>

    </div>
   </div>
  </section>
 </div>