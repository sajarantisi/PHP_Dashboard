<?php

class Registration
{
    private $classId;
    private $studentId;
    private $regDate;



    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "training";
    private $conn;

    function __constructor()
    {
    }

    private function cerateConnection()
    {
        // Create connection with DB
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        // Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    /**
     * get all Registration
     * @return  an array of Registration 
     */
    public function getAllRegistration()
    {
        $this->cerateConnection();

        $registrationList = array();
        $sql = "SELECT * FROM reg_vw";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $registrationList[] = $row;
            }
        }
        $this->conn->close();
        return $registrationList;
    }

    /**
     * insert new row in Registration tables
     * @return  an array of Registration 
     */

    public function addRegistration(
        $classId,
        $studentId,
        $regDate = null,

    ) {
        $this->cerateConnection();
        $sql = "INSERT  INTO registration(class_id,student_id,reg_date) " . "
        VALUES ('$classId','$studentId', '$regDate')";

        if ($this->conn->query($sql) === TRUE) {
            $this->conn->close();
            return true;
        } else {
            $this->conn->close();
            return false;
        }
    }



    /**
     * get one Course from  Registration table
     * @return  an array of Registration 
     */
    public function getRegistration($id = 0)
    {
        $this->cerateConnection();

        $registrationRow = array();
        $sql = "SELECT * FROM reg_vw where reg_id = $id";
        $result = $this->conn->query($sql);
        $registrationRow = $result->fetch_assoc();
        $this->conn->close();
        return $registrationRow;
    }


    /**
     * update exists row in Registration table
     * @return  an array of Registration 
     */

    public function updateRegistration($classId, $studentId, $regDate = null, $id = 0)
    {
        $this->cerateConnection();
        $sql = "UPDATE registration
         SET class_id ='$classId',
            student_id = '$studentId',
            reg_date = '$regDate '
        
        WHERE reg_id =$id";

        if ($this->conn->query($sql) === TRUE) {
            $this->conn->close();
            return true;
        } else {
            $this->conn->close();
            return false;
        }
        $this->conn->close();
    }
    /**
     * Delete row from Registration table
     * @return  an array of Registration 
     */

    public function deleteRegistration($id = 0)
    {
        $this->cerateConnection();
        $sql = "DELETE  FROM registration WHERE reg_id = $id;";

        if ($this->conn->query($sql) === TRUE) {
            $this->conn->close();
            return true;
        } else {
            $this->conn->close();
            return false;
        }
        $this->conn->close();
    }
};
