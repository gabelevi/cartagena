<?hh // strict

require_once "xhp-lib/init.php";

final class ThemeController {
  private function enqueueScripts(): void {
    wp_enqueue_script(
      'floorplan',
      get_template_directory_uri().'/js/floorplan.js',
      array('jquery'),
      "0.01",
      true /* in_footer */,
    );
  }
  private function renderHead(): :head {
    return
      <head>
        <meta charset="UTF-8" />
        <wp:title sep="&laquo;" seplocation="right" />
        <link
          rel="stylesheet"
          href={get_bloginfo('stylesheet_url')}
          type="text/css" />
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
        <div class="content">
          <div class="leftPane">
            Left pane
          </div>
          <div class="floorplan">
            <div class="zoom">
              <div id="zoom-in" class="zoom-in">+</div>
              <div id="zoom-out" class="zoom-out">&mdash;</div>
            </div>
            <canvas id="canvas"/>
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
        <footer>
          <a href="http://wordpress.org" class="wordpress">
            Powered by Wordpress
          </a>
          &middot;
          <a href="http://github.com/gabelevi" class="wordpress">
            Theme by Gabe Levi
          </a>
        </footer>
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
    $this->enqueueScripts();
    return
      <x:doctype>
        <html>
          {$this->renderHead()}
          {$this->renderBody()}
        </html>
      </x:doctype>;
  }
}
