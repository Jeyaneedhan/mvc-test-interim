<?php require APPROOT . '/views/inc/tenant_header.php'; ?>

<div class="page-content">
    <!-- Page Header -->
    <div class="page-header">
        <div class="header-content">
            <h2>Pay Rent</h2>
            <p>Make your rent payments securely</p>
        </div>
    </div>

    <!-- Current Rent Due -->
    <div class="dashboard-section">
        <div class="section-header">
            <h3>Current Rent Due</h3>
        </div>

        <div class="rent-payment-card">
            <div class="rent-details">
                <h4>Oak Street Apartment</h4>
                <div class="rent-amount">Rs 20,000</div>
                <div class="due-date">
                    <i class="fas fa-calendar"></i>
                    Due: February 1, 2024
                </div>
                <span class="status-badge pending">Payment Due</span>
            </div>
        </div>

        <!-- Payment Success Message (Hidden by default) -->
        <div id="paymentSuccess" class="payment-result success hidden">
            <div class="result-icon">
                <i class="fas fa-check-circle"></i>
            </div>
            <div class="result-content">
                <h4>Payment Successful!</h4>
                <p>Your rent payment has been processed successfully.</p>
            </div>
        </div>

        <!-- Payment Form -->
        <div id="paymentForm" class="payment-form">
            <form onsubmit="processPayment(event)">
                <div class="form-row">
                    <div class="form-group">
                        <label>Payment Method</label>
                        <select id="paymentMethod" class="form-select">
                            <option value="card">Credit/Debit Card</option>
                            <option value="bank">Bank Transfer</option>
                            <option value="paypal">PayPal</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Amount</label>
                        <input type="text" value="Rs 20,000" readonly class="form-input">
                    </div>
                </div>

                <!-- Card Payment Fields -->
                <div id="cardFields" class="card-fields">
                    <div class="form-row">
                        <div class="form-group">
                            <label>Card Number</label>
                            <input type="text" placeholder="1234 5678 9012 3456" class="form-input" maxlength="19">
                        </div>
                        <div class="form-group">
                            <label>Expiry Date</label>
                            <input type="text" placeholder="MM/YY" class="form-input" maxlength="5">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label>CVV</label>
                            <input type="text" placeholder="123" class="form-input" maxlength="4">
                        </div>
                        <div class="form-group">
                            <label>Cardholder Name</label>
                            <input type="text" placeholder="John Doe" class="form-input">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Payment Notes (Optional)</label>
                    <textarea placeholder="Add any notes about your payment..." class="form-textarea"></textarea>
                </div>

                <button type="submit" id="payButton" class="btn btn-primary w-full">
                    <i class="fas fa-credit-card"></i>
                    Pay Rs 20,000
                </button>
            </form>
        </div>
    </div>

    <!-- Payment History -->
    <div class="dashboard-section">
        <div class="section-header">
            <h3>Payment History</h3>
        </div>

        <div class="table-container">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Property</th>
                        <th>Amount</th>
                        <th>Method</th>
                        <th>Status</th>
                        <th>Receipt</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>December 1, 2023</td>
                        <td>Oak Street Apartment</td>
                        <td>Rs 20,000</td>
                        <td>Credit Card</td>
                        <td><span class="status-badge approved">Paid</span></td>
                        <td><button class="btn btn-secondary btn-sm">Download</button></td>
                    </tr>
                    <tr>
                        <td>November 1, 2023</td>
                        <td>Oak Street Apartment</td>
                        <td>Rs 20,000</td>
                        <td>Credit Card</td>
                        <td><span class="status-badge approved">Paid</span></td>
                        <td><button class="btn btn-secondary btn-sm">Download</button></td>
                    </tr>
                    <tr>
                        <td>October 1, 2023</td>
                        <td>Oak Street Apartment</td>
                        <td>Rs 20,000</td>
                        <td>Credit Card</td>
                        <td><span class="status-badge approved">Paid</span></td>
                        <td><button class="btn btn-secondary btn-sm">Download</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/inc/tenant_footer.php'; ?>