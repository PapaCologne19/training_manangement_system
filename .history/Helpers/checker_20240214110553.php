<?php 

class Check{
    public function email($email){
        $queey = "SELECT * FROM  users WHERE user_email='$email'";
    }
}