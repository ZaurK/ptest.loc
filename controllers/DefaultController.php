<?php

namespace app\controllers;

class DefaultController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    // DefaultController.php
    public function actions()
{
    return [
        'image-upload' => [
            'class' => 'vova07\imperavi\actions\UploadFileAction',
            'url' => 'http://localhost:8080/img/uploads/', // Directory URL address, where files are stored.
            'path' => '@app/web/img/uploads', // Or absolute path to directory where files are stored.
        ],
        'images-get' => [
            'class' => 'vova07\imperavi\actions\GetImagesAction',
            'url' => 'http://localhost:8080/img/uploads/', // Directory URL address, where files are stored.
            'path' => '@app/web/img/uploads', // Or absolute path to directory where files are stored.
            'options' => ['only' => ['*.jpg', '*.jpeg', '*.JPG', '*.JPEG', '*.png', '*.PNG', '*.gif', '*.ico']], // These options are by default.
        ],
        'file-delete' => [
           'class' => 'vova07\imperavi\actions\DeleteFileAction',
           'url' => 'http://localhost:8080/img/uploads/', // Directory URL address, where files are stored.
          'path' => '@app/web/img/uploads', // Or absolute path to directory where files are stored.
       ],
        'file-upload' => [
           'class' => 'vova07\imperavi\actions\UploadFileAction',
           'url' => 'http://localhost:8080/files/', // Directory URL address, where files are stored.
           'path' => '@app/web/files', // Or absolute path to directory where files are stored.
           'uploadOnlyImage' => false, // For any kind of files uploading.
           'unique' => false,
           'replace' => true, // By default it throw an excepiton instead.
           'translit' => true,
       ],
        'files-get' => [
           'class' => 'vova07\imperavi\actions\GetFilesAction',
           'url' => 'http://localhost:8080/files/', // Directory URL address, where files are stored.
           'path' => '@app/web/files', // Or absolute path to directory where files are stored.
           'options' => ['only' => ['*.pdf', '*.pptx', '*.zip', '*.doc', '*.docx', '*.xls', '*.xlsx', '*.txt', '*.md']], // These options are by default.
       ],

    ];
}


}
