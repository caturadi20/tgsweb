<?php

class Mhsw {

	private $db;

	public function __construct()
	{

		try {
			$this->db = new PDO("mysql:host=localhost;dbname=dbakademik3", "root", "");
		} catch (PDOException $e) {
			die ("Error" . $e->getMessage());
		}
	}

	public function tampil()
	{
		$sql = "SELECT * FROM tb_mhsw";
		$stmt = $this->db->prepare($sql);
		$stmt -> execute();

		$data = [];
		while ($rows = $stmt->fetch()) {
			$data[] = $rows;
		}
		return $data;
	}

	 public function simpan()
    {
        $sql = "insert into tb_mhsw values ('','".$_GET['mhsw_nim']."','".$_GET['mhsw_nama']."','".$_GET['mhsw_alamat']."')";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        echo "DATA BERHASIL DISIMPAN !";
    } 

     public function hapus()
    {
        $sql = "delete from tb_mhsw where mhsw_id='".$_GET['mhsw_id']."'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        echo "DATA BERHASIL DIHAPUS !";
    }

     public function tampil_update()
    {
        $sql = "SELECT * FROM tb_mhsw where mhsw_id='".$_GET['mhsw_id']."'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $data = [];
        while ($rows = $stmt->fetch()) {
            $data[] = $rows;
            }
        return $data;
    }
    public function update($id, $nim,$nama,$alamat)
    {
        $sql = "UPDATE tb_mhsw set mhsw_nim='".$nim."', mhsw_nama='".$nama."', mhsw_alamat='".$alamat."' where mhsw_id='".$id."'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        echo "DATA BERHASIL DIUPDATE !";
    }   
}
