<div class="_ShareBtn">
  <ul class="_ShareBtn__list">
    <li class="_ShareBtn__item c-button -line"><a href="https://social-plugins.line.me/lineit/share?url=<?php the_permalink(); ?>" target="_blank"><i class="fa-brands fa-line"></i>LINE</a></li>
    <li class="_ShareBtn__item c-button -twitter"><a id="js-share-twitter" href="https://twitter.com/share?url=web-compass.blog&text=Twitterのシェアをするときの文章です&via=HayaUji" target="_blank" rel="nofollow noopener noreferrer"><i class="fa-brands fa-twitter"></i>Tweet</a>
    <script>
      const share_url = location.href;
      const share_hostpath = location.host + location.pathname;
      const share_title = document.title;
      const share_twitter = document.getElementById("js-share-twitter");
      share_twitter.setAttribute(
        "href",
        "https://twitter.com/share?url=" + share_url + "&text=" + share_title
      );
    </script></li>
    <li class="_ShareBtn__item c-button -feedly"><a href="https://feedly.com/i/subscription/feed%2Fhttps%3A%2F%2Fweb-compass.blog%2Ffeed%2F"  target="blank"><i class="fa-solid fa-rss"></i>Feedly</a></li>
  </ul>
<!-- /._ShareBtn -->
</div>
