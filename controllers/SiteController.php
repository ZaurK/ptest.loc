<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\User;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup', 'about', 'account'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['about'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            return User::isUserAdmin(Yii::$app->user->identity->username);
                        },
                    ],
                    [
                        'actions' => ['account'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            return User::isUserAdmin(Yii::$app->user->identity->username);
                        },
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
     * {@inheritdoc}
     */
    public function actions()
    {
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
    public function actionIndex()
    {
      $this->layout = 'login';

      if (!Yii::$app->user->isGuest) {
          return $this->goHome();
      }

      $model = new LoginForm();
      if ($model->load(Yii::$app->request->post()) && ($model->loginAdmin() || $model->login())) {
          //return $this->goBack();
          if ((Yii::$app->user->getIdentity())['role'] == '20') {
                  return $this->redirect(['user/index']);
              } else {
                  return $this->redirect(['account/index']);
              }
      }

      $model->password = '';
      return $this->render('login', [
          'model' => $model,
      ]);
    }


    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        $this->layout = 'login';

        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && ($model->loginAdmin() || $model->login())) {
            //return $this->goBack();
            if ((Yii::$app->user->getIdentity())['role'] == '20') {
                    return $this->redirect(['user/index']);
                } else {
                    return $this->redirect(['account/index']);
                }
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }





    public function actionTest()
    {
        if (Yii::$app->request->isAjax) {
        $data = Yii::$app->request->post();
        $name = explode(":", $data['name']);
        $sername = explode(":", $data['sername']);
        $name = $name[0];
        $sername = $sername[0];
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
         return [
            'name' => $name,
            'sername' => $sername,

            ];
        }
        return $this->render('test');
    }




    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        $user_name  = Yii::$app->user->identity->username;
        return $this->render('about', ['user_name' => $user_name,] );
    }


    public function actionAddAdmin() {
    $model = User::find()->where(['username' => 'admin'])->one();
    if (empty($model)) {
        $user = new User();
        $user->username = 'admin';
        $user->fio = 'admin';
        //$user->email = 'zaur@ya.ru';
        $user->email = Yii::$app->params['adminEmail'];
        $user->setPassword('admin');
        $user->role = $user::ROLE_ADMIN;
        $user->generateAuthKey();
        $user->created_at = time();
        $user->updated_at = time();
        if ($user->save()) {
            echo 'good';
        }else{
            var_dump($user->getFirstErrors());
            die;
            }
      }
      //return $this->render('index');
    }


}
