      <footer class="PageFooter" id="page-footer">
        <div class="inner">
          <div class="FooterInformation">
            <p class="FooterInformation__logo">
              <a href="<?php echo home_url( '/' ); ?>">webコンパス</a>
            </p>
            <p class="FooterInformation__message">現役WebエンジニアによるWeb制作者・プログラマーのための独学サイト</p>
          </div>
          <div class="FooterBottom">
            <div class="FooterBottom__description">
              <h4>webコンパスについて</h4>
              <p>webコンパスは〇〇の解説をしています。<br>
              現役コーダーによるWebサイト制作の解説をしています。</p>
            </div>
            <div class="FooterBottom__category">
              <h4>Category</h4>
              <ul class="FooterBottom__categoryList">
                <li><a href="<?php echo home_url( '/category/wordpress/' ); ?>">WordPress</a></li>
                <li><a href="<?php echo home_url( '/category/html/' ); ?>">HTML</a></li>
                <li><a href="<?php echo home_url( '/category/css/' ); ?>">CSS</a></li>
                <li><a href="<?php echo home_url( '/category/javascript/' ); ?>">JavaScript</a></li>
              </ul>
            </div>
            <div class="FooterBottom__contact">
              <h4>Contact</h4>
              <div class="FooterBottom__contactButton">
                <a href="<?php echo home_url( '/profile/' ); ?>" class="Button">運営者情報はこちら</a>
              </div>
              <div class="FooterBottom__contactButton">
                <a href="<?php echo home_url( '/contact/' ); ?>" class="Button">ご相談・お問い合わせはこちら</a>
              </div>
            </div>
          <!-- /.FooterBottom -->
          </div>
          <p class="FooterCopyright">
            <small>© 2023<a href="<?php echo home_url( '/' ); ?>">webコンパス</a></small>
          </p>
        </div>
      <!-- /.PageFooter -->
      </footer>
    <!-- /.PageContainer -->
    </div>
  <?php wp_footer(); ?>
  <!-- /.Page -->
  </body>
</html>