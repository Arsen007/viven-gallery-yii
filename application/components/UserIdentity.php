<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
    /**
     * Authenticates a user.
     * The example implementation makes sure if the username and password
     * are both 'demo'.
     * In practical applications, this should be changed to authenticate
     * against some persistent user identity storage (e.g. database).
     * @return boolean whether authentication succeeds.
     */
    public function authenticate()
    {
        $result = Yii::app()->db->createCommand('SELECT * FROM users WHERE user_name = "' . $this->username . '"  AND password = "' . $this->password . '"')->queryAll();
        if (empty($result)) {
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        } else {
            if ($result[0]['email'] == $this->username) {
                $this->username = $result[0]['username'];
            }
            $this->errorCode = self::ERROR_NONE;
        }

        return !$this->errorCode;
    }
}