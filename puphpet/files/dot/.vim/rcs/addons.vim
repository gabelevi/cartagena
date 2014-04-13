let g:pathogen_disabled = []
" call add(g:pathogen_disabled, 'hack')

call pathogen#infect()
call pathogen#helptags()

" colorscheme
colorscheme gabe 

""nerdtree variables
let NERDTreeWinPos = "left"
let NERDChristmasTree = 1
let NERDTreeIgnore=['\.o$', 'testfiles$', '\.coff', '\~$', 'nachos$']

noremap <Space>f :NERDTreeFind<CR>
noremap <Space><Space> :NERDTreeToggle<CR>
"noremap <F6> :NERDTree %:p:h<CR>
