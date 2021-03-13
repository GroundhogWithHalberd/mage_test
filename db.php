<?php
class DataBase
{
    protected $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
		$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function selectAll() {
        return $this->db->query('SELECT * FROM data');
    }
	public function addEmail($unit) {
		try {
			$sql = $this->db->prepare("INSERT INTO data(`email`) VALUES (:email)");
			$sql->execute(array(':email' => $unit->getEmail()));
		}
		catch(PDOException $e) {
			echo '<script language="javascript">';
			echo 'alert("Error: Email already registered")';
			echo '</script>';
			echo "<meta http-equiv='refresh' content='0'>";
		}
    }
	
	public function delEmail($value) {
		$sql = $this->db->prepare("DELETE FROM data WHERE email IN ".$value);
		$sql->execute();
		echo "<meta http-equiv='refresh' content='0'>";
    }
	public function expEmail($value) {
		$sql = $this->db->query("SELECT * FROM data WHERE email IN ".$value);
		$fp = fopen('file.csv', 'w');

		foreach ($sql as $fields) {
			fputcsv($fp, $fields);
		}

		fclose($fp);
    }
}