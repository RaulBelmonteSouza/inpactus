<?php
/**
 * Created by PhpStorm.
 * User: war-machine
 * Date: 12/04/19
 * Time: 09:58
 */

require_once 'CRUD.php';
class Contato extends CRUD
{
    private $id;
    private $nome;
    private $email;
    private $telefone;
    private $assunto;
    private $mensagem;
    private $dataContato;

    protected $table = 'contato';

    public function insert()
    {
        $sql = "INSERT INTO $this->table (nome, email, telefone, assunto, mensagem, dataContato) VALUES 
        (:nome, :email, :telefone, :assunto, :mensagem, :dataContato) ";
        $stmt = Conecta::prepare($sql);
        $stmt->bindParam(':nome', $this->nome, PDO::PARAM_STR);
        $stmt->bindParam(':email', $this->email, PDO::PARAM_STR);
        $stmt->bindParam(':telefone', $this->telefone, PDO::PARAM_STR);
        $stmt->bindParam(':assunto', $this->assunto, PDO::PARAM_STR);
        $stmt->bindParam(':mensagem', $this->mensagem, PDO::PARAM_STR);
        $stmt->bindParam(':dataContato', $this->dataContato);
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
    public function getAssunto()
    {
        return $this->assunto;
    }

    /**
     * @param mixed $assunto
     */
    public function setAssunto($assunto)
    {
        $this->assunto = $assunto;
    }

    /**
     * @return mixed
     */
    public function getMensagem()
    {
        return $this->mensagem;
    }

    /**
     * @param mixed $mensagem
     */
    public function setMensagem($mensagem)
    {
        $this->mensagem = $mensagem;
    }

    /**
     * @return mixed
     */
    public function getDataContato()
    {
        return $this->dataContato;
    }

    /**
     * @param mixed $dataContatacao
     */
    public function setDataContato($dataContato)
    {
        $this->dataContato= $dataContato;
    }




}