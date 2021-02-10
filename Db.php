<?php

class Db{
	private $host = "localhost";
	private $user = "root";
	private $password = "";
	private $database = "alif-task";
	private $conn;
	public $resultset=[];
	public $product_list=[];

	function __construct(){
		$this->conn=$this->connectDb();
	}
	function connectDb(){
		$conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
		return $conn;
	}

	function numRows($query) {
		$result  = mysqli_query($this->conn,$query);
		$rowcount = mysqli_num_rows($result);
		return $rowcount;	
	}
	
	function register($query){
		$result=mysqli_query($this->conn,$query);
        if ($result){
            return true;
        }else{
            return false;
        }
	}
	function login($query){
		$result=mysqli_query($this->conn,$query);
		if ($this->numRows($query)<1) {
			return false;
		}else{
			if ($row=mysqli_fetch_assoc($result)){
                $this->resultset = $row;
            }
            return $this->resultset;
		}
	}

	function display($query) {
		$result = mysqli_query($this->conn,$query);
		if ($this->numRows($query)<1) {
			return false;
		}else{
			// if ($row=mysqli_fetch_assoc($result)){
   //              $this->product_list = $row;
   //          }
            while($row=mysqli_fetch_assoc($result)) {
				$good = [
					"id"=>$row['id'],
					'product_name'=>$row['product_name'],
					'price'=>$row['price']
				];
				array_push($this->product_list, $good);
			}
            
           	return $this->product_list;
		}
	}

}