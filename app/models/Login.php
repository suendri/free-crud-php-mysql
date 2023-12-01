<?php

/**
 * https://github.com/suendri
 * --
 * e-mail : suendri@gmail.com
 * WA     : 62852-6361-6901
 * --
 */

namespace App\Models;

use App\Core\Model;

class Login extends Model
{
     public function proses()
     {
          $email = $_POST['email'];
          $password = $_POST['password'];

          $query = "SELECT * FROM tb_users WHERE user_email=:user_email AND user_password=PASSWORD(:user_password)";
          $stmt = $this->db->prepare($query);
          $stmt->bindParam(":user_email", $email);
          $stmt->bindParam(":user_password", $password);
          $stmt->execute();

          return $stmt->fetch();
     }
}
