<?php
class LivrosModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function criarLivros($nome, $idade, $sexo, $email, $telefone, $endereco) {
        $sql = "INSERT INTO livros (titulo, idade, sexo, email, telefone, endereco) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$nome, $idade, $sexo, $email, $telefone, $endereco]);
    }

    public function listarLivros() {
        $sql = "SELECT * FROM isuario";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Implementar métodos para atualizar e excluir esportes
    public function atualizarLivros($id_livros, $nome, $idade, $sexo, $email, $telefone, $endereco) {
        $sql = "UPDATE livros SET nome = ?, idade = ?, sexo = ?, email = ?, telefone = ?, endereco = ? WHERE id_livros = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$nome, $idade, $sexo, $email, $telefone, $endereco, $id_livros]);
    }
    
    public function excluirlivros($id_livros) {
        $sql = "DELETE FROM livros WHERE id_livros = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id_livros]);
    }
}
?>