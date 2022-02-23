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
        // var_dump(self::ERROR_PASSWORD_INVALID, self::ERROR_USERNAME_INVALID, self::ERROR_NONE);
        // die("Hello world");
        $record=Users::model()->findByAttributes(array('username'=>$this->username));
        if ($record===null) {
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        }
        // else if($this->password!=$record->password){
        
        elseif (!CPasswordHelper::verifyPassword($this->password, $record->password)) {
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
        } else {
            // $this->_id=$record->id;
            $this->errorCode=self::ERROR_NONE;
        }
        return !$this->errorCode;
    }
}