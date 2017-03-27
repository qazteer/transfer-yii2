<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;

class BehaviorsController extends Controller
{
     public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                	[
                    	'controllers' => ['site'],
                        'actions' => ['login'],
                        'allow' => true,
                        'roles' => ['?'],
                        'verbs' => ['get','post'],
                    ],
                    [
                    	'controllers' => ['site'],
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                        'verbs' => ['post'],
                    ],
                    [
                    	'controllers' => ['usertransfer'],
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['@'],
                        'verbs' => ['post','get'],
                    ],
                    [
                    	'controllers' => ['site'],
                        'actions' => ['index'],
                        'allow' => true,
                    ],
                ],
            ],
            
        ];
    }

}
