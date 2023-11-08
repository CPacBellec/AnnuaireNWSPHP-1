<br>
<br>
<?php
    require './src/dbConnect.php';
    $database = new Database($connection);

    $classes = $database->getAllCLass();

    if(isset($_GET['id'])){
        $res = $database->getByID($_GET['id']);
    }
?>
<main class="flex-shrink-0 m-4">
  <div class="container rounded bg-light">
      <div class="py-3 fw-bold fs-2 text-primary text-center">
        <?php echo $_GET['page'] === 'add' ? 'Ajouter un profil' : 'Modifier un profil'; ?>
      </div>
      <div class="row g-5 ">
          <div class="col-md-12 col-lg-12">
              <form action="#" method="post">
                  <div class="row ">
                      <div class="col-sm-4">
                          <label for="name"  class="form-label">Nom<span class=" <?php echo (isset($_POST['submit'])? empty($_POST['name']) ?  "text-danger" :  "":  ""); ?>">*</span> :</label>
                          <input type="text" id="name" class="form-control   <?php echo isset($_POST['submit']) && empty($_POST['name']) ? 'is-invalid' : ''; ?>" name="name" placeholder="Nom..." value="<?php echo !empty($_POST['name']) ? $_POST['name'] :(isset($res[0]['name']) ? $res[0]['name']:'');?>" >
                          <br/>
                      </div>
                      <div class="col-sm-4">
                          <label for="surname" class="form-label">Prenom<span class=" <?php echo (isset($_POST['submit'])? empty($_POST['surname']) ?  "text-danger" :  "":  ""); ?>">*</span> :</label>
                          <input type="text" class="form-control <?php echo isset($_POST['submit']) && empty($_POST['surname']) ? 'is-invalid' : ''; ?>" id="surname" name="surname" value="<?php echo (!empty($_POST['surname']) ? $_POST['surname'] : (isset($res[0]['surname']) ? $res[0]['surname']:''));?>" placeholder="Prénom..." >
                      </div>
                      <div class="col-4">
                          <label for="birthday" class="form-label">Date de naissance<span class=" <?php echo (isset($_POST['submit'])? empty($_POST['birthday']) ?  "text-danger" :  "":  ""); ?>">*</span> :</label>
                          <input type="date" id="birthday" class="form-control <?php echo isset($_POST['submit']) && empty($_POST['birthday']) ? 'is-invalid' : ''; ?> " name="birthday" value="<?php echo !empty($_POST['birthday']) ? $_POST['birthday'] :(isset($res[0]['birthday']) ? $res[0]['birthday']:'');?>">
                          <br/>
                      </div>                     
                      <div class="col-6">
                          <label for="email" class="form-label">Email<span class=" <?php echo (isset($_POST['submit'])? empty($_POST['email']) ?  "text-danger" :  "":  ""); ?>">*</span> :</label>
                          <input type="email" id="email" class="form-control <?php echo isset($_POST['submit']) && empty($_POST['email']) ? 'is-invalid' : ''; ?>" name="email" placeholder="test@example.com" value="<?php echo !empty($_POST['email']) ? $_POST['email'] : (isset($res[0]['email']) ? $res[0]['email']:'');?>">
                          <br/>
                      </div>
                      <div class="col-6">
                        <label for="phone">Numéro de Téléphone<span class=" <?php echo (isset($_POST['submit'])? empty($_POST['phone']) ?  "text-danger" :  "":  ""); ?>">*</span> :</label>
                        <div class="input-group mt-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="phone">+33</span>
                            </div>
                          <input type="text" class="form-control <?php echo isset($_POST['submit']) && empty($_POST['phone']) ? 'is-invalid' : ''; ?>" id="phone" name="phone" placeholder="00 00 00 00 00" value="<?php echo !empty($_POST['phone']) ? $_POST['phone'] :( isset($res[0]['phone']) ? $res[0]['phone']:'');?>" >
                        </div>
                        <br/>
                      </div>
                      <div class="col-8">
                          <label for="address" class="form-label">Adresse<span class=" <?php echo (isset($_POST['submit'])? empty($_POST['address']) ?  "text-danger" :  "":  ""); ?>">*</span> :</label>
                          <input type="text" id="address" class="form-control <?php echo isset($_POST['submit']) && empty($_POST['address']) ? 'is-invalid' : ''; ?>" name="address" placeholder="Adresse..." value="<?php echo !empty($_POST['address']) ? $_POST['address'] : (isset($res[0]['address']) ? $res[0]['address']:'')?>">
                          <br/>
                      </div>
                      <div class="col-2">
                          <label for="postalcode" class="form-label">Code postal<span class=" <?php echo (isset($_POST['submit'])? empty($_POST['postalcode']) ?  "text-danger" :  "":  ""); ?>">*</span> :</label>
                          <input type="text" id="postalcode" class="form-control <?php echo isset($_POST['submit']) && empty($_POST['postalcode']) ? 'is-invalid' : ''; ?>" name="postalcode"  placeholder="Code postal..." value="<?php echo !empty($_POST['postalcode']) ? $_POST['postalcode'] :( isset($res[0]['postalcode']) ? $res[0]['postalcode']:'')?>">
                          <br/>
                      </div>
                      <div class="col-2">
                          <label for="city" class="form-label">Ville<span class=" <?php echo (isset($_POST['submit'])? empty($_POST['city']) ?  "text-danger" :  "":  ""); ?>">*</span> :</label>
                          <input type="text" id="city" class="form-control <?php echo isset($_POST['submit']) && empty($_POST['city']) ? 'is-invalid' : ''; ?>" name="city" placeholder="Ville..." value="<?php echo !empty($_POST['city']) ? $_POST['city'] :( isset($res[0]['city']) ? $res[0]['city']:'')?>">
                          <br/>
                      </div>
                        <div class="col-6">
                            <label for="formation" class="form-label">Formation<span class=" <?php echo (isset($_POST['submit'])? empty($_POST['formation']) ?  "text-danger" :  "":  ""); ?>">*</span> :</label>
                            <select name="class" id="formation" class="form-select <?php echo isset($_POST['submit']) && empty($_POST['formation']) ? 'is-invalid' : ''; ?>">
                                <option disabled selected hidden>Sélectionnez la formation souhaitée</option>
                                <?php
                                    foreach ($classes as $class) {
                                        echo "<option value='{$class['class_id']}' " .
                                        ( !empty($_POST['class']) && $_POST['class'] == $class['id_class'] ? 'selected' :
                                          (isset($res[0]['class_id']) && $res[0]['class_id'] == $class['id_class'] ? 'selected' : '' )
                                        ) . ">{$class['class_name']}</option>";
                                    }
                                ?>
                            </select>
                            <br/>
                        </div>  
                  </div>
                  <span>* Mention obligatoire</span>
                  <input type="submit" class="w-100 btn btn-primary btn-lg mr-3 mb-3" name="submit" value="Envoyer">
              </form>
          </div>
      </div>
  </div>
</main>