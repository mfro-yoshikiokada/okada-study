<?php


namespace bbs\App\Model;

use PDO;

class Reply extends Model
{
    protected PDO $pdo;

    public function createReply(int $user_id, int $comment_id, string $reply_text, string $created_at): void
    {
        $sql = 'INSERT INTO replies (user_id, comment_id, reply_text, created_at) VALUES (?, ?, ?, ?);';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$user_id, $comment_id, $reply_text, $created_at]);
    }

    public function getReplies(int $comment_id): array
    {
        $sql = '
SELECT nickname, reply_text, created_at 
FROM users JOIN replies ON users.id = replies.user_id 
WHERE comment_id = :id
';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $comment_id, PDO::PARAM_INT);
        $stmt->execute();
        $aryItem = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $aryItem;
    }
    public function getAllIdReplies(): array
    {
        $stmt = $this->pdo->prepare("SELECT comment_id FROM replies;");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return  $result;
    }
}
