<?php
// Connexion à la base de données
$dsn = 'mysql:host=localhost;dbname=chat;charset=utf8';
$username = 'root'; 
$password = 'PASSWORD'; 

try {
    $pdo = new PDO($dsn, $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
    echo " Connexion réussie à la base de données.<br>"; // Debug
} catch (PDOException $e) {
    die(" Erreur de connexion : " . $e->getMessage());
}


$pseudo = isset($_GET['pseudo']) ? trim($_GET['pseudo']) : null;
$message = isset($_GET['message']) ? trim($_GET['message']) : null;
$avatar = "default.png";

// Vérification des données
if ($pseudo && $message) {
    if (strlen($message) > 0 && strlen($message) <= 255) {
        try {
            $stmt = $pdo->prepare("INSERT INTO tchat (pseudo, avatar, message, created_at) VALUES (:pseudo, :avatar, :message, NOW())");
            $stmt->execute([
                ':pseudo' => htmlspecialchars($pseudo),
                ':avatar' => $avatar,
                ':message' => htmlspecialchars($message),
            ]);
            echo " Message inséré avec succès.";
        } catch (PDOException $e) {
            echo " Erreur SQL : " . $e->getMessage();
        }
    } else {
        echo "⚠️ Message invalide.";
    }
} else {
    echo "⚠️ Pseudo ou message manquant.";
}
?>
