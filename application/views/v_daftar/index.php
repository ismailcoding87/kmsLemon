<link rel="stylesheet" href="<?= base_url('assets/css/pages/auth.css'); ?>" />
<style>
 @media screen and (min-width: 540px) {
  .shadow-2-strong {
   box-shadow: 0 2px 10px 0 rgba(0, 0, 0, 0.21);
  }
 }
</style>
<!--  -->
<div st id="auth">
 <div class="row d-flex justify-content-center align-items-center h-100">
  <div class="col-11 col-sm-6 col-md-5 col-lg-4 col-xl-3 shadow-2-strong" style="border-radius: 1rem">
   <div id="auth-left" class="p-1 p-sm-3 p-lg-4 p-xl-2">
    <div class="text-center">
     <img class="img-fluid" src="<?= base_url('assets/images/logo/logo.png'); ?>" alt="">
    </div>
    <form class="needs-validation my-3" novalidate method="POST" action="<?= base_url('daftar/store'); ?>">
     <div class="mb-2">
      <input autocomplete="off" required name="nama" type="text" class="form-control" placeholder="Nama">
     </div>
     <div class="mb-2">
      <input autocomplete="off" required name="email" type="email" class="form-control" placeholder="Email">
     </div>
     <div class="mb-2">
      <input autocomplete="off" required data-v-min-length="5" name="username" type="text" class="form-control" placeholder="Username">
     </div>
     <div class="mb-2">
      <input autocomplete="off" id="password" required data-v-min-length="5" name="password" type="password" class="form-control" placeholder="Password">
     </div>
     <div class="mb-3">
      <input autocomplete="off" data-v-equal="#password" required data-v-min-length="5" name="password1" type="password" class="form-control" placeholder="Ulangi Password">
     </div>
     <input required name="role" type="hidden" class="form-control" value="pengunjung">
     <button class="btn btn-primary btn-block shadow-lg">Daftar</button>
    </form>
    <div class="text-center mt-2 text-lg fs-6">
     <p class='text-gray-600'>Sudah punya akun ? <a style="color: #fbc02d;" href="<?= base_url('login'); ?>" class="font-bold">Log
       in</a>.</p>
    </div>
   </div>
  </div>
 </div>
</div>
<!--  -->
<!--  -->
</div>
</div>
<script src="<?= base_url('assets/vendors/jbvalidator/jbvalidator.js'); ?>"></script>
<script>
 $(function() {

  let validator = $('form.needs-validation').jbvalidator({
   errorMessage: true,
   successClass: true,
   language: 'dist/lang/en.json'
  });

  //new custom validate methode
  validator.validator.custom = function(el, event) {
   if ($(el).is('[name=password]') && $(el).val().length < 5) {
    return 'Password telalu mudah.';
   }
   // Username
   if ($(el).is('[name=username]')) {
    let username = $(el).val();
    var reWhiteSpace = new RegExp("\\s+");
    //   
    if (username.indexOf(' ') >= 0) {
     return "Username tidak boleh ada spasi";
    }
   }

   // 
   return '';
  }
 })
</script>
<!--  -->
</body>

</html>