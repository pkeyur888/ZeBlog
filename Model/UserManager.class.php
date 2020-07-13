<?php


class UserManager extends DBManager
{
            public function registration(User $user){
                $query       = $this->db->prepare( "INSERT INTO `user` (`fname`, `lname`, `age`, `gender`, `username`, `password`, `avatar`) VALUES (:firstname, :lastname, :age, :gender, :username, :password,:avatar);" );
                return $query->execute( array(
                    "firstname" => $user->getFname(),
                    "lastname"  => $user->getLname(),
                    "age"       => $user->getAge(),
                    "gender"    => $user->getGender(),
                    "username"  => $user->getUsername(),
                    "password"   => $user->getPassword(),
                    "avatar"  =>$user->getAvatar(),
                ) );
            }
            public function login($username){
                $query  = $this->db->query( "SELECT * FROM user WHERE Username = '$username' " );
                $singleuser = $query->fetch( PDO::FETCH_ASSOC );
                return $singleuser;
            }
            public  function editProfile(User $user){
//                echo $user->getAge();
                echo $user->getId();
                $query=$this->db->prepare("UPDATE `user` SET `fname`=:fname,`lname`=:lname,`age`=:age,`gender`=:gender,`username`=:username,`password`=:password,`avatar`=:avatar WHERE `id`=:id;");
                return $query->execute( array(
                    "fname" => $user->getFname(),
                    "lname"  => $user->getLname(),
                    "age"       => $user->getAge(),
                    "gender"    => $user->getGender(),
                    "username"  => $user->getUsername(),
                    "password"   => $user->getPassword(),
                    "avatar"  =>$user->getAvatar(),
                    "id"=>$user->getId(),
                ) );
            }
            public function changePsw(User $user){
                $query=$this->db->prepare("UPDATE `user` SET `password`=:password WHERE `id`=:id;");
                return $query->execute( array(

                    "password"   => $user->getPassword(),

                    "id"=>$user->getId(),
                ) );

            }
            public function  getAllUser(){
                $query    = $this->db->query( "SELECT * FROM `user` " );
                $userlist = $query->fetchAll( PDO::FETCH_ASSOC );
                return $userlist;
            }
            public function  getUser($id){

                $query    = $this->db->query( "SELECT * FROM `user` WHERE `id`=$id" );
                $u = $query->fetch( PDO::FETCH_ASSOC );

                return $u;

            }


}