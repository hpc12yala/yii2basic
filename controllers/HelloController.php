<?php
namespace app\controllers;
class HelloController extends \yii\web\Controller {

    public function actionFirst() {
        $say = 'Hello Fisrt  Controller';
            return $this->render('first',['say'=>$say]);
    }

}
