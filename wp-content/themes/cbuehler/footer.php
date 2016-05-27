</section>
<footer>
  <div class="wrapper">
    design and content by Christoph Bühler
  </div>
</footer>
</div>
<div id="box">
<div>
  <div id="box-container">
    <div class="wrapper">
      <section>
        <nav id="site-nav">
          <ul>
            <?php
            query_posts(array('post_type' => 'post', 'order' => 'DESC'));

            while (have_posts()) {
              the_post();
              echo "<li><a href=\"" . get_the_permalink() . "\">" . get_the_title() . "</a></li>";
            }
            wp_reset_query();
            ?>
          </ul>
        </nav>
      </section>
      <section>
        <div class="cite">
          Thank you for your visit!
        </div>
        <div id="about">
          I am <i>Christoph B&uuml;hler</i>, a passionate developer and web designer from Liechtenstein.
          <br>
          <br> If you have any questions or requests, <a href="mailto: christoph@cbuehler.li">get in touch</a>!
        </div>
      </section>
    </div>
  </div>
</div>
</div>
<div id="bg-container"></div>
</body>

</html>
