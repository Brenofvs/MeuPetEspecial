const main = document.getElementById("home")
const aside = document.getElementById("aside")

window.onload = () => {
    main.classList.add('ativo')
    setTimeout(() => {
        aside.classList.add('ativo')
    }, 800);
}

function initAnimaScroll() {
    const sections = document.querySelectorAll(".js-scroll");
    if (sections.length) {
        const windowMetade = window.innerHeight * 0.75;

        function animaScroll() {
            sections.forEach((section) => {
                const sectionTop = section.getBoundingClientRect().top;
                const isSectionVisible = sectionTop - windowMetade < 0;
                if (isSectionVisible) section.classList.add("ativo");
                else section.classList.remove("ativo");
            });
        }

        animaScroll();

        window.addEventListener("scroll", animaScroll);
    }
}
initAnimaScroll();