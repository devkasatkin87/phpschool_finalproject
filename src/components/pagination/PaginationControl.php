<?php


namespace src\components\pagination;

use src\components\pagination\PaginationEntity;

class PaginationControl {
   
    private $paginationEntity;
    
    public function __construct(PaginationEntity $paginationEntity) {
        $this->paginationEntity = $paginationEntity;
    }
    
    /**
     *  Для вывода ссылок
     * 
     * @return HTML-код со ссылками навигации
     */
    public function get()
    {
        # Для записи ссылок
        $links = null;
        
        $pagination = $this->paginationEntity;
        
        # Получаем ограничения для цикла
        $limits = $pagination->limits();
        $html = '<ul class="pagination">';
        # Генерируем ссылки
        for ($page = $limits[0]; $page <= $limits[1]; $page++) {
            # Если текущая это текущая страница, ссылки нет и добавляется класс active
            if ($page == $pagination->current_page) {
                $links .= '<li class="active"><a href="#">' . $page . '</a></li>';
            } else {
                # Иначе генерируем ссылку
                $links .= $pagination->generateHtml($page);
            }
        }
        # Если ссылки создались
        if (!is_null($links)) {
            # Если текущая страница не первая
            if ($pagination->current_page > 1)
            # Создаём ссылку "На первую"
                $links = $pagination->generateHtml(1, '&lt;') . $links;
            # Если текущая страница не первая
            if ($pagination->current_page < $pagination->amount)
            # Создаём ссылку "На последнюю"
                $links .= $pagination->generateHtml($pagination->amount, '&gt;');
        }
        $html .= $links . '</ul>';
        # Возвращаем html
        return $html;
    }
    
    /**
     * Для генерации HTML-кода ссылки
     * @param int $page - номер страницы
     * 
     * @return
     */
    private function generateHtml(int $page, string $text = null)
    {
        $pagination = $this->paginationEntity;
        # Если текст ссылки не указан
        if (!$text)
        # Указываем, что текст - цифра страницы
            $text = $page;
        $currentURI = rtrim($_SERVER['REQUEST_URI'], '/') . '/';
        $currentURI = preg_replace('~/page-[0-9]+~', '', $currentURI);
        # Формируем HTML код ссылки и возвращаем
        return
                '<li><a href="' . $currentURI . $pagination->index . $page . '">' . $text . '</a></li>';
    }
    /**
     *  Для получения, откуда стартовать
     * 
     * @return массив с началом и концом отсчёта
     */
    private function limits()
    {
        $pagination = $this->paginationEntity;
        # Вычисляем ссылки слева (чтобы активная ссылка была посередине)
        $left = $pagination->current_page - round($pagination->max / 2);
        # Вычисляем начало отсчёта
        $start = $left > 0 ? $left : 1;
        # Если впереди есть как минимум $this->max страниц
        if ($start + $pagination->max <= $pagination->amount)
        # Назначаем конец цикла вперёд на $pagination->max страниц или просто на минимум
            $end = $start > 1 ? $start + $pagination->max : $pagination->max;
        else {
            # Конец - общее количество страниц
            $end = $pagination->amount;
            # Начало - минус $paginantion->max от конца
            $start = $pagination->amount - $pagination->max > 0 ? $pagination->amount - $pagination->max : 1;
        }
        # Возвращаем
        return
                array($start, $end);
    }
}

