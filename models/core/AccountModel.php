<?php

    class AccountModel extends BaseModel implements IModel {

        private $email;
        private $password;
        private $role;
        private $documento;

        public function __construct()
        {
            parent::__construct();

            $this->email = "";
            $this->password = "";
            $this->role = "";
            $this->documento = "";
        }

        public function save(){
            try {
                $query = $this->prepare("INSERT INTO account VALUES (:email, :password, :role, :documento)");
                $query->execute([
                    "email" => $this->email,
                    "password" => md5($this->password),
                    "role" => $this->role,
                    "documento" => $this->documento
                ]);

                return true;
            } catch(PDOException $e){
                error_log("AccountModel::save => Save Error: " . $e->getMessage());
                return false;
            }
        }

        public function getAll(){
            $items = [];

            try {
                $query = $this->query("SELECT * FROM account");

                while($p = $query->fetch(PDO::FETCH_ASSOC)){
                    $item = new AccountModel();

                    $item->from($p);

                    array_push($items, $item);
                }

                return $items;
            } catch(PDOException $e){
                error_log("AccountModel::getAll => Get All Error: " . $e->getMessage());
                return null;
            }
        }

        public function get($email){
            try{
                $query = $this->prepare("SELECT * FROM account WHERE email = :email");
                $query->execute([
                    "email" => $email
                ]);

                $user = $query->fetch(PDO::FETCH_ASSOC);

                $this->from($user);

                return $this;
            } catch(PDOException $e){
                error_log("AccountModel::get => Get Error: " . $e->getMessage());
                return null;
            }
        }

        public function delete($email){
            try{
                $query = $this->prepare("DELETE FROM account WHERE email = :email");
                $query->execute([
                    "email" => $email
                ]);

                return true;
            } catch(PDOException $e){
                error_log("AccountModel::delete => Delete Error: " . $e->getMessage());
                return false;
            }
        }

        public function update(){
            try{
                $query = $this->prepare("UPDATE account SET password = :password WHERE email = :email");
                $query->execute([
                    "email" => $this->email,
                    "password" => $this->password
                ]);

                return true;
            } catch(PDOException $e){
                error_log("AccountModel::update => Update Error: " . $e->getMessage());
                return false;
            }
        }

        public function from($array){
            $this->email = $array["email"];
            $this->password = $array["pass"];
            $this->role = $array["role"];
            $this->documento = $array["documento"];
        }

        public function exists($email){
            try {
                $query = $this->prepare("SELECT email FROM account WHERE email = :email");
                $query->execute([
                    "email" => $email
                ]);

                if ($query->rowCount() > 0){
                    return true;
                } else {
                    return false;
                }
            } catch(PDOException $e){
                error_log("AccountModel::exists => Exists Error: " . $e->getMessage());
                return false;
            }
        }

        public function updatePassword($pDNI, $pNewPassword){
            try {
                $query = $this->prepare("UPDATE user SET passUser = :passUser WHERE dniUser = :dniUser");
                $query->execute([
                    "passUser" => md5($pNewPassword),
                    "dniUser" => $pDNI
                ]);

                return true;
            } catch(PDOException $e){
                error_log("AccountModel::updatePassword => Update Password Error: " . $e->getMessage());
                return false;
            }
        }

        public function comparePasswords($pPass, $pEmail){
            try{
                $user = $this->get($pEmail);

                return $user->getPassword() == md5($pPass);
                //return password_verify($pPass, $user->getPassUser());
            } catch(PDOException $e){
                error_log("AccountModel::comparePasswords => Compare Passwords Error: " . $e->getMessage());
                return false;
            }
        }

        private function getHashedPassword($pPass){
            return password_hash($pPass, PASSWORD_DEFAULT, ["cost" => 10]);
        }

        public function setEmail($email){  $this->email = $email; }
        public function setPassword($password){    $this->password = $password; }
        public function setRole($role){    $this->role = $role; }
        public function setDocumento($documento) { $this->dni = $documento; }

        public function getEmail()      { return $this->email;      }
        public function getPassword()   { return $this->password;   }
        public function getRole()       { return $this->role;       }
        public function getDocumento()        { return $this->documento;        }
    }

?>