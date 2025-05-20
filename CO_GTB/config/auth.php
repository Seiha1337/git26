<?php
session_start();
require 'db.php';

function isAdmin() {
    global $pdo;

    if (!isset($_SESSION['user_id'])) return false;

    $stmt = $pdo->prepare("SELECT is_admin FROM users WHERE id = ?");
    $stmt->execute([$_SESSION['user_id']]);
    $user = $stmt->fetch();

    return $user && $user['is_admin'];
}
