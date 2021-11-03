<?php
declare(strict_types=1);

namespace App\Application\Actions;

use Psr\Http\Message\ResponseInterface as Response;

/**
 * 1. レスポンスから id=1 のユーザーを除外してください。
 * 2. レスポンスのユーザー数を 10 にしてください。
 */
final class UsersAction extends Action
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $stmt = $this->dbh->prepare('SELECT * FROM `users`');
        $stmt->execute();
        $rows = $stmt->fetchAll();
        return $this->respondWithData($rows);
    }
}
