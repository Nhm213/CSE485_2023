<?php
    class StudentDAO {
        private $students;

        public function __construct() {
            // Khởi tạo mảng để lưu trữ danh sách sinh viên
            $this->students = array();
        }

        // Thêm sinh viên vào danh sách
        public function addStudent($student) {
            array_push($this->students, $student);
        }

        // Lấy danh sách sinh viên
        public function getStudents() {
            return $this->students;
        }

        // Sửa thông tin sinh viên
        public function updateStudent($id, $name, $age) {
            foreach ($this->students as &$student) {
                if ($student->getId() == $id) {
                    $student->setName($name);
                    $student->setAge($age);
                    break;
                }
            }
        }

        // Xóa sinh viên khỏi danh sách
        public function deleteStudent($id) {
            foreach ($this->students as $key => $student) {
                if ($student->getId() == $id) {
                    unset($this->students[$key]);
                    break;
                }
            }
        }

        // Lấy thông tin sinh viên theo ID
        public function getStudentById($id) {
            foreach ($this->students as $student) {
                if ($student->getId() == $id) {
                    return $student;
                }
            }
            return null;
        }
    }

?>