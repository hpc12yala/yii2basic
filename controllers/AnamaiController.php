<?php
namespace app\controllers;

class AnamaiController extends \yii\web\controller {
    public function actionTest() {
        $name ='HPC12 Yala';
        $a =3;
        $b =5;
        $c = $a*$b;
            return $this->render('test',['name'=>$name,'total'=>$c]);
    }
    
}