<?php
require 'vendor/autoload.php';

\Stripe\Stripe::setApiKey('sk_test_51QG6FEHz3dBBQK7Vnrm7dSXwd8NtmQeGrbJmd5U3E0jJrbnV1mnzHCFaYDHliw9m0nkfyQA5aVwaUbilf9pzEIUz00nRajE8LI');

// Obtener el contenido del body de la solicitud
$data = json_decode(file_get_contents('php://input'), true);

// Verificar si $data contiene datos antes de procesar
if (!empty($data)) {
    $line_items = [];
    foreach ($data as $item) {
        // Asegurarse de que cada elemento tenga los datos necesarios
        if (isset($item['name'], $item['price'], $item['quantity'])) {
            $line_items[] = [
                'price_data' => [
                    'currency' => 'brl',
                    'product_data' => [
                        'name' => $item['name'],
                    ],
                    'unit_amount' => intval($item['price'] * 100), // Stripe maneja los montos en centavos
                ],
                'quantity' => $item['quantity'],
            ];
        }
    }

    if (!empty($line_items)) {
        try {
            $session = \Stripe\Checkout\Session::create([
                'payment_method_types' => ['card'],
                'line_items' => $line_items,
                'mode' => 'payment',
                'success_url' => 'https://tusitio.com/success', // URL de éxito
                'cancel_url' => 'https://tusitio.com/cancel',   // URL de cancelación
            ]);
            echo json_encode(['id' => $session->id]);
        } catch (Exception $e) {
            echo json_encode(['error' => $e->getMessage()]);
        }
    } else {
        echo json_encode(['error' => 'No se pudieron crear los line_items.']);
    }
} else {
    echo json_encode(['error' => 'No se recibieron artículos en el carrito']);
}
?>
