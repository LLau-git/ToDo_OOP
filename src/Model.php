<?php
    class Model {
        private $db;
        public function __construct($config) {
            $this->db = $this->getDBConn($config);
        }
        private function getDBConn($cfg) {
            $conn = mysqli_connect($cfg::SERVER, $cfg::USER, $cfg::PW, $cfg::DB);

            if (!$conn) {
                echo "Error: Unable to connect to MySQL." . PHP_EOL;
                echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
                echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
                exit;
            }
            echo "Connection successful!";
            return $conn;
        }

        public function getTasks($uid) {
            $result = null;
            $qry = "SELECT * FROM tasks WHERE uid = ".$uid.";";
            $result = $this->db->query($qry);
            return $result->fetch_all(MYSQLI_ASSOC);

        }

        public function addTasks($row){
            $db = $this->db;
            $stmt = $db->prepare ("INSERT INTO tasks (task, uid) VALUES (?, ?)");
            $stmt -> bind_param("sd", $row['task'], $row['uid']);
                
            $stmt->execute();            
            return true;
        }

        public function deleteTasks($id, $uid){
            $statement = $this->db->prepare("DELETE FROM tasks WHERE id = ? AND uid = ?");
            $statement->bind_param("ss", $id, $uid);
            $statement->execute();

            return true;
        }

        public function editTask($row, $rowid){
            $statement = $this->db->prepare("UPDATE tasks SET task = ? WHERE id = ?;");
            $statement->bind_param("ss", $content, $rowid);
            $statement->execute();

            return true; //check with false boolean 
        }
    }