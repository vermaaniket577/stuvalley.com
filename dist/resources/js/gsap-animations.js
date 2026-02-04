
// Wait for window load
window.addEventListener('load', () => {

    // Check if GSAP / ScrollTrigger are available
    if (typeof gsap === 'undefined' || typeof ScrollTrigger === 'undefined') {
        console.warn('GSAP or ScrollTrigger not found. Ensure CDNs are loaded.');
        return;
    }

    gsap.registerPlugin(ScrollTrigger);

    // ===========================================
    // 1. Smooth Scrolling (Inertia Scroll)
    // ===========================================
    // Initialize Lenis for smooth inertia scrolling
    const lenis = new Lenis({
        duration: 2.2,
        easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)), // Soft easing curve
        direction: 'vertical',
        gestureDirection: 'vertical',
        smooth: true,
        mouseMultiplier: 1,
        smoothTouch: false,
        touchMultiplier: 2,
    });

    // Synch Lenis with GSAP ScrollTrigger
    lenis.on('scroll', ScrollTrigger.update);

    gsap.ticker.add((time) => {
        lenis.raf(time * 1000); // 1000 for milliseconds
    });

    gsap.ticker.lagSmoothing(0);


    // ===========================================
    // 2. Scroll-Triggered Fade & Slide (Reveal)
    // ===========================================
    // Target elements with class .reveal, .reveal-text, .reveal-card, .reveal-section
    const revealElems = document.querySelectorAll('.reveal, .reveal-text, .reveal-card, .reveal-section');

    revealElems.forEach(elem => {
        gsap.fromTo(elem,
            { y: 50, opacity: 0 },
            {
                y: 0,
                opacity: 1,
                duration: 1.2,
                ease: "power3.out",
                scrollTrigger: {
                    trigger: elem,
                    start: "top 85%", // Trigger when top of element is at 85% of viewport
                    toggleActions: "play none none reverse"
                }
            }
        );
    });

    // ===========================================
    // 3. Parallax Scrolling (Depth Effect)
    // ===========================================
    // Elements with data-speed will move at different speeds relative to scroll
    gsap.utils.toArray('[data-speed]').forEach(layer => {
        const speed = parseFloat(layer.getAttribute('data-speed'));
        if (!isNaN(speed)) {
            gsap.to(layer, {
                y: (i, target) => -ScrollTrigger.maxScroll(window) * speed * 0.05,
                ease: "none",
                scrollTrigger: {
                    trigger: document.body,
                    start: "top top",
                    end: "bottom bottom",
                    scrub: 0
                }
            });
        }
    });

    // Special Background Parallax (e.g. Hero Blobs)
    gsap.to(".parallax-bg-element", {
        yPercent: 30,
        ease: "none",
        scrollTrigger: {
            trigger: "body",
            start: "top top",
            end: "bottom bottom",
            scrub: true
        }
    });

    // ===========================================
    // 4. Sticky Scroll Sections
    // ===========================================
    // Example: A section that sticks while content scrolls by
    const stickySection = document.querySelector('.sticky-container');
    if (stickySection) {
        ScrollTrigger.create({
            trigger: stickySection,
            start: "top top",
            end: "+=1000", // Pin for 1000px of scrolling
            pin: true,
            scrub: true
        });
    }

    // ===========================================
    // 5. Scale & Zoom on Scroll
    // ===========================================
    // Elements with class .scroll-zoom will scale up slightly
    const zoomElems = document.querySelectorAll('.scroll-zoom');
    zoomElems.forEach(elem => {
        gsap.fromTo(elem,
            { scale: 0.9, opacity: 0.8 },
            {
                scale: 1,
                opacity: 1,
                ease: "power2.out",
                scrollTrigger: {
                    trigger: elem,
                    start: "top 80%",
                    end: "top 40%",
                    scrub: true
                }
            }
        );
    });

    // Cinematic Image Scale (e.g. huge hero image scaling down or up)
    const cinematicImages = document.querySelectorAll('.cinematic-image');
    cinematicImages.forEach(img => {
        gsap.to(img, {
            scale: 1.1, // Zoom in slowly
            scrollTrigger: {
                trigger: img,
                start: "top bottom",
                end: "bottom top",
                scrub: 1 // smooth scrubbing
            }
        });
    });

    // ===========================================
    // 6. Micro-Interactions on Scroll/Hover
    // ===========================================
    // Buttons hover magnetic effect (simple scale for now)
    const interactiveBtns = document.querySelectorAll('.btn-interactive');
    interactiveBtns.forEach(btn => {
        btn.addEventListener('mouseenter', () => {
            gsap.to(btn, { scale: 1.05, duration: 0.3, ease: "back.out(1.7)" });
        });
        btn.addEventListener('mouseleave', () => {
            gsap.to(btn, { scale: 1, duration: 0.3, ease: "power2.out" });
        });
        // Scroll entrance
        gsap.from(btn, {
            y: 20,
            opacity: 0,
            duration: 0.8,
            scrollTrigger: {
                trigger: btn,
                start: "top 90%"
            }
        });
    });

    // ===========================================
    // 7. Soft Easing Motion (Hero Entrance)
    // ===========================================
    // Initial Page Load Animation
    const masterTl = gsap.timeline({ defaults: { ease: "expo.out" } });

    // Hero Text Stagger
    masterTl.fromTo(".hero h1, .hero p, .hero-btns", 
        { y: 60, opacity: 0 },
        { y: 0, opacity: 1, duration: 1.5, stagger: 0.15, delay: 0.2 }
    );

    // Hero Badge/Visual
    masterTl.from(".hero-visual, .hero-badge", {
        x: 30,
        opacity: 0,
        duration: 1.5,
        stagger: 0.2
    }, "-=1.2");

});
