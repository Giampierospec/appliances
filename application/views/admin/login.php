<?php
$message = '';
$CI =& get_instance();
if($_POST){
  $sql = "select * from user where email = ? and pass = ?";
  $email = $_POST['email'];
  $pass = md5($_POST['pass']);
  $rs = $CI->db->query($sql,array($email,$pass));
  $rs = $rs->result();
  if(count($rs) > 0){
    $_SESSION['app_user'] = $rs[0];
    redirect('appliance');
  }
  else{
    $message = "Email o contraseña incorrectos";
  }

}
 ?>
<div class="jumbotron jb-reduced">
  <div class="row">
    <div class="col-sm-12">
      <legend><h2>Ingrese al Sitio</h2></legend>
      <form  class="form-horizontal" action="" method="post">
          <div class="form-group input-group">
            <label for="email" class="input-group-addon bg-orange"><i class="fa fa-envelope" aria-hidden="true"></i> Email</label>
            <input type="email" name="email" placeholder="introduzca su email" class="form-control"required />
          </div>
          <div class="form-group input-group">
            <label for="pass" class="input-group-addon bg-orange"><i class="fa fa-lock" aria-hidden="true"></i> Contraseña</label>
            <input type="password" name="pass"  class="form-control"required />
          </div>
          <div class="text-center">
            <button type="submit" name="btn_submit" class='btn bg-orange'><i class="fa fa-sign-in" aria-hidden="true"></i> Ingresar</button>
          </div>
      </form>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <a href="<?php echo base_url('register')?>"><p>¿No tiene cuenta? Regístrese aquí</p></a>
      </div>
    </div>
  </div>
  <div id="message"class="alert alert-danger" style="display:none;">
    <p><?php echo $message ?></p>
  </div>
  <!-- In this script i will show the message -->
  <script type="text/javascript">
    $(document).ready(function() {
      var message = "<?php echo (isset($message)?$message:"") ?>";
      if(message != ""){
        $("#message").fadeIn(5000,appendClose).addClass("alert-dismissable fade in");
      }
      else{
        $("#message").hide();
      }
    });
    function appendClose(){
      var close = '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
      $(close).appendTo("#message").fadeIn(5000);
      $()
    }
  </script>
<script src="<?php echo base_url('') ?>js/loginEffects.js" charset="utf-8"></script>

</div>
