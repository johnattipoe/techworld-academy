# How to Get Payment Gateway API Keys

## 🔑 Paystack (Recommended for Ghana)

1. **Sign Up**: Go to https://dashboard.paystack.com/signup
2. **Verify Email**: Check your email and verify your account
3. **Get Test Keys**:
   - Login to dashboard
   - Go to Settings → API Keys & Webhooks
   - Copy your **Test Public Key** (starts with `pk_test_`)
   - Copy your **Test Secret Key** (starts with `sk_test_`)
4. **Add to .env**:
   ```
   PAYSTACK_PUBLIC_KEY=pk_test_xxxxxxxxxxxxx
   PAYSTACK_SECRET_KEY=sk_test_xxxxxxxxxxxxx
   ```

### Test Cards for Paystack:
- **Success**: 4084084084084081
- **Declined**: 4084080000000408
- CVV: Any 3 digits
- Expiry: Any future date

---

## 💳 Stripe (International Payments)

1. **Sign Up**: Go to https://dashboard.stripe.com/register
2. **Activate Account**: Complete the registration
3. **Get Test Keys**:
   - Click "Developers" in the menu
   - Go to "API keys"
   - Toggle to "Test mode"
   - Copy **Publishable key** and **Secret key**
4. **Add to .env**:
   ```
   STRIPE_PUBLIC_KEY=pk_test_xxxxxxxxxxxxx
   STRIPE_SECRET_KEY=sk_test_xxxxxxxxxxxxx
   ```

### Test Cards for Stripe:
- **Success**: 4242424242424242
- **3D Secure**: 4000002500003155
- CVV: Any 3 digits
- Expiry: Any future date

---

## 🌐 PayPal (Global)

1. **Sign Up**: Go to https://developer.paypal.com/
2. **Login**: Use your PayPal account or create new
3. **Create App**:
   - Go to "Dashboard" → "My Apps & Credentials"
   - Under "Sandbox", click "Create App"
   - Name your app (e.g., "TecWorld Academy")
   - Click "Create App"
4. **Get Credentials**:
   - Copy **Client ID**
   - Show and copy **Secret**
5. **Add to .env**:
   ```
   PAYPAL_CLIENT_ID=xxxxxxxxxxxxx
   PAYPAL_SECRET=xxxxxxxxxxxxx
   PAYPAL_MODE=sandbox
   ```

### Test PayPal Account:
- Go to https://developer.paypal.com/dashboard/accounts
- Create sandbox test accounts (buyer & seller)

---

## ⚡ Quick Start (For Testing Only)

If you just want to test the interface without real payment processing:

1. **Option 1**: Comment out payment validation temporarily
2. **Option 2**: Use mock payment mode (we can create this)
3. **Option 3**: Get Paystack test keys (easiest - takes 5 minutes)

---

## 🚀 Recommended: Paystack First

For TecWorld Academy in Ghana, start with Paystack:
1. Fastest signup (takes 5 minutes)
2. Ghana-focused (GHS currency native)
3. Best local payment methods (Mobile Money coming)
4. Easy test environment

**Get your keys now**: https://dashboard.paystack.com/signup

Once you have the keys, update your `.env` file and refresh!
