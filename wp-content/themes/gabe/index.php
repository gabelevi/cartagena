<?hh

require_once "xhp-lib/init.php";

function go(): :xhp {
  return
    <x:doctype>
      <html>
        <head>
          <meta charset="UTF-8" />
          <title>
            {wp_title('$laquo;', true, 'right') . get_bloginfo('name')}
          </title>
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
        </head>
        <body>
          <div id="wrapper">
            <div id="container">
            Hello world!
            </div>
          </div>
        </body>
      </html>
    </x:doctype>;
}

echo (string)go();
