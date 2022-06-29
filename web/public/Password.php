<?php 

/**
* @usage  :
*       include_once($path . '/Password.php');
*       $Password = new Password;
*       $pwd = $Password->createPassword(10);
*       return $pwd;
* 
*/
class Password {

    public function createPassword($length = 15) {
        $response = [];
        $response['pwd'] = $this->generate($length);
        $response['hashPwd'] = $this->hashPwd( $response['pwd'] );
        return $response;
    }

    private function generate($length = 15) {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*(){}/?,><";
        return substr(str_shuffle($chars),0,$length);
    }

    private function hashPwd($pwd) {
        return hash('sha256', $pwd);
    }

    function generate_password($length = 20){
        $chars =  'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'.
                  '0123456789`-=~!@#$%^&*()_+,./<>?;:[]{}\|';
      
        $str = '';
        $max = strlen($chars) - 1;
      
        for ($i=0; $i < $length; $i++)
          $str .= $chars[random_int(0, $max)];
      
        return $str;
      }

}

?>