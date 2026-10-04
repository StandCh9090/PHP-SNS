<?php

namespace App\Models;

use App\Config\Database;
use PDO;

class Post
{
    public static function create(int $userId, string $body): void
    {
        $pdo = Database::connection();
        $statement = $pdo->prepare(
            'INSERT INTO posts (user_id, body) VALUES (:user_id, :body)'
        );

        $statement->execute([
            ':user_id' => $userId,
            ':body' => trim($body),
        ]);
    }

    public static function all(): array
    {
        $pdo = Database::connection();

        $statement = $pdo->query(
            'SELECT p.*, u.username
             FROM posts p
             INNER JOIN users u ON u.id = p.user_id
             ORDER BY p.created_at DESC'
        );

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}
