class AboutCorpVideo {
  constructor() {
    this.modalEl = document.getElementById("about-vp-modal");
    this.bsModal = null;
    if (this.modalEl) {
      this.bsModal = new bootstrap.Modal(this.modalEl);
      const vid = this.modalEl.querySelector("video");
      this.modalEl.addEventListener("hidden.bs.modal", (e) => {
        vid.pause();
        vid.currentTime = 0;
        document.activeElement.blur();
      });
    }
    this.btnEl = document.querySelector(".btn-play-about__link-btn");
    this.init();
  }

  init() {
    this.btnEl.onclick = (e) => {
      e.preventDefault();
      if (this.bsModal) {
        this.bsModal.show();
      }
    };
  }
}

export default AboutCorpVideo;
