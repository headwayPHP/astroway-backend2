<style>
    /* Add this new wrapper for the slider and arrows */
    .slider-wrapper {
        position: relative;
        width: 100%;
        max-width: 1200px;
        margin: 0 auto;
    }

    .banner-container {
        position: relative;
        width: 100%;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);
    }

    .banner-slider {
        position: relative;
        overflow: hidden;
        width: 100%;
        aspect-ratio: 16/7;
    }

    /* Updated arrow positioning */
    .slider-nav {
        position: absolute;
        top: 50%;
        left: 0;
        right: 0;
        transform: translateY(-50%);
        z-index: 10;
        display: flex;
        justify-content: space-between;
        pointer-events: none;
        /* Allows clicks to pass through when arrows are outside */
    }

    /* Position arrows outside the container */
    .slider-nav .nav-arrow {
        position: relative;
        pointer-events: auto;
        /* Re-enable clicks for the arrows */
    }

    .slider-nav .prev {
        left: -60px;
        /* Move left arrow outside */
    }

    .slider-nav .next {
        right: -60px;
        /* Move right arrow outside */
    }

    /* Rest of your existing CSS remains the same */
    .banner-track {
        display: flex;
        height: 100%;
        transition: transform 0.7s cubic-bezier(0.25, 0.1, 0.25, 1);
    }

    .banner-slide {
        flex: 0 0 100%;
        position: relative;
    }

    .banner-slide img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
        display: block;
    }

    .slide-content {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        padding: 30px;
        background: linear-gradient(to top, rgba(0, 0, 0, 0.7) 0%, transparent 100%);
        color: white;
        text-align: center;
    }

    .slide-content h2 {
        font-size: 2.2rem;
        margin-bottom: 10px;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.5);
    }

    .slide-content p {
        font-size: 1.1rem;
        max-width: 70%;
        margin: 0 auto;
        text-shadow: 0 1px 3px rgba(0, 0, 0, 0.5);
    }

    .slider-dots {
        position: absolute;
        bottom: 20px;
        left: 0;
        right: 0;
        display: flex;
        justify-content: center;
        gap: 10px;
        z-index: 10;
    }

    .dot {
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.5);
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .dot.active {
        background: white;
        transform: scale(1.2);
    }

    .nav-arrow {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        /* background: rgba(255, 255, 255, 0.3); */
        background: transparent;
        backdrop-filter: blur(5px);
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .nav-arrow:hover {
        background: rgba(255, 255, 255, 0.7);
        transform: scale(1.1);
    }

    .nav-arrow svg {
        width: 24px;
        height: 24px;
        fill: var(--primary-color);
        scale: 2;
    }

    @media (max-width: 992px) {
        .slide-content h2 {
            font-size: 1.8rem;
        }

        .slide-content p {
            font-size: 1rem;
            max-width: 80%;
        }
    }

    @media (max-width: 768px) {
        .banner-container {
            border-radius: 0;
        }

        .banner-slider {
            aspect-ratio: 16/9;
        }

        .slide-content {
            padding: 20px;
        }

        .slide-content h2 {
            font-size: 1.5rem;
        }

        .slide-content p {
            max-width: 90%;
            font-size: 0.9rem;
        }

        /* Adjust arrow positioning for mobile */
        .slider-nav .prev {
            left: -40px;
        }

        .slider-nav .next {
            right: -40px;
        }
    }
</style>

<!-- Updated HTML structure -->
<div class="slider-wrapper">
    <div class="banner-container">
        <div class="banner-slider" id="bannerSlider">
            <div class="banner-track" id="bannerTrack">
                <div class="banner-slide">
                    <img src="<?php echo e(asset('public/images/Frame1437256174.png')); ?>" alt="Astrology Consultation">
                    <div class="slide-content">
                        <h2>Professional Astrology Services</h2>
                        <p>Get accurate predictions and guidance from our expert astrologers</p>
                    </div>
                </div>
                <div class="banner-slide">
                    <img src="<?php echo e(asset('public/images/Frame1437256175.png')); ?>" alt="Vastu Consultation">
                    <div class="slide-content">
                        <h2>Vastu Shastra Experts</h2>
                        <p>Transform your living space for positive energy and prosperity</p>
                    </div>
                </div>
                <div class="banner-slide">
                    <img src="<?php echo e(asset('public/images/Frame1437256173.png')); ?>" alt="Personal Consultation">
                    <div class="slide-content">
                        <h2>Personalized Guidance</h2>
                        <p>One-on-one sessions tailored to your specific needs</p>
                    </div>
                </div>
                <div class="banner-slide">
                    <img src="<?php echo e(asset('public/images/Frame1437256176.png')); ?>" alt="Spiritual Solutions">
                    <div class="slide-content">
                        <h2>Spiritual Solutions</h2>
                        <p>Find peace and clarity through our spiritual practices</p>
                    </div>
                </div>
            </div>
            <div class="slider-dots" id="sliderDots"></div>
        </div>
    </div>

    <!-- Moved navigation arrows outside the container -->
    <div class="slider-nav">
        <div class="nav-arrow prev" id="prevSlide">
            
            <button type="button" class="slick-prev " style="fill: var(--primary-color);scale: 0.5;"><span><svg
                        xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor"
                        class="bi bi-chevron-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0" />
                    </svg></span></button>
        </div>
        <div class="nav-arrow next" id="nextSlide">
            

            <button type="button" class="slick-next " style="fill: var(--primary-color);scale: 0.5;"><span><svg
                        xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor"
                        class="bi bi-chevron-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708" />
                    </svg></span></button>
        </div>
    </div>
</div>

<!-- Your existing JavaScript remains the same -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const track = document.getElementById('bannerTrack');
        const slides = document.querySelectorAll('.banner-slide');
        const prevBtn = document.getElementById('prevSlide');
        const nextBtn = document.getElementById('nextSlide');
        const dotsContainer = document.getElementById('sliderDots');

        let currentIndex = 0;
        let slideInterval;
        const slideCount = slides.length;

        // Create dots
        slides.forEach((_, index) => {
            const dot = document.createElement('div');
            dot.classList.add('dot');
            if (index === 0) dot.classList.add('active');
            dot.addEventListener('click', () => goToSlide(index));
            dotsContainer.appendChild(dot);
        });

        const dots = document.querySelectorAll('.dot');

        // Update slide position
        function updateSlide() {
            track.style.transform = `translateX(-${currentIndex * 100}%)`;

            // Update active dot
            dots.forEach((dot, index) => {
                dot.classList.toggle('active', index === currentIndex);
            });
        }

        // Go to specific slide
        function goToSlide(index) {
            currentIndex = index;
            updateSlide();
            resetInterval();
        }

        // Next slide
        function nextSlide() {
            currentIndex = (currentIndex + 1) % slideCount;
            updateSlide();
            resetInterval();
        }

        // Previous slide
        function prevSlide() {
            currentIndex = (currentIndex - 1 + slideCount) % slideCount;
            updateSlide();
            resetInterval();
        }

        // Reset autoplay interval
        function resetInterval() {
            clearInterval(slideInterval);
            slideInterval = setInterval(nextSlide, 5000);
        }

        // Event listeners
        nextBtn.addEventListener('click', nextSlide);
        prevBtn.addEventListener('click', prevSlide);

        // Touch events for mobile swipe
        let touchStartX = 0;
        let touchEndX = 0;

        track.addEventListener('touchstart', (e) => {
            touchStartX = e.changedTouches[0].screenX;
            clearInterval(slideInterval);
        }, {
            passive: true
        });

        track.addEventListener('touchend', (e) => {
            touchEndX = e.changedTouches[0].screenX;
            handleSwipe();
            resetInterval();
        }, {
            passive: true
        });

        function handleSwipe() {
            const difference = touchStartX - touchEndX;
            if (difference > 50) nextSlide(); // Swipe left
            if (difference < -50) prevSlide(); // Swipe right
        }

        // Start autoplay
        resetInterval();

        // Pause on hover
        track.addEventListener('mouseenter', () => clearInterval(slideInterval));
        track.addEventListener('mouseleave', resetInterval);
    });
</script>
<?php /**PATH C:\xampp\htdocs\astroway-backend2\resources\views/layout/components/banner.blade.php ENDPATH**/ ?>