<?php


class User
{
    protected $id;
    private $fname;
    private $lname;
    private $username;
    private $age;
    private $gender;
    private $password;
    private $avatar;
    /**
     * User constructor.
     * @param $id
     * @param $fname
     * @param $lname
     * @param $username
     * @param $age
     * @param $gender
     * @param $password
     * @param $avatar
     */

    function __construct()
    {
        $a = func_get_args();
        $i = func_num_args();
        if (method_exists($this,$f='__construct'.$i)) {
            call_user_func_array(array($this,$f),$a);
        }
    }

    public function __construct1($arr)
    {
       // var_dump($arr);
        $this->id = $arr['id'];
        $this->lname = $arr['lname'];
        $this->fname = $arr['fname'];
        $this->username = $arr['username'];
        $this->password = $arr['password'];
        $this->age = $arr['age'];
        $this->gender = $arr['gender'];
        $this->avatar = $arr['avatar'];
    }
    



    public function __construct2($arr,$path)
    {
        $this->id = $arr['id'] ?? null;;
        $this->lname = $arr['lname'];
        $this->fname = $arr['fname'];
        $this->username = $arr['username'];
        $this->password = $arr['password'];
        $this->age = $arr['age'];
        $this->gender = $arr['gender'];
        $this->avatar = $path;
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */

    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getFname()
    {
        return $this->fname;
    }

    /**
     * @param mixed $fname
     */
    public function setFname($fname)
    {
        $this->fname = $fname;
    }

    /**
     * @return mixed
     */
    public function getLname()
    {
        return $this->lname;
    }

    /**
     * @param mixed $lname
     */
    public function setLname($lname)
    {
        $this->lname = $lname;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param mixed $age
     */
    public function setAge($age)
    {
        $this->age = $age;
    }

    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param mixed $gender
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * @param mixed $avatar
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;
    }



}