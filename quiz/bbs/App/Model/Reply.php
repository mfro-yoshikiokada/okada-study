<?php


namespace bbs\App\Model;

use PDO;

class Reply extends Model
{
    protected PDO $pdo;

    function getComment(int $comment_id) {
         $stmt = $this->pdo->prepare("SELECT * FROM comments WHERE id = :id");

         $stmt->bindParam(':id', $comment_id,  PDO::PARAM_STR);

         $res = $stmt->execute();

         if ($res) {
             $data = $stmt->fetch(PDO::FETCH_ASSOC);
             return $data;
         } else {
             return null;
         }
     }
}
