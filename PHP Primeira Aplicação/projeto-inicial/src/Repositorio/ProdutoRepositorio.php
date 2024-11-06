<?php

class ProdutoRepositorio{
    //Atributo
    private PDO $pdo;
    //Construtor
    public function __construct(PDO $pdo){
        $this -> pdo = $pdo;
    }
    //Métodos
    public function opcoesAlmoco():array{
        $sql2 = "SELECT * FROM php_primeira_aplicacao.serenatto WHERE tipo = 'Almoço' ORDER BY preco"; 
        //a variável statement recebe o retorno do método query() da variável $pdo
        $statement2 = $this-> pdo -> query($sql2);
        $produtosAlmoco = $statement2->fetchAll(mode:PDO::FETCH_ASSOC);

        //transformando $produtosAlmoco em array de objetos:
        $dadosAlmoco = array_map(function($almoco){
        return new Produto($almoco['id'],
        $almoco['tipo'],
        $almoco['nome'],
        $almoco['descricao'],
        $almoco['preco'],
        $almoco['imagem']
        );
        }, $produtosAlmoco);

        return $dadosAlmoco;
    }

    public function formarObjeto($objeto){
        return new Produto($objeto['id'],
            $objeto['tipo'],
            $objeto['nome'],
            $objeto['descricao'],
            $objeto['preco'],
            $objeto['imagem'],);
    }


    public function buscarTodos(){
        $sql = "SELECT * FROM php_primeira_aplicacao.serenatto ORDER BY preco";
        $statement = $this -> pdo -> query($sql);
        $dados = $statement-> fetchAll(mode: PDO:: FETCH_ASSOC);

        $todosOsDados = array_map(function($produto){
            return $this->formarObjeto($produto);
        }, $dados);
        return $todosOsDados;
    }


    public function deletar(int $id){
        $sql = "DELETE FROM php_primeira_aplicacao.serenatto WHERE id = ?";
        $statement = $this-> pdo->prepare($sql);
        //$statement->bindValue(param: 1, $id);
        $statement -> bindValue(1, $id);
        $statement -> execute();
    }

    
    public function salvar(Produto $produto){
        $sql = "INSERT INTO php_primeira_aplicacao.serenatto (tipo, nome, descricao, preco, imagem) VALUES (?,?,?,?,?)";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $produto->getTipo());
        $statement->bindValue(2, $produto->getNome());
        $statement->bindValue(3, $produto->getDescricao());
        $statement->bindValue(4, $produto->getPreco());
        $statement->bindValue(5, $produto->getPreco());
        $statement->execute();
    }

    public function buscar(int $id){
        $sql = "SELECT * FROM php_primeira_aplicacao.serenatto WHERE id = ?";
        $statement = $this-> pdo->prepare($sql);
        $statement->bindValue(1, $id);
        $statement->execute();
        $dados = $statement->fetch(PDO::FETCH_ASSOC);

        return $this->formarObjeto($dados);
    }

    public function atualizar(Produto $produto){
        $sql = "UPDATE php_primeira_aplicacao.serenatto SET tipo = ?, nome = ?, descricao = ?, preco = ? WHERE id = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $produto->getTipo());
        $statement->bindValue(2, $produto->getNome());
        $statement->bindValue(3, $produto->getDescricao());
        $statement->bindValue(4, $produto->getPreco());
        $statement->bindValue(6, $produto->getId());
        $statement->execute();

        if($produto->getImagem() !== 'logo-serenatto.png'){
            $this->atualizarFoto($produto);
        }
    }

    private function atualizarFoto(Produto $produto){
        $sql = "UPDATE produtos SET imagem = ? WHERE id = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $produto->getImagem());
        $statement->bindValue(2, $produto->getId());
        $statement->execute();
    }

}

?>