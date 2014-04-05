<?hh // strict

require_once "xhp-lib/init.php";

final class ThemeController {
  private function renderHead(): :head {
    return
      <head>
        <meta charset="UTF-8" />
        <wp:title sep="&laquo;" seplocation="right" />
        <link
          rel="stylesheet"
          href={get_bloginfo('stylesheet_url')}
          type="text/css" />
        <script
          type="text/javascript"
          src={get_bloginfo('template_url')."/js/scripts.js"} />
        <link
          rel="shortcut icon"
          type="image/x-icon"
          href={get_bloginfo('template_url')."/images/favicon.ico"} />
        <wp:head />
      </head>;
  }

  private function renderBody(): :body {
    return
      <body>
        {$this->renderSidebar()}
        <div id="wrapper">
          <div id="container">
          Hello world!
          </div>
        </div>
        {$this->renderFooter()}
      </body>;
  }

  private function renderFooter(): :xhp {
    $comment = sprintf(
      "%d queries. %f seconds.",
      get_num_queries(),
      timer_stop()
    );
    return
      <x:frag>
        <div id="footer">
          <ul id="credits">
            <li>
              <a href="http://wordpress.org" class="wordpress">
                Powered by Wordpress
              </a>
            </li>
            <li>
              <a href="http://github.com/gabelevi" class="wordpress">
                Theme by Gabe Levi
              </a>
            </li>
          </ul>
        </div>
        <x:comment comment={$comment} />
        <wp:footer/>
      </x:frag>;
  }

  private function renderSidebar(): :xhp {
    return
      <header>
        <nav class="width">
          <a href={get_option('home')}>{html_entity_decode(get_bloginfo('name'))}</a>
        </nav>
      </header>;
  }

  public function render(): :xhp {
    return
      <x:doctype>
        <html>
          {$this->renderHead()}
          {$this->renderBody()}
        </html>
      </x:doctype>;
  }
}
