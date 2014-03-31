<?hh // strict

class :wp:list-pages extends :li {
  protected function stringify(): string {
    return wp_list_pages('title_li=&echo=0');
  }
}

class :wp:list-categories extends :li {
  protected function stringify(): string {
    return wp_list_categories('show_count=0&title_li=&hide_empty=0&exclude=1&echo=0');
  }
}

class :wp:title extends :x:primitive {
  category %metadata;
  attribute
    string sep = '&raquo;',
    string seplocation = 'left';
  protected function stringify(): string {
    return
      '<title>'.
        wp_title(
          $this->getAttribute('sep'),
          false,
          $this->getAttribute('seplocation'),
        ).
        get_bloginfo('name').
      '</title>';
  }
}
