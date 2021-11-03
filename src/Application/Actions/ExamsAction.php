<?php
declare(strict_types=1);

namespace App\Application\Actions;

use Psr\Http\Message\ResponseInterface as Response;

/**
 * 3. レスポンスの level の値を LEVEL_LABELS の name の値に変更してください。
 */
final class ExamsAction extends Action
{
    private const LEVEL_LABELS = [
        [
            'id' => 1,
            'name' => 'High',
        ],
        [
            'id' => 2,
            'name' => 'Middle',
        ],
        [
            'id' => 3,
            'name' => 'Low',
        ],
    ];

    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $stmt = $this->dbh->prepare('SELECT * FROM `exams`');
        $stmt->execute();
        $rows = $stmt->fetchAll();
        return $this->respondWithData($rows);
    }
}
