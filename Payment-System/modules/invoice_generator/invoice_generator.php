<?php
/**
 * Invoice Generator
 * Generates PDF invoices for payments
 */

require_once(dirname(__DIR__, 3) . '/fpdf/fpdf/fpdf.php');

class InvoiceGenerator {
    private PDO $db;
    private array $companyInfo;
    
    public function __construct(PDO $db) {
        $this->db = $db;
        $this->companyInfo = [
            'name' => 'TecWorld Academy',
            'address' => 'Accra, Ghana',
            'phone' => '+233 55 123 4567',
            'email' => 'info@tecworldacademy.edu',
            'website' => 'www.tecworldacademy.edu',
            'logo' => __DIR__ . '/../../assets/logo/logo.png'
        ];
    }
    
    /**
     * Generate invoice for payment
     */
    public function generateInvoice(int|string $paymentId, string $outputType = 'download') {
        $payment = $this->getPaymentDetails($paymentId);
        
        if (!$payment) {
            throw new Exception('Payment not found');
        }
        
        $pdf = new FPDF('P', 'mm', 'A4');
        $pdf->AddPage();
        
        // Header
        $this->addHeader($pdf);
        
        // Invoice details
        $this->addInvoiceDetails($pdf, $payment);
        
        // Customer details
        $this->addCustomerDetails($pdf, $payment);
        
        // Items table
        $this->addItemsTable($pdf, $payment);
        
        // Totals
        $this->addTotals($pdf, $payment);
        
        // Footer
        $this->addFooter($pdf, $payment);
        
        // Output
        $filename = 'invoice_' . $payment['invoice_number'] . '.pdf';
        
        if ($outputType === 'download') {
            $pdf->Output('D', $filename);
        } elseif ($outputType === 'save') {
            $path = __DIR__ . '/../invoices/' . $filename;
            $pdf->Output('F', $path);
            return $path;
        } else {
            $pdf->Output('I', $filename);
        }
    }
    
    /**
     * Add header to invoice
     */
    private function addHeader(FPDF $pdf) {
        // Logo
        if (file_exists($this->companyInfo['logo'])) {
            $pdf->Image($this->companyInfo['logo'], 10, 10, 30);
        }
        
        // Company info
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(0, 10, $this->companyInfo['name'], 0, 1, 'R');
        
        $pdf->SetFont('Arial', '', 9);
        $pdf->Cell(0, 5, $this->companyInfo['address'], 0, 1, 'R');
        $pdf->Cell(0, 5, 'Phone: ' . $this->companyInfo['phone'], 0, 1, 'R');
        $pdf->Cell(0, 5, 'Email: ' . $this->companyInfo['email'], 0, 1, 'R');
        
        $pdf->Ln(10);
        
        // Invoice title
        $pdf->SetFont('Arial', 'B', 20);
        $pdf->SetTextColor(33, 110, 253);
        $pdf->Cell(0, 10, 'INVOICE', 0, 1, 'C');
        $pdf->SetTextColor(0, 0, 0);
        
        $pdf->Ln(5);
    }
    
    /**
     * Add invoice details
     */
    private function addInvoiceDetails(FPDF $pdf, array $payment) {
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(40, 6, 'Invoice Number:', 0, 0);
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(0, 6, $payment['invoice_number'], 0, 1);
        
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(40, 6, 'Date:', 0, 0);
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(0, 6, date('F d, Y', strtotime($payment['created_at'])), 0, 1);
        
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(40, 6, 'Payment Status:', 0, 0);
        $pdf->SetFont('Arial', '', 10);
        $pdf->SetTextColor(0, 128, 0);
        $pdf->Cell(0, 6, strtoupper($payment['status']), 0, 1);
        $pdf->SetTextColor(0, 0, 0);
        
        $pdf->Ln(5);
    }
    
    /**
     * Add customer details
     */
    private function addCustomerDetails(FPDF $pdf, array $payment) {
        $pdf->SetFont('Arial', 'B', 11);
        $pdf->Cell(0, 6, 'Bill To:', 0, 1);
        
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(0, 6, $payment['customer_name'], 0, 1);
        $pdf->Cell(0, 6, $payment['customer_email'], 0, 1);
        
        if (!empty($payment['customer_phone'])) {
            $pdf->Cell(0, 6, $payment['customer_phone'], 0, 1);
        }
        
        $pdf->Ln(8);
    }
    
    /**
     * Add items table
     */
    private function addItemsTable(FPDF $pdf, array $payment) {
        // Table header
        $pdf->SetFillColor(33, 110, 253);
        $pdf->SetTextColor(255, 255, 255);
        $pdf->SetFont('Arial', 'B', 10);
        
        $pdf->Cell(100, 8, 'Description', 1, 0, 'L', true);
        $pdf->Cell(30, 8, 'Quantity', 1, 0, 'C', true);
        $pdf->Cell(30, 8, 'Unit Price', 1, 0, 'R', true);
        $pdf->Cell(30, 8, 'Total', 1, 1, 'R', true);
        
        // Table content
        $pdf->SetTextColor(0, 0, 0);
        $pdf->SetFont('Arial', '', 10);
        
        $items = json_decode($payment['items'], true);
        
        foreach ($items as $item) {
            $pdf->Cell(100, 7, $item['description'], 1, 0, 'L');
            $pdf->Cell(30, 7, $item['quantity'], 1, 0, 'C');
            $pdf->Cell(30, 7, $this->formatCurrency($item['unit_price'], $payment['currency']), 1, 0, 'R');
            $pdf->Cell(30, 7, $this->formatCurrency($item['total'], $payment['currency']), 1, 1, 'R');
        }
        
        $pdf->Ln(3);
    }
    
    /**
     * Add totals section
     */
    private function addTotals(FPDF $pdf, array $payment) {
        $pdf->SetFont('Arial', 'B', 10);
        
        // Subtotal
        $pdf->Cell(160, 6, 'Subtotal:', 0, 0, 'R');
        $pdf->Cell(30, 6, $this->formatCurrency($payment['subtotal'], $payment['currency']), 0, 1, 'R');
        
        // Discount (if any)
        if ($payment['discount'] > 0) {
            $pdf->SetTextColor(0, 128, 0);
            $pdf->Cell(160, 6, 'Discount:', 0, 0, 'R');
            $pdf->Cell(30, 6, '- ' . $this->formatCurrency($payment['discount'], $payment['currency']), 0, 1, 'R');
            $pdf->SetTextColor(0, 0, 0);
        }
        
        // Tax (if any)
        if ($payment['tax'] > 0) {
            $pdf->Cell(160, 6, 'Tax:', 0, 0, 'R');
            $pdf->Cell(30, 6, $this->formatCurrency($payment['tax'], $payment['currency']), 0, 1, 'R');
        }
        
        // Total
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->SetFillColor(33, 110, 253);
        $pdf->SetTextColor(255, 255, 255);
        $pdf->Cell(160, 8, 'TOTAL:', 1, 0, 'R', true);
        $pdf->Cell(30, 8, $this->formatCurrency($payment['total_amount'], $payment['currency']), 1, 1, 'R', true);
        
        $pdf->SetTextColor(0, 0, 0);
        $pdf->Ln(5);
    }
    
    /**
     * Add footer
     */
    private function addFooter(FPDF $pdf, array $payment) {
        $pdf->SetFont('Arial', 'I', 9);
        $pdf->SetTextColor(128, 128, 128);
        
        if ($payment['status'] === 'paid') {
            $pdf->Cell(0, 5, 'Payment received on ' . date('F d, Y', strtotime($payment['paid_at'])), 0, 1, 'C');
            $pdf->Cell(0, 5, 'Payment Reference: ' . $payment['payment_reference'], 0, 1, 'C');
        }
        
        $pdf->Ln(10);
        $pdf->Cell(0, 5, 'Thank you for your business!', 0, 1, 'C');
        
        // Terms
        $pdf->Ln(5);
        $pdf->SetFont('Arial', '', 8);
        $pdf->MultiCell(0, 4, 'Terms & Conditions: Payment is due within 30 days. Late payments may incur additional charges. For any queries regarding this invoice, please contact us at ' . $this->companyInfo['email'], 0, 'C');
    }
    
    /**
     * Get payment details from database
     */
    private function getPaymentDetails(int|string $paymentId) {
        $sql = "SELECT p.*, u.name as customer_name, u.email as customer_email, u.phone as customer_phone
                FROM payments p
                JOIN users u ON p.user_id = u.id
                WHERE p.id = :id";
        
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $paymentId]);
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    /**
     * Format currency
     */
    private function formatCurrency(int|float|string $amount, string $currency = 'GHS') {
        $symbols = [
            'GHS' => '₵',
            'USD' => '$',
            'EUR' => '€',
            'GBP' => '£'
        ];
        
        $symbol = $symbols[$currency] ?? $currency . ' ';
        
        return $symbol . number_format($amount, 2);
    }
    
    /**
     * Generate invoice number
     */
    public static function generateInvoiceNumber() {
        return 'INV-' . date('Ymd') . '-' . strtoupper(bin2hex(random_bytes(4)));
    }
    
    /**
     * Send invoice via email
     */
    public function emailInvoice(int|string $paymentId, string $recipientEmail) {
        // Generate invoice and save
        $invoicePath = $this->generateInvoice($paymentId, 'save');
        
        // Send email with attachment
        // Implementation depends on your email system (PHPMailer, etc.)
        
        return true;
    }
}
