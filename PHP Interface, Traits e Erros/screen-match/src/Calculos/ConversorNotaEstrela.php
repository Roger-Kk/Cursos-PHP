<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> f6dfb45e1ddd5e2943da6bfa1bb5ffe7337cf758
<?php

namespace ScreenMatch\Calculos;

use ScreenMatch\Modelo\Avaliavel;
use ArgumentCountError;
use DivisionByZeroError;
use Throwable;
//É possível dar um apelido para o diretório do arquivo:
//use ScreenMatch\Modelo\Avaliavel as AvaliavelTrait;

class ConversorNotaEstrela
{
    public function converte(Avaliavel $avaliavel): float{

    //Tratamento de Erros: 
    try{
        $nota = $avaliavel->media();

        //Realiza a conversão
        return  round($nota) / 2;
        } catch(DivisionByZeroError){
            return 0;
        }catch(ArgumentCountError $e){
            echo $e->getMessage();
            return 0;
        } catch(Throwable){
            return 0;
        }
    }
    //Try{ }catch(){}: se dentro do try, acontecer um erro do tipo DivisionByZeroError, executa a ação do catch
    //OU se tiver um erro do tipo ArgumntCountError, exibe a mensagem de erro e retorna 0
    //Ou qualquer que seja o erro, retorne 0;
<<<<<<< HEAD
=======
=======
<?php

namespace ScreenMatch\Calculos;

use ScreenMatch\Modelo\Avaliavel;
use ArgumentCountError;
use DivisionByZeroError;
use Throwable;
//É possível dar um apelido para o diretório do arquivo:
//use ScreenMatch\Modelo\Avaliavel as AvaliavelTrait;

class ConversorNotaEstrela
{
    public function converte(Avaliavel $avaliavel): float{

    //Tratamento de Erros: 
    try{
        $nota = $avaliavel->media();

        //Realiza a conversão
        return  round($nota) / 2;
        } catch(DivisionByZeroError){
            return 0;
        }catch(ArgumentCountError $e){
            echo $e->getMessage();
            return 0;
        } catch(Throwable){
            return 0;
        }
    }
    //Try{ }catch(){}: se dentro do try, acontecer um erro do tipo DivisionByZeroError, executa a ação do catch
    //OU se tiver um erro do tipo ArgumntCountError, exibe a mensagem de erro e retorna 0
    //Ou qualquer que seja o erro, retorne 0;
>>>>>>> 4c73aa89cb67170655448abad4c1ae066a9026ca
>>>>>>> f6dfb45e1ddd5e2943da6bfa1bb5ffe7337cf758
}