<?php require APPROOT . '/views/inc/admin_header.php'; ?>

<div class="page-content">
    <!-- Page Header -->
    <div class="page-header">
        <div class="header-content">
            <h2>Document Management</h2>
            <p>Review and approve uploaded property documents</p>
        </div>
        <div class="header-actions">
            <button class="btn btn-primary" onclick="uploadDocument()">
                <i class="fas fa-upload"></i> Upload Document
            </button>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-file"></i>
            </div>
            <div class="stat-info">
                <h3 class="stat-number">1,247</h3>
                <p class="stat-label">Total Documents</p>
                <span class="stat-change">All Submissions</span>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-clock"></i>
            </div>
            <div class="stat-info">
                <h3 class="stat-number">4</h3>
                <p class="stat-label">Pending Review</p>
                <span class="stat-change">Awaiting Approval</span>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-check"></i>
            </div>
            <div class="stat-info">
                <h3 class="stat-number">1,198</h3>
                <p class="stat-label">Approved</p>
                <span class="stat-change">Verified Documents</span>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-times"></i>
            </div>
            <div class="stat-info">
                <h3 class="stat-number">26</h3>
                <p class="stat-label">Rejected</p>
                <span class="stat-change">Invalid Documents</span>
            </div>
        </div>
    </div>

    <!-- Documents Content -->
    <div class="documents-content">
        <!-- Search and Filter Row -->
        <div class="search-filter-row">
            <div class="search-container">
                <input type="text" class="search-input" placeholder="Search documents..." id="searchDocuments">
            </div>
            <div class="filter-container">
                <select class="filter-select" id="filterDocuments">
                    <option value="">All Documents</option>
                    <option value="pending">Pending</option>
                    <option value="approved">Approved</option>
                    <option value="rejected">Rejected</option>
                </select>
            </div>
        </div>

        <!-- Document Submissions Table -->
        <div class="table-section">
            <h3 class="table-title">Document Submissions (4)</h3>
            <div class="table-container">
                <table class="documents-table">
                    <thead>
                        <tr>
                            <th>Document</th>
                            <th>Property</th>
                            <th>Owner</th>
                            <th>Type</th>
                            <th>Upload Date</th>
                            <th>Size</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="document-info">
                                    <i class="fas fa-file-alt document-icon pdf-icon"></i>
                                    <span class="document-name">property_deed.pdf</span>
                                </div>
                            </td>
                            <td>
                                <div class="property-info">
                                    <div class="property-name">Luxury Apartment</div>
                                    <div class="property-location">Downtown</div>
                                </div>
                            </td>
                            <td>
                                <div class="owner-info">
                                    <div class="owner-name">John Smith</div>
                                </div>
                            </td>
                            <td>
                                <span class="document-type-badge ownership">Ownership</span>
                            </td>
                            <td>01/07/2024</td>
                            <td>2.4 MB</td>
                            <td><span class="status-badge pending">Pending</span></td>
                            <td>
                                <div class="action-buttons document-actions">
                                    <button class="action-btn view-btn" onclick="viewDocument('DOC001')" title="View">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="action-btn download-btn" onclick="downloadDocument('DOC001')" title="Download">
                                        <i class="fas fa-download"></i>
                                    </button>
                                    <button class="action-btn approve-btn" onclick="approveDocument('DOC001')" title="Approve">
                                        <i class="fas fa-check"></i>
                                    </button>
                                    <button class="action-btn reject-btn" onclick="rejectDocument('DOC001')" title="Reject">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="document-info">
                                    <i class="fas fa-file-contract document-icon contract-icon"></i>
                                    <span class="document-name">lease_agreement.pdf</span>
                                </div>
                            </td>
                            <td>
                                <div class="property-info">
                                    <div class="property-name">Family House</div>
                                    <div class="property-location">Suburbs</div>
                                </div>
                            </td>
                            <td>
                                <div class="owner-info">
                                    <div class="owner-name">Jane Doe</div>
                                </div>
                            </td>
                            <td>
                                <span class="document-type-badge lease">Lease</span>
                            </td>
                            <td>02/07/2024</td>
                            <td>1.8 MB</td>
                            <td><span class="status-badge approved">Approved</span></td>
                            <td>
                                <div class="action-buttons document-actions">
                                    <button class="action-btn view-btn" onclick="viewDocument('DOC002')" title="View">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="action-btn download-btn" onclick="downloadDocument('DOC002')" title="Download">
                                        <i class="fas fa-download"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="document-info">
                                    <i class="fas fa-file-medical document-icon inspection-icon"></i>
                                    <span class="document-name">inspection_report.pdf</span>
                                </div>
                            </td>
                            <td>
                                <div class="property-info">
                                    <div class="property-name">Studio Near University</div>
                                    <div class="property-location">University District</div>
                                </div>
                            </td>
                            <td>
                                <div class="owner-info">
                                    <div class="owner-name">Mike Johnson</div>
                                </div>
                            </td>
                            <td>
                                <span class="document-type-badge inspection">Inspection</span>
                            </td>
                            <td>03/07/2024</td>
                            <td>3.2 MB</td>
                            <td><span class="status-badge pending">Pending</span></td>
                            <td>
                                <div class="action-buttons document-actions">
                                    <button class="action-btn view-btn" onclick="viewDocument('DOC003')" title="View">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="action-btn download-btn" onclick="downloadDocument('DOC003')" title="Download">
                                        <i class="fas fa-download"></i>
                                    </button>
                                    <button class="action-btn approve-btn" onclick="approveDocument('DOC003')" title="Approve">
                                        <i class="fas fa-check"></i>
                                    </button>
                                    <button class="action-btn reject-btn" onclick="rejectDocument('DOC003')" title="Reject">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="document-info">
                                    <i class="fas fa-file-invoice document-icon insurance-icon"></i>
                                    <span class="document-name">insurance_policy.pdf</span>
                                </div>
                            </td>
                            <td>
                                <div class="property-info">
                                    <div class="property-name">Modern Condo</div>
                                    <div class="property-location">City Center</div>
                                </div>
                            </td>
                            <td>
                                <div class="owner-info">
                                    <div class="owner-name">Sarah Wilson</div>
                                </div>
                            </td>
                            <td>
                                <span class="document-type-badge insurance">Insurance</span>
                            </td>
                            <td>04/07/2024</td>
                            <td>1.2 MB</td>
                            <td><span class="status-badge pending">Pending</span></td>
                            <td>
                                <div class="action-buttons document-actions">
                                    <button class="action-btn view-btn" onclick="viewDocument('DOC004')" title="View">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="action-btn download-btn" onclick="downloadDocument('DOC004')" title="Download">
                                        <i class="fas fa-download"></i>
                                    </button>
                                    <button class="action-btn approve-btn" onclick="approveDocument('DOC004')" title="Approve">
                                        <i class="fas fa-check"></i>
                                    </button>
                                    <button class="action-btn reject-btn" onclick="rejectDocument('DOC004')" title="Reject">
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
</div>

<!-- Document Viewer Modal -->
<div id="documentModal" class="modal-overlay hidden">
    <div class="modal-content modal-large">
        <div class="modal-header">
            <h3>Document Viewer</h3>
            <button class="modal-close" onclick="closeDocumentModal()">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="modal-body" id="documentModalContent">
            <!-- Document content will be loaded here -->
        </div>
    </div>
</div>

<script>
    // Document Management Functions - Global scope for onclick handlers
    function viewDocument(documentId) {
        console.log('Viewing document:', documentId)
        const modal = document.getElementById('documentModal')
        const modalContent = document.getElementById('documentModalContent')

        // Simulate document viewing
        modalContent.innerHTML = `
        <div style="text-align: center; padding: 2rem;">
            <i class="fas fa-file-pdf" style="font-size: 4rem; color: var(--danger-color); margin-bottom: 1rem;"></i>
            <h4>Document Preview</h4>
            <p>Document ID: ${documentId}</p>
            <p>This is a preview of the document. In a real application, you would display the actual document content here.</p>
            <div style="margin-top: 2rem;">
                <button class="btn btn-primary" onclick="downloadDocument('${documentId}')">
                    <i class="fas fa-download"></i> Download
                </button>
            </div>
        </div>
    `

        modal.classList.remove('hidden')
        showNotification('Opening document viewer...', 'info')
    }

    function downloadDocument(documentId) {
        console.log('Downloading document:', documentId)
        showNotification('Download started...', 'info')
        // Here you would implement actual download functionality
    }

    function approveDocument(documentId) {
        if (confirm('Are you sure you want to approve this document?')) {
            const row = event.target.closest('tr')
            const statusCell = row.querySelector('[class*="status-"]')
            const actionsCell = row.querySelector('.document-actions')

            // Update status
            statusCell.textContent = 'Approved'
            statusCell.className = 'status-approved'

            // Update actions - only show view and download for approved documents
            actionsCell.innerHTML = `
            <button class="action-btn view-btn" onclick="viewDocument('${documentId}')" title="View">
                <i class="fas fa-eye"></i>
            </button>
            <button class="action-btn download-btn" onclick="downloadDocument('${documentId}')" title="Download">
                <i class="fas fa-download"></i>
            </button>
        `

            showNotification('Document approved successfully!', 'success')
            updateDocumentStats()
        }
    }

    function rejectDocument(documentId) {
        if (confirm('Are you sure you want to reject this document?')) {
            const row = event.target.closest('tr')
            const statusCell = row.querySelector('[class*="status-"]')
            const actionsCell = row.querySelector('.document-actions')

            // Update status
            statusCell.textContent = 'Rejected'
            statusCell.className = 'status-rejected'

            // Update actions - only show view and remove for rejected documents
            actionsCell.innerHTML = `
            <button class="action-btn view-btn" onclick="viewDocument('${documentId}')" title="View">
                <i class="fas fa-eye"></i>
            </button>
            <button class="action-btn reject-btn" onclick="removeDocument('${documentId}')" title="Remove">
                <i class="fas fa-trash"></i>
            </button>
        `

            showNotification('Document rejected successfully!', 'warning')
            updateDocumentStats()
        }
    }

    function removeDocument(documentId) {
        if (confirm('Are you sure you want to remove this document? This action cannot be undone.')) {
            const row = event.target.closest('tr')
            row.remove()

            updateDocumentStats()
            updateDocumentCount()
            showNotification('Document removed successfully!', 'info')
        }
    }

    function uploadDocument() {
        showNotification('Upload Document functionality to be implemented', 'info')
        // Here you would open a file upload modal
    }

    function closeDocumentModal() {
        const modal = document.getElementById('documentModal')
        if (modal) {
            modal.classList.add('hidden')
        }
    }

    function updateDocumentStats() {
        const rows = document.querySelectorAll('.documents-table tbody tr')
        const totalDocuments = rows.length

        let pendingCount = 0
        let approvedCount = 0
        let rejectedCount = 0

        rows.forEach(row => {
            const statusElement = row.querySelector('[class*="status-"]')
            if (statusElement) {
                const status = statusElement.textContent.toLowerCase()
                if (status === 'pending') pendingCount++
                if (status === 'approved') approvedCount++
                if (status === 'rejected') rejectedCount++
            }
        })

        // Update stat cards
        const statCards = document.querySelectorAll('.stat-card')
        if (statCards.length >= 4) {
            // Total Documents
            const totalStatNumber = statCards[0].querySelector('.stat-number')
            if (totalStatNumber) totalStatNumber.textContent = totalDocuments

            // Pending
            const pendingStatNumber = statCards[1].querySelector('.stat-number')
            if (pendingStatNumber) pendingStatNumber.textContent = pendingCount

            // Approved
            const approvedStatNumber = statCards[2].querySelector('.stat-number')
            if (approvedStatNumber) approvedStatNumber.textContent = approvedCount

            // Rejected
            const rejectedStatNumber = statCards[3].querySelector('.stat-number')
            if (rejectedStatNumber) rejectedStatNumber.textContent = rejectedCount
        }
    }

    function updateDocumentCount() {
        const rows = document.querySelectorAll('.documents-table tbody tr')
        const totalCount = rows.length

        // Update table title
        const tableTitle = document.querySelector('.table-title')
        if (tableTitle) {
            tableTitle.textContent = `Document Submissions (${totalCount})`
        }
    }

    // Initialize document search and filter
    document.addEventListener('DOMContentLoaded', function() {
        // Search functionality
        const searchInput = document.getElementById('searchDocuments')
        if (searchInput) {
            searchInput.addEventListener('input', function() {
                const searchTerm = this.value.toLowerCase()
                const rows = document.querySelectorAll('.documents-table tbody tr')

                rows.forEach(row => {
                    const text = row.textContent.toLowerCase()
                    row.style.display = text.includes(searchTerm) ? '' : 'none'
                })
            })
        }

        // Filter functionality
        const filterDropdown = document.getElementById('filterDocuments')
        if (filterDropdown) {
            filterDropdown.addEventListener('change', function() {
                const filterValue = this.value.toLowerCase()
                const rows = document.querySelectorAll('.documents-table tbody tr')

                rows.forEach(row => {
                    if (filterValue === '') {
                        row.style.display = ''
                    } else {
                        const statusElement = row.querySelector('[class*="status-"]')
                        if (statusElement) {
                            const status = statusElement.textContent.toLowerCase()
                            row.style.display = status.includes(filterValue) ? '' : 'none'
                        }
                    }
                })
            })
        }
    })
</script>

<?php require APPROOT . '/views/inc/admin_footer.php'; ?>