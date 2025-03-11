<?php
require_once __DIR__ . '/inicio-html.php';

/** @var \Alura\MVC\Entity\Video[] $videoList */
    
    ?>
    <ul class="videos__container" alt="videos alura">
        <?php foreach($videoList as $video): ?>
        <li class="videos__item">
            <?php if($video->getFilePath() != null): ?>
                <a href="<?= $video->url?>">
                    <img src="/img/uploads/<?= $video->getFilePath(); ?>" alt="" style="width: 100%"/>
                </a>
            <?php else: ?>
            <!-- Ao invés de exibir um array $video, no padrão MVC vai exibir a propriedade-->
            <!--<iframe width="100%" height="72%" src= <?php //echo $video['url']; ?>-->
            <iframe width="100%" height="72%" src= "<?= $video->url; ?>"
                title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen></iframe>
            <?php endif; ?>
            <div class="descricao-video">
                <!--<img src="./img/logo.png" alt="logo canal alura">-->
                <!--<h3><?php //echo $video['title']; ?></h3>-->
                <h3><?= $video->title; ?></h3>
                <div class="acoes-video">
                    <!-- <a href="./editar-video?id=<?php //echo $video['id'];?>">Editar</a>
                    <a href="./remover-video?id=<?php //echo $video['id']; ?>">Excluir</a> -->
                    <a href="/editar-video?id=<?= $video->id;?>">Editar</a>
                    <a href="/remover-video?id=<?= $video->id;?>">Excluir</a>
                </div>
            </div>
        </li>
         <?php endforeach; ?>
    </ul>
    <?php require_once __DIR__.'/fim-html.php';