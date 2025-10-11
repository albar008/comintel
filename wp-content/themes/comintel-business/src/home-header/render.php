<header id="hero" class="pt-5">
  <div class="container pt-4 pt-xl-5">
    <div class="row pt-5">
      <div class="col-12 col-md-9 text-md-start">
        <div class="hero__content-container"><small class="fs-5"><?php echo $attributes['headerSubTitle']; ?></small>
          <h1 class="hero__main-title" style="font-family: Unna, serif;"><?php echo $attributes['headerTitle']; ?></h1>
          <p><?php echo $attributes['headerDesc']; ?></p><a href="<?php echo esc_url(site_url('about-us')) ?>"
            class="btn btn-secondary mt-3" role="button"><i class="far fa-paper-plane"></i>&nbsp;<span
              style="font-weight: normal !important;"><?php echo $attributes['headerCtaText']; ?></span></a>
        </div>
      </div>
    </div>
    <div class="hero__scroll-down">
      <!-- Start: Circle SVG --><svg viewBox="0 20 100 60">
        <defs>
          <style>
            circle {
              stroke: var(--brand-secondary);
            }
          </style>
        </defs>
        <circle class="hero-circle-btn-scrl-down" cx="50" cy="50" r="27" stroke="#3498db" stroke-width="2"
          fill="none" />
      </svg><!-- End: Circle SVG --><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
        viewBox="0 0 16 16" class="bi bi-arrow-down hero__scroll-down__arrow"
        style="font-size: 1.5rem;position: absolute;">
        <path fill-rule="evenodd"
          d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1">
        </path>
      </svg><small>Scroll Down</small>
    </div>
  </div>
</header><!-- Start: About -->