<?php
//Here we register the user
$message = "";
$CI =& get_instance();
if($_POST){
  $register = new stdClass();
  $register->name = $_POST["name"];
  $register->lastname = $_POST["lastname"];
  $register->email = $_POST["email"];
  $register->pass = md5($_POST["pass"]);

  $sql = "select * from user where email = ?";
  $rs = $CI->db->query($sql,array($register->email));
  $rs = $rs->result();
//We check if the user already exists
  if(count($rs) > 0){
    $message = "El usuario ya existe intente denuevo";
  }
  //Here we insert data to the database if the user is not set
  else{
    $CI->db->insert("user",$register);
    redirect("appliance/login");
  }
}
 ?>
<div class="jumbotron jb-reduced">
  <div class="row">
    <div class="col-sm-12">
      <legend><h2>Registrese</h2></legend>
      <form  class="form-horizontal" action="" method="post">
        <div class="form-group input-group">
          <label for="name" class="input-group-addon bg-orange"><i class="fa fa-user" aria-hidden="true"></i> Nombre</label>
          <input type="text" name="name" placeholder="introduzca su nombre" class="form-control"required />
        </div>
        <div class="form-group input-group">
          <label for="lastname" class="input-group-addon bg-orange"><i class="fa fa-user" aria-hidden="true"></i> Apellido</label>
          <input type="text" name="lastname" placeholder="introduzca su apellido" class="form-control"required />
        </div>
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
        <a href="<?php echo base_url('appliance')?>"><p>¿Tiene cuenta? Ingrese aquí</p></a>
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
