<div class="terms-acceptance">
    <label class="terms-checkbox-label">
        <input type="checkbox"
            name="accept_terms"
            id="accept_terms"
            class="terms-checkbox"
            <?php echo (isset($data['accept_terms']) && $data['accept_terms'] == 1) ? 'checked' : ''; ?>>
        <span class="checkmark"></span>
        <span class="terms-text">
            I agree to the
            <a href="<?php echo URLROOT; ?>/pages/terms" target="_blank" class="terms-link">Terms and Conditions</a>
            and
            <a href="<?php echo URLROOT; ?>/pages/privacy" target="_blank" class="terms-link">Privacy Policy</a>
        </span>
    </label>
    <span class="error-message" id="terms-error" style="display: none;">
        You must accept the terms and conditions
    </span>
    <?php if (isset($data) && !empty($data['terms_err'])): ?>
        <span class="error-message server-error" style="display: block; color: #ef4444; font-size: 0.875rem; margin-top: 0.5rem; font-weight: 600; background: #fee2e2; padding: 0.75rem; border-radius: 6px; border-left: 3px solid #dc2626;">
            <i class="fas fa-exclamation-triangle"></i> <?php echo $data['terms_err']; ?>
        </span>
    <?php endif; ?>
</div>

<style>
    .terms-acceptance {
        margin: 1.5rem 0;
        padding: 1rem;
        background: rgba(69, 169, 234, 0.05);
        border: 1px solid rgba(69, 169, 234, 0.2);
        border-radius: 8px;
    }

    .terms-checkbox-label {
        display: flex;
        align-items: flex-start;
        gap: 0.75rem;
        cursor: pointer;
        position: relative;
        padding-left: 2rem;
    }

    .terms-checkbox {
        position: absolute;
        opacity: 0;
        cursor: pointer;
        height: 0;
        width: 0;
    }

    .checkmark {
        position: absolute;
        left: 0;
        top: 0;
        height: 20px;
        width: 20px;
        background-color: white;
        border: 2px solid #d1d5db;
        border-radius: 4px;
        transition: all 0.2s;
    }

    .terms-checkbox:hover~.checkmark {
        border-color: #45a9ea;
    }

    .terms-checkbox:checked~.checkmark {
        background-color: #45a9ea;
        border-color: #45a9ea;
    }

    .checkmark:after {
        content: "";
        position: absolute;
        display: none;
        left: 6px;
        top: 2px;
        width: 5px;
        height: 10px;
        border: solid white;
        border-width: 0 2px 2px 0;
        transform: rotate(45deg);
    }

    .terms-checkbox:checked~.checkmark:after {
        display: block;
    }

    .terms-text {
        font-size: 0.875rem;
        color: #374151;
        line-height: 1.5;
    }

    .terms-link {
        color: #45a9ea;
        text-decoration: none;
        font-weight: 500;
    }

    .terms-link:hover {
        text-decoration: underline;
    }

    .error-message {
        display: block;
        color: #ef4444;
        font-size: 0.813rem;
        margin-top: 0.5rem;
    }

    .server-error {
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .server-error i {
        flex-shrink: 0;
    }
</style>

<script>
    // Terms validation
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.querySelector('form');
        const termsCheckbox = document.getElementById('accept_terms');
        const termsError = document.getElementById('terms-error');

        if (form && termsCheckbox) {
            form.addEventListener('submit', function(e) {
                if (!termsCheckbox.checked) {
                    e.preventDefault();
                    termsError.style.display = 'block';
                    termsCheckbox.scrollIntoView({
                        behavior: 'smooth',
                        block: 'center'
                    });
                    termsCheckbox.focus();

                    // Add shake animation
                    const termsAcceptance = termsCheckbox.closest('.terms-acceptance');
                    if (termsAcceptance) {
                        termsAcceptance.style.animation = 'shake 0.5s';
                        termsAcceptance.style.borderColor = '#ef4444';
                        setTimeout(() => {
                            termsAcceptance.style.animation = '';
                            termsAcceptance.style.borderColor = '';
                        }, 500);
                    }

                    alert('⚠️ Please accept the Terms and Conditions to continue');
                    return false;
                }
                termsError.style.display = 'none';
            });

            termsCheckbox.addEventListener('change', function() {
                if (this.checked) {
                    termsError.style.display = 'none';
                    const serverError = document.querySelector('.server-error');
                    if (serverError) {
                        serverError.style.display = 'none';
                    }
                }
            });
        }
    });
</script>

<style>
    @keyframes shake {

        0%,
        100% {
            transform: translateX(0);
        }

        10%,
        30%,
        50%,
        70%,
        90% {
            transform: translateX(-5px);
        }

        20%,
        40%,
        60%,
        80% {
            transform: translateX(5px);
        }
    }
</style>