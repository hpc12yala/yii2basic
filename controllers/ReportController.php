<?php

namespace app\controllers;

class ReportController extends \yii\web\controller {

    public function actionReport1() {
        $report= 'Reoprt1 >>>>>>>:1<<<<<<<<';
       return $this->render('report1',['report'=>$report]);
    }

    public function actionReport2() {
        $report= 'Reoprt1 >>>>>>>:2<<<<<<<<';
        return $this->render('report2',['report'=>$report]);
    }

    public function actionReport3() {
         $report='Reoprt1 >>>>>>>:3<<<<<<<<';
        return $this->render('report3',['report'=>$report]);
    }

}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

