<?php


class PostManager extends DBManager
{

    public function addPost(Post $post)
    {

        $query = $this->db->prepare("INSERT INTO `post` (`userId`, `title`, `desc`,`date`) VALUES (:id,:title,:desc,:date);");
        return $query->execute(array(
            "id" => $post->getId(),
            "title" => $post->getTitle(),
            "desc" => $post->getDesc(),
            "date" => $post->getDate(),
        ));
    }
        public function getAllPost(){
            $query    = $this->db->query( "SELECT * FROM `post` ORDER BY postId DESC " );
            $post = $query->fetchAll( PDO::FETCH_ASSOC );
            return $post;
        }
        public function  getUserPost($id){
            $query    = $this->db->query( "SELECT * FROM `post` where userId=$id " );
            $post = $query->fetchAll( PDO::FETCH_ASSOC );
            return $post;
        }
         public  function getPostCount($id){
        $query    = $this->db->query( "SELECT * FROM `post` WHERE `userId`=$id" );
        $u = $query->fetch( PDO::FETCH_ASSOC );
        return $u;
    }


}