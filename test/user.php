<?php
require_once('base.php');

class UserTest extends t3toolTest
{
    public function testUser() {
        $user_list = $this->doCmd('user list');
        $user_list = $this->doCmd('user create testuser password');
        $user_list = $this->doCmd('user show testuser');
        $user_list = $this->doCmd('user list ');
        $user_list = $this->doCmd('user list "test*"');
        $user_list = $this->doCmd('user disable testuser');
        $user_list = $this->doCmd('user enable testuser');
        $user_list = $this->doCmd('user password testuser password2');

        $user_list = $this->doCmd('user creategroup testgroup');
        $user_list = $this->doCmd('user addgroup testuser testgroup');
        $user_list = $this->doCmd('user removegroup testuser testgroup');

        $user_list = $this->doCmd('user show testuser');



        $user_list = $this->doCmd('user delete testuser');


    }
}
