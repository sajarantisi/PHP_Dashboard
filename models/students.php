<?php

class Students
{
    private $studentId;
    private $studentFirstName;
    private $studentSecondName;
    private $studentLastName;
    private $studentGender;
    private $studentDob;
    private $studentMobile;

    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "training";
    private $conn;

    function __construct()
    {
    }

    private function createConnection()
    {
        // Create connection
        $this->conn = new mysqli(
            $this->servername,
            $this->username,
            $this->password,
            $this->dbname
        );
        // Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    /**
     * get all Students
     *
     * @return  an array of students
     */
    public function getAllStudents()
    {
        $this->createConnection();
        $studentList = array();
        $sql = "SELECT * FROM students";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $studentList[] = $row;
            }
        }
        $this->conn->close();
        return $studentList;
    }

    /**
     * get one Student
     *
     * @return  student row
     */
    public function getStudent($id = 0)
    {
        $this->createConnection();
        $sql = "SELECT * FROM students where student_id = $id";
        $result = $this->conn->query($sql);

        /*if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $studentList[] = $row;
            }
        }*/
        $studentRow = $result->fetch_assoc();
        $this->conn->close();
        return $studentRow;
    }

    /**
     * insert new row in Students table
     *
     * @return  self
     */
    public function addStudent(
        $fname = "",
        $sname = "",
        $lname = "",
        $gender = "",
        $dob = "",
        $mobile = ""
    ) {
        $this->createConnection();
        $sql = "INSERT INTO students(student_fname, student_sname, student_lname, student_gender, student_dob, student_mobile) 
                VALUES ('$fname', '$sname','$lname','$gender','$dob','$mobile')";
        if ($this->conn->query($sql) === TRUE) {
            $this->conn->close();
            return true;
        } else {
            echo "Error: " . $sql . "<br>" . $this->conn->error;
            $this->conn->close();
            return false;
        }
    }

    /**
     * update exists row in Students table
     *
     * @return  self
     */
    public function updateStudent(
        $fname = "",
        $sname = "",
        $lname = "",
        $gender = "",
        $dob = "",
        $mobile = "",
        $id = 0
    ) {
        $this->createConnection();
        $sql = "UPDATE students
                    SET student_fname = '$fname',
                    student_sname = '$sname',
                    student_lname = '$lname',
                    student_gender = '$gender',
                    student_dob = '$dob',
                    student_mobile = '$mobile'
                WHERE student_id = $id";
        if ($this->conn->query($sql) === TRUE) {
            $this->conn->close();
            return true;
        } else {
            echo "Error: " . $sql . "<br>" . $this->conn->error;
            $this->conn->close();
            return false;
        }
    }


    /**
     * delete row from Students table
     *
     * @return  self
     */
    public function deleteStudent($id = 0)
    {
        $this->createConnection();
        $sql = "DELETE FROM students WHERE student_id = $id";
        if ($this->conn->query($sql) === TRUE) {
            $this->conn->close();
            return true;
        } else {
            $this->conn->close();
            return false;
        }
    }

    /**
     * truncate Students table
     *
     * @return  self
     */
    public function truncate()
    {
        $this->createConnection();
        $sql = "TRUNCATE students";
        if ($this->conn->query($sql) === TRUE) {
            echo "truncated successfully" . '<br>';
        } else {
            echo "Error: " . $sql . "<br>" . $this->conn->error;
        }
        $this->conn->close();
    }

    /**
     * Get the value of studentId
     */
    public function getStudentId()
    {
        return $this->studentId;
    }

    /**
     * Set the value of studentId
     *
     * @return  self
     */
    public function setStudentId($studentId)
    {
        $this->studentId = $studentId;

        return $this;
    }

    /**
     * Get the value of studentFirstName
     */
    public function getStudentFirstName()
    {
        return $this->studentFirstName;
    }

    /**
     * Set the value of studentFirstName
     *
     * @return  self
     */
    public function setStudentFirstName($studentFirstName)
    {
        $this->studentFirstName = $studentFirstName;

        return $this;
    }

    /**
     * Get the value of studentSecondName
     */
    public function getStudentSecondName()
    {
        return $this->studentSecondName;
    }

    /**
     * Set the value of studentSecondName
     *
     * @return  self
     */
    public function setStudentSecondName($studentSecondName)
    {
        $this->studentSecondName = $studentSecondName;

        return $this;
    }

    /**
     * Get the value of studentLastName
     */
    public function getStudentLastName()
    {
        return $this->studentLastName;
    }

    /**
     * Set the value of studentLastName
     *
     * @return  self
     */
    public function setStudentLastName($studentLastName)
    {
        $this->studentLastName = $studentLastName;

        return $this;
    }

    /**
     * Get the value of studentGender
     */
    public function getStudentGender()
    {
        return $this->studentGender;
    }

    /**
     * Set the value of studentGender
     *
     * @return  self
     */
    public function setStudentGender($studentGender)
    {
        $this->studentGender = $studentGender;

        return $this;
    }

    /**
     * Get the value of studentDob
     */
    public function getStudentDob()
    {
        return $this->studentDob;
    }

    /**
     * Set the value of studentDob
     *
     * @return  self
     */
    public function setStudentDob($studentDob)
    {
        $this->studentDob = $studentDob;

        return $this;
    }

    /**
     * Get the value of studentMobile
     */
    public function getStudentMobile()
    {
        return $this->studentMobile;
    }

    /**
     * Set the value of studentMobile
     *
     * @return  self
     */
    public function setStudentMobile($studentMobile)
    {
        $this->studentMobile = $studentMobile;

        return $this;
    }
}
