import "./bootstrap";
import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

document.addEventListener("DOMContentLoaded", function () {
    const marqueeElements = document.querySelectorAll(".marquee");

    marqueeElements.forEach(function (marqueeElement) {
        const text = marqueeElement.querySelector("span");
        const marqueeWidth = marqueeElement.offsetWidth;
        const textWidth = text.offsetWidth;

        const animateMarquee = function () {
            let left = textWidth + 100;

            if (left < marqueeWidth) {
                left = -textWidth;
            }

            text.style.transform = `translateX(${left}px)`;
            requestAnimationFrame(animateMarquee);
        };

        requestAnimationFrame(animateMarquee);
    });
});
