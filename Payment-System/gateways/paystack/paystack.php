<?php
/**
 * Paystack Payment Gateway Integration
 * Ghana's leading payment processor
 */

class Paystack {
    private $secretKey;
    private $publicKey;
    private $baseUrl = 'https://api.paystack.co';
    
    public function __construct($secretKey = null, $publicKey = null) {
        $this->secretKey = $secretKey ?? env('PAYSTACK_SECRET_KEY');
        $this->publicKey = $publicKey ?? env('PAYSTACK_PUBLIC_KEY');
    }
    
    /**
     * Initialize payment transaction
     */
    public function initializeTransaction($data) {
        $url = $this->baseUrl . '/transaction/initialize';
        
        $fields = [
            'email' => $data['email'],
            'amount' => $data['amount'] * 100, // Convert to pesewas/kobo
            'reference' => $data['reference'] ?? $this->generateReference(),
            'callback_url' => $data['callback_url'],
            'metadata' => $data['metadata'] ?? []
        ];
        
        if (isset($data['plan'])) {
            $fields['plan'] = $data['plan'];
        }
        
        $response = $this->makeRequest('POST', $url, $fields);
        
        return $response;
    }
    
    /**
     * Verify transaction
     */
    public function verifyTransaction($reference) {
        $url = $this->baseUrl . '/transaction/verify/' . $reference;
        return $this->makeRequest('GET', $url);
    }
    
    /**
     * Create payment plan for installments
     */
    public function createPlan($data) {
        $url = $this->baseUrl . '/plan';
        
        $fields = [
            'name' => $data['name'],
            'amount' => $data['amount'] * 100,
            'interval' => $data['interval'], // monthly, quarterly, annually
            'description' => $data['description'] ?? '',
            'currency' => $data['currency'] ?? 'GHS'
        ];
        
        return $this->makeRequest('POST', $url, $fields);
    }
    
    /**
     * Subscribe customer to plan
     */
    public function createSubscription($data) {
        $url = $this->baseUrl . '/subscription';
        
        $fields = [
            'customer' => $data['customer'],
            'plan' => $data['plan'],
            'authorization' => $data['authorization']
        ];
        
        return $this->makeRequest('POST', $url, $fields);
    }
    
    /**
     * Create customer
     */
    public function createCustomer($data) {
        $url = $this->baseUrl . '/customer';
        
        $fields = [
            'email' => $data['email'],
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'phone' => $data['phone'] ?? ''
        ];
        
        return $this->makeRequest('POST', $url, $fields);
    }
    
    /**
     * Get transaction details
     */
    public function getTransaction($id) {
        $url = $this->baseUrl . '/transaction/' . $id;
        return $this->makeRequest('GET', $url);
    }
    
    /**
     * List transactions
     */
    public function listTransactions($params = []) {
        $url = $this->baseUrl . '/transaction';
        
        if (!empty($params)) {
            $url .= '?' . http_build_query($params);
        }
        
        return $this->makeRequest('GET', $url);
    }
    
    /**
     * Refund transaction
     */
    public function refundTransaction($reference, $amount = null) {
        $url = $this->baseUrl . '/refund';
        
        $fields = [
            'transaction' => $reference
        ];
        
        if ($amount) {
            $fields['amount'] = $amount * 100;
        }
        
        return $this->makeRequest('POST', $url, $fields);
    }
    
    /**
     * Generate unique reference
     */
    private function generateReference() {
        return 'TW_' . time() . '_' . bin2hex(random_bytes(8));
    }
    
    /**
     * Make HTTP request to Paystack API
     */
    private function makeRequest($method, $url, $data = []) {
        $ch = curl_init();
        
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $this->secretKey,
            'Content-Type: application/json',
            'Cache-Control: no-cache'
        ]);
        
        if ($method === 'POST') {
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        }
        
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        
        if (curl_errno($ch)) {
            $error = curl_error($ch);
            curl_close($ch);
            throw new Exception('Curl error: ' . $error);
        }
        
        curl_close($ch);
        
        $result = json_decode($response, true);
        
        if ($httpCode !== 200 && $httpCode !== 201) {
            throw new Exception($result['message'] ?? 'Payment request failed');
        }
        
        return $result;
    }
    
    /**
     * Get public key
     */
    public function getPublicKey() {
        return $this->publicKey;
    }
}
