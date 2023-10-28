<?php
Class Db_mgmt {
    public $host;
    public $user;
    public $pass;
    public $db;
    public $conn;

    function __construct($host, $user, $pass, $db){
        $this->host = $host;
        $this->user = $user;
        $this->pass = $pass;
        $this->db = $db;

        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->db);
    }

    function get_user_data($user){
        $sql = 'SELECT * FROM users WHERE u_name="'.$user.'"';
        $res = $this->conn->query($sql);
        
        if ($res->num_rows > 0){
            return $data = $res->fetch_assoc();
        } else {
            return 0;
        }
    }

    function get_users(){
        $sql = "SELECT u_name, f_name, l_name, email FROM users";
        $res = $this->conn->query($sql);

        if ($res->num_rows > 0){
            while($row = $res->fetch_assoc()){
                printf("Username: %s, First Name: %s, Last Name: %s, Email: %s <br />", 
                  $row["u_name"], 
                  $row["f_name"], 
                  $row["l_name"],
                  $row["email"]);
            }

        }
        mysqli_free_result($res);
    }
}

?>