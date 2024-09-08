<?php
    $pages_links = [
        'main' => [
            'name' => 'Главная',
            'icon' => 'fal fa-home'
        ],
        'contact' => [
            'name' => 'Контакты',
            'icon' => 'fal fa-address-book'
        ],
        'table' => [
            'name' => 'Таблица умножения',
            'icon' => 'fas fa-times'
        ],
        'calc' => [
            'name' => 'Калькулятор',
            'icon' => 'fas fa-calculator-alt'
        ],
        'slide' => [
            'name' => 'Слайдер',
            'icon' => 'far fa-presentation'
        ],
        'guest' => [
            'name' => 'Гостевая книга',
            'icon' => 'fal fa-books'
        ],
        'test' => [
            'name' => 'Тест',
            'icon' => 'fal fa-vial'
        ]
    ];
    function today(){
        $months = ['Января','Февраля','Марта','Апреля','Мая','Июня','Июля','Августа','Сентября','Октября','Ноября','Декабря'];
        $dates  = [
            'day' => date('d '),
            'month' => date('m'),
            'year' => date(' Y')
        ];
        foreach($dates as $date => $value) {
            echo $date == 'month' ? $months[$value-1] : $value;
        }
    };
    
    function user_info($info){
      $db = db();
      $query = $db->prepare("SELECT user_login, user_name, img_path FROM users INNER JOIN images using(user_id) WHERE user_id=? and img_main=?");
      $query->execute([$_SESSION['id'], 1]);  
      $result = $query->fetch(PDO::FETCH_ASSOC);
      return $result[$info];
    };
    