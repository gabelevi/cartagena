<?hh // strict

require_once "xhp-lib/init.php";

final class HomeController {
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
        {wp_head()}
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
        {wp_footer()}
      </x:frag>;
  }

  private function renderSidebar(): :xhp {
    return
      <div id="nav">
        <h1><a href={get_option('home')}>{html_entity_decode(get_bloginfo('name'))}</a></h1>
        <ul id="pages">
          <li><a href={get_option('home')}>Home</a></li>
          <wp:list-pages />
        </ul>
        <h2>Categories</h2>
        <ul id="categories">
          <wp:list-categories />
        </ul>
      </div>;
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
