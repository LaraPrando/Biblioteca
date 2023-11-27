<?php
class UsuarioModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function criarUsuario($nome, $idade, $sexo, $email, $telefone, $endereco) {
        $sql = "INSERT INTO usuario (nome, idade, sexo, email, telefone, endereco) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$nome, $idade, $sexo, $email, $telefone, $endereco]);
    }

    public function listarUsuario() {
        $sql = "SELECT * FROM isuario";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Implementar métodos para atualizar e excluir esportes
    public function atualizarUsuario($id_usuario, $nome, $idade, $sexo, $email, $telefone, $endereco) {
        $sql = "UPDATE usuario SET nome = ?, idade = ?, sexo = ?, email = ?, telefone = ?, endereco = ? WHERE id_usuario = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$nome, $idade, $sexo, $email, $telefone, $endereco, $id_usuario]);
    }
    
    public function excluirusuario($id_usuario) {
        $sql = "DELETE FROM usuario WHERE id_usuario = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id_usuario]);
    }
}
?>