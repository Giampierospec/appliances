<?php
$currentUser = $_SESSION["app_user"];
$CI =& get_instance();
$message = "";
if($_POST){
  $product = new stdClass();
  $product->brand = $_POST['brand'];
  $product->date = $_POST['date'];
  $product->type = $_POST['type'];
  $product->weight = $_POST['weight'];
  $product->color = $_POST['color'];
  $product->comment = $_POST['comment'];
  $photo = $_FILES['photos'];
  $product->imgPath = "/xampp/htdocs/appliances/appliancePhotos/";
  $product->imgContent = $photo['name'];
  $product->idUser = $currentUser->id;
  if($photo['error'] == 0 && ($photo['type'] == 'image/jpeg' || $photo['type'] == 'image/png')){
    $CI->db->insert('product',$product);
    move_uploaded_file($photo["tmp_name"],"$product->imgPath"."$product->imgContent");
  }
  else{
    $message = "Eso no es una foto valida vuelva a intentarlo";
  }


}

?>

<div class="text-right">
  <p>Usted ha ingresado como <?php echo $currentUser->email ?> <a href="<?php echo(base_url('appliance/logout')) ?>">|Salir|</a></p>
</div>
<div class="row">
  <div class="col-sm-6">
    <div class="jumbotron jb-reduced-appliance">
      <h2>Ingrese la información de los electrodomesticos</h2>
      <div class="row">
        <div class="col-sm-12">
          <form enctype="multipart/form-data" class="form-horizontal" action="" method="post">
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
                <input type="number" step="0.01" name="weight" class="form-control" required/>
              </div>
              <div class="form-group input-group">
                <label for="color" class="input-group-addon bg-orange"><i class="fa fa-barcode" aria-hidden="true"></i> Color</label>
                <input type="color" name="color" class="form-control" required/>
              </div>
              <div class="form-group input-group">
                <label for="photos" class="input-group-addon bg-orange"><i class="fa fa-camera" aria-hidden="true"></i> Suba su imagen aqui</label>
                <input type="file" name="photos" class="form-control" accept="image/*" id="photos" required/>
              </div>
              <div class="form-group input-group">
                <label for="comment" class="input-group-addon bg-orange"><i class="fa fa-comment" aria-hidden="true"></i> Comentario</label>
                <textarea name="comment" rows="2" cols="80" class="form-control" required></textarea>
              </div>
              <div class="text-center">
                <button type="submit" id="btn_submit_1" class="btn bg-orange"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
              </div>
          </form>
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
  </div>
  <div class="col-sm-6">
    <img src="http://signalysis.com/images/kitchen/kitchen.png" class="img-responsive"alt="appliances">
  </div>
</div>
<h1>Productos de <?php echo $currentUser->name." ".$currentUser->lastname; ?></h1>
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
      <?php
      $product = getProductByUserId($currentUser->id);
        foreach ($product as $pr) {
          $img = base_url('')."appliancePhotos/"."$pr->imgContent";
            echo "<tr>
              <td>{$pr->id}</td>
              <td>{$pr->brand}</td>
              <td>{$pr->type}</td>
              <td>{$pr->weight} kg</td>
              <td>{$pr->color}</td>
              <td><img src='{$img}' class='img-responsive img-circle little-photo' alt='tu photo'></td>
              <td>{$pr->comment}</td>
            </tr>
            ";
        }
       ?>
  </tbody>
</table>
