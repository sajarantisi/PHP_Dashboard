<?php

class Caurses
{
    private $courseId;
    private $courseName;

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
     * Get the value of courseName
     */
    public function getCourseName()
    {
        return $this->courseName;
    }

    /**
     * Set the value of courseName
     *
     * @return  self
     */
    public function setCourseName($courseName)
    {
        $this->courseName = $courseName;

        return $this;
    }




    /**
     * get all courses
     * @return  an array of cour 
     */

    public function getAllCourses()
    {
        $this->cerateConnection();

        $coursesList = array();
        $sql = "SELECT * FROM courses;";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $coursesList[] = $row;
            }
        }
        $this->conn->close();
        return $coursesList;
    }



    /**
     * insert new row in Courses tables
     * @return  an array of Courses 
     */

    public function addCourses($name = "")
    {
        $this->cerateConnection();
        $sql = "INSERT  INTO courses(course_name) VALUES ('$name');";

        if ($this->conn->query($sql) === TRUE) {
            $this->conn->close();
            return true;
        } else {
            $this->conn->close();
            return false;
        }
    }


    /**
     * update exists row in Courses table
     * @return  an array of Courses 
     */

    public function updateCourses($name = "", $id = 0)
    {
        $this->cerateConnection();
        $sql = "UPDATE courses SET course_name ='$name' WHERE course_id =$id";

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
     * Delete row from Courses table
     * @return  an array of Courses 
     */

    public function deleteCourse($id = 0)
    {
        $this->cerateConnection();
        $sql = "DELETE  FROM courses WHERE course_id = $id;";

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
     * get one Course from  Courses table
     * @return  an array of Course 
     */
    public function getCourse($id = 0)
    {
        $this->cerateConnection();

        $courseRow = array();
        $sql = "SELECT * FROM courses where course_id = $id";
        $result = $this->conn->query($sql);
        $courseRow = $result->fetch_assoc();
        $this->conn->close();
        return $courseRow;
    }


    // /**truncate لانه فيه مفتاح جانبي من جدول تاني ما بقدر اعمله ال 
    //  * truncate Courses table
    //  * @return  an array of Courses
    //  */

    // public function truncate()
    // {
    //     $this->cerateConnection();
    //     $sql = "TRUNCATE courses;";

    //     if ($this->conn->query($sql) === TRUE) {
    //         echo "truncated succefully" . "<br>";
    //     } else {
    //         echo "Error: " . $sql . "<br>" . $this->conn->error;
    //     }
    //     $this->conn->close();
    // }
}
