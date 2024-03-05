<?php
require_once('./connection/Database.php');

class User extends Database
{
    //Function to create user
    public function register($username, $password, $pin)
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->conn->prepare("INSERT INTO users (username, password, pin) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $hashedPassword, $pin);
        $stmt->execute();
        $stmt->close();
        return true;
    }

    //Function to delete user
    public function deleteUser($userId)
    {
        $stmt = $this->conn->prepare("DELETE FROM users WHERE id = ?");
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $stmt->close();
        return true;
    }

    //Function to update user
    public function updateUser($userId, $newUsername, $newPassword)
    {
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $stmt = $this->conn->prepare("UPDATE users SET username = ?, password = ? WHERE id = ?");
        $stmt->bind_param("ssi", $newUsername, $hashedPassword, $userId);
        $stmt->execute();
        $stmt->close();
        return true;
    }

    public function getUserRecord($username)
    {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $userRecord = $result->fetch_assoc();
        $stmt->close();

        return $userRecord;
    }
}