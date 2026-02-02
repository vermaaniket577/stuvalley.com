<!-- Success Modal -->
<div id="successModal" class="modal-overlay">
    <div class="premium-modal success-modal-pro">
        <div class="modal-accent-line"></div>

        <button class="modal-close-btn" onclick="closeModal()">
            <i class="fas fa-times"></i>
        </button>

        <div class="modal-content-wrapper success-content">
            <div class="success-icon-badge">
                <i class="fas fa-check-circle"></i>
                <div class="icon-pulse"></div>
            </div>

            <h3 class="modal-title">Inquiry Sent!</h3>
            <p class="modal-subtitle">Your transmission was received successfully. Our strategist will analyze your
                requirements and reach out within 12 hours.</p>

            <div class="voice-controls-premium">
                <button id="voiceBtn" class="voice-btn-pro" onclick="toggleVoice()">
                    <div class="btn-content">
                        <i class="fas fa-play"></i>
                        <span class="btn-text">REPLAY CONFIRMATION</span>
                    </div>
                    <div class="voice-ripple-container"></div>
                </button>
            </div>

            <button class="btn-finish-pro" onclick="closeModal()">
                BACK TO SITE <i class="fas fa-arrow-right"></i>
            </button>
        </div>
    </div>
</div>

<style>
    /* Success Modal Premium Styles */
    #successModal.modal-overlay {
        z-index: 1000000 !important;
        position: fixed !important;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(2, 6, 23, 0.9) !important;
        backdrop-filter: blur(25px);
        -webkit-backdrop-filter: blur(25px);
        display: none;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: all 0.4s ease;
    }

    #successModal.active {
        display: flex !important;
        opacity: 1;
    }

    .success-modal-pro {
        max-width: 480px !important;
        width: 90% !important;
        background: linear-gradient(165deg, #0f172a 0%, #020617 100%) !important;
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 24px !important;
        padding: 0 !important;
        text-align: center;
        overflow: hidden;
        position: relative;
        transform: scale(0.9);
        transition: all 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    #successModal.active .success-modal-pro {
        transform: scale(1);
    }

    .success-content {
        padding: 50px 40px;
    }

    .success-icon-badge {
        width: 80px;
        height: 80px;
        margin: 0 auto 30px;
        background: rgba(16, 185, 129, 0.1);
        border: 2px solid rgba(16, 185, 129, 0.2);
        color: #10b981;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2.5rem;
        position: relative;
        z-index: 1;
    }

    .icon-pulse {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        border-radius: 50%;
        border: 2px solid #10b981;
        animation: iconPulseAnim 2s infinite;
        z-index: -1;
    }

    @keyframes iconPulseAnim {
        0% {
            transform: scale(1);
            opacity: 0.5;
        }

        100% {
            transform: scale(1.6);
            opacity: 0;
        }
    }

    .voice-controls-premium {
        margin: 35px 0 25px;
    }

    .voice-btn-pro {
        background: rgba(255, 255, 255, 0.03);
        border: 1px solid rgba(255, 255, 255, 0.1);
        color: #f8fafc;
        padding: 12px 24px;
        border-radius: 12px;
        cursor: pointer;
        font-size: 0.85rem;
        font-weight: 700;
        letter-spacing: 0.05em;
        transition: all 0.3s;
        position: relative;
        overflow: hidden;
    }

    .voice-btn-pro:hover {
        background: rgba(255, 255, 255, 0.07);
        border-color: #3b82f6;
        color: #3b82f6;
    }

    .voice-btn-pro.active {
        background: #3b82f6;
        color: #fff;
        border-color: #3b82f6;
    }

    .btn-finish-pro {
        width: 100%;
        background: #f8fafc;
        color: #0f172a;
        border: none;
        padding: 16px;
        border-radius: 14px;
        font-weight: 800;
        font-size: 0.95rem;
        cursor: pointer;
        transition: all 0.3s;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
    }

    .btn-finish-pro:hover {
        background: #fff;
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const modal = document.getElementById('successModal');
        const voiceBtn = document.getElementById('voiceBtn');
        let synth = window.speechSynthesis;
        let utterance = null;
        let isPlaying = false;

        window.showModal = function () {
            modal.style.display = 'flex';
            document.body.style.overflow = 'hidden';
            setTimeout(() => {
                modal.classList.add('active');
                playVoiceMessage();
            }, 10);
        };

        window.closeModal = function () {
            modal.classList.remove('active');
            stopVoice();
            document.body.style.overflow = '';
            setTimeout(() => {
                modal.style.display = 'none';
            }, 500);
        };

        window.playVoiceMessage = function () {
            if (synth) {
                stopVoice();
                const text = "Your inquiry has been successfully transmitted. Our team will contact you shortly.";
                utterance = new SpeechSynthesisUtterance(text);
                utterance.rate = 0.95;
                utterance.onend = () => updateVoiceBtn(false);
                synth.speak(utterance);
                isPlaying = true;
                updateVoiceBtn(true);
            }
        };

        window.stopVoice = function () {
            if (synth) {
                synth.cancel();
                isPlaying = false;
                updateVoiceBtn(false);
            }
        };

        window.toggleVoice = function () {
            if (isPlaying) stopVoice();
            else playVoiceMessage();
        };

        function updateVoiceBtn(active) {
            if (!voiceBtn) return;
            const btnText = voiceBtn.querySelector('.btn-text');
            if (active) {
                btnText.textContent = 'PLAYING CONFIRMATION...';
                voiceBtn.classList.add('active');
            } else {
                btnText.textContent = 'REPLAY CONFIRMATION';
                voiceBtn.classList.remove('active');
            }
        }
    });
</script>