<?php

namespace src\components\pagination;

/***
 * @var int $max Ссылок навигации на страницу 
 * @var string $index Ключ для GET, в который пишется номер страницы
 * @var int $current_page Текущая страница
 * @var int $total Общее количество записей
 * @var int $limit Записей на страницу
 */
class PaginationEntity {
    
    private $max = 10;
    private $index = 'page';
    private $currentPage;
    private $total;
    private $limit;
    
    /**
     * Запуск необходимых данных для навигации
     * @param int $total - общее количество записей
     * @param int $limit - количество записей на страницу
     * 
     * @return
     */
    public function __construct($total, $currentPage, $limit, $index)
    {
        # Устанавливаем общее количество записей
        $this->total = $total;
        # Устанавливаем количество записей на страницу
        $this->limit = $limit;
        # Устанавливаем ключ в url
        $this->index = $index;
        # Устанавливаем количество страниц
        $this->amount = $this->amount();
        # Устанавливаем номер текущей страницы
        $this->setCurrentPage($currentPage);
    }
    
    /**
     * Для получения общего числа страниц
     * 
     * @return число страниц
     */
    private function amount()
    {
        # Делим и возвращаем
        return round($this->total / $this->limit);
    }
    
    /**
     * Для установки текущей страницы
     * 
     * @return
     */
    private function setCurrentPage($currentPage)
    {
        # Получаем номер страницы
        $this->current_page = $currentPage;
        # Если текущая страница больше нуля
        if ($this->current_page > 0) {
            # Если текунщая страница меньше общего количества страниц
            if ($this->current_page > $this->amount)
            # Устанавливаем страницу на последнюю
                $this->current_page = $this->amount;
        } else
        # Устанавливаем страницу на первую
            $this->current_page = 1;
    }
    
     /**
     * Для генерации HTML-кода ссылки
     * @param int $page - номер страницы
     * 
     * @return
     */
     public function generateHtml(int $page, string $text = null)
    {
        # Если текст ссылки не указан
        if (!$text)
        # Указываем, что текст - цифра страницы
            $text = $page;
        $currentURI = rtrim($_SERVER['REQUEST_URI'], '/') . '/';
        $currentURI = preg_replace('~/page-[0-9]+~', '', $currentURI);
        # Формируем HTML код ссылки и возвращаем
        return
                '<li><a href="' . $currentURI . $this->index . $page . '">' . $text . '</a></li>';
    }
    
    /**
     *  Для получения, откуда стартовать
     * 
     * @return массив с началом и концом отсчёта
     */
    public function limits()
    {
        # Вычисляем ссылки слева (чтобы активная ссылка была посередине)
        $left = $this->current_page - round($this->max / 2);
        # Вычисляем начало отсчёта
        $start = $left > 0 ? $left : 1;
        # Если впереди есть как минимум $this->max страниц
        if ($start + $this->max <= $this->amount)
        # Назначаем конец цикла вперёд на $pagination->max страниц или просто на минимум
            $end = $start > 1 ? $start + $this->max : $this->max;
        else {
            # Конец - общее количество страниц
            $end = $this->amount;
            # Начало - минус $paginantion->max от конца
            $start = $this->amount - $this->max > 0 ? $this->amount - $this->max : 1;
        }
        # Возвращаем
        return array($start, $end);
    }

}
