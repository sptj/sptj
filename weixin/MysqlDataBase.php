<?php
class MysqlManager 
{
	private $mysql;
	function __construct()
	{
		//Open a new connection to the MySQL server
		$this->mysql = new SaeMysql();
	}
	function UpdateSwitchState($state)
	{
		$dati = date("h:i:sa");
		$this->mysql->runSql("UPDATE switch SET timestamp='$dati',state = '$state' WHERE ID = '1'");
	}
	function SelectSwitchState($SwitchID)
	{
		$sql = "select * from switch where ID='$SwitchID'";
		$data = $this->mysql->getData( $sql );
		$state = intval( $data[0]['state'] );		//
		return $state;
	}
	function CloseConnect()
	{
		$this->mysql->closeDb();
	}
	
}

?>