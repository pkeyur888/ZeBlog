<?php


class Post extends User
{
    Private $postId;
    private $title;
    private $desc;
    private $date;


    /**
     * Post constructor.
     * @param $postId
     * @param $userId
     * @param $title
     * @param $desc
     * @param $date
     */

    function __construct()
    {
        $a = func_get_args();
        $i = func_num_args();
        if (method_exists($this,$f='__construct'.$i)) {
            call_user_func_array(array($this,$f),$a);
        }
    }

    public function __construct1( $arr)
    {
        $this->postId = $arr['postId'] ;
        $this->title = $arr['title'];
        $this->desc = $arr['desc'];
        $this->date = $arr['date'];
        $this->id=$arr['userId'];
    }
    public function __construct2( $arr, $userId)
    {
        $this->postId = $arr['id'] ?? null;
        $this->title = $arr['title'];
        $this->desc = $arr['description'];
        $this->date = date('Y-m-d');
        $this->id=$userId;
    }



    /**
     * @return mixed
     */
    public function getPostId()
    {
        return $this->postId;
    }

    /**
     * @param mixed $postId
     */
    public function setPostId($postId)
    {
        $this->postId = $postId;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getDesc()
    {
        return $this->desc;
    }

    /**
     * @param mixed $desc
     */
    public function setDesc($desc)
    {
        $this->desc = $desc;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }


}