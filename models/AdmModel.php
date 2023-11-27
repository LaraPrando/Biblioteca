<?php
class AdmModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function criarAdm($nome, $email, $telefone, $senha) {
        $sql = "INSERT INTO adm (nome, email, telefone, senha) VALUES (?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$nome, $email, $telefone, $senha]);
    }

    public function listarAdm() {
        $sql = "SELECT * FROM isuario";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Implementar métodos para atualizar e excluir esportes
    public function atualizarAdm($id_adm, $nome, $email, $telefone, $senha) {
        $sql = "UPDATE adm SET nome = ?, email = ?, telefone = ?, senha = ? WHERE id_adm = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$nome, $email, $telefone, $senha, $id_adm]);
    }
    
    public function excluiradm($id_adm) {
        $sql = "DELETE FROM adm WHERE id_adm = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id_adm]);
    }
}
?>