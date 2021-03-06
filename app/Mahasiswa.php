<?php 

/**
 * Gosoftware Media Indonesia 2020
 * --
 * --
 * http://gosoftware.web.id
 * http://phpbego.wordpress.com
 * e-mail : cs@gosoftware.web.id
 * WA : 6285263616901
 * --
 * --
 */

namespace App;
use Carbon\Carbon;

class Mahasiswa extends Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function tampil()
	{

		$stmt = $this->db->prepare("SELECT * FROM tb_mhsw");
		$stmt->execute();

		$data = array();
		while ($rows = $stmt->fetch()) {
			$data[] = $rows;
		}

		return $data;

	}

	public function input()
	{

		$mhsw_nim = $_POST['mhsw_nim'];
		$mhsw_nama = $_POST['mhsw_nama'];
		$mhsw_alamat = $_POST['mhsw_alamat'];

		$sql = "INSERT INTO tb_mhsw (mhsw_nim, mhsw_nama, mhsw_alamat) 
				VALUES (:mhsw_nim, :mhsw_nama, :mhsw_alamat)";						
		$stmt = $this->db->prepare($sql);
		$stmt->bindParam(":mhsw_nim", $mhsw_nim);
		$stmt->bindParam(":mhsw_nama", $mhsw_nama);
		$stmt->bindParam(":mhsw_alamat", $mhsw_alamat);
		$stmt->execute();

		return false;
	}

	public function edit($id)
	{

		$stmt = $this->db->prepare("SELECT * FROM tb_mhsw WHERE mhsw_id=:mhsw_id");
		$stmt->bindParam(":mhsw_id", $id);
		$stmt->execute();

		$row = $stmt->fetch(); 

		return $row;

	}

	public function update()
	{
		$mhsw_id = $_POST['mhsw_id'];
		$mhsw_nim = $_POST['mhsw_nim'];
		$mhsw_nama = $_POST['mhsw_nama'];
		$mhsw_alamat = $_POST['mhsw_alamat'];
		$updated_at = Carbon::now();

		$sql = "UPDATE tb_mhsw SET mhsw_nim=:mhsw_nim, 
				mhsw_nama=:mhsw_nama,
				mhsw_alamat=:mhsw_alamat,
				updated_at=:updated_at
				WHERE mhsw_id=:mhsw_id";
		$stmt = $this->db->prepare($sql);		
		$stmt->bindParam(":mhsw_nim", $mhsw_nim);
		$stmt->bindParam(":mhsw_nama", $mhsw_nama);
		$stmt->bindParam(":mhsw_alamat", $mhsw_alamat);
		$stmt->bindParam(":updated_at", $updated_at);
		$stmt->bindParam(":mhsw_id", $mhsw_id);
		$stmt->execute();

		return false;
	}

	public function detail($id)
	{

		$stmt = $this->db->prepare("SELECT * FROM tb_mhsw WHERE mhsw_id=:mhsw_id");
		$stmt->bindParam(":mhsw_id", $id);
		$stmt->execute();

		$row = $stmt->fetch(); 

		return $row;
	}

	public function delete()
	{

		$id = $_POST['mhsw_id'];

		$stmt = $this->db->prepare("DELETE FROM tb_mhsw WHERE mhsw_id=:mhsw_id");
		$stmt->bindParam(":mhsw_id", $id);
		$stmt->execute();

		return false;
	}
}