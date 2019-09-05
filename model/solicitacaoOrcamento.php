<?php
/**
 * Created by PhpStorm.
 * User: war-machine
 * Date: 12/04/19
 * Time: 09:58
 */

require_once 'CRUD.php';
class solicitacaoOrcamento extends CRUD
{

    private $id;
    private $dataSolicitacao;
    private $nome;
    private $nomeEmpresa;
    private $email;
    private $telefone;
    private $ramo;
    private $investimento;
    private $detalhes;

    protected $table = 'solicitacaoOrcamento';

    public function insert()
    {
        $sql = "INSERT INTO $this->table (dataSolicitacao, nome, nomeEmpresa, email, telefone, ramo, investimento, detalhes) VALUES 
        (:dataSolicitacao, :nome, :nomeEmpresa, :email, :telefone, :ramo, :investimento, :detalhes) ";
        $stmt = Conecta::prepare($sql);
        $stmt->bindParam(':dataSolicitacao', $this->dataSolicitacao);
        $stmt->bindParam(':nome', $this->nome, PDO::PARAM_STR);
        $stmt->bindParam(':nomeEmpresa', $this->nomeEmpresa, PDO::PARAM_STR);
        $stmt->bindParam(':email', $this->email, PDO::PARAM_STR);
        $stmt->bindParam(':telefone', $this->telefone, PDO::PARAM_STR);
        $stmt->bindParam(':ramo', $this->ramo, PDO::PARAM_STR);
        $stmt->bindParam(':investimento', $this->investimento, PDO::PARAM_STR);
        $stmt->bindParam(':detalhes', $this->detalhes, PDO::PARAM_STR);
        return $stmt->execute();
    }

    public function update()
    {
        // TODO: Implement update() method.
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
    public function getDataSolicitacao()
    {
        return $this->dataSolicitacao;
    }

    /**
     * @param mixed $dataSolicitacao
     */
    public function setDataSolicitacao($dataSolicitacao)
    {
        $this->dataSolicitacao = $dataSolicitacao;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @return mixed
     */
    public function getNomeEmpresa()
    {
        return $this->nomeEmpresa;
    }

    /**
     * @param mixed $nomeEmpresa
     */
    public function setNomeEmpresa($nomeEmpresa)
    {
        $this->nomeEmpresa = $nomeEmpresa;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getTelefone()
    {
        return $this->telefone;
    }

    /**
     * @param mixed $telefone
     */
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }

    /**
     * @return mixed
     */
    public function getRamo()
    {
        return $this->ramo;
    }

    /**
     * @param mixed $ramo
     */
    public function setRamo($ramo)
    {
        $this->ramo = $ramo;
    }

    /**
     * @return mixed
     */
    public function getInvestimento()
    {
        return $this->investimento;
    }

    /**
     * @param mixed $investimento
     */
    public function setInvestimento($investimento)
    {
        $this->investimento = $investimento;
    }

    /**
     * @return mixed
     */
    public function getDetalhes()
    {
        return $this->detalhes;
    }

    /**
     * @param mixed $detalhes
     */
    public function setDetalhes($detalhes)
    {
        $this->detalhes = $detalhes;
    }




}