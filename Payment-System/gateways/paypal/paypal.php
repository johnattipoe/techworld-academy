<?php
/**
 * PayPal Payment Gateway Integration
 * Global payment processor
 */

class PayPal {
    private $clientId;
    private $clientSecret;
    private $mode;
    private $baseUrl;
    
    public function __construct($clientId = null, $clientSecret = null, $mode = 'sandbox') {
        $this->clientId = $clientId ?? env('PAYPAL_CLIENT_ID');
        $this->clientSecret = $clientSecret ?? env('PAYPAL_SECRET');
        $this->mode = env('PAYMENT_MODE', $mode);
        
        $this->baseUrl = $this->mode === 'live' 
            ? 'https://api-m.paypal.com' 
            : 'https://api-m.sandbox.paypal.com';
    }
    
    /**
     * Get access token
     */
    private function getAccessToken() {
        $url = $this->baseUrl . '/v1/oauth2/token';
        
        $ch = curl_init();
        
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERPWD, $this->clientId . ':' . $this->clientSecret);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, 'grant_type=client_credentials');
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Accept: application/json',
            'Accept-Language: en_US'
        ]);
        
        $response = curl_exec($ch);
        curl_close($ch);
        
        $result = json_decode($response, true);
        return $result['access_token'] ?? null;
    }
    
    /**
     * Create order
     */
    public function createOrder($data) {
        $url = $this->baseUrl . '/v2/checkout/orders';
        $token = $this->getAccessToken();
        
        $orderData = [
            'intent' => 'CAPTURE',
            'purchase_units' => [
                [
                    'reference_id' => $data['reference'] ?? uniqid('TW_'),
                    'description' => $data['description'] ?? '',
                    'amount' => [
                        'currency_code' => $data['currency'] ?? 'USD',
                        'value' => number_format($data['amount'], 2, '.', '')
                    ]
                ]
            ],
            'application_context' => [
                'return_url' => $data['return_url'],
                'cancel_url' => $data['cancel_url'],
                'brand_name' => 'TecWorld Academy',
                'user_action' => 'PAY_NOW'
            ]
        ];
        
        return $this->makeRequest('POST', $url, $orderData, $token);
    }
    
    /**
     * Capture payment
     */
    public function capturePayment($orderId) {
        $url = $this->baseUrl . '/v2/checkout/orders/' . $orderId . '/capture';
        $token = $this->getAccessToken();
        
        return $this->makeRequest('POST', $url, [], $token);
    }
    
    /**
     * Get order details
     */
    public function getOrder($orderId) {
        $url = $this->baseUrl . '/v2/checkout/orders/' . $orderId;
        $token = $this->getAccessToken();
        
        return $this->makeRequest('GET', $url, [], $token);
    }
    
    /**
     * Create subscription plan
     */
    public function createPlan($data) {
        $url = $this->baseUrl . '/v1/billing/plans';
        $token = $this->getAccessToken();
        
        $planData = [
            'product_id' => $data['product_id'],
            'name' => $data['name'],
            'description' => $data['description'] ?? '',
            'billing_cycles' => [
                [
                    'frequency' => [
                        'interval_unit' => strtoupper($data['interval'] ?? 'MONTH'),
                        'interval_count' => 1
                    ],
                    'tenure_type' => 'REGULAR',
                    'sequence' => 1,
                    'total_cycles' => $data['total_cycles'] ?? 0,
                    'pricing_scheme' => [
                        'fixed_price' => [
                            'value' => $data['amount'],
                            'currency_code' => $data['currency'] ?? 'USD'
                        ]
                    ]
                ]
            ],
            'payment_preferences' => [
                'auto_bill_outstanding' => true,
                'setup_fee_failure_action' => 'CONTINUE',
                'payment_failure_threshold' => 3
            ]
        ];
        
        return $this->makeRequest('POST', $url, $planData, $token);
    }
    
    /**
     * Create subscription
     */
    public function createSubscription($data) {
        $url = $this->baseUrl . '/v1/billing/subscriptions';
        $token = $this->getAccessToken();
        
        $subscriptionData = [
            'plan_id' => $data['plan_id'],
            'subscriber' => [
                'name' => [
                    'given_name' => $data['first_name'],
                    'surname' => $data['last_name']
                ],
                'email_address' => $data['email']
            ],
            'application_context' => [
                'return_url' => $data['return_url'],
                'cancel_url' => $data['cancel_url']
            ]
        ];
        
        return $this->makeRequest('POST', $url, $subscriptionData, $token);
    }
    
    /**
     * Refund capture
     */
    public function refundCapture($captureId, $amount = null) {
        $url = $this->baseUrl . '/v2/payments/captures/' . $captureId . '/refund';
        $token = $this->getAccessToken();
        
        $refundData = [];
        if ($amount) {
            $refundData['amount'] = [
                'value' => number_format($amount, 2, '.', ''),
                'currency_code' => 'USD'
            ];
        }
        
        return $this->makeRequest('POST', $url, $refundData, $token);
    }
    
    /**
     * Make HTTP request to PayPal API
     */
    private function makeRequest($method, $url, $data = [], $token = null) {
        $ch = curl_init();
        
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        $headers = [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $token
        ];
        
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        
        if ($method === 'POST') {
            curl_setopt($ch, CURLOPT_POST, true);
            if (!empty($data)) {
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
            }
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
        
        if ($httpCode < 200 || $httpCode >= 300) {
            throw new Exception($result['message'] ?? 'Payment request failed');
        }
        
        return $result;
    }
}
