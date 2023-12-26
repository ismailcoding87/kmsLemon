<footer>
 <div class="footer clearfix mb-0 text-muted">
  <div class="float-center">
   <p class="text-dark">2023 &copy; Alfiyah Nurjanah -- Kms Pengelolaan Lemon</p>
  </div>
 </div>
</footer>

</div>

</div>

<!-- Data Tables -->
<script src="<?= base_url('assets/vendors/data-tables/dataTables.min.js'); ?>"></script>
<!--  -->
<script src="<?= base_url('/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js'); ?>"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<!--  -->

<!--  -->
<!--  -->
<!--  -->
<script src="<?= base_url('assets/js/main.js'); ?>"></script>
<!--  -->
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
   // Password ubah
   // username baru
   if ($(el).is('[name=username-new]')) {
    let username = $(el).val();
    var reWhiteSpace = new RegExp("\\s+");
    //   
    if (username.indexOf(' ') >= 0) {
     return "Username tidak boleh ada spasi";
    }

   }
   // Pdf
   if ($(el).is('[name=pengetahuan_pendukung]')) {
    let ext = $(el).val();
    if (ext != "") {
     let allowedExtensions = /(\.pdf)$/i;
     if (!allowedExtensions.exec(ext)) {
      return "File tidak valid";
     }
    }
   }
   // Gambar
   if ($(el).is('[name=gambar]')) {
    let ext = $(el).val();
    if (ext != "") {
     let allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
     if (!allowedExtensions.exec(ext)) {
      return "File tidak valid";
     }
    }
   }
   // Vidio
   if ($(el).is('[name=vidio]')) {
    let ext = $(el).val();
    if (ext != "") {
     let allowedExtensions = /(\.mp4)$/i;
     if (!allowedExtensions.exec(ext)) {
      return "File tidak valid";
     }
    }
   }
   // 
   return '';
  }
 })
</script>
<!--  -->
<script>
 $(document).ready(function() {
  $(":button[name='hapus-data']").click(function(e) {
   let url = $(this).val();
   Swal.fire({
    title: 'Anda Yakin?',
    text: "Akan menghapus data!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    cancelButtonText: "Tidak",
    confirmButtonText: 'Ya, hapus!'
   }).then((result) => {
    if (result.isConfirmed) {
     window.location = url;
    }
   })
  });
 });
</script>
</body>

</html>