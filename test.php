<?php
require_once('connect.php');
// class Users extends Controller{
//     public function __construct()
//     {
//         $this->userModel = $this->model('User');
//     }
 
//     public function register(){
//         if ($_SERVER['REQUEST_METHOD'] == 'POST'){
//            // process form
//            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING); 
//             $data = [
//                 'name' => trim($_POST['name']),
//                 'email' => trim($_POST['email']),
//                 'password' => trim($_POST['password']),
//                 'confirm_password' => trim($_POST['confirm_password']),
//                 'name_err' => '',
//                 'email_err' => '',
//                 'password_err' => '',
//                 'confirm_password_err' => '' 
//             ];
 
//             //valide name
//             if(empty($data['name'])){
//                 $data['name_err'] = 'Please enter name';
//             }
 
//             //validate email
//             if(empty($data['email'])){
//                 $data['email_err'] = 'Please enter email';
//             }else{
//                 //check for email
//                 if($this->userModel->findUserByEmail($data['email'])){
//                     $data['email_err'] = 'Email already exist';
//                 }
//             }
 
//             //validate password 
//             if(empty($data['password'])){
//                 $data['password_err'] = 'Please enter your password';
//             }elseif(strlen($data['password']) < 6){
//                 $data['password_err'] = 'Password must be atleast six characters';
//             }
 
//             //validate confirm password
//             if(empty($data['confirm_password'])){
//                 $data['confirm_password_err'] = 'Please confirm password';
//             }else{
//                 if($data['password'] != $data['confirm_password'])
//                 {
//                     $data['confirm_password_err'] = 'Password does not match';
//                 }
//             }
 
//             //make sure error are empty
//             if(empty($data['name_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['password_confirm_err'])){
//                 $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
//                 if($this->userModel->register($data)){
//                     flash('register_success', 'you are registerd you can login now');
//                     redirect('users/login');
//                 }
//             }else {
//                 $this->view('users/register', $data);
//             }
//         }else{
//             //init data
//             $data = [
//                 'name' => '',
//                 'email' => '',
//                 'password' => '',
//                 'confirm_password' => '',
//                 'name_err' => '',
//                 'email_err' => '',
//                 'password_err' => '',
//                 'confirm_password_err' => '' 
//             ];
//             //load view
//             $this->view('users/register', $data);          
//         }
//     }
 
//     public function login(){
//         if ($_SERVER['REQUEST_METHOD'] == 'POST'){
//            // process form
//            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING); 
//            $data = [
//                'email' => trim($_POST['email']),
//                'password' => trim($_POST['password']),
//                'email_err' => '',
//                'password_err' => ''
//            ];
 
//             //validate email
//             if(empty($data['email'])){
//                 $data['email_err'] = 'Please enter email';
//             }else{
//                 if($this->userModel->findUserByEmail($data['email'])){
//                     //user found
//                 }else{
//                     $data['email_err'] = 'User not found';
//                 }
//             }
 
//             //validate password 
//             if(empty($data['password'])){
//                 $data['password_err'] = 'Please enter your password';
//             }elseif(strlen($data['password']) < 6){
//                 $data['password_err'] = 'Password must be atleast six characters';
//             }
 
//             //make sure error are empty
//             if(empty($data['email_err']) && empty($data['password_err'])){
//                 $authenticatedUser = $this->userModel->login($data['email'], $data['password']);
//                 if($authenticatedUser){
//                     //create session
//                     $this->createUserSession($authenticatedUser);
//                 }else{
//                     $data['password_err'] = 'Password incorrect';
//                     $this->view('users/login', $data);
//                 }
//             }else{
//                 $this->view('users/login', $data);
//             }
 
//         }else{
//             //init data f f
//             $data = [
//                 'email' => '',
//                 'password' => '',
//                 'email_err' => '',
//                 'password_err' => ''
//             ];
//             //load view
//             $this->view('users/login', $data);          
//         }
//     }
 
//     //setting user section variable
//     public function createUserSession($user){
//         $_SESSION['user_id'] = $user->id;
//         $_SESSION['name'] = $user->name;
//         $_SESSION['email'] = $user->email;
//         redirect('posts/index');
//     }
 
//     //logout and destroy user session
//     public function logout(){
//         unset($_SESSION['user_id']);
//         unset($_SESSION['name']);
//         unset($_SESSION['email']);
//         session_destroy();
//         redirect('users/login');
//     }


//     public function register($data){
//       $this->db->query('INSERT INTO user (name, email, password) VALUES (:name, :email, :password)');
//       $this->db->bind(':name', $data['name']);
//       $this->db->bind(':email', $data['email']);
//       $this->db->bind(':password', $data['password']);

//       if($this->db->execute()){
//           return true;
//       } else {
//           return false;
//       }
//   }

//   public function updatePost($data){
//     $this->db->query('UPDATE posts SET title = :title, body = :body WHERE id = :id');
//     $this->db->bind(':id', $data['id']);
//     $this->db->bind(':title', $data['title']);
//     $this->db->bind(':body', $data['body']);

//     //execute 
//     if($this->db->execute()){
//         return true;
//     }else{
//         return false;
//     }
// }

// function singleQuoteString ($string) {
//   return "'".$string."'";
// }


// //Create escape mySql identifier for array
// public function escapeIdentifierArray($conn,$array) {
// $returnArray = [];
//   foreach ($array as $keys => $values) {
//   if (dateValidate($values)){
//     $values = date ('Y-m-d');
//   }
//   $keys = mysqli_real_escape_string($conn,$keys);
//   $values = mysqli_real_escape_string($conn,$values);
//   $returnArray[$keys] = $values;
//   }

// return $returnArray;
// }

// function queryPrep($conn, $array, $table){
// $escapeArray = escapeIdentifierArray($conn,$array);
// $column = implode(",",array_keys($escapeArray));
// foreach ($escapeArray as $key => $value){
//   $escapeArray[$key]= singleQuoteString($value);
// }
// $row = implode(",", array_values($escapeArray));
// $query = "INSERT INTO $table ($column) VALUES ($row)";

// return $query;
// }

// function insertDB ($conn, $array, $table) {
// $escapeArray = escapeIdentifierArray($conn,$array);
// $column = implode(",",array_keys($escapeArray));
// foreach ($escapeArray as $key => $value){
//   $escapeArray[$key]= singleQuoteString($value);
// }
// $stmt = $conn -> prepare('INSERT INTO $table ($)');
// }


// // query retrieve data and print from dtb
// function retrieveTable ($conn){
// // $obj = new \emp;
// $querySelect = "SELECT * FROM persons";
// $result = $conn->query($querySelect);
// if ($result->num_rows > 0) {
// while($row = $result->fetch_assoc()) {
//   echo "ID: " . $row["ID"] . "<br>". "Name: " . $row["FullName"]. "<br>" . "JobApply: " . $row["JobApply"]. "<br>". "Phone No: "  . $row["Phone"]. "<br>". "Mail: "  . $row["Mail"]. "<br>". "Date of Birth: "  . $row["DOB"]. "<br>";
  
// }
// }

// }
// }


function escapeIdentifierArray($conn,$array) {
    $returnArray = [];
        foreach ($array as $keys => $values) {
        $keys = mysqli_real_escape_string($conn,$keys);
        $values = mysqli_real_escape_string($conn,$values);
        $returnArray[$keys] = $values;
        }
}


echo "Test page" ."<br>";
$db = connDB::getInstance();
$testArray= array(['a'=>"\b Test out",'b'=> 2, 'c'=> "\\double slash"]);

// $sql = '\b test out  \\ % a _ a';
// $stmt = $db->prepare($sql);
// echo "<pre>";
// print_r($stmt);
// echo "</pre>";

// echo "<pre>";
// print_r($testArray);
// echo "</pre>";


echo ''!== null? 'true':'false';
?>