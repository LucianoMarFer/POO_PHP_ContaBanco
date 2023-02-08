<?php


class ContaBanco {
    //ATRIBUTOS
    public $numConta;
    protected $tipo;
    private $dono;
    private $saldo;
    private $status;
    
    //MÉTODOS
    
    public function __construct() {
        $this->setSaldo(0);
        $this->setStatus(false);
        //echo '<p>Conta criada com sucesso!</p> ';
    }
    
    public function getNumConta() {
        return $this->numConta;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function getDono() {
        return $this->dono;
    }

    public function getSaldo() {
        return $this->saldo;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setNumConta($numConta): void {
        $this->numConta = $numConta;
    }

    public function setTipo($tipo): void {
        $this->tipo = $tipo;
    }

    public function setDono($dono): void {
        $this->dono = $dono;
    }

    public function setSaldo($saldo): void {
        $this->saldo = $saldo;
    }

    public function setStatus($status): void {
        $this->status = $status;
    }

        
    public function abrirConta($t){
        $this->setTipo($t);
        $this->setStatus(true);
        if($t == "CC"){
            $this->setSaldo(50);
        }else if($t == "CP"){
            $this->setSaldo(150);
        }        
    }
    public function fecharConta(){
        if($this->getSaldo()> 0){
            echo '<p>Conta com saldo positivo; não posso fechá-la!</p>';
        }elseif($this->getSaldo() < 0){
            echo '<p>Conta com saldo negativo; não posso fechá-la!</p>';
        }else{
            $this->setStatus(false);
        }        
    }
    public function depositar($v){
        if($this->getStatus() == true){
            $this->setSaldo($this->getSaldo() + $v);
            echo "Depósito de ". $v." reais na conta de ". $this->getDono()." .";
        }else{
            echo '<p>Conta fechada; não consigo depositar!</p>';
        }        
    }
    public function sacar($v){
        if($this->getStatus() == true){
            if($this->getSaldo() >= $v){
                $this->setSaldo($this->getSaldo() - $v);
                echo "<p>Saque de {$v} reais autorizado na conta de {$this->getDono()}</p>";
            }else{
                echo '<p>Saldo insuficiente para saque! </p>';
            }
        }else{
            echo '<p>Conta inexistente. Impossível sacar!</p> ';
        }
    }
    public function pagarMensal(){
        if($this->getTipo() == "CC"){
            $v = 12;
        }else if($this->getTipo() == "CP"){
            $v = 20;
        }
        if($this->getStatus()){
            $this->setSaldo($this->getSaldo() - $v);
            echo "<p>Mensalidade de R$ $v debitada na conta de ".$this->getDono()."</p>";
        }else{
            echo '<p>Problemas com a conta. Não posso cobrar!</p>';
        }
        
    }
}
