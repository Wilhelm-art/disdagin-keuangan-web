</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white border-top">
  <div class="container my-auto">
    <div class="copyright text-center my-auto text-muted small">
      <span>&copy; {{ date('Y') }} <strong>Pemerintah Kota Bandung</strong> — Dinas Perdagangan dan Perindustrian. Jl. Tamansari No. 59, Kota Bandung 40132.</span>
    </div>
  </div>
</footer>
</div>
</div>

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content border-0 shadow">
      <div class="modal-header bg-light">
        <h5 class="modal-title font-weight-bold text-gray-800" id="logoutModalLabel">
          <i class="fas fa-sign-out-alt text-danger mr-2"></i>Konfirmasi Keluar Sesi
        </h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body py-4 text-gray-700">
        Apakah Anda yakin ingin mengakhiri sesi dan keluar dari <strong>SIPK DISDAGIN Kota Bandung</strong>?
      </div>
      <div class="modal-footer bg-light">
        <button class="btn btn-secondary px-3" type="button" data-dismiss="modal">Batal</button>
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button class="btn btn-danger font-weight-bold px-4" type="submit">Ya, Keluar</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- JavaScript-->
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
<script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
<script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>
