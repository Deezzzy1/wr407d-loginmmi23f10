<?php
try {
    
    $db = new PDO('mysql:host=localhost;dbname=chat;charset=utf8', 'root', 'PASSWORD', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);

    
    if (!$db) {
        die(json_encode(['error' => 'Impossible de se connecter à la base de données.']));
    }

    $stmt = $db->prepare("SELECT pseudo, avatar, message, created_at FROM tchat ORDER BY created_at ASC");

    // Exécution
    $stmt->execute();
    $results = $stmt->fetchAll();

    
    if (empty($results)) {
        die(json_encode(['error' => '⚠️ Aucun message trouvé.']));
    }

    $allMessages = [];
    $previousPseudo = '';
    $isLeft = false;

    // Traitement des résultats
    foreach ($results as $message) {
       
        if ($previousPseudo !== $message['pseudo']) {
            $isLeft = !$isLeft; 
        }

        $allMessages[] = [
            'pseudo' => $message['pseudo'],
            'message' => $message['message'],
            'initiale' => strtoupper($message['pseudo'][0]), 
            'avatar' => $message['avatar'] ?: 'default.png',  
            'created_at' => $message['created_at'],
            'left' => $isLeft
        ];

        $previousPseudo = $message['pseudo']; 
    }

    
    header('Content-Type: application/json');
    echo json_encode($allMessages, JSON_PRETTY_PRINT);

} catch (Exception $e) {
    echo json_encode(['error' => 'Erreur: ' . $e->getMessage()]);
}
?>
