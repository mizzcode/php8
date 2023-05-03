<?php

namespace Repository;

use Model\Comments;
use PDO;

interface CommentRepository
{
    function insert(Comments $comments): Comments;
    function findById(?int $id): ?Comments;
    function findAll(): array;
}

class CommentRepositoryImpl implements CommentRepository
{
    private PDO $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function insert(Comments $comments): Comments
    {
        $sql = "INSERT INTO comments (name, comment) VALUES (?,?)";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([$comments->getName(), $comments->getComment()]);

        $id = $this->connection->lastInsertId();
        $comments->setId($id);

        return $comments;
    }
    public function findById(?int $id): ?Comments
    {
        $sql = "SELECT * FROM comments WHERE id = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([$id]);

        // cek jika data ada 
        if ($row = $stmt->fetch()) {
            return new Comments(
                id: $row['id'],
                name: $row['name'],
                comment: $row['comment']
            );
        } else {
            return null;
        }
    }
    public function findAll(): array
    {
        $sql = "SELECT * FROM comments";
        $stmt = $this->connection->query($sql);

        $array = [];
        while ($row = $stmt->fetch()) {
            $array[] = new Comments(
                id: $row['id'],
                name: $row['name'],
                comment: $row['comment']
            );
        }
        return $array;
    }
}