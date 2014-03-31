<?hh // decl

function get_bloginfo(string $x): string {}

function wp_list_pages(string $x): string {}
function wp_list_categories(string $x): string {}
function wp_footer(): string {}
function wp_title(string $a, bool $b, string $c): string {}
function wp_head(): string {}

function get_num_queries(): int {}
function timer_stop(int $display=0, int $prec=3): float {}
