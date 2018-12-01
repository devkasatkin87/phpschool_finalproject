<?php

namespace src\components\loader;

class LoaderHandler
{
    public $image;
    
    public function __construct(LoaderEntity $image) 
    {
        $this->image = $image;
    }
    
    /**
     * @param string $filePath
     * @param string $defaultExtension
     * @return string 
     *      */
    public function save()
    {
        $message = '';
        
        $message = $this->checkErrors($this->image->getError(), $this->image->getPath());
        
        if (!empty($message)){
            return $message;
        }

        $message = $this->checkSize($this->image->getPath());
        if(!is_int($message)){
            return $message;
        }
        
        // Сгенерируем новое имя файла на основе MD5-хеша
        $name = md5_file($this->image->getPath());
        // Сгенерируем расширение файла на основе типа картинки
        $extension = image_type_to_extension($message);
        // Сократим .jpeg до .jpg
        $format = str_replace('jpeg', 'jpg', $extension);
        $newPath = ROOT . '/web/images/' . $name . $format;
        // Переместим картинку с новым именем и расширением в папку /pics
        if ($res = move_uploaded_file($this->image->getPath(), $newPath)) {
            var_dump($res);
            return $newPath;
        }else {
            $message = "При сохранении произошла ошибка";
            return $message;
        }
    }

    /**
     * 
     * @param string $filePath
     * @return string
     */
    private function checkSize(string $filePath)
    {
        $error = '';
        
        // Результат функции запишем в переменную
        $image = getimagesize($filePath);
        // Зададим ограничения для картинок
        $limitBytes = 1024 * 1024 * 5;
        $limitWidth = 1280;
        $limitHeight = 768;
        // Проверим нужные параметры
        if (filesize($filePath) > $limitBytes){
            $error = 'Размер изображения не должен превышать 5 Мбайт.';
            return $error;
        }
            
        if ($image[1] > $limitHeight){
            $error = 'Высота изображения не должна превышать 768 точек.';
            return $error;
        }
            
        if ($image[0] > $limitWidth){
            $error = 'Ширина изображения не должна превышать 1280 точек.';
            return $error;
        }
            
        return $image[2];
    }

        /**
     * 
     * @param string $errorCode
     * @param string $filePath
     * @return string
     */
    private function checkErrors($errorCode, string $filePath)
    {
        $outputMessage = '';
        
        // Проверим на ошибки
        if ($errorCode === UPLOAD_ERR_OK || !is_uploaded_file($filePath)) {

            // Массив с названиями ошибок
            $errorMessages = [
                UPLOAD_ERR_INI_SIZE => 'Размер файла превысил значение upload_max_filesize в конфигурации PHP.',
                UPLOAD_ERR_FORM_SIZE => 'Размер загружаемого файла превысил значение MAX_FILE_SIZE в HTML-форме.',
                UPLOAD_ERR_PARTIAL => 'Загружаемый файл был получен только частично.',
                UPLOAD_ERR_NO_FILE => 'Файл не был загружен.',
                UPLOAD_ERR_NO_TMP_DIR => 'Отсутствует временная папка.',
                UPLOAD_ERR_CANT_WRITE => 'Не удалось записать файл на диск.',
                UPLOAD_ERR_EXTENSION => 'PHP-расширение остановило загрузку файла.',
            ];

            // Выведем название ошибки
           return $outputMessage;
        }
        echo "no error";
        // Создадим ресурс FileInfo
        $fi = finfo_open(FILEINFO_MIME_TYPE);
        // Получим MIME-тип
        $mime = (string) finfo_file($fi, $filePath);
        // Закроем ресурс
        finfo_close($fi);
        // Проверим ключевое слово image (image/jpeg, image/png и т. д.)
        if (strpos($mime, 'image') === false){
            $outputMessage = 'Загружать можно только изображения';
        }
            return $outputMessage;
    }
}
