<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use kartik\icons\Icon;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>

        <div class="wrap">
            <?php
            NavBar::begin([
                'brandLabel' => 'iKHLAS MUDHARABAH',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar navbar-fixed-top',
                ],
            ]);
            $report = [
                    ['span'=>'home','label' => 'รายงาน1', 'url' => ['/report/report1']],
                    ['label' => 'รายงาน2', 'url' => ['/report/report2']]
            ];
            $setting = [
                    ['label' => 'ผู้ใช้งานระบบ', 'url' => ['/site/users']],
                    ['label' => 'ตั้งรหัสผ่านใหม่', 'url' => ['/site/changepwd']]
            ];
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'encodeLabels'=> FALSE,
                'items' => [
                        ['label' => '<span class="glyphicon glyphicon-home"></span> หน้าหลัก', 'url' => ['/site/index']],
                        ['label' => '<span class="glyphicon glyphicon-home"></span> เกี่ยวกับเรา', 'url' => ['/site/about']],
                        ['label' => 'ติดต่อเรา', 'url' => ['/site/contact']],
                        ['label' => 'ทดสอบ', 'url' => ['/site/test']],
                        ['label' => 'รายงาน', 'items' => $report],
                        ['label' => 'ตั้งค่า', 'items' => $setting],
                    Yii::$app->user->isGuest ? (
                                ['label' => 'เข้าสู่ระบบ', 'url' => ['/site/login']]
                            ) : (
                            '<li>'
                            . Html::beginForm(['/site/logout'], 'post', ['class' => 'navbar-form'])
                            . Html::submitButton(
                                    'Logout (' . Yii::$app->user->identity->username . ')', ['class' => 'btn btn-link']
                            )
                            . Html::endForm()
                            . '</li>'
                            )
                ],
            ]);
            NavBar::end();
            ?>

            <div class="container">
                <?=
                Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ])
                ?>
                <?= $content ?>
            </div>
        </div>

        <footer class="footer">
            <div class="container">
                <p class="pull-left">&copy; อิคลาสมูฎอรอบะฮฺ <?= date('Y') ?></p>

                <p class="pull-right"><?= Yii::powered() ?></p>
            </div>
        </footer>

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
