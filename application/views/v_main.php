
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
    <link rel="icon" type="image/png" href="<?= base_url().'images/PAUD2.png' ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>PMB PAUD Mawar</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

	  <link href="<?= base_url().'assets/paper-kit/css/bootstrap.min.css' ?>" rel="stylesheet" />
	  <link href="<?= base_url().'assets/paper-kit/css/paper-kit.css' ?>" rel="stylesheet"/>
	  <link href="<?= base_url().'assets/paper-kit/css/demo.css' ?>" rel="stylesheet" />
    <link href="<?= base_url().'assets/vendor/font-awesome/css/font-awesome.min.css' ?>" rel="stylesheet">
		<link href="<?= base_url().'assets/vendor/toastr/build/toastr.min.css' ?>" rel="stylesheet">
	  <link href="<?= base_url().'assets/vendor/animate/animate.css' ?>" rel="stylesheet">
    <link href="<?= base_url().'assets/paper-kit/css/nucleo-icons.css' ?>" rel="stylesheet">

</head>
<body>
  <nav class="navbar navbar-expand-md fixed-top bg-danger" color-on-scroll="500">
      <div class="container">
          <div class="navbar-translate">
              <button class="navbar-toggler navbar-toggler-right navbar-burger" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-bar"></span>
                  <span class="navbar-toggler-bar"></span>
                  <span class="navbar-toggler-bar"></span>
              </button>
              <a class="navbar-brand" href="#home">PAUD MAWAR 015</a>
          </div>
          <div class="collapse navbar-collapse" id="navbarToggler">
              <ul class="navbar-nav ml-auto">
                  <li class="nav-item">
                      <a class="nav-link" rel="tooltip" title="Contact us at Whatsapp" data-placement="bottom" href="https://api.whatsapp.com/send?phone=6282239946084&text=Hi%20PAUD%20Mawar%Rw015" target="_blank">
                          <i class="fa fa-whatsapp"></i>
                          <p class="d-lg-none">Whatsapp</p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" rel="tooltip" title="Follow us on Instagram" data-placement="bottom" href="https://www.instagram.com/ricoryannn/" target="_blank">
                          <i class="fa fa-instagram"></i>
                          <p class="d-lg-none">Instagram</p>
                      </a>
                  </li>
              </ul>
          </div>
      </div>
  </nav>

  <div id="content"></div>



  <script src="<?= base_url().'assets/vendor/jquery/dist/jquery.min.js' ?>" type="text/javascript"></script>
  <script src="<?= base_url().'assets/paper-kit/js/jquery-ui-1.12.1.custom.min.js' ?>" type="text/javascript"></script>
  <script src="<?= base_url().'assets/paper-kit/js/popper.js' ?>" type="text/javascript"></script>
  <script src="<?= base_url().'assets/paper-kit/js/bootstrap.min.js' ?>" type="text/javascript"></script>
  <script src="<?= base_url().'assets/paper-kit/js/bootstrap-switch.min.js' ?>"></script>
	<script src="<?= base_url().'assets/vendor/toastr/build/toastr.min.js' ?>"></script>
  <script src="<?= base_url().'assets/paper-kit/js/paper-kit.js' ?>"></script>

   <script type="text/javascript">
    $(document).ready(function(){
      var href;

      //   load_content(href.split('/').pop());

      var load_content = function(href) {
          $.get(`<?= base_url().'main/' ?>${href}`, function(content) {
              $('#content').html(content);
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
          location.hash = '#home';
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
