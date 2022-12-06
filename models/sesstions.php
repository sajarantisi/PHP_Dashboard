<?php

class Sesstions
{
    private $sesstionId;
    private $classId;
    private $startTime;
    private $endTime;
    private $sesstionDate;


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
        };
    }


    /**
     * get all Sesstions
     * @return  an array of Sesstions 
     */
    public function getAllSesstions()
    {
        $this->cerateConnection();

        $sesstionsList = array();
        $sql = "SELECT * FROM sesstions_vw";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $sesstionsList[] = $row;
            }
        }
        $this->conn->close();
        return $sesstionsList;
    }

    /**
     * get Class Courese classes
     * @return  an array of Classes  coures
     */
    public function getcouresClasses()
    {
        $this->cerateConnection();

        $couresClassesList = array();
        $sql = "SELECT class_id,class_no,course_name FROM classes 
        JOIN courses  ON classes.course_id = courses.course_id";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $couresClassesList[] = $row;
            }
        }
        $this->conn->close();
        return $couresClassesList;
    }
    /**
     * insert new row in Sesstions tables
     * @return  an array of Sesstions 
     */

    public function addSesstions(
        $classId,
        $startTime = null,
        $endTime = null,
        $sesstionDate = null
    ) {
        $this->cerateConnection();
        $sql = "INSERT  INTO sesstions(class_id,start_time,end_time,sesstion_date) " . "
        VALUES ('$classId', '$startTime','$endTime','$sesstionDate')";

        if ($this->conn->query($sql) === TRUE) {
            $this->conn->close();
            return true;
        } else {
            $this->conn->close();
            return false;
        }
    }
    /**
     * Delete row from Sesstions table
     * @return  an array of Sesstions 
     */

    public function deleteSesstions($id = 0)
    {
        $this->cerateConnection();
        $sql = "DELETE  FROM sesstions WHERE sesstion_id = $id;";

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
     * get one Course from  Sesstions table
     * @return  an array of Sesstions 
     */
    public function getSesstion($id = 0)
    {
        $this->cerateConnection();

        $sesstionRow = array();
        $sql = "SELECT * FROM sesstions_vw where sesstion_id = $id";
        $result = $this->conn->query($sql);
        $sesstionRow = $result->fetch_assoc();
        $this->conn->close();
        return $sesstionRow;
    }


    /**
     * update exists row in Sesstions table
     * @return  an array of Sesstions 
     */

    public function updateSesstions(
        $classId,
        $startTime = null,
        $endTime  = null,
        $sesstionDate = null,
        $id = 0
    ) {
        $this->cerateConnection();
        $sql = "UPDATE sesstions SET class_id ='$classId',
        star_time = '$startTime ',
        end_time = '$endTime '
        sesstion_date = '$sesstionDate '

         WHERE sesstion_id =$id";

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
     * Get the value of sesstionId
     */
    public function getSesstionId()
    {
        return $this->sesstionId;
    }

    /**
     * Set the value of sesstionId
     *
     * @return  self
     */
    public function setSesstionId($sesstionId)
    {
        $this->sesstionId = $sesstionId;

        return $this;
    }

    /**
     * Get the value of classId
     */
    public function getClassId()
    {
        return $this->classId;
    }

    /**
     * Set the value of classId
     *
     * @return  self
     */
    public function setClassId($classId)
    {
        $this->classId = $classId;

        return $this;
    }

    /**
     * Get the value of startTime
     */
    public function getStartTime()
    {
        return $this->startTime;
    }

    /**
     * Set the value of startTime
     *
     * @return  self
     */
    public function setStartTime($startTime)
    {
        $this->startTime = $startTime;

        return $this;
    }

    /**
     * Get the value of endTime
     */
    public function getEndTime()
    {
        return $this->endTime;
    }

    /**
     * Set the value of endTime
     *
     * @return  self
     */
    public function setEndTime($endTime)
    {
        $this->endTime = $endTime;

        return $this;
    }

    /**
     * Get the value of sesstionDate
     */
    public function getSesstionDate()
    {
        return $this->sesstionDate;
    }

    /**
     * Set the value of sesstionDate
     *
     * @return  self
     */
    public function setSesstionDate($sesstionDate)
    {
        $this->sesstionDate = $sesstionDate;

        return $this;
    }
}
