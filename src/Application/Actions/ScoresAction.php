<?php
declare(strict_types=1);

namespace App\Application\Actions;

use Psr\Http\Message\ResponseInterface as Response;

/**
 * 4. レスポンスに user_id に対応する name と exam_id に対応する name を追加してください。
 *    キー名はそれぞれ user_name, exam_name とし末尾に追加してください。
 */
final class ScoresAction extends Action
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $stmt = $this->dbh->prepare('SELECT * FROM `scores`');
        $stmt->execute();
        $rows = $stmt->fetchAll();
        return $this->respondWithData($rows);
    }
}
