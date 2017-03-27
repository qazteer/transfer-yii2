<?php
namespace tests\models;
use app\models\User;

class UserTest extends \Codeception\Test\Unit
{
    public function testFindUserById()
    {
        expect_that($user = User::findIdentity(3));
        expect($user->username)->equals('alex');

        expect_not(User::findIdentity(999));
    }

    /*public function testFindUserByAccessToken()
    {
        expect_that($user = User::findIdentityByAccessToken('100-token'));
        expect($user->username)->equals('admin');

        expect_not(User::findIdentityByAccessToken('non-existing'));        
    }*/

    public function testFindUserByUsername()
    {
        expect_that($user = User::findByUsername('alex'));
        expect_not(User::findByUsername('not-alex'));
    }

    /**
     * @depends testFindUserByUsername
     */
    public function testValidateUser($user)
    {
        $user = User::findByUsername('alex');
        expect_that($user->validate());
        expect_not($user->validateAuthKey('test102key'));

        /*expect_that($user->validatePassword('admin'));
        expect_not($user->validatePassword('123456')); */       
    }

}
