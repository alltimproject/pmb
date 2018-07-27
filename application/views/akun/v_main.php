
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="icon" type="image/png" href="<?= base_url().'images/PAUD2.png' ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Akun | Paud Mawar 015
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <link href="<?= base_url().'assets/vendor/font-awesome/css/font-awesome.min.css' ?>" rel="stylesheet">
  <link href="<?= base_url().'assets/paper-dashboard/css/bootstrap.min.css' ?>" rel="stylesheet" />
  <link href="<?= base_url().'assets/paper-dashboard/css/paper-dashboard.min.css' ?>" rel="stylesheet" />
  <link href="<?= base_url().'assets/vendor/toastr/build/toastr.min.css' ?>" rel="stylesheet">
  <link href="<?= base_url().'assets/vendor/animate/animate.css' ?>" rel="stylesheet">
  <link href="<?= base_url().'assets/paper-dashboard/demo/demo.css' ?>" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper">
    <div class="sidebar" data-color="white" data-active-color="danger">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        <a href="#dashboard" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="<?= base_url().'images/PAUD2.png' ?>">
          </div>
        </a>
        <a href="#dashboard" class="simple-text logo-normal">
          PAUD MAWAR 015
          <!-- <div class="logo-image-big">
            <img src="../assets/img/logo-big.png">
          </div> -->
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li>
            <a href="#beranda">
              <i class="nc-icon nc-bank"></i>
              <p>Beranda</p>
            </a>
          </li>
          <li>
            <a href="#pengumuman">
              <i class="nc-icon nc-paper text-success"></i>
              <p>Pengumuman</p>
            </a>
          </li>
          <li class="active-pro">
            <a href="<?= base_url().'auth/logout' ?>">
              <i class="nc-icon nc-spaceship"></i>
              <p>Logout</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" id="header-content"></a>
          </div>
          <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link btn-rotate" href="<?= base_url().'auth/logout' ?>">
                  <i class="nc-icon nc-settings-gear-65"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Logout</span>
                  </p>
                </a>
              </li>
            </ul>
          </div> -->
        </div>
      </nav>
      <!-- End Navbar -->
      <!-- <div class="panel-header panel-header-sm">


</div> -->


      <div class="content" id="content-akun"></div>

      <footer class="footer footer-black  footer-white ">
        <div class="container-fluid">
          <div class="row">
            <div class="credits ml-auto">
              <span class="copyright">
                ©2018, 30814261 - Rico Ryan
              </span>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>

  <script src="<?= base_url().'assets/paper-dashboard/js/core/jquery.min.js' ?>"></script>
  <script src="<?= base_url().'assets/paper-dashboard/js/core/popper.min.js' ?>"></script>
  <script src="<?= base_url().'assets/paper-dashboard/js/core/bootstrap.min.js' ?>"></script>
  <script src="<?= base_url().'assets/paper-dashboard/js/plugins/perfect-scrollbar.jquery.min.js' ?>"></script>
  <script src="<?= base_url().'assets/paper-dashboard/js/plugins/chartjs.min.js' ?>"></script>
  <script src="<?= base_url().'assets/paper-dashboard/js/plugins/bootstrap-notify.js' ?>"></script>
  <script src="<?= base_url().'assets/paper-dashboard/js/paper-dashboard.min.js' ?>" type="text/javascript"></script>
  <script src="<?= base_url().'assets/vendor/toastr/build/toastr.min.js' ?>"></script>
  <script src="<?= base_url().'assets/paper-dashboard/demo/demo.js' ?>"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      var href;

      //   load_content(href.split('/').pop());

      var load_content = function(href) {
          $.get(`<?= base_url().'akun/' ?>${href}`, function(content) {
              $('#content-akun').html(content);
              $('#header-content').text(href);
          });
      }

      $(window).on('hashchange', function() {
          href = location.hash.substr(1);
          load_content(href);
      });

      if (location.hash) {
          href = location.hash.substr(1);
          load_content(href);
      } else {
          location.hash = '#beranda';
      }

			toastr.options = {
					"closeButton": true,
					"positionClass": "toast-bottom-right",
					"preventDuplicates": true
			}
    });
  </script>

</body>
</html>
