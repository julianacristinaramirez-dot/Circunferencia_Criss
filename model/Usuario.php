<?php
declare(strict_types=1);

require_once __DIR__ . '/../config/Database.php';

class Usuario
{
    private PDO $pdo;

    public function __construct()
    {
        $database = new Database();
        $this->pdo = $database->conectar();
    }

    public function login(string $correo, string $clave): ?array
    {
        $sql = "SELECT * FROM usuario WHERE correo = :correo LIMIT 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['correo' => $correo]);
        $usuario = $stmt->fetch();

        if (!$usuario) {
            return null;
        }

        // NOTA: en producción solo se debe usar password_verify().
        // Se mantiene la comparación directa para compatibilidad con la clave inicial.
        if ($clave === $usuario['clave'] || password_verify($clave, $usuario['clave'])) {
            return $usuario;
        }

        return null;
    }
}