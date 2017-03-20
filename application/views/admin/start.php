<?php $currentUser = $_SESSION["app_user"];?>

<div class="text-right">
  <p>Usted ha ingresado como <?php echo $currentUser->email ?> <a href="<?php echo(base_url('appliance/logout')) ?>">|Salir|</a></p>
</div>
<div class="row">
  <div class="col-sm-6">
    <div class="jumbotron jb-reduced-appliance">
      <h2>Ingrese la información de los electrodomesticos</h2>
      <div class="row">
        <div class="col-sm-12">
          <form class="form-horizontal" action="" method="post">
              <div class="form-group input-group">
                <label for="brand" class="input-group-addon bg-orange"><i class="fa fa-globe" aria-hidden="true"></i> Marca</label>
                <input type="text" name="brand" class="form-control" required/>
              </div>
              <div class="form-group input-group">
                <label for="brand" class="input-group-addon bg-orange"><i class="fa fa-calendar" aria-hidden="true"></i> Fecha de Compra</label>
                <input type="date" name="date" class="form-control" required/>
              </div>
              <div class="form-group input-group">
                <label for="type" class="input-group-addon bg-orange"><i class="fa fa-cubes" aria-hidden="true"></i> Tipo</label>
                <input type="text" name="type" class="form-control" required/>
              </div>
              <div class="form-group input-group">
                <label for="weight" class="input-group-addon bg-orange"><i class="fa fa-truck" aria-hidden="true"></i> Peso</label>
                <input type="numeric" name="weight" class="form-control" required/>
              </div>
              <div class="form-group input-group">
                <label for="color" class="input-group-addon bg-orange"><i class="fa fa-barcode" aria-hidden="true"></i> Color</label>
                <input type="text" name="color" class="form-control" required/>
              </div>
              <div class="form-group input-group">
                <label for="photo" class="input-group-addon bg-orange"><i class="fa fa-camera" aria-hidden="true"></i> Suba su imagen aqui</label>
                <input type="file" name="photo" class="form-control" accept="image/*" id="photo" required/>
              </div>
              <div class="form-group input-group">
                <label for="comment" class="input-group-addon bg-orange"><i class="fa fa-comment" aria-hidden="true"></i> Comentario</label>
                <textarea name="comment" rows="2" cols="80" class="form-control" required></textarea>
              </div>
              <div class="text-center">
                <button type="submit" id="btn_submit" class="btn bg-orange"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <img src="http://signalysis.com/images/kitchen/kitchen.png" class="img-responsive"alt="appliances">
  </div>
</div>

<table class="table table-responsive">
  <thead>
    <tr class="warning">
      <th>Codigo</th>
      <th>Marca</th>
      <th>Tipo</th>
      <th>Peso</th>
      <th>Color</th>
      <th>Imagen</th>
      <th>Comentario</th>
    </tr>
  </thead>
  <tbody>
    
  </tbody>
</table>
