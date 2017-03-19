<div class="jumbotron jb-reduced">
  <div class="row">
    <div class="col-sm-12">
      <legend><h2>Ingrese al Sitio</h2></legend>
      <form  class="form-horizontal" action="" method="post">
          <div class="form-group input-group">
            <label for="email" class="input-group-addon bg-orange"><i class="fa fa-envelope" aria-hidden="true"></i> Email</label>
            <input type="text" name="email" placeholder="introduzca su email" class="form-control"required />
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
<script src="<?php echo base_url('') ?>js/loginEffects.js" charset="utf-8"></script>

</div>
