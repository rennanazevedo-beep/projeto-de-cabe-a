<?php
        require_once 'conexao.php';

    class Pessoa {
        private $nome;
        private $user;
        private $email;

        public function __construct($nome, $user, $email) {
        $this->nome = $nome;
        $this->user = $user; 
        $this->email = $email;
        }

        public function inserir() {
        try {
        $pdo = Conexao::getConexao();
        $sql = "INSERT INTO pessoa (nome, user, email) VALUES (:nome, :user, :email)";
        $stmt = $pdo->prepare($sql);

        $stmt->execute([
        ':nome' => $this->nome,
        ':user' => $this->user,
        ':email' => $this->email,
        ]);

        return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
        return false;
        }
        }
     //Metodo consultar todos
       public static function listarTodos() {
        try {
            $pdo = Conexao::getConexao();
            $sql = "SELECT * FROM pessoa";
            $stmt = $pdo->query($sql);

        //Retorna um array com todos os registros
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return[];

        }
                    
    }

    public static function deletar($id) {
        $id = filter_var($id, FILTER_VALIDATE_INT);
        if ($id === false || $id === null) {
            return false;
        }

        try {
            $pdo = Conexao::getConexao();
            $stmt = $pdo->prepare("DELETE FROM pessoa WHERE id = :id");
            $stmt->execute([':id' => $id]);

            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            return false;
        }
    }

    public static function buscarPorId($id) {
        $id = filter_var($id, FILTER_VALIDATE_INT);
        if ($id === false || $id === null) {
            return false;
        }

        try {
            $pdo = Conexao::getConexao();
            $stmt = $pdo->prepare("SELECT * FROM pessoa WHERE id = :id");
            $stmt->execute([':id' => $id]);

            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return false;
        }
    }

    public static function atualizar($id, $nome, $user, $email) {
        $id = filter_var($id, FILTER_VALIDATE_INT);
        if ($id === false || $id === null) {
            return false;
        }

        try {
            $pdo = Conexao::getConexao();
            $stmt = $pdo->prepare(
                "UPDATE pessoa SET nome = :nome, user = :user, email = :email WHERE id = :id"
            );

            return $stmt->execute([
                ':id' => $id,
                ':nome' => $nome,
                ':user' => $user,
                ':email' => $email,
            ]);
        } catch (PDOException $e) {
            return false;
        }
    }
}
?>