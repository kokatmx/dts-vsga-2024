<?php
class User
{
    public function getAll()
    {
        $users = [
            [
                'id' => 1,
                'name' => 'John Doe',
                'email' => 'jodoe@me.com',
            ],
            [
                'id' => 2,
                'name' => 'Jane Doe',
                'email' => 'jadoe@me.com',
            ],
            [
                'id' => 3,
                'name' => 'Joni Doe',
                'email' => 'jidoe@me.com',
            ],
        ];
        return $users;
    }
}
