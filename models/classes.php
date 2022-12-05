<?php

class Classes
{
    private $classId;
    private $trainerId;
    private $courseId;
    private $startDate;
    private $endDate;
    private $classNo;


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
     * get all Classes
     * @return  an array of Classes 
     */
    public function getAllClasses()
    {
        $this->cerateConnection();

        $classesList = array();
        $sql = "SELECT * FROM class_vw";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $classesList[] = $row;
            }
        }
        $this->conn->close();
        return $classesList;
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
     * insert new row in Classes tables
     * @return  an array of Classes 
     */

    public function addClasses(
        $traineId,
        $courseId,
        $starDate,
        $enDate,
        $classNo = 1
    ) {
        $this->cerateConnection();
        $sql = "INSERT  INTO classes(trainer_id,course_id,start_date,end_date,class_no) " . "
        VALUES ('$traineId','$courseId', '$starDate','$enDate','$classNo')";

        if ($this->conn->query($sql) === TRUE) {
            $this->conn->close();
            return true;
        } else {
            $this->conn->close();
            return false;
        }
    }
    /**
     * Delete row from Classes table
     * @return  an array of Classes 
     */

    public function deleteClass($id = 0)
    {
        $this->cerateConnection();
        $sql = "DELETE  FROM classes WHERE class_id = $id;";

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
     * get one Course from  Classes table
     * @return  an array of Classes 
     */
    public function getClass($id = 0)
    {
        $this->cerateConnection();

        $classRow = array();
        $sql = "SELECT * FROM class_vw where class_id = $id";
        $result = $this->conn->query($sql);
        $classRow = $result->fetch_assoc();
        $this->conn->close();
        return $classRow;
    }


    /**
     * update exists row in Classes table
     * @return  an array of Classes 
     */

    public function updateClasses($traineId, $courseId, $starDate = null, $enDate = null, $id = 0)
    {
        $this->cerateConnection();
        $sql = "UPDATE classes SET traine_id ='$traineId',
        course_id = '$courseId',
        star_date = '$starDate ',
        end_date = '$$enDate '


        
         WHERE class_id =$id";

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
     * Get the value of courseId
     */
    public function getCourseId()
    {
        return $this->courseId;
    }

    /**
     * Set the value of courseId
     *
     * @return  self
     */
    public function setCourseId($courseId)
    {
        $this->courseId = $courseId;

        return $this;
    }

    /**
     * Get the value of startDate
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * Set the value of startDate
     *
     * @return  self
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * Get the value of endDate
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * Set the value of endDate
     *
     * @return  self
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * Get the value of classNo
     */
    public function getClassNo()
    {
        return $this->classNo;
    }

    /**
     * Set the value of classNo
     *
     * @return  self
     */
    public function setClassNo($classNo)
    {
        $this->classNo = $classNo;

        return $this;
    }
};
