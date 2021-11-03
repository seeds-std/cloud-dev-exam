<?php
declare(strict_types=1);

namespace Tests\Application\Actions\User;

use App\Application\Actions\ActionPayload;
use Tests\TestCase;

class ActionTest extends TestCase
{
    public function testUsersAction()
    {
        $app = $this->getAppInstance();

        $request = $this->createRequest('GET', '/users');
        $response = $app->handle($request);

        $payload = (string) $response->getBody();
        $decodePayload = json_decode($payload, true);
        $this->assertFalse(
            array_search(1, array_column($decodePayload['data'], 'id')),
            'id=1 のユーザーが含まれています。'
        );
        $this->assertCount(10, $decodePayload['data'], 'ユーザーの数が10ではありません。');
        $expectedPayload = new ActionPayload(200, [
            [
                'id' => 2,
                'name' => 'Uma',
            ],
            [
                'id' => 3,
                'name' => 'John',
            ],
            [
                'id' => 4,
                'name' => 'Tad',
            ],
            [
                'id' => 5,
                'name' => 'Asher',
            ],
            [
                'id' => 6,
                'name' => 'Quon',
            ],
            [
                'id' => 7,
                'name' => 'Solomon',
            ],
            [
                'id' => 8,
                'name' => 'Lillith',
            ],
            [
                'id' => 9,
                'name' => 'Emerson',
            ],
            [
                'id' => 10,
                'name' => 'Xyla',
            ],
            [
                'id' => 11,
                'name' => 'Vaughan',
            ],
        ]);
        $serializedPayload = json_encode($expectedPayload, JSON_PRETTY_PRINT);
        $this->assertEquals($serializedPayload, $payload, 'レスポンスが期待値と一致しません。');
    }

    public function testExamsAction()
    {
        $app = $this->getAppInstance();

        $request = $this->createRequest('GET', '/exams');
        $response = $app->handle($request);

        $payload = (string) $response->getBody();
        $expectedPayload = new ActionPayload(200, [
            [
                "id" => 1,
                "name" => "Mid-Term Exam",
                "level" => "Middle"
            ],
            [
                "id" => 2,
                "name" => "Final Exam",
                "level" => "High"
            ],
            [
                "id" => 3,
                "name" => "Pop Quiz",
                "level" => "Low"
            ],
            [
                "id" => 4,
                "name" => "Mid-Term Exam",
                "level" => "Middle"
            ],
            [
                "id" => 5,
                "name" => "Final Exam",
                "level" => "High"
            ],
            [
                "id" => 6,
                "name" => "Mid-Term Exam",
                "level" => "Middle"
            ],
            [
                "id" => 7,
                "name" => "Final Exam",
                "level" => "High"
            ],
            [
                "id" => 8,
                "name" => "Mid-Term Exam",
                "level" => "Middle"
            ],
            [
                "id" => 9,
                "name" => "Final Exam",
                "level" => "High"
            ]
        ]);
        $serializedPayload = json_encode($expectedPayload, JSON_PRETTY_PRINT);
        $this->assertEquals($serializedPayload, $payload, 'レスポンスが期待値と一致しません。');
    }

    public function testScoresAction()
    {
        $app = $this->getAppInstance();

        $request = $this->createRequest('GET', '/scores');
        $response = $app->handle($request);

        $payload = (string) $response->getBody();
        $expectedPayload = new ActionPayload(200, [
            [
                "id" => 1,
                "user_id" => 1,
                "exam_id" => 1,
                "score" => 0,
                "user_name" => "Ignore",
                "exam_name" => "Mid-Term Exam"
            ],
            [
                "id" => 2,
                "user_id" => 2,
                "exam_id" => 2,
                "score" => 100,
                "user_name" => "Uma",
                "exam_name" => "Final Exam"
            ],
            [
                "id" => 3,
                "user_id" => 1,
                "exam_id" => 2,
                "score" => 70,
                "user_name" => "Ignore",
                "exam_name" => "Final Exam"
            ],
            [
                "id" => 4,
                "user_id" => 4,
                "exam_id" => 1,
                "score" => 50,
                "user_name" => "Tad",
                "exam_name" => "Mid-Term Exam"
            ],
            [
                "id" => 5,
                "user_id" => 3,
                "exam_id" => 1,
                "score" => 0,
                "user_name" => "John",
                "exam_name" => "Mid-Term Exam"
            ],
            [
                "id" => 6,
                "user_id" => 15,
                "exam_id" => 7,
                "score" => 55,
                "user_name" => "Chadwick",
                "exam_name" => "Final Exam"
            ],
            [
                "id" => 7,
                "user_id" => 5,
                "exam_id" => 8,
                "score" => 80,
                "user_name" => "Asher",
                "exam_name" => "Mid-Term Exam"
            ],
            [
                "id" => 8,
                "user_id" => 7,
                "exam_id" => 2,
                "score" => 40,
                "user_name" => "Solomon",
                "exam_name" => "Final Exam"
            ],
            [
                "id" => 9,
                "user_id" => 3,
                "exam_id" => 4,
                "score" => 100,
                "user_name" => "John",
                "exam_name" => "Mid-Term Exam"
            ],
            [
                "id" => 10,
                "user_id" => 5,
                "exam_id" => 5,
                "score" => 65,
                "user_name" => "Asher",
                "exam_name" => "Final Exam"
            ],
            [
                "id" => 11,
                "user_id" => 5,
                "exam_id" => 6,
                "score" => 80,
                "user_name" => "Asher",
                "exam_name" => "Mid-Term Exam"
            ],
            [
                "id" => 12,
                "user_id" => 5,
                "exam_id" => 9,
                "score" => 70,
                "user_name" => "Asher",
                "exam_name" => "Final Exam"
            ],
            [
                "id" => 13,
                "user_id" => 13,
                "exam_id" => 3,
                "score" => 79,
                "user_name" => "Vernon",
                "exam_name" => "Pop Quiz"
            ],
            [
                "id" => 14,
                "user_id" => 8,
                "exam_id" => 3,
                "score" => 90,
                "user_name" => "Lillith",
                "exam_name" => "Pop Quiz"
            ],
            [
                "id" => 15,
                "user_id" => 1,
                "exam_id" => 3,
                "score" => 98,
                "user_name" => "Ignore",
                "exam_name" => "Pop Quiz"
            ],
            [
                "id" => 16,
                "user_id" => 2,
                "exam_id" => 1,
                "score" => 90,
                "user_name" => "Uma",
                "exam_name" => "Mid-Term Exam"
            ]
        ]);
        $serializedPayload = json_encode($expectedPayload, JSON_PRETTY_PRINT);
        $this->assertEquals($serializedPayload, $payload, 'レスポンスが期待値と一致しません。');
    }
}
