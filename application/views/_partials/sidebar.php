<div id="sidebar" class="active">
 <div class="sidebar-wrapper active coba">
  <div class="sidebar-header mb-0 ">
   <div class="d-flex justify-content-between">
    <div></div>
    <div class="logo">
     <a href="index.html"><img src="<?= base_url('assets/images/logo/logo.png'); ?>" alt="Logo" srcset="" /></a>
    </div>
    <div class="toggler">
     <div class="text-end">
      <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
     </div>
    </div>
   </div>
  </div>
  <div class="sidebar-menu">
   <ul class="menu mt-0">
    <li class="sidebar-title">Menu</li>
    <li class="sidebar-item <?= $aktif == 'dashboard' ? 'active' : '' ?>">
     <a href="<?= base_url('dashboard'); ?>" class='sidebar-link'>
      <i class="bi bi-grid-fill"></i>
      <span>Dashboard</span>
     </a>
    </li>
    <?php if (!empty($_SESSION['status'])) { ?>
     <?php if ($_SESSION['role'] == 'staf_it') {
     ?>
      <li class="sidebar-item act <?= $aktif == 'pengguna' ? 'active' : '' ?>">
       <a href="<?= base_url('pengguna'); ?>" class='sidebar-link'>
        <i class="bi bi-person-circle"></i>
        <span>Pengguna</span>
       </a>
      </li>
     <?php } ?>
    <?php } ?>
    <li class="sidebar-item <?= $aktif == 'tentang' ? 'active' : '' ?>">
     <a href="<?= base_url('/tentang'); ?>" class='sidebar-link'>
      <i class="bi bi-grid-1x2-fill"></i>
      <span>Tentang</span>
     </a>
    </li>

    <li class="sidebar-item <?= $aktif == 'forum' ? 'active' : '' ?>">
     <a href="<?= base_url('forum'); ?>" class='sidebar-link'>
      <i class="bi bi-chat-square-dots-fill"></i>
      <span>Forum</span>
     </a>
    </li>

    <?php if (!empty($_SESSION['status'])) { ?>
     <?php if ($_SESSION['role'] == 'pakar' || $_SESSION['role'] == 'pegawai' || $_SESSION['role'] == 'staf_it') {
     ?>
      <li class="sidebar-item has-sub <?= $aktif == 'pengalaman' || $aktif == 'dokumentasi' || $aktif == 'verifikasi' ||  $aktif == 'revisi' || $aktif == 'publik'  ? 'active' : '' ?>">
       <a href="#" class="sidebar-link ">
        <i class="bi bi-stack"></i>
        <span>Pengetahuan</span>
       </a>
       <ul class="submenu <?= $aktif == 'pengalaman' || $aktif == 'dokumentasi' || $aktif == 'verifikasi' ||  $aktif == 'revisi' || $aktif == 'publik' ? 'active' : '' ?>">
        <li class="submenu-item <?= $aktif == 'publik' ? 'active' : '' ?>">
         <a href="<?= base_url('publik'); ?>">Publik</a>
        </li>
        <li class=" submenu-item <?= $aktif == 'pengalaman' ? 'active' : '' ?>">
         <a href="<?= base_url('pengalaman'); ?>">Pengalaman</a>
        </li>
        <li class=" submenu-item <?= $aktif == 'dokumentasi' ? 'active' : '' ?>">
         <a href="<?= base_url('dokumentasi'); ?>">Dokumentasi</a>
        </li>
        <?php if ($_SESSION['role'] == 'pakar') {
        ?>
         <li class="submenu-item <?= $aktif == 'verifikasi' ? 'active' : '' ?>">
          <a href="<?= base_url('verifikasi'); ?>">Verifikasi</a>
         </li>
        <?php } ?>
        <?php if ($_SESSION['role'] == 'pegawai' || $_SESSION['role'] == 'staf_it') {
        ?>
         <li class="submenu-item <?= $aktif == 'revisi' ? 'active' : '' ?>">
          <a href="<?= base_url('revisi'); ?>">Revisi</a>
         </li>
        <?php } ?>
       </ul>
      </li>
     <?php } ?>
    <?php } ?>
    <?php if (!empty($_SESSION['status'])) { ?>
     <?php if ($_SESSION['role'] != 'pengunjung') { ?>
      <li class="sidebar-item <?= $aktif == 'arsip' ? 'active' : '' ?>">
       <a href="<?= base_url('arsip'); ?>" class='sidebar-link'>
        <i class="bi bi-search"></i>
        <span>Arsip Pengetahuan</span>
       </a>
      </li>
     <?php } ?>
    <?php } ?>
    <hr>
    <li class=" sidebar-item d-flex justify-content-center">
     <?php if (empty($_SESSION['status'])) { ?>
      <div class="d-grid w-100">
       <a href="<?= base_url('/login'); ?>" class='text-white btn btn-danger fw-bold'>
        Login
       </a>
      </div>
     <?php } else { ?>
      <div class="d-grid w-100">
       <a href="<?= base_url('logout'); ?>" class='text-white btn btn-danger  fw-bold'>
        Logout
       </a>
      </div>
     <?php } ?>
    </li>

   </ul>
  </div>
  <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
 </div>
</div>