<?php

namespace model\entity;

class User
{
    public string $user_id;
    public string $username;
    public string $user_password;
    public string $mail;
    public string $registration_date;
    public string $user_profile;

    /**
     * @param string $user_id
     * @param string $username
     * @param string $user_password
     * @param string $mail
     * @param string $registration_date
     * @param string $user_profile
     */
    public function __construct(string $user_id, string $username, string $user_password, string $mail, string $registration_date, string $user_profile)
    {
        $this->user_id = $user_id;
        $this->username = $username;
        $this->user_password = $user_password;
        $this->mail = $mail;
        $this->registration_date = $registration_date;
        $this->user_profile = $user_profile;
    }

    public static function arrayToObj($row)
    {
        return new User(
            $row["user_id"] ?? '',
            $row["username"] ?? '',
            $row["user_password"] ?? '',
            $row["mail"] ?? '',
            $row["registration_date"] ?? '',
            $row["user_profile"] ?? ''
        );
    }

}