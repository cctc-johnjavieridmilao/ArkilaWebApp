<?php namespace App\Controllers;

use App\Models\UserModel;

class Home extends BaseController
{
	public function index() {
		if($this->session->has('u_id')) {
			return view('home');
		}
		return view('index');
	}

	public function Register() {
		if($this->session->has('u_id')) {
			return view('home');
		}
		return view('register');
	}

	public function Homepage() {
		if($this->session->has('u_id')) {
			return view('home');
		}
		return view('index');
	}

	public function Setting() {
		if($this->session->has('u_id')) {
			return view('Settings');
		}
		return view('index');
	}

	public function RegisterAccount() {
		$user_model = new UserModel();

		$officaial_receipt = $this->request->getFile('officaial_receipt');
		$car_registration = $this->request->getFile('car_registration');
		$driver_license = $this->request->getFile('driver_license');

		$age = $this->request->getVar('age');
		$address = $this->request->getVar('address');
		$plate_number = $this->request->getVar('plate_number');
		$body_number = $this->request->getVar('body_number');

		$data = [
			'firtname' => $this->request->getVar('firtname'),
			'lastname' => $this->request->getVar('lastname'),
			'email' => $this->request->getVar('email'),
			'user_type' => $this->request->getVar('user_type'),
			'phone_number' => $this->request->getVar('phone_number'),
			'password' => hashPassword($this->request->getVar('password')),
			'created_at' => date('Y-m-d : H:i:s'),
			'plate_number' => $plate_number,
			'body_number' => $body_number,
			'driver_license' => $address,
			'age' => $age
		];

		$res = $user_model->insert($data);

		$inserted_id = $user_model->getInsertID();

		if (!empty($officaial_receipt)) {

			$officaial_receipt_filename = 'OR-'.$officaial_receipt->getRandomName();
 
			$officaial_receipt->move('./public/uploads/', $officaial_receipt_filename);

			$user_model->update($inserted_id, ['or_file' => $officaial_receipt_filename]);
		}

		if (!empty($car_registration)) {

			$car_registration_filename = 'CR-'.$car_registration->getRandomName();
 
			$car_registration->move('./public/uploads/', $car_registration_filename);

			$user_model->update($inserted_id, ['cr_file' => $car_registration_filename]);
		}

		if (!empty($driver_license)) {

			$driver_license_filename = 'DL-'.$driver_license->getRandomName();
 
			$driver_license->move('./public/uploads/', $driver_license_filename);

			$user_model->update($inserted_id, ['driver_license' => $driver_license_filename]);
		}

		if($res) {
			return $this->response->setJSON(['msg' => 'success']);
		}

		return $this->response->setJSON(['msg' => $res]);
		
	}

	public function UpdateUserData() {
		$user_model = new UserModel();
		$id = $this->request->getVar('RecID');

		$data = [
			'firtname' => $this->request->getVar('fname'),
			'lastname' => $this->request->getVar('lname'),
			'email' => $this->request->getVar('email'),
			'phone_number' => $this->request->getVar('phone_number'),
			'lat' => $this->request->getVar('latitude'),
			'lang' => $this->request->getVar('longtitude'),
		];

		$res = $user_model->update($id,$data);

		if($res) {
			return $this->response->setJSON(['msg' => 'success']);
		}

		return $this->response->setJSON(['msg' => $res]);
	}

	public function Login() {
		$email_phone_num = $this->request->getVar('email_phone_num');
		$password = hashPassword($this->request->getVar('password'));
		$str = 'SELECT * FROM user_access WHERE (email = :email: OR phone_number = :phonenumber:) AND password = :password:';

		$query = $this->db->query($str, [
			'email' => $email_phone_num,
			'phonenumber' => $email_phone_num,
			'password' => $password
		]);

		if(!$query) {
			return $this->response->setJSON(['msg' => $this->db->error()]);
		}

		if($query->getNumRows() == 0) {
			return $this->response->setJSON(['msg' => 'Incorrect Username or Password!']);
		} 

		$row = $query->getRow();

		if($row->IsActivated == 0) {
			return $this->response->setJSON(['msg' => 'Account not yet activated, please contact administrator!']);
		}

		$this->session->set('u_id', $row->RecID);
		$this->session->set('user_type', $row->user_type);
		$this->session->set('fname', strtoupper($row->firtname));
		$this->session->set('lastname', strtoupper($row->lastname));

		$this->db->table('user_access')->where(['RecID' => $row->RecID])->update([
			'lat' => $this->request->getVar('lat'),
			'lang' => $this->request->getVar('lang')
		]);

		return $this->response->setJSON(['msg' => 'success','fname' => $row->firtname]);
	}

	public function GetUsers() {
		$user_model = new UserModel();
		
		return $this->response->setJSON($user_model->findAll());
	}

	public function GetUserData() {
		$user_model = new UserModel();
	
		if(empty($this->request->getVar('id'))) {
			$user = $this->session->get('u_id');
		} else {
			$user = $this->request->getVar('id');
		}
		
		return $this->response->setJSON($user_model->find($user));
	}

	public function DeleteUser() {
		$user_model = new UserModel();

		$res = $user_model->delete($this->request->getVar('id'));

		if(!$res) {
			return $this->response->setJSON(['msg' => $res]);
		}
		return $this->response->setJSON(['msg' => 'success']);
	}

	public function GetDrivers() {

		$str = "SELECT X.*,(
			CASE WHEN 
			(SELECT COUNT(*) FROM arkila_request WHERE drivers_id = X.RecID AND status = 3) > 0 
			THEN 'NOT-AVAILABLE' ELSE 'AVAILABLE' END
		) Status from user_access X 
		WHERE X.user_type = 'Driver' AND X.IsActivated = 1";
		
		$query = $this->db->query($str);

		if(!$query) {
			return $this->response->setJSON(['msg' => $this->db->error()]);
		}

		return $this->response->setJSON($query->getResultArray());
	}

	public function GetPasaheroRequest() {
		$user = $this->session->get('u_id');

		$str = "SELECT X.RecID,X.transaction_number,CONCAT(U.firtname, ' ', U.lastname) pasahero,
				CONCAT(UU.firtname, ' ', UU.lastname) driver,X.date,A.Status
				FROM arkila_request X
				LEFT JOIN user_access U ON U.RecID = X.requested_by
				LEFT JOIN user_access UU ON UU.RecID = X.drivers_id
				LEFT JOIN arkila_status A ON A.RecID = X.status
				WHERE X.requested_by = :user:";
		
		$query = $this->db->query($str, ['user' => $user]);

		if(!$query) {
			return $this->response->setJSON(['msg' => $this->db->error()]);
		}

		return $this->response->setJSON($query->getResultArray());

	}

	public function GetPendingCanceledArkila() {
		$user = $this->session->get('u_id');

		$str = "SELECT X.RecID,X.transaction_number,CONCAT(U.firtname, ' ', U.lastname) pasahero,
				CONCAT(UU.firtname, ' ', UU.lastname) driver,X.date,A.Status
				FROM arkila_request X
				LEFT JOIN user_access U ON U.RecID = X.requested_by
				LEFT JOIN user_access UU ON UU.RecID = X.drivers_id
				LEFT JOIN arkila_status A ON A.RecID = X.status
           WHERE X.drivers_id = :user: AND X.status IN(1,2);";
		
		$query = $this->db->query($str, ['user' => $user]);

		if(!$query) {
			return $this->response->setJSON(['msg' => $this->db->error()]);
		}

		return $this->response->setJSON($query->getResultArray());

	}

	public function GetApprovedArkila() {
		$user = $this->session->get('u_id');

		$str = "SELECT X.RecID,X.transaction_number,CONCAT(U.firtname, ' ', U.lastname) pasahero,
				CONCAT(UU.firtname, ' ', UU.lastname) driver,X.date,A.Status,U.lat,U.lang
				FROM arkila_request X
				LEFT JOIN user_access U ON U.RecID = X.requested_by
				LEFT JOIN user_access UU ON UU.RecID = X.drivers_id
				LEFT JOIN arkila_status A ON A.RecID = X.status
           WHERE X.drivers_id = :user: AND X.status = 3;";
		
		$query = $this->db->query($str, ['user' => $user]);

		if(!$query) {
			return $this->response->setJSON(['msg' => $this->db->error()]);
		}

		return $this->response->setJSON($query->getResultArray());

	}

	public function GetDoneArkila() {
		$user = $this->session->get('u_id');

		$str = "SELECT X.RecID,X.transaction_number,CONCAT(U.firtname, ' ', U.lastname) pasahero,
				CONCAT(UU.firtname, ' ', UU.lastname) driver,X.date,A.Status
				FROM arkila_request X
				LEFT JOIN user_access U ON U.RecID = X.requested_by
				LEFT JOIN user_access UU ON UU.RecID = X.drivers_id
				LEFT JOIN arkila_status A ON A.RecID = X.status
           WHERE X.drivers_id = :user: AND X.status = 4;";
		
		$query = $this->db->query($str, ['user' => $user]);

		if(!$query) {
			return $this->response->setJSON(['msg' => $this->db->error()]);
		}

		return $this->response->setJSON($query->getResultArray());

	}

	public function CountUsersLevel() {
		$str = "SELECT * FROM (
			(SELECT COUNT(*) AS Drivers FROM user_access WHERE user_type = 'Driver' AND IsActivated = 1) AS D,
			(SELECT COUNT(*) AS Pasahero FROM user_access WHERE user_type = 'User' AND IsActivated = 1) AS P,
			(SELECT COUNT(*) AS TotalUsers FROM user_access WHERE IsActivated = 1 AND user_type IN('Driver','User')) AS T)";

		$query = $this->db->query($str);

		if(!$query) {
			return $this->response->setJSON(['msg' => $this->db->error()]);
		}

		return $this->response->setJSON([
			'Drivers' => $query->getRow()->Drivers,
			'Pasahero' => $query->getRow()->Pasahero,
			'Total' => $query->getRow()->TotalUsers
		]);
	}

	public function CountArkila() {
		$user = $this->session->get('u_id');

		$str = "SELECT * FROM (SELECT COUNT(1) Pending FROM arkila_request WHERE drivers_id = $user AND status = 1) AS Pending,
		(SELECT COUNT(1) Canceled FROM arkila_request WHERE drivers_id = $user AND status = 2) AS Canceled,
		(SELECT COUNT(1) Approved FROM arkila_request WHERE drivers_id = $user AND status = 3) AS Approved,
		(SELECT COUNT(1) Done FROM arkila_request WHERE drivers_id = $user AND status = 4) AS Done";

			$query = $this->db->query($str);

			if(!$query) {
				return $this->response->setJSON(['msg' => $this->db->error()]);
			}

			return $this->response->setJSON([
				'Pending' => $query->getRow()->Pending,
				'Approved' => $query->getRow()->Approved,
				'Done' => $query->getRow()->Done,
				'Canceled' => $query->getRow()->Canceled
			]);
	}

	public function ActivateAccount() {
		$user_model = new UserModel();

		$res = $user_model->update($this->request->getVar('id'), ['IsActivated' => 1]);

		if($res) {
			return $this->response->setJSON(['msg' => 'success']);
		}
		return $this->response->setJSON(['msg' => $res]);
	}

	public function DeActivateAccount() {
		$user_model = new UserModel();

		$res = $user_model->update($this->request->getVar('id'), ['IsActivated' => 0]);

		if($res) {
			return $this->response->setJSON(['msg' => 'success']);
		}
		return $this->response->setJSON(['msg' => $res]);
	}

	public function ArkilaRequest() {
		$user = $this->session->get('u_id');
		$driver = $this->request->getVar('driver');
		$date = date('Y-m-d H:i:s');

		$check_pending_transaction = $this->db->query('SELECT COUNT(1) count FROM arkila_request WHERE drivers_id = :driver: AND status = 1',[
			'driver' => $driver
		]);

		if($check_pending_transaction->getRow()->count > 0) {
			return $this->response->setJSON(['msg' => 'Ops, you have pending request on this driver!']);
		}

		$res = $this->db->table('arkila_request')->insert([
			'requested_by' => $user,
			'drivers_id' => $driver,
			'status' => 1,
			'date' => $date,
		]);

		if(!$res) {
			return $this->response->setJSON(['msg' => $this->db->error()]);
		}

		$inserted_id = $this->db->insertID();

		$up = $this->db->table('arkila_request')->where(['RecID' => $inserted_id])->update([
			'transaction_number' => $inserted_id
		]);

		if(!$up) {
			return $this->response->setJSON(['msg' => $this->db->error()]);
		}

		return $this->response->setJSON(['msg' => 'success']);
	}

	public function CancelArkila() {
		$id = $this->request->getVar('id');

		$up = $this->db->table('arkila_request')->where(['RecID' => $id])->update([
			'status' => 2
		]);

		if(!$up) {
			return $this->response->setJSON(['msg' => $this->db->error()]);
		}

		return $this->response->setJSON(['msg' => 'success']);
	}

	public function ApprovedArkila() {
		$id = $this->request->getVar('id');

		$up = $this->db->table('arkila_request')->where(['RecID' => $id])->update([
			'status' => 3
		]);

		if(!$up) {
			return $this->response->setJSON(['msg' => $this->db->error()]);
		}

		return $this->response->setJSON(['msg' => 'success']);
	}

	public function DoneArkila() {
		$id = $this->request->getVar('id');

		$up = $this->db->table('arkila_request')->where(['RecID' => $id])->update([
			'status' => 4
		]);

		if(!$up) {
			return $this->response->setJSON(['msg' => $this->db->error()]);
		}

		return $this->response->setJSON(['msg' => 'success']);
	}

	public function Logout() {
		$this->session->remove('u_id');
		$this->session->remove('user_type');
		$this->session->remove('fname');
		$this->session->remove('lastname');
		$this->session->destroy();

		return view('index');
	}

}
