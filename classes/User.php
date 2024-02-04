<?php
class User extends Database {

    //Function to create user
    public function register($username, $password) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $username, $hashedPassword);
        $stmt->execute();
        $stmt->close();
    }

    //Function to delete user
    public function deleteUser($userId) {
        $stmt = $this->conn->prepare("DELETE FROM users WHERE id = ?");
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $stmt->close();
    }

    //Function to update user
    public function updateUser($userId, $newUsername, $newPassword) {
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $stmt = $this->conn->prepare("UPDATE users SET username = ?, password = ? WHERE id = ?");
        $stmt->bind_param("ssi", $newUsername, $hashedPassword, $userId);
        $stmt->execute();
        $stmt->close();
    }
}
