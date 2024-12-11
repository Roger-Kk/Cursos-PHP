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
        $sql = 'INSERT INTO padrao_mvc.videos (url, title) VALUES (?, ?)';
        $statement = $this->pdo->prepare($sql);
        $statement -> bindValue(1, $video->url);
        $statement -> bindValue(2, $video->title);
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
        $sql = "UPDATE padrao_mvc.videos SET url = :url, title = :title WHERE id = :id;";
        $statement = $this->pdo -> prepare($sql);
        $statement ->bindValue(':url', $video->url);
        $statement ->bindValue(':title', $video->title);
        $statement ->bindValue(':id', $video->id, PDO::PARAM_INT);
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

        return $video;
    }
}
