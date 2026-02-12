<!-- Success Modal -->
<div id="successModal" class="modal-overlay">
    <div class="premium-modal success-modal-pro">
        <div class="modal-accent-line"></div>


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

            <a href="{{ route('careers') }}" class="btn-finish-pro" style="text-decoration: none;">
                BACK TO SITE <i class="fas fa-arrow-right"></i>
            </a>
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
        background: #ffffff !important;
        border: 1px solid #e2e8f0;
        border-radius: 24px !important;
        padding: 0 !important;
        text-align: center;
        overflow: hidden;
        position: relative;
        transform: scale(0.9);
        transition: all 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    }

    #successModal.active .success-modal-pro {
        transform: scale(1);
    }

    .success-content {
        padding: 50px 40px;
    }

    .modal-title {
        color: #0f172a;
        font-size: 2rem;
        font-weight: 800;
        margin-bottom: 12px;
        font-family: 'Outfit', sans-serif;
    }

    .modal-subtitle {
        color: #475569;
        font-size: 1.05rem;
        line-height: 1.6;
        font-weight: 500;
        margin-bottom: 0;
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
        background: #f1f5f9;
        border: 1px solid #e2e8f0;
        color: #475569;
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
        background: #e2e8f0;
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
        background: #0f172a;
        color: #ffffff;
        border: none;
        padding: 18px;
        border-radius: 14px;
        font-weight: 800;
        font-size: 1rem;
        cursor: pointer;
        transition: all 0.3s;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        box-shadow: 0 10px 20px -5px rgba(15, 23, 42, 0.3);
    }

    .btn-finish-pro:hover {
        background: #1e293b;
        transform: translateY(-2px);
        box-shadow: 0 12px 24px -5px rgba(15, 23, 42, 0.4);
    }

    .modal-close-btn {
        position: absolute;
        top: 20px;
        right: 20px;
        width: 36px;
        height: 36px;
        border-radius: 50%;
        background: #f1f5f9;
        border: none;
        color: #64748b;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.2s;
        z-index: 10;
    }

    .modal-close-btn:hover {
        background: #e2e8f0;
        color: #0f172a;
        transform: rotate(90deg);
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

            // Fix: Chrome autoplay policy often blocks audio after timeouts. 
            // Triggering immediately upon function call (which comes from user click) is safer.
            if (window.speechSynthesis.paused) window.speechSynthesis.resume();
            playVoiceMessage();

            setTimeout(() => {
                modal.classList.add('active');
            }, 50);
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
                // Dynamic text from modal content
                const title = modal.querySelector('.modal-title').innerText;
                const sub = modal.querySelector('.modal-subtitle').innerText;
                const text = title + ". " + sub;

                utterance = new SpeechSynthesisUtterance(text);
                utterance.rate = 0.95;
                utterance.onend = () => {
                    isPlaying = false;
                    updateVoiceBtn(false);
                };
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
            const icon = voiceBtn.querySelector('i');
            if (active) {
                btnText.textContent = 'PLAYING...';
                icon.className = 'fas fa-volume-up';
                voiceBtn.classList.add('active');
            } else {
                btnText.textContent = 'REPLAY CONFIRMATION';
                icon.className = 'fas fa-play';
                voiceBtn.classList.remove('active');
            }
        }
    });
</script>