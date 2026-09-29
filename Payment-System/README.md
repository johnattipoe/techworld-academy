# 💳 Complete Payment System Documentation

## TecWorld Academy Payment Integration

A comprehensive payment solution supporting multiple gateways, installment plans, scholarships, and automated invoice generation.

---

## 📁 Directory Structure

```
Payment-System/
├── gateways/
│   ├── paystack.php          # Paystack integration
│   ├── stripe.php            # Stripe integration
│   └── paypal.php            # PayPal integration
├── modules/
│   ├── payment_manager.php   # Main payment coordinator
│   ├── installment_manager.php  # Installment plans
│   ├── scholarship_manager.php  # Scholarship system
│   └── invoice_generator.php    # PDF invoices
├── config/
│   ├── database.php          # Database connection
│   └── payment_config.php    # Payment configuration
├── database/
│   └── schema.sql            # Complete database schema
├── examples/
│   ├── course-payment.php    # Payment implementation
│   ├── payment-callback.php  # Callback handler
│   └── scholarship-application.php  # Scholarship form
└── README.md                 # This file
```

---

## 🚀 Quick Start

### 1. **Database Setup**

```bash
# Import the database schema
mysql -u root -p techworld_db < database/schema.sql
```

### 2. **Configure Environment**

Add to your `.env` file:

```env
# Payment Gateways
PAYSTACK_SECRET_KEY=sk_test_xxxxx
PAYSTACK_PUBLIC_KEY=pk_test_xxxxx

STRIPE_SECRET_KEY=sk_test_xxxxx
STRIPE_PUBLIC_KEY=pk_test_xxxxx

PAYPAL_CLIENT_ID=xxxxx
PAYPAL_SECRET=xxxxx

# Payment Settings
DEFAULT_PAYMENT_GATEWAY=paystack
PAYMENT_CURRENCY=GHS
PAYMENT_MODE=sandbox
```

### 3. **Basic Usage**

```php
require_once 'Payment-System/config/payment_config.php';
require_once 'Payment-System/config/database.php';
require_once 'Payment-System/modules/payment_manager.php';

$db = PaymentDB::getInstance()->getConnection();
$paymentManager = new PaymentManager($db);

// Process payment
$result = $paymentManager->processCoursePayment([
    'user_id' => 1,
    'course_id' => 1,
    'amount' => 1500,
    'email' => 'student@example.com',
    'currency' => 'GHS',
    'callback_url' => 'https://yoursite.com/payment/callback',
]);

if ($result['success']) {
    header('Location: ' . $result['authorization_url']);
}
```

---

## 💡 Features

### 1. **Multiple Payment Gateways**

✅ **Paystack** - Ghana & Africa  
✅ **Stripe** - International  
✅ **PayPal** - Global  

**Switch gateways easily:**
```php
$paymentManager->setGateway('stripe');  // or 'paystack' or 'paypal'
```

### 2. **Installment Plans**

Create flexible payment plans:

```php
$installmentManager = new InstallmentManager($db);

$installmentManager->createPlan([
    'course_id' => 1,
    'plan_name' => '3-Month Plan',
    'total_amount' => 1500,
    'down_payment' => 300,
    'number_of_installments' => 3,
    'installment_amount' => 400,
    'interval_type' => 'month'
]);
```

**Features:**
- Custom down payments
- Monthly/Weekly/Quarterly intervals
- Automatic payment tracking
- Overdue payment detection

### 3. **Scholarship System**

**Create scholarships:**
```php
$scholarshipManager = new ScholarshipManager($db);

$scholarshipManager->createProgram([
    'name' => 'Merit Scholarship 2025',
    'type' => 'percentage',  // or 'fixed' or 'full'
    'discount_percentage' => 50,
    'max_awards' => 20,
    'application_deadline' => '2025-03-31',
    'start_date' => '2025-01-01',
    'end_date' => '2025-12-31'
]);
```

**Features:**
- Percentage/Fixed/Full discounts
- Application review system
- Automatic discount calculation
- Eligibility criteria

### 4. **Invoice Generation**

Generate professional PDF invoices:

```php
$invoiceGenerator = new InvoiceGenerator($db);

// Generate and download
$invoiceGenerator->generateInvoice($paymentId, 'download');

// Generate and save
$path = $invoiceGenerator->generateInvoice($paymentId, 'save');

// Email to customer
$invoiceGenerator->emailInvoice($paymentId, 'student@example.com');
```

**Features:**
- Professional PDF format
- Company branding
- Itemized billing
- Tax calculations
- Email delivery

---

## 📊 Payment Flow

### Full Payment Flow

```
1. Student selects course
2. Choose payment gateway
3. Initialize payment
4. Redirect to gateway
5. Complete payment
6. Gateway callback
7. Verify payment
8. Enroll student
9. Generate invoice
10. Send confirmation email
```

### Installment Flow

```
1. Student selects installment plan
2. Pay down payment (optional)
3. System creates payment schedule
4. Monthly reminders
5. Process each installment
6. Track progress
7. Complete enrollment when paid
```

---

## 🔌 Integration Examples

### Paystack Integration

```php
$paymentManager->setGateway('paystack');

$result = $paymentManager->processCoursePayment([
    'user_id' => 1,
    'course_id' => 1,
    'amount' => 1500,
    'email' => 'student@example.com',
    'currency' => 'GHS',
    'callback_url' => 'https://yoursite.com/payment/callback'
]);

// Redirect to Paystack
header('Location: ' . $result['authorization_url']);
```

### Stripe Integration

```php
$paymentManager->setGateway('stripe');

$result = $paymentManager->processCoursePayment([
    'user_id' => 1,
    'course_id' => 1,
    'amount' => 1500,
    'email' => 'student@example.com',
    'currency' => 'USD',
    'callback_url' => 'https://yoursite.com/payment/callback'
]);

// Use Stripe.js on frontend with client_secret
$clientSecret = $result['client_secret'];
```

### PayPal Integration

```php
$paymentManager->setGateway('paypal');

$result = $paymentManager->processCoursePayment([
    'user_id' => 1,
    'course_id' => 1,
    'amount' => 1500,
    'email' => 'student@example.com',
    'currency' => 'USD',
    'return_url' => 'https://yoursite.com/payment/success',
    'cancel_url' => 'https://yoursite.com/payment/cancel'
]);

// Redirect to PayPal
header('Location: ' . $result['approval_url']);
```

---

## 🔐 Security Features

- ✅ Secure API key management
- ✅ Payment verification
- ✅ SQL injection prevention
- ✅ XSS protection
- ✅ CSRF tokens
- ✅ Transaction logging
- ✅ Encrypted data storage

---

## 📝 Database Tables

| Table | Purpose |
|-------|---------|
| `payments` | All payment transactions |
| `installment_plans` | Installment plan definitions |
| `user_installments` | User installment subscriptions |
| `installment_schedule` | Individual payment schedules |
| `scholarships` | Scholarship programs |
| `scholarship_applications` | Student applications |
| `scholarship_awards` | Approved scholarships |
| `payment_subscriptions` | Recurring payments |
| `payment_logs` | Transaction audit trail |
| `refunds` | Refund processing |

---

## 🎯 Use Cases

### 1. Full Course Payment
- Student pays entire course fee upfront
- Immediate enrollment
- Invoice generated automatically

### 2. Installment Payment
- Student pays in monthly installments
- Down payment option
- Flexible payment schedule

### 3. Scholarship + Installment
- Scholarship reduces total amount
- Remaining paid in installments
- Combined discount tracking

### 4. Full Scholarship
- 100% tuition coverage
- No payment required
- Automated enrollment

---

## 🛠️ Testing

### Test Cards (Sandbox)

**Paystack:**
- Card: 4084084084084081
- CVV: 408
- Expiry: Any future date

**Stripe:**
- Card: 4242424242424242
- CVV: Any 3 digits
- Expiry: Any future date

**PayPal:**
- Use PayPal Sandbox accounts
- Create at developer.paypal.com

---

## 🐛 Troubleshooting

### Payment fails immediately
- Check API keys in `.env`
- Verify payment mode (sandbox/live)
- Check internet connection

### Callback not working
- Verify callback URL is accessible
- Check server logs
- Ensure HTTPS in production

### Invoice not generating
- Check FPDF/TCPDF installation
- Verify invoices directory permissions
- Check logo file path

---

## 📞 Support

For issues or questions:
- Email: support@tecworldacademy.edu
- Documentation: /Payment-System/README.md
- Examples: /Payment-System/examples/

---

## 📜 License

Proprietary - TecWorld Academy © 2025

---

**Built with ❤️ for TecWorld Academy**
