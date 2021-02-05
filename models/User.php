<?php

class User {
    private $conn;
    private $table = "users";

    public $id;
    public $dateCreated;
    public $email;
    public $emailProvider;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function read($currentPage, $filterBy, $orderBy) {

        $rowsPerPage = 10;
        $start = ($currentPage * $rowsPerPage) - $rowsPerPage;

        $totalQuery = "SELECT * FROM " . $this->table;
        $totalStmt = $this->conn->prepare($totalQuery);
        $totalStmt->execute();

        $totalRows = $totalStmt->rowCount();
        $totalPages = ceil($totalRows / $rowsPerPage);

        if ($filterBy) {
            $where = "WHERE u.emailProvider = '" . $filterBy . "'";
        } else {
            $where = "";
        }

        $query = "SELECT u.id, u.dateCreated, u.email, u.emailProvider FROM " . $this->table . " u " . $where . " ORDER BY " . $orderBy . " LIMIT :start, :rowsPerPage";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':start', $start, PDO::PARAM_INT);
        $stmt->bindParam(':rowsPerPage', $rowsPerPage, PDO::PARAM_INT);
        $stmt->execute();

        $providerQuery = "SELECT DISTINCT emailProvider FROM " . $this->table;
        $pStmt = $this->conn->prepare($providerQuery);
        $pStmt->execute();

        $resultArr = array(
            "totalRows" => $totalRows,
            "totalPages" => $totalPages,
            "rowsPerPage" => $rowsPerPage,
            "stmt" => $stmt,
            "providers" => $pStmt
        );

        return $resultArr;
    }
    
    public function create() {
        $query = "INSERT INTO " . $this->table . "
            SET dateCreated = :dateCreated, email = :email, emailProvider = :emailProvider";
        
        $stmt = $this->conn->prepare($query);

        $this->dateCreated = htmlspecialchars(strip_tags($this->dateCreated));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->emailProvider = strip_tags($this->emailProvider);

        $stmt->bindParam(':dateCreated', $this->dateCreated);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':emailProvider', $this->emailProvider);

        if ($stmt->execute()) {
            return true;
        }

        printf("Error: %s.\n", $stmt->error);

        return false;
    }

    public function delete() {

        $query = "DELETE FROM " . $this->table . " WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        $this->name = htmlspecialchars(strip_tags($this->id));

        $stmt->bindParam(':id', $this->id);

        if ($stmt->execute()) {
            return true;
        }

        printf("Error: %s.\n", $stmt->error);

        return false;
    }
}