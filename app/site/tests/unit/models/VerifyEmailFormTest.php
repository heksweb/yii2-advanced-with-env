<?php

namespace site\tests\unit\models;

use Codeception\Test\Unit;
use site\fixtures\UserFixture;
use site\forms\VerifyEmailForm;
use site\models\User;
use site\tests\UnitTester;

class VerifyEmailFormTest extends Unit
{
    /**
     * @var UnitTester
     */
    protected $tester;


    public function _before()
    {
        $this->tester->haveFixtures([
            'user' => [
                'class' => UserFixture::class,
                'dataFile' => codecept_data_dir() . 'user.php'
            ]
        ]);
    }

    public function testVerifyWrongToken()
    {
        $this->tester->expectException('\yii\base\InvalidArgumentException', function() {
            new VerifyEmailForm('');
        });

        $this->tester->expectException('\yii\base\InvalidArgumentException', function() {
            new VerifyEmailForm('notexistingtoken_1391882543');
        });
    }

    public function testAlreadyActivatedToken()
    {
        $this->tester->expectException('\yii\base\InvalidArgumentException', function() {
            new VerifyEmailForm('already_used_token_1548675330');
        });
    }

    public function testVerifyCorrectToken()
    {
        $model = new VerifyEmailForm('4ch0qbfhvWwkcuWqjN8SWRq72SOw1KYT_1548675330');
        $user = $model->verifyEmail();
        expect($user)->isInstanceOf('site\models\User');

        expect($user->username)->equals('test.test');
        expect($user->email)->equals('test@mail.com');
        expect($user->status)->equals(User::STATUS_ACTIVE);
        expect($user->validatePassword('Test1234'))->true();
    }
}
