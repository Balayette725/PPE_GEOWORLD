<?php
require_once 'connect-db.php';

/** Obtenir la liste de tous les pays référencés d'un continent donné
 * @param $continent le nom d'un continent
 * @return tableau d'objets (des pays)
 */

function getAuthentification($login,$password){
 global $pdo;
 $query = "SELECT * FROM log where Login=:login and password=:password";
 $prep = $pdo->prepare($query);
 $prep->bindValue(':login', $login);
 $prep->bindValue(':password', $password);
 $prep->execute();
 // on vérifie que la requête ne retourne qu'une seule ligne
 if($prep->rowCount() == 1){
   $result = $prep->fetch();
   return $result;
 }
 else
   return false;
}

function getCountriesByContinent($continent)
{
  // pour utiliser la variable globale dans la fonction
  global $pdo;
  $query = 'SELECT * FROM Country WHERE Continent = :cont;';
  $prep = $pdo->prepare($query);
  // on associe ici (bind) le paramètre (:cont) de la req SQL,
  // avec la valeur reçue en paramètre de la fonction ($continent)
  // on prend soin de spécifier le type de la valeur (String) afin
  // de se prémunir d'injections SQL (des filtres seront appliqués)
  $prep->bindValue(':cont', $continent, PDO::PARAM_STR);
  $prep->execute();
  // var_dump($prep);  pour du debug
  // var_dump($continent);

  // on retourne un tableau d'objets (car spécifié dans connect-db.php)
  return $prep->fetchAll();
}

/** Obtenir la liste des pays
 * @return liste d'objets
 */
function getAllCountries()
{
  global $pdo;
  $query = 'SELECT * FROM Country;';
  return $pdo->query($query)->fetchAll();
}

function getContinents()
{
  global $pdo;
  $query = 'SELECT Continent FROM Country GROUP BY Continent;'; 
  return $pdo->query($query)->fetchAll();
}

function getAllUser(){
  global $pdo;
  $query = 'SELECT id,login,password,role FROM log ';

  try { 
    $result = $pdo->query($query)->fetchAll(); 
    return $result;
  }
  catch ( Exception $e ) {
    die ("erreur dans la requete ".$e->getMessage());
  }
}

function updateUser($params){
  //print_r($params);
  global $pdo;
  $requete = "update log set Login=:Login,password=:password,role=:role where id=:id";
  $prep = $pdo->prepare($requete);
  $prep->bindValue(':id', $params['id']);
  $prep->bindValue(':Login', $params['Login']);
  $prep->bindValue(':password', $params['password']);
  $prep->bindValue(':role', $params['role']);
  $prep->execute();


}

function getMember($id){
  global $pdo;
  $query = "Select * from log where id=:id";
  $prep = $pdo->prepare($query);
  $prep->bindValue(':id', $id);
  $prep->execute();

  $result=$prep->fetch();
  return $result;
}

function register(){
  global $pdo;
  $Login =  (isset($_POST['Login']) && !empty($_POST['Login'])) ? $_POST['Login'] : header('Location:register.php?message=remplir nom');

  /*if(isset($tab['nom']) && !empty($tab['nom']))
      $nom = $tab['nom'];

  else
  header('Location:form1.php?message=remplir nom');*/

  $Login = $_POST['Login'];
  $password = $_POST['password'];
  $role = $_POST['role'];

  $requete = "INSERT INTO log values( 0,'$Login','$password','$role')";
  try
  {
   $result = $pdo->query($requete);
 }

 catch(Exception $e)
 {
   die ("erreur de la requête ".$e->getMessage());
 }
}

function deleteUser($id){
  global $pdo;
  $query = "delete from log where id = :id ;";
  try {
    $prep = $pdo->prepare($query);
    $prep->bindValue(':id', $id);
    $prep->execute();
  }
  catch ( Exception $e ) {
    die ("erreur dans la requete ".$e->getMessage());
  }    
}

function getInfo($id)
{
  global $pdo;
  $query = 'SELECT * FROM city WHERE idCountry=:id; ';
  $prep = $pdo->prepare($query);
  $prep->bindValue(':id', $id, PDO::PARAM_STR);
  $prep->execute();
  return $prep->fetchAll();
}


function getLanguage($id)
{
  global $pdo;
  $query = 'SELECT  id,idCountry,Name,Percentage FROM countrylanguage,language WHERE countrylanguage.idLanguage = language.id AND countrylanguage.idCountry = :id; ';
  $prep = $pdo->prepare($query);
  $prep->bindValue(':id', $id, PDO::PARAM_STR);
  $prep->execute();
  return$prep->fetchAll();
}

function getCapital($idC)
{
  global $pdo;
  $query = 'SELECT Name FROM city WHERE id = :idC ; ';
  $prep = $pdo->prepare($query);
  $prep->bindValue(':idC', $idC, PDO::PARAM_STR);
  $prep->execute();
  return$prep->fetchAll();
}


function getPaysbyID($id)
{
  global $pdo;
  $query = 'SELECT * FROM Country WHERE id=:id;';
  $prep = $pdo->prepare($query);
  $prep->bindValue(':id', $id, PDO::PARAM_STR);
  $prep->execute();
  return$prep->fetch();
}

function updatePays($params){
  //print_r($params);
  global $pdo;
  $requete = "update country set Name=:Name,Region=:Region,Population=:Population where id=:id";
  $prep = $pdo->prepare($requete);
  $prep->bindValue(':id', $params['id']);
  $prep->bindValue(':Name', $params['Name']);
  $prep->bindValue(':Region', $params['Region']);
  $prep->bindValue(':Population', $params['Population']);
  $prep->execute();


}

function getInfoPays($id)
{
  global $pdo;
  $query = 'SELECT Name, Continent, Region, SurfaceArea, IndepYear, Population, LifeExpectancy, GNP, GNPOld, LocalName, GovernmentForm, HeadOfState, Capital  FROM country WHERE  id=:id; ';
  $prep = $pdo->prepare($query);
  $prep->bindValue(':id', $id, PDO::PARAM_INT);
  $prep->execute();
  $row = $prep->rowCount();

  if ($row == 0) {
    $unknown = "unknown";
    return $unknown;
  }

  else{
    return $prep->fetchAll();
  }
  
}

function getInfoCity($id)
{
  global $pdo;
  $query = 'SELECT * FROM city WHERE id=:id; ';
  $prep = $pdo->prepare($query);
  $prep->bindValue(':id', $id, PDO::PARAM_STR);
  $prep->execute();
  return $prep->fetch();
}


function updateVille($params){
  //print_r($params);
  global $pdo;
  $requete = "update city set Name=:Name,District=:District,Population=:Population where id=:id";
  $prep = $pdo->prepare($requete);
  $prep->bindValue(':id', $params['id']);
  $prep->bindValue(':Name', $params['Name']);
  $prep->bindValue(':District', $params['District']);
  $prep->bindValue(':Population', $params['Population']);
  $prep->execute();


}

function updateLanguage($params){
  //print_r($params);
  global $pdo;
  $requete = "UPDATE language,countrylanguage SET language.Name=:Name , countrylanguage.Percentage=:Percentage WHERE language.id=countrylanguage.idLanguage AND language.id=:id;";
  $prep = $pdo->prepare($requete);
  $prep->bindValue(':id', $params['id']);
  $prep->bindValue(':Name', $params['Name']);
  $prep->bindValue(':Percentage', $params['Percentage']);
  $prep->execute();
}
