<?php
/* === условие === */

/*
    В переменной $a лежит текст новости. 
    В переменной $link лежит ссылка на страницу с полным текстом этой новости.
    Нужно в переменную $b записать сокращенный текст новости по правилам:
    - обрезать до 180 символов
    - приписать многоточие
    - последние 2 слова и многоточие сделать ссылкой на полный текст новости.
    Какие проблемы вы видите в решении этой задачи? Что может пойти не так? 
*/

/* === решение === */

// примерный текст
$a = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla suscipit eleifend 
    lorem, non egestas ex ullamcorper id. Integer rhoncus tellus a suscipit tincidunt.
    Nulla tincidunt sagittis leo at vulputate. 
    Vestibulum eu purus quis lectus convallis auctor sit amet eget sem.
    Duis mattis rhoncus auctor. Curabitur maximus, sapien in egestas eleifend, 
    nibh odio aliquam nulla, in efficitur dui lacus ut ligula. 
    Mauris mattis posuere nisi nec pulvinar. Etiam id convallis justo, vitae euismod quam. Quisque quis laoreet nisl. Nullam mattis a justo a blandit. Phasellus lectus orci, volutpat ut tincidunt sit amet, convallis at magna. Nullam sagittis feugiat rutrum. Phasellus in elit mauris. Integer sollicitudin, nulla vitae tempus faucibus, est purus malesuada diam, ut hendrerit tortor risus euismod nunc. Phasellus sit amet nibh eros.
    Mauris et tellus volutpat, iaculis tortor id, posuere mi. 
    Maecenas ornare ullamcorper justo, vitae consequat magna euismod id. 
    Nulla a quam ut erat facilisis blandit. Ut tristique nulla sed lacus consequat porta. 
    Sed lobortis, dui cursus scelerisque tincidunt, ligula mauris faucibus dui, 
    eget accumsan diam nisl in sem. Phasellus magna ligula, eleifend ac cursus ut, 
    blandit consequat purus. Curabitur sit amet nibh non est molestie cursus.
    Suspendisse potenti. In vel sem quis ipsum dignissim pellentesque a eu diam. 
    Nunc nec nisl quis nulla tincidunt luctus quis vitae sapien. 
    Donec egestas diam sit amet eros euismod, non tempor nibh porta. 
    Proin mattis ipsum et aliquam placerat. Integer tristique felis ut tincidunt finibus. 
    Integer ut faucibus mi, semper lobortis justo. In hac habitasse platea dictumst. Nam at laoreet sapien.';

$link = 'https://ru.lipsum.com/feed/html'; // ссылка для примера

// Функция для обрезания новости до 180 символов
function cut180($text){
    $cut = '';
    for ($i=0; $i<180; $i++){
        $cut = $cut . $text[$i];
    }
    return $cut . '...';
}

// Функция добавления ссылки в последние два слова и многоточия
function addLink($text, $link){

    $wordsLink = '<a href=' . '\'' . $link .'\'' . '>';

    $flag = 0;
    for ($w = 183; $w>=0; $w--){    // поиск последних двух слов
        if ($text[$w] == ' '){
            $flag += 1;
        }
        if ($flag == 2){
            $startLinkWith = $w + 1;
        }
    }
    
    for ($i = $startLinkWith; $i<=183; $i++){   // создание ссылки
        $wordsLink = $wordsLink . $text[$i];
    }
    
    for($i = 0; $i < $startLinkWith; $i++){     // создание нового текста с ссылкой
        $newText = $newText . $text[$i];
    }
    return $newText . $wordsLink . '</a>';
}



$b = cut180($a);

echo addLink($b, $link);