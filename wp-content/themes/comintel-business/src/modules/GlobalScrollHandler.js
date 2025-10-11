class GlobalScrollHandler {
  #lastScrollTop = 0;
  constructor() {
    this.mainNav = document.getElementById("mainNav");
    this.scrollDownBtn = document.querySelector(".hero__scroll-down");
    this.scrollToTopBtn = document.getElementById("scroll-to-top");
    this.scrollDownBtnCircle = document.querySelector(
      ".hero-circle-btn-scrl-down"
    );
    this.scrollHandler();
    this.animateScrolDownBtnCircle();
    this.events();
  }

  events() {
    document.addEventListener("scroll", () => this.scrollHandler());
    if (this.scrollDownBtn) {
      this.scrollDownBtn.onclick = () => this.heroScrollToHandler();
    }
    if (this.scrollToTopBtn) {
      this.scrollToTopBtn.onclick = (e) => this.scrollToTopHandler(e);
    }
  }

  scrollToTopHandler(e) {
    gsap.to(window, {
      duration: 0.2,
      scrollTo: "0",
      ease: "none",
    });
  }

  heroScrollToHandler() {
    gsap.to(window, {
      duration: 0.2,
      scrollTo: ".section-container",
      ease: "none",
    });
  }

  animateScrolDownBtnCircle() {
    if (this.scrollDownBtnCircle) {
      let scrollBtnAnimation;
      let isScrollHeroComplete;
      scrollBtnAnimation = gsap.from(this.scrollDownBtnCircle, {
        duration: 1,
        drawSVG: 0,
      });

      ScrollTrigger.create({
        trigger: "#hero",
        start: "center top",
        end: "bottom 50px",
        onUpdate: ({ progress }) => {
          if (progress === 1) {
            isScrollHeroComplete = true;
          }
        },
        onEnter: () => {
          isScrollHeroComplete = false;
        },
        onLeaveBack: () => {
          if (isScrollHeroComplete) {
            const svgArrow = document.querySelector(
              ".hero__scroll-down__arrow"
            );
            const svgArrowNewOne = svgArrow.cloneNode(true);
            scrollBtnAnimation.restart();
            this.scrollDownBtn.removeChild(svgArrow);
            this.scrollDownBtn.appendChild(svgArrowNewOne);
          }
        },
      });
    }
  }

  scrollHandler() {
    const scrollTop =
      window.scrollY !== undefined
        ? window.scrollY
        : (
            document.documentElement ||
            document.body.parentNode ||
            document.body
          ).scrollTop;

    if (this.mainNav) {
      if (scrollTop > 100) {
        this.mainNav.classList.add("navbar-shrink");
      } else {
        this.mainNav.classList.remove("navbar-shrink");
      }
    }

    if (this.scrollToTopBtn) {
      if (scrollTop > 1200 && scrollTop < this.#lastScrollTop) {
        this.scrollToTopBtn.classList.add("scroll-to-top--show");
      } else {
        this.scrollToTopBtn.classList.remove("scroll-to-top--show");
      }
    }

    this.#lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
  }
}

export default GlobalScrollHandler;
