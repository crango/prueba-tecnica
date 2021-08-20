<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container-fluid">
		<h1><?php echo $data['title']; ?></h1>
		<form method="POST" action="<?php echo URL_ROOT . 'empleados/store' ?>">
			<div class="row mb-3">
		    <label for="inputPassword3" class="col-sm-2 col-form-label">Nombre Completo*</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" name="full_name" id="inputFullName">
		    </div>
		  </div>
		  <div class="row mb-3">
		    <label for="inputEmail3" class="col-sm-2 col-form-label">Correo Electrónico*</label>
		    <div class="col-sm-10">
		      <input type="email" class="form-control" name="email" id="inputEmail">
		    </div>
		  </div>
		  <fieldset class="row mb-3">
		    <legend class="col-form-label col-sm-2 pt-0">Sexo*</legend>
		    <div class="col-sm-10">
		      <div class="form-check">
		        <input class="form-check-input" type="radio" name="gender" id="gridRadios1" value="M">
		        <label class="form-check-label" for="gridRadios1">
		          Masculino
		        </label>
		      </div>
		      <div class="form-check">
		        <input class="form-check-input" type="radio" name="gender" id="gridRadios2" value="F">
		        <label class="form-check-label" for="gridRadios2">
		          Femenino
		        </label>
		      </div>
		    </div>
		  </fieldset>
		  <div class="row mb-3">
		    <label class="col-sm-2 col-form-label" for="gridCheck1">Area</label>
		    <div class="col-sm-10">
		    	<select class="form-select" aria-label="Default select example">
				  <option selected>Seleccione un Area</option>
				  	<?php foreach ($data['areas'] as $value): ?>
				  		<option value="<?php echo $value->id; ?>"><?php echo $value->nombre; ?></option>
					<?php endforeach;?>
				</select>
		    </div>
		  </div>
		  <fieldset class="row mb-3">
		    <legend class="col-form-label col-sm-2 pt-0"></legend>
		    <div class="col-sm-10">
		    	<div class="form-check">
  					<input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
  					<label class="form-check-label" for="defaultCheck1">Deseo recibir boletin informativo</label>
		    	</div>
			</div>
		  </fieldset>
		  <fieldset class="row mb-3">
		    <legend class="col-form-label col-sm-2 pt-0">Roles*</legend>
		    <div class="col-sm-10">
		    	<?php foreach ($data['roles'] as $value): ?>
		      		<div class="form-check">
		        		<input class="form-check-input" type="checkbox" id="gridCheck<?php echo $value->id; ?>" value="<?php echo $value->id; ?>">
		        		<label class="form-check-label" for="gridCheck1"><?php echo $value->nombre; ?></label>
		      		</div>
		        <?php endforeach;?>
		    </div>
		</fieldset>
		  <button type="submit" class="btn btn-primary">Guardar</button>
		</form>
	</div>
</body>
</html>