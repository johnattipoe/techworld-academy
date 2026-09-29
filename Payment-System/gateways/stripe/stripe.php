<?php
/**
 * Stripe Payment Gateway Integration
 * International payment processor
 */

class Stripe {
    private $secretKey;
    private $publicKey;
    private $baseUrl = 'https://api.stripe.com/v1';
    
    public function __construct($secretKey = null, $publicKey = null) {
        $this->secretKey = $secretKey ?? env('STRIPE_SECRET_KEY');
        $this->publicKey = $publicKey ?? env('STRIPE_PUBLIC_KEY');
    }
    
    /**
     * Create payment intent
     */
    public function createPaymentIntent($data) {
        $url = $this->baseUrl . '/payment_intents';
        
        $fields = [
            'amount' => $data['amount'] * 100, // Convert to cents
            'currency' => $data['currency'] ?? 'usd',
            'description' => $data['description'] ?? '',
            'metadata' => $data['metadata'] ?? [],
            'receipt_email' => $data['email'] ?? null
        ];
        
        if (isset($data['customer'])) {
            $fields['customer'] = $data['customer'];
        }
        
        return $this->makeRequest('POST', $url, $fields);
    }
    
    /**
     * Retrieve payment intent
     */
    public function retrievePaymentIntent($id) {
        $url = $this->baseUrl . '/payment_intents/' . $id;
        return $this->makeRequest('GET', $url);
    }
    
    /**
     * Create customer
     */
    public function createCustomer($data) {
        $url = $this->baseUrl . '/customers';
        
        $fields = [
            'email' => $data['email'],
            'name' => $data['name'],
            'phone' => $data['phone'] ?? '',
            'metadata' => $data['metadata'] ?? []
        ];
        
        return $this->makeRequest('POST', $url, $fields);
    }
    
    /**
     * Create subscription
     */
    public function createSubscription($data) {
        $url = $this->baseUrl . '/subscriptions';
        
        $fields = [
            'customer' => $data['customer'],
            'items' => [
                ['price' => $data['price']]
            ],
            'metadata' => $data['metadata'] ?? []
        ];
        
        if (isset($data['trial_period_days'])) {
            $fields['trial_period_days'] = $data['trial_period_days'];
        }
        
        return $this->makeRequest('POST', $url, $fields);
    }
    
    /**
     * Create price for subscription
     */
    public function createPrice($data) {
        $url = $this->baseUrl . '/prices';
        
        $fields = [
            'unit_amount' => $data['amount'] * 100,
            'currency' => $data['currency'] ?? 'usd',
            'recurring' => [
                'interval' => $data['interval'] ?? 'month'
            ],
            'product_data' => [
                'name' => $data['name']
            ]
        ];
        
        return $this->makeRequest('POST', $url, $fields);
    }
    
    /**
     * Create invoice
     */
    public function createInvoice($data) {
        $url = $this->baseUrl . '/invoices';
        
        $fields = [
            'customer' => $data['customer'],
            'description' => $data['description'] ?? '',
            'metadata' => $data['metadata'] ?? []
        ];
        
        return $this->makeRequest('POST', $url, $fields);
    }
    
    /**
     * Retrieve charge
     */
    public function retrieveCharge($id) {
        $url = $this->baseUrl . '/charges/' . $id;
        return $this->makeRequest('GET', $url);
    }
    
    /**
     * Create refund
     */
    public function createRefund($chargeId, $amount = null) {
        $url = $this->baseUrl . '/refunds';
        
        $fields = [
            'charge' => $chargeId
        ];
        
        if ($amount) {
            $fields['amount'] = $amount * 100;
        }
        
        return $this->makeRequest('POST', $url, $fields);
    }
    
    /**
     * List all charges
     */
    public function listCharges($params = []) {
        $url = $this->baseUrl . '/charges';
        
        if (!empty($params)) {
            $url .= '?' . http_build_query($params);
        }
        
        return $this->makeRequest('GET', $url);
    }
    
    /**
     * Make HTTP request to Stripe API
     */
    private function makeRequest($method, $url, $data = []) {
        $ch = curl_init();
        
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERPWD, $this->secretKey . ':');
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/x-www-form-urlencoded'
        ]);
        
        if ($method === 'POST') {
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
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
            throw new Exception($result['error']['message'] ?? 'Payment request failed');
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
