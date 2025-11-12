import "./bootstrap";
import "./mobile";
import "./scroll";
import "./createUploadImage";
import "./updateUploadImage";
import "./deleteCategory";
import "./deleteForm";
import "./deleteAnswer";

document.addEventListener("DOMContentLoaded", function () {
    const observerOptions = {
        threshold: 0.1,
        rootMargin: "0px 0px -100px 0px",
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add("animate-fade-in");
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    document.querySelectorAll(".observe-fade").forEach((el) => {
        observer.observe(el);
    });

    const animateCounter = (element) => {
        const text = element.innerText;
        const target = parseInt(text.replace(/\D/g, ""));
        const suffix = text.replace(/[0-9]/g, "");
        const duration = 2000;
        const step = target / (duration / 16);
        let current = 0;

        const timer = setInterval(() => {
            current += step;
            if (current >= target) {
                element.innerText = target + suffix;
                clearInterval(timer);
            } else {
                element.innerText = Math.floor(current) + suffix;
            }
        }, 16);
    };

    const counterObserver = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    animateCounter(entry.target);
                    counterObserver.unobserve(entry.target);
                }
            });
        },
        {
            threshold: 0.5,
        }
    );

    document.querySelectorAll(".counter-animate").forEach((el) => {
        counterObserver.observe(el);
    });
});
