<!--/ Intro Skew Star /-->
<div class="intro intro-single route bg-image" style="background-image: url(img/overlay-bg.jpg)">
  <div class="overlay-mf"></div>
  <div class="intro-content display-table">
    <div class="table-cell">
      <div class="container">
        <h2 class="intro-title mb-4">Artikel Blog</h2>
        <ol class="breadcrumb d-flex justify-content-center">
          <li class="breadcrumb-item">
            <a href="<?php echo base_url(); ?>">Home</a>
          </li>
          <li class="breadcrumb-item">
            <a href="<?php echo base_url('blog'); ?>">Blog</a>
          </li>
          <li class="breadcrumb-item active">Artikel</li>
        </ol>
      </div>
    </div>
  </div>
</div>
<!--/ Intro Skew End /-->

<!--/ Section Blog-Single Star /-->

<section class="blog-wrapper sect-pt4" id="blog">
  <div class="container">
    <div class="row">
      <div class="col-md-8">

        <?php if (count($artikel) == 0) { ?>
          <center>
            <h3 class="mt-5">Artikel Tidak Ditemukan.</h3>
          </center>
        <?php } ?>

        <?php foreach ($artikel as $a) { ?>

          <div class="post-box">
            <div class="post-thumb">
              <?php if ($a->artikel_sampul != "") { ?>
                <img src="<?php echo base_url(); ?>gambar/artikel/<?php echo $a->artikel_sampul ?>" alt="<?php echo $a->artikel_judul ?>" class="img-fluid">
              <?php } ?>
            </div>
            <div class="post-meta">
              <h1 class="article-title"><?php echo $a->artikel_judul ?></h1>
              <ul>
                <li>
                  <span class="ion-ios-person"></span>
                  <a href="#"><?php echo $a->pengguna_nama ?></a>
                </li>
                <li>
                  <span class="ion-pricetag"></span>
                  <a href="#"><?php echo $a->kategori_nama ?></a>
                </li>
              </ul>
            </div>
            <div class="article-content">
              <?php echo $a->artikel_konten ?>
            </div>
          </div>
        <?php } ?>
      </div>

      <div class="col-md-4">
        <div class="widget-sidebar sidebar-search">
          <h5 class="sidebar-title">QR Code</h5>
          <div class="sidebar-content">
            <img src="<?= base_url() ?>qr/<?= $qr->artikel_qr ?>" alt=""><br>
            <center>
              <h5><?= $qr->artikel_judul ?></h5>
            </center>
          </div>
        </div>


        <div class="widget-sidebar sidebar-search">
          <h5 class="sidebar-title">Search</h5>
          <div class="sidebar-content">
            <?php echo form_open(base_url() . 'search'); ?>
            <div class="input-group">
              <input type="text" class="form-control" name="cari" placeholder="Search for..." aria-label="Search for...">
              <span class="input-group-btn">
                <button class="btn btn-secondary btn-search" type="submit">
                  <span class="ion-android-search"></span>
                </button>
              </span>
            </div>
            </form>
          </div>

        </div>
        <div class="widget-sidebar">
          <h5 class="sidebar-title">Artikel Terbaru</h5>
          <div class="sidebar-content">
            <ul class="list-sidebar">
              <?php
              $artikel = $this->db->query("SELECT * FROM artikel,pengguna,kategori WHERE artikel_status='publish' AND artikel_author=pengguna_id AND artikel_kategori=kategori_id ORDER BY artikel_id DESC LIMIT 3")->result();
              foreach ($artikel as $a) {
              ?>
                <li>
                  <a href="<?php echo base_url() . $a->artikel_slug; ?>"><?php echo $a->artikel_judul; ?></a>
                </li>
              <?php
              }
              ?>
            </ul>
          </div>
        </div>
        <div class="widget-sidebar">
          <h5 class="sidebar-title">Halaman</h5>
          <div class="sidebar-content">
            <ul class="list-sidebar">
              <?php
              $halaman = $this->m_data->get_data('halaman')->result();
              foreach ($halaman as $h) {
              ?>
                <li>
                  <a href="<?php echo base_url() . 'page/' . $h->halaman_slug; ?>"><?php echo $h->halaman_judul; ?></a>
                </li>
              <?php
              }
              ?>
            </ul>
          </div>
        </div>
        <div class="widget-sidebar widget-tags">
          <h5 class="sidebar-title">Kategori</h5>
          <div class="sidebar-content">
            <ul>
              <?php
              $kategori = $this->m_data->get_data('kategori')->result();
              foreach ($kategori as $k) {
              ?>
                <li>
                  <a href="<?php echo base_url() . 'kategori/' . $k->kategori_slug; ?>"><?php echo $k->kategori_nama; ?></a>
                </li>
              <?php
              }
              ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--/ Section Blog-Single End /-->