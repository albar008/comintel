<header id="page-header" class="pt-4">
  <div id="page-header__particles"></div>
  <div class="container pt-4 pt-xl-5">
    <div class="row pt-4">
      <div class="col-12 text-md-start">
        <div class="page-header__content-container">
          <h1 class="page-header__title" style="font-family: Unna, serif;"><?php echo $args['title'] ?></h1>
          <?php if (isset($args['subtitle']) && !empty($args['subtitle'])) { ?>
            <p><?php echo $args['subtitle'] ?></p>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</header>