<div class="wrapper">
        <div class="page-header" style="background-image: url('<?= base_url().'images/background3.jpg' ?>');">
            <div class="filter"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 ml-auto mr-auto">
                            <div class="card card-register animated bounceIn">
                                <h3 class="title">Login Admin</h3>
                                <form class="register-form" id="form-login">
                                    <label>Email</label>
                                    <div class="input-group form-group-no-border">
                                        <span class="input-group-addon">
                                            <i class="nc-icon nc-email-85"></i>
                                        </span>
                                        <input type="email" class="form-control" placeholder="Email" id="email" name="email">
                                    </div>

                                    <label>Password</label>
                                    <div class="input-group form-group-no-border">
                                        <span class="input-group-addon">
                                            <i class="nc-icon nc-key-25"></i>
                                        </span>
                                        <input type="password" class="form-control" placeholder="Password" id="password" name="password">
                                    </div>
                                    <button class="btn btn-danger btn-block btn-round">Login</button>
                                </form>
                                <div class="forgot">
                                  <div class="form-group">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" id="show">
                                            Show Password
                                            <span class="form-check-sign"></span>
                                        </label>
                                    </div>
                                  </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>

    <script type="text/javascript">
      $(document).ready(function(){

        $('#show').click(function(){
          if($(this).is(':checked'))
          {
            $('#password').attr('type', 'text');
          } else {
            $('#password').attr('type', 'password');
          }
        });

        $('#form-login').on('submit', function(){
          var submit = true;

          $(this).find('#email, #password').each(function(){
            if($(this).val() == ''){
              submit = false;
            }
          });

          if(submit == true)
          {
            $.ajax({
              url: '<?= base_url().'auth/login_admin' ?>',
              type: 'POST',
              data: $(this).serialize(),
              success: function(data){
                if(data == 'Admin'){
                  window.location = '<?= base_url().'admin/' ?>';
                } else if(data == 'Ketua'){
                  window.location = '<?= base_url().'ketua/' ?>';
                } else {
                  toastr.error('Username atau Password salah', 'Error');
                }
              }
            });
          } else {
            toastr.warning('Silahkan isi Username atau Password', 'Warning');
          }

          return false;
        });
      });
    </script>
