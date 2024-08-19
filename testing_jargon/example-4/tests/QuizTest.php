<?php

use App\Question;
use App\Quiz;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class QuizTest extends TestCase
{
    #[Test]
    public function it_consists_of_questions()
    {
        $quiz = new Quiz();

        $quiz->addQuestion(new Question('What is 2 + 2?', 4));

        $this->assertCount(1, $quiz->questions());

    }

    #[Test]
    public function it_can_be_graded()
    {
        $quiz = new Quiz();

        $quiz->addQuestion(new Question('What is 2 + 2?', 4));

        $this->assertCount(1, $quiz->questions());
    }
}