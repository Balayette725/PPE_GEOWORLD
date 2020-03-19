  <?php  
  session_start();

  if (empty($_SESSION['login']) && empty($_SESSION['role'])){
    header ('location: connexion.php');
  }

  require_once 'header.php';
  require_once 'inc/manager-db.php';


  if (isset($_POST['update'])){
    //print_r($_POST);
    updatePays($_POST);
  }

  $continent = empty($_GET['continent']) ? 'Asia' : $_GET['continent'];
  $desPays = getCountriesByContinent($continent);

  ?>
  <head> <script src="to-top.js"></script> </head>

  <style>
    .curseur 
    {
      cursor :pointer;
    }
  </style>
  <div><a id="cRetour" class="cInvisible" href="#"></a></div>
  <div class="container">
    <?php echo "<h1>Countries in $continent </h1>"; ?>
    <div>



      <table class="table table-hover table-bordered">
        <thead class="thead-dark">
          <tr>
            <th>Code</th>
            <th>Name</th>
            <th>Region</th>
            <?php if($_SESSION['role'] == "teacher"): ?>
              <th>Update</th>
            <?php endif; ?>
          </tr>
        </thead>
        
        <tbody>  
          <?php foreach($desPays as $continents) :?>
            <tr class="curseur">
              <?php echo "<td onclick=\"location.href='Pays.php?pays=$continents->Name&amp;id=$continents->id&capitale=$continents->Capital&flag=$continents->Code2'\">"?><?php echo $continents->Code ;?></td>
              <?php echo "<td onclick=\"location.href='Pays.php?pays=$continents->Name&amp;id=$continents->id&capitale=$continents->Capital&flag=$continents->Code2'\">"?><?php echo $continents->Name ;?></td>
              <?php echo "<td onclick=\"location.href='Pays.php?pays=$continents->Name&amp;id=$continents->id&capitale=$continents->Capital&flag=$continents->Code2'\">"?><?php echo $continents->Region ;?></td>
              <?php if($_SESSION['role'] == "teacher"): ?>
                <td><a href="updateChangePays.php?id=<?php echo $continents->id?>&pays=<?= $continents->Name ?>&continent=<?php echo $continents->Continent ?>">update</a></td> 
              <?php endif; ?>
            </tr>
          <?php endforeach;?>
        </tbody>
      </table>
      
    </main>




    <?php
    require_once 'javascripts.php';
    require_once 'footer.php';
    ?>