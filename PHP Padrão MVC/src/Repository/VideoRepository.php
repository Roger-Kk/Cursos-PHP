<?php

declare(strict_types=1);

namespace Alura\MVC\Repository;
use Alura\MVC\Entity\Video;
use PDO;

class VideoRepository{

    public function __construct(private PDO $pdo){

    }

    #receber uma classe Video, retornando a própria classe
    public function add(Video $video): bool{
        $sql = 'INSERT INTO padrao_mvc.videos (url, title, image_path) VALUES (?, ?, ?)';
        $statement = $this->pdo->prepare($sql);
        $statement -> bindValue(1, $video->url);
        $statement -> bindValue(2, $video->title);
        $statement -> bindValue(3, $video->getFilePath());
        $result = $statement->execute();

        $id = $this->pdo->lastInsertId();
        $video->setId(intval($id));
        return $result;
        
    }

    public function remove(int $id): bool{
        $sql = 'DELETE FROM padrao_mvc.videos WHERE id = ?';
        $statement = $this->pdo -> prepare($sql);
        $statement ->bindValue(1, $id);
        return $statement->execute();
    }

    public function update(Video $video): bool{

        $updateImageSql = '';
        if($video->getFilePath()!== null){
            $updateImageSql = ', image_path = :image_path';
        }
        $sql = "UPDATE padrao_mvc.videos 
                SET url = :url, 
                title = :title
                $updateImageSql
                WHERE id = :id;";
        $statement = $this->pdo -> prepare($sql);
        $statement ->bindValue(':url', $video->url);
        $statement ->bindValue(':title', $video->title);
        $statement ->bindValue(':id', $video->id, PDO::PARAM_INT);

        if($video->getFilePath()!== null){
            $statement ->bindValue(':image_path', $video->getFilePath());
        }
        
        return $statement->execute();
    }

    //retorna um array de video
    public function all():array{
        $videoList = $this->pdo
        ->query('SELECT * FROM padrao_mvc.videos;')
        ->fetchAll(\PDO::FETCH_ASSOC);

        return array_map(
            $this->hydrateVideo(...),
            $videoList
        );
    }

    public function find(int $id){
            $query = "SELECT * FROM padrao_mvc.videos WHERE id = ?";
            $statement = $this->pdo->prepare($query);
            $statement->bindValue(1, $id, \PDO::PARAM_INT);
            $statement->execute();

        return $this->hydrateVideo($statement->fetch(\PDO::FETCH_ASSOC));
    }

    private function hydrateVideo(array $videoData): Video
    {
        $video = new Video($videoData['url'], $videoData['title']);
        $video->setId($videoData['id']);

        //Verifica se existe o image_path e retorna para a variável $video
        if ($videoData['image_path'] !== null){
            $video->setFilePath($videoData['image_path']);
        }
        return $video;
    }
}
