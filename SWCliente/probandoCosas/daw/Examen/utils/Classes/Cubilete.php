<?php
require_once 'utils/Interfaces/I_ElementoQueSeTira.php';
require_once 'utils//Classes/DadoPoker.php';

class Cubilete implements I_ElementoQueSeTira
{
    private $dados = [];
    private $numDados = 1;

    // Atributo para guardar las tiradas totales
    private $tiradasTotales = 0;

    // Atributo donde guardamos la ultima tirada
    private $ultimaTirada;
    
    
    // Constructor
    public function __construct(int $numDados = 1)
    {
        $this->numDados = $numDados;
        for ($n=1; $n<=$numDados; $n++)
        {
            $this->dados[$n] = new DadoPoker();
        }
    }

    public function tira()
    {
        for ($n=1; $n<=$this->numDados; $n++)
        {
            $this->dados[$n]->tira();
            $this->ultimaTirada[$n] = $this->dados[$n]->getTirada();
        }

        // Incrementamos las tiradas totales
        $this->tiradasTotales++;
    }

    // Funcion que devuelve la ultima figura que ha salido en el dado
    public function getTirada()
    {
        return $this->ultimaTirada;
    }

    // Funcion setter para actualizar el numero de tiradas totales
    public function setTiradasTotales(int $tiradasTotales)
    {
        $this->tiradasTotales = $tiradasTotales;
    }

    // Funcion getter para recoger el numero de tiradas totales
    public function getTiradasTotales() : int
    {
        return $this->tiradasTotales;
    }
}

?>