<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                        [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex() {


        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin() {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
                    'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout() {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContact() {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
                    'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout() {
        return $this->render('about');
    }

    public function actionTest() {
//        echo 'Hello Test';
//        echo '<hr>';
//        echo '<hr>';
//        $array = array("Fname" => "Imron", "LName" => "Bin", "Age" => "30");
//        print_r($array);
//        echo '<hr>';
//        foreach ($array as $key => $value) {
//            echo $value . '<BR>';
//        }
        $cars = [
                ["Volvo", 22, 18],
                ["BMW", 15, 13],
                ["Saab", 5, 2],
                ["Land Rover", 17, 15]
        ];
//        print_r($cars);
//        echo '<hr>';
//        for ($i = 0; $i < count($cars); $i++) {
//            //echo $value . '<BR>';
//            echo 'Index of : ' . $i;
//            echo '<tr>';
//            for ($x = 0; $x < count($i); $x++) {
//                echo ' : Car\'s Name : ' . $cars[$i][0];
//                echo '>>> Car\'s Total : ' . $cars[$i][1];
//                echo '>>> Car\'s in Stok : ' . $cars[$i][2];
////                print_r($u);
//            }
//            echo '<hr>';
//        }
//        echo $cars[0][0] . ": In stock: " . $cars[0][1] . ", sold: " . $cars[0][2] . ".<br>";
//        echo $cars[1][0] . ": In stock: " . $cars[1][1] . ", sold: " . $cars[1][2] . ".<br>";
//        echo $cars[2][0] . ": In stock: " . $cars[2][1] . ", sold: " . $cars[2][2] . ".<br>";
//        echo $cars[3][0] . ": In stock: " . $cars[3][1] . ", sold: " . $cars[3][2] . ".<br>";
        //die(); // stop here
        $a = 100;
        $b = 200;
        $c = 300;
        $d= $a+$b+$c;
        $arr = ['orng','green','blue'];
        $person =[ ["Fname" => "Imron", "LName" => "Bin", "Age" => "30"],
                ["Fname" => "Imron1", "LName" => "Bin1", "Age" => "31"],
                ["Fname" => "Imron2", "LName" => "Bin2", "Age" => "32"]];
        $title='iM Application';
        return $this->render('test',['dog'=>$d,'ar'=>$arr,'p'=>$person,'ca'=>$cars,'title'=>$title]);
    }

}
