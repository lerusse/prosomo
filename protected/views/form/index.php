<?php
/* @var $this FormController */
// var_dump($countries);
$this->breadcrumbs=array(
	'Form',
);
?>
<h1>Nous contacter</h1>
<div class="row">
<form col-md-8 method="post" action="<?php echo Yii::app()->getBaseUrl(true)?>/index.php?r=registrations/create"> 
  <div class="form-group">
    <label for="lastName">Prénom</label> 
    <input type="lastName" class="form-control" id="lastName" aria-describedby="lastName" placeholder=" Prénom" required>
  </div>
  <div class="form-group">
    <label for="name">Nom</label> 
    <input type="name" class="form-control" id="name" aria-describedby="name" placeholder=" Nom" required>
  </div>
  <div class="form-group">
    <label for="email">Adresse courriel*</label> 
    <input type="email" class="form-control" id="email" aria-describedby="email" placeholder="Courriel" required>
  </div>

  <div class="form-group">
    <label for="email">Téléphone*</label> 
    <input type="phoneNum" class="form-control" id="phoneNim" aria-describedby="phoneNum" placeholder="Votre téléphone" required>
  </div>
  <div class="form-group">
    <label for="residenceTown">Ville</label> 
    <input type="residenceTown" class="form-control" id="residenceTown" aria-describedby="residenceTown" placeholder="Ville de résidence" required>
  </div>
  <div class="form-group">
    <label for="province">Province</label> 
    <input type="province" class="form-control" id="province" aria-describedby="province" placeholder="Province de résidence" required>
  </div>

  <div class="form-group">
    <label for="postalCode">Code postal*</label> 
    <input type="postalCode" class="form-control" id="postalCode" aria-describedby="postalCode" placeholder="Code Postal" required>
  </div>


  <div class="form-group">
    <label for="postalCode">Pays</label> 
    <select class="custom-select" name="country">
    <?php foreach ($countries as $value){ ?>
    <option value="<?php echo $value['id'] ?>"><?php echo $value['nicename'] ?></option>
    <?php
    }
    ?>
    </select>
  </div>

  <div class="form-group">
    <label for="postalCode">Commantaire 1</label> 
    <textarea class="form-control" aria-label="With textarea" name="firstComment"></textarea>
  </div>

  <div class="form-group">
    <label for="postalCode">Commantaire 2</label> 
    <textarea class="form-control" aria-label="With textarea" name="secondComment"></textarea>
  </div>
  <input type="submit" class="btn btn-primary" value="Enregistrer"> 
  </form>
</div>



