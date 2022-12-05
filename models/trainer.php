<?php

class Trainer
{
    private $trainerId;
    private $trainerName;
    private $trainerMobile;
    private $trainerEmail;

    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "training";
    private $conn;

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
     * Get the value of trainerId
     */
    public function getTrainerId()
    {
        return $this->trainerId;
    }

    /**
     * Set the value of trainerId
     *
     * @return  self
     */
    public function setTrainerId($trainerId)
    {
        $this->trainerId = $trainerId;

        return $this;
    }

    /**
     * Get the value of trainerName
     */
    public function getTrainerName()
    {
        return $this->trainerName;
    }

    /**
     * Set the value of trainerName
     *
     * @return  self
     */
    public function setTrainerName($trainerName)
    {
        $this->trainerName = $trainerName;

        return $this;
    }

    /**
     * Get the value of trainerMobile
     */
    public function getTrainerMobile()
    {
        return $this->trainerMobile;
    }

    /**
     * Set the value of trainerMobile
     *
     * @return  self
     */
    public function setTrainerMobile($trainerMobile)
    {
        $this->trainerMobile = $trainerMobile;

        return $this;
    }

    /**
     * Get the value of trainerEmail
     */
    public function getTrainerEmail()
    {
        return $this->trainerEmail;
    }

    /**
     * Set the value of trainerEmail
     *
     * @return  self
     */
    public function setTrainerEmail($trainerEmail)
    {
        $this->trainerEmail = $trainerEmail;

        return $this;
    }



    /**
     * get all Trainer
     * @return  an array of Trainer 
     */

    public function getAllTrainer()
    {
        $this->cerateConnection();

        $trainerList = array();
        $sql = "SELECT * FROM  trainers";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $trainerList[] = $row;
            }
        }
        $this->conn->close();
        return $trainerList;
    }

    /**
     * insert new row in Trainer tables
     * @return  an array of Trainer 
     */

    public function addTrainer($name = "", $mobile = '', $email = '')
    {
        $this->cerateConnection();
        $sql = "INSERT  INTO trainers(trainer_name, trainer_mobile, trainer_email)
            VALUES ('$name', '$mobile','$email');";

        if ($this->conn->query($sql) === TRUE) {
            $this->conn->close();
            return true;
        } else {
            $this->conn->close();
            return false;
        }
    }

    /**
     * update exists row in Trainer table
     * @return  an array of Trainer 
     */

    public function updateTrainer($name = "",  $mobile = '', $email = '', $id = 0)
    {
        $this->cerateConnection();
        $sql = "UPDATE trainers SET trainer_name='$name',trainer_mobile='$mobile',trainer_email='$email'  WHERE trainer_id=$id";

        if ($this->conn->query($sql) === TRUE) {
            $this->conn->close();
            return true;
        } else {
            $this->conn->close();
            return false;
        }
    }



    /**
     * Delete row from Trainer table
     * @return  an array of Trainer 
     */

    public function deleteTrainer($id = 0)
    {
        $this->cerateConnection();
        $sql = "DELETE 
        FROM trainers
        WHERE trainer_id = $id";

        if ($this->conn->query($sql) === TRUE) {
            $this->conn->close();
            return true;
        } else {
            $this->conn->close();
            return false;
        }
    }


    /**
     * get one Course from  Trainer table
     * @return  an array of Trainer 
     */
    public function getTrainer($id = 0)
    {
        $this->cerateConnection();

        $trainerRow = array();
        $sql = "SELECT  * FROM trainers WHERE trainer_id =$id";
        $result = $this->conn->query($sql);
        $trainerRow  = $result->fetch_assoc();
        $this->conn->close();
        return $trainerRow;
    }
}
