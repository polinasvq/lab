<?php
include 'iinde.php';
class AuthenticationTest extends PHPUnit_Framework_TestCase {

    public function testLogin() {
        // Arrange
        $username = 'foo';
        $password = 'bar';
        $expected_redirect = '/dashboard';

        // Act
        $response = $this->getClient()->request('POST', '/login', [
            'form_params' => [
                'username' => $username,
                'password' => $password,
                'remember' => 'remember me'
            ]
        ]);

        // Assert
        $this->assertRedirect($response->getHeader()['location'], $expected_redirect);
    }

    public function testInvalidLogin() {
        // Arrange
        $username = 'invalid';
        $password = 'invalid';
        $expected_message = 'Invalid login';

        // Act
        $response = $this->getClient()->request('POST', '/login', [
            'form_params' => [
                'username' => $username,
                'password' => $password,
                'remember' => 'remember me'
            ]
        ]);

        // Assert
        $this->assertEquals($response->getBody()['message'], $expected_message);
    }
}
