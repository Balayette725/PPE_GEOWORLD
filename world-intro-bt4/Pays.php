<?php  
session_start();

if (empty($_SESSION['login']) && empty($_SESSION['role'])){
  header ('location: connexion.php');
}



require_once 'header.php';
require_once 'inc/manager-db.php';


if (isset($_POST['update'])){
    //print_r($_POST);
  updateVille($_POST);
}

if (isset($_POST['updateL'])){
    //print_r($_POST);
  updateLanguage($_POST);
}



$pays = $_GET['pays'];
$id = $_GET['id'];
$infoPays = getInfo($id);
$languages = getLanguage($id);
$idC = $_GET['capitale'];
$capital = getCapital($idC);
$country = getInfoPays($id);
$flag = $_GET['flag'];
?>
<head><script src="to-top.js"></script></head>
<main role="main" class="flex-shrink-0">
  <script src="to-top.js"></script>


  <div class="container">
   <h1>Welcome to <?= $pays?>&nbsp;<img width="40" height="30" src="images/drapeau/<?php echo "$flag.png"; ?>"> </h1> 
   <table class="table table-hover table-bordered">
    <thead class="thead-dark">
      <tr>
        <th>Name</th>
        <th>Region</th>
        <th>Population</th>
        <?php if($_SESSION['role'] == "teacher"): ?>
          <th>Update</th>
        <?php endif; ?>
      </tr>
    </thead>
    
    <tbody class="cursor">  
      <?php foreach($infoPays as $info) :?>
        <tr>
          <td><?php echo $info->Name ;?></td>
          <td><?php echo $info->District ;?></td>
          <td><?php echo $info->Population ;?></td>
          <?php if($_SESSION['role'] == "teacher"): ?>
           <td><a href="updateChangeVille.php?id=<?php echo $info->id?>&city=<?= $info->Name ?>&idC=<?php echo $info->idCountry ?>">update</a></td> 
         <?php endif; ?>
       </tr>
     <?php endforeach;?>

     <p>The capital of <?php echo $pays ?> is <?php echo($capital[0]->Name); ?>. This country, also call <?php echo ($country[0]->LocalName)?>, is located in <?php echo ($country[0]->Region)?>, in <?php echo ($country[0]->Continent)?>. This country is a <?php echo ($country[0]->GovernmentForm)?> lead by <?php echo ($country[0]->HeadOfState)?>, independant since <?php echo ($country[0]->IndepYear)?>.
      This country have a population of  <?php echo ($country[0]->Population)?> inhabitant and with a surface area of <?php echo ($country[0]->SurfaceArea)?> square kilometers. The life expectancy is <?php echo ($country[0]->LifeExpectancy)?>. The actual GNP is about <?php echo ($country[0]->GNP)?> dollars(the preceding was about <?php echo ($country[0]->GNPOld)?>).
      <br>
      You can find below a list a few cities from this country, with some informations
    </tbody>
  </table>

  <table class="table table-hover table-bordered">
    <thead class="thead-dark">
      <tr>
        <th>Name</th>
        <th>Percentage</th>
        <?php if($_SESSION['role'] == "teacher"): ?>
          <th>Update</th>
        <?php endif; ?>
      </tr>
    </thead>
    <h1>Languages spoken in this country</h1>
    <tbody>
      <?php foreach($languages as $language) : ?>
        <tr>
          <td><?= $language->Name; ?></td>
          <td><?= $language->Percentage; ?></td>
          <?php if($_SESSION['role'] == "teacher"): ?>
            <td><a href="updateChangeLanguage.php?id=<?php echo $language->id?>&language=<?= $language->Name ?>&percentage=<?php echo $language->Percentage ?>&idC=<?php echo $language->idCountry ?>">update</a></td> 
          <?php endif; ?>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</main>
<div><a id="cRetour" class="cInvisible" href="#"></a></div>
</div>


<?php
require_once 'javascripts.php';
require_once 'footer.php';
?>