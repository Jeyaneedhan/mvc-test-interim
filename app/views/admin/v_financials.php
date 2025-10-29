<?php require APPROOT . '/views/inc/admin_header.php'; ?>

<div class="page-content">
    <!-- Page Header -->
    <div class="page-header">
        <div class="header-content">
            <h2>Financial Management</h2>
            <p>Monitor and manage all financial transactions</p>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-dollar-sign"></i>
            </div>
            <div class="stat-info">
                <h3 class="stat-number">Rs124,500</h3>
                <p class="stat-label">Total Revenue</p>
                <span class="stat-change positive">+15% from last month</span>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-check-circle"></i>
            </div>
            <div class="stat-info">
                <h3 class="stat-number">Rs 98,200</h3>
                <p class="stat-label">Collected</p>
                <span class="stat-change positive">+8% from last month</span>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-clock"></i>
            </div>
            <div class="stat-info">
                <h3 class="stat-number">Rs 26,300</h3>
                <p class="stat-label">Pending</p>
                <span class="stat-change">3 transactions</span>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-exclamation-triangle"></i>
            </div>
            <div class="stat-info">
                <h3 class="stat-number">Rs 8,450</h3>
                <p class="stat-label">Overdue</p>
                <span class="stat-change negative">2 transactions</span>
            </div>
        </div>
    </div>



    <!-- Recent Transactions -->
    <div class="dashboard-section">
        <div class="section-header">
            <h3>Recent Transactions</h3>
        </div>

        <div class="table-container">
            <table class="data-table transactions-table">
                <thead>
                    <tr>
                        <th>Type</th>
                        <th>Description</th>
                        <th>Property</th>
                        <th>Amount</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr data-type="income" data-status="approved" data-date="2024-01-07">
                        <td>
                            <div class="transaction-type">
                                <div class="type-icon income">
                                    <i class="fas fa-arrow-down"></i>
                                </div>
                                <span class="type-label">Income</span>
                            </div>
                        </td>
                        <td>
                            <div class="transaction-description">
                                <div class="description-title">Monthly rent - Luxury Apartment</div>
                            </div>
                        </td>
                        <td>
                            <div class="property-info">
                                <div class="property-name">Luxury Apartment Downtown</div>
                            </div>
                        </td>
                        <td>
                            <div class="amount-display income">Rs 25,500</div>
                        </td>
                        <td>01/07/2024</td>
                        <td><span class="status-badge approved">Approved</span></td>
                        <td>
                            <div class="transaction-actions">
                                <button class="action-btn view-btn" onclick="viewTransaction('TXN001')" title="View">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <tr data-type="payment" data-status="pending" data-date="2024-02-07">
                        <td>
                            <div class="transaction-type">
                                <div class="type-icon payment">
                                    <i class="fas fa-arrow-up"></i>
                                </div>
                                <span class="type-label">Payment</span>
                            </div>
                        </td>
                        <td>
                            <div class="transaction-description">
                                <div class="description-title">Property manager commission</div>
                            </div>
                        </td>
                        <td>
                            <div class="property-info">
                                <div class="property-name">Family House Suburbs</div>
                            </div>
                        </td>
                        <td>
                            <div class="amount-display payment">Rs 65,500</div>
                        </td>
                        <td>02/07/2024</td>
                        <td><span class="status-badge pending">Pending</span></td>
                        <td>
                            <div class="transaction-actions">
                                <button class="action-btn view-btn" onclick="viewTransaction('TXN002')" title="View">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="action-btn approve-btn" onclick="approveTransaction('TXN002')" title="Approve">
                                    <i class="fas fa-check"></i>
                                </button>
                                <button class="action-btn reject-btn" onclick="rejectTransaction('TXN002')" title="Reject">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <tr data-type="expense" data-status="approved" data-date="2024-03-07">
                        <td>
                            <div class="transaction-type">
                                <div class="type-icon expense">
                                    <i class="fas fa-arrow-up"></i>
                                </div>
                                <span class="type-label">Expense</span>
                            </div>
                        </td>
                        <td>
                            <div class="transaction-description">
                                <div class="description-title">Maintenance - Plumbing repair</div>
                            </div>
                        </td>
                        <td>
                            <div class="property-info">
                                <div class="property-name">Studio Near University</div>
                            </div>
                        </td>
                        <td>
                            <div class="amount-display expense">Rs 20,500</div>
                        </td>
                        <td>03/07/2024</td>
                        <td><span class="status-badge approved">Approved</span></td>
                        <td>
                            <div class="transaction-actions">
                                <button class="action-btn view-btn" onclick="viewTransaction('TXN003')" title="View">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <tr data-type="income" data-status="pending" data-date="2024-04-07">
                        <td>
                            <div class="transaction-type">
                                <div class="type-icon income">
                                    <i class="fas fa-arrow-down"></i>
                                </div>
                                <span class="type-label">Income</span>
                            </div>
                        </td>
                        <td>
                            <div class="transaction-description">
                                <div class="description-title">Security deposit</div>
                            </div>
                        </td>
                        <td>
                            <div class="property-info">
                                <div class="property-name">Modern Condo</div>
                            </div>
                        </td>
                        <td>
                            <div class="amount-display income">Rs 45,500</div>
                        </td>
                        <td>04/07/2024</td>
                        <td><span class="status-badge pending">Pending</span></td>
                        <td>
                            <div class="transaction-actions">
                                <button class="action-btn view-btn" onclick="viewTransaction('TXN004')" title="View">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="action-btn approve-btn" onclick="approveTransaction('TXN004')" title="Approve">
                                    <i class="fas fa-check"></i>
                                </button>
                                <button class="action-btn reject-btn" onclick="rejectTransaction('TXN004')" title="Reject">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>


</div>

<!-- Transaction Details Modal -->
<div id="transactionModal" class="modal-overlay hidden">
    <div class="modal-content modal-large">
        <div class="modal-header">
            <h3>Transaction Details</h3>
            <button class="modal-close" onclick="closeTransactionModal()">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="modal-body" id="transactionModalContent">
            <!-- Content will be populated by JavaScript -->
        </div>
    </div>
</div>

<script>
    // Transaction management functions - Global scope for onclick handlers
    function viewTransaction(transactionId) {
        console.log('Viewing transaction:', transactionId)
        const modal = document.getElementById('transactionModal')
        const modalContent = document.getElementById('transactionModalContent')

        // Simulate transaction details
        modalContent.innerHTML = `
            <div class="transaction-details">
                <div class="detail-grid">
                    <div class="detail-item">
                        <label>Transaction ID</label>
                        <span>${transactionId}</span>
                    </div>
                    <div class="detail-item">
                        <label>Type</label>
                        <span>Monthly Rent Payment</span>
                    </div>
                    <div class="detail-item">
                        <label>Amount</label>
                        <span class="amount-large">$2,500.00</span>
                    </div>
                    <div class="detail-item">
                        <label>Status</label>
                        <span class="status-badge approved">Approved</span>
                    </div>
                    <div class="detail-item">
                        <label>Property</label>
                        <span>Luxury Apartment Downtown</span>
                    </div>
                    <div class="detail-item">
                        <label>Tenant</label>
                        <span>John Doe</span>
                    </div>
                    <div class="detail-item">
                        <label>Date</label>
                        <span>January 7, 2024</span>
                    </div>
                    <div class="detail-item">
                        <label>Payment Method</label>
                        <span>Credit Card</span>
                    </div>
                </div>
                <div class="detail-notes">
                    <label>Notes</label>
                    <p>Regular monthly rent payment processed successfully.</p>
                </div>
                <div class="modal-actions">
                    <button class="btn btn-primary" onclick="closeTransactionModal()">Close</button>
                </div>
            </div>
        `

        modal.classList.remove('hidden')
    }

    function closeTransactionModal() {
        const modal = document.getElementById('transactionModal')
        if (modal) {
            modal.classList.add('hidden')
        }
    }

    function approveTransaction(transactionId) {
        if (confirm('Are you sure you want to approve this transaction?')) {
            const row = event.target.closest('tr')
            const statusCell = row.querySelector('.status-badge')
            const actionsCell = row.querySelector('.transaction-actions')

            // Update status
            statusCell.textContent = 'Approved'
            statusCell.className = 'status-badge approved'

            // Update actions - remove approve/reject, keep view only
            actionsCell.innerHTML = `
                <button class="action-btn view-btn" onclick="viewTransaction('${transactionId}')" title="View">
                    <i class="fas fa-eye"></i>
                </button>
            `

            showNotification('Transaction approved successfully!', 'success')
            updateFinancialStats()
        }
    }

    function rejectTransaction(transactionId) {
        if (confirm('Are you sure you want to reject this transaction?')) {
            const row = event.target.closest('tr')
            const statusCell = row.querySelector('.status-badge')

            // Update status
            statusCell.textContent = 'Rejected'
            statusCell.className = 'status-badge rejected'

            showNotification('Transaction rejected.', 'warning')
            updateFinancialStats()
        }
    }

    // Initialize basic functionality
    document.addEventListener('DOMContentLoaded', function() {
        // Any initialization code can go here
        console.log('Financial management page loaded')
    })
</script>

<?php require APPROOT . '/views/inc/admin_footer.php'; ?>