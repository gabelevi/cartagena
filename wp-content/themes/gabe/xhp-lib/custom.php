<?hh // strict

class :x:comment extends :x:primitive {
  category %flow;
  attribute string comment;

  protected function stringify(): string {
    $comment = (string)$this->getAttribute('comment');
    return "<!-- $comment -->";
  }
}
