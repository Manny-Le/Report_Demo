<?php
class Authentication
{
  public $userName;
  public $email;
  public $pwd;
	public $id;

	public function __construct($uName, $email, $pwd,$id)
	{
		$this->userName = $uName;
    $this->email = $email;
    $this->pwd = $pwd;
		$this->id = $id;
	}

	public function index() {
		$this->render('index');
	}


	public function check_user($user_name)
	{
    $db = connDB::getInstance();
		$stmt= $db->prepare('SELECT * FROM `register` WHERE user_name = :user_name');
		$stmt->bindParam(':user_name',$user_name);

		$stmt->execute();

		$item = $stmt->fetch();

		if (isset($item['id'])) {return 1;}

		else {return 0;}
	}

	public function getPassword($user_name,$pwd) {

		$db = connDB::getInstance();
		$stmt = $db->prepare('SELECT password FROM `register` WHERE user_name = :user');

		$stmt->bindParam(':user',$user_name);

		$stmt->execute();

		$item = $stmt->fetchAll();

		if ($item[0]['password'] == md5($pwd))
		{
			return true;}

		else {
			return false;}
	}


	public function insert_user($data)
	{
    $db = connDB::getInstance();

		$stmt = $db->prepare('INSERT INTO register (user_id,email_id, password) VALUES (:uID, :eID, :pw)');

		$stmt->bindParam('uID', $data['user_name']);
		$stmt->bindParam('eID', $data['email_id']);
		$stmt->bindParam('pw', $data['password']);

		return ($stmt->execute())?true:false;
	}    

	public function getUser($uName) {

		$list = [];
		$db = connDB::getInstance();
		$stmt = $db->prepare('SELECT * FROM register WHERE user_name = :input OR email_id = :input');

		$stmt->bindParam(':input', $uName);
		$req = $stmt->execute();
		foreach ($req as $key=>$value) {
			$list[$key] = $req->$key;
		}

		return $list;
	}


}
?>