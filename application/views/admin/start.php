<?php $currentUser = $_SESSION["app_user"];?>

<div class="text-right">
  <p>Usted ha ingresado como <?php echo $currentUser->email ?> <a href="<?php echo(base_url('appliance/logout')) ?>">|Salir|</a></p>
</div>
