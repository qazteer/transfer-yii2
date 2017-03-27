<?php

namespace app\controllers;
use Yii;
use app\models\User;
use app\models\Usertransfer;

class UsertransferController extends BehaviorsController
{
    public function actionIndex()
    {
    	$alltransfers = Usertransfer::find()->where('from_user_id = :fid', [':fid' => Yii::$app->user->id])->orWhere('to_user_id = :tid', [':tid' => Yii::$app->user->id])->asArray()->all();
    	//$rrr = (new \yii\db\Query())->select(['usertransfer.from_user_id', 'usertransfer.to_user_id', 'usertransfer.summa', 'user.username'])->from('usertransfer')->innerJoin('user', 'user.id = usertransfer.from_user_id or user.id = usertransfer.to_user_id')->where('user.id = :id', [':id' => Yii::$app->user->id])->all();
    	//print_r($alltransfers );exit;
    	$usertransfer = new Usertransfer();
    	$user = User::findOne(Yii::$app->user->id);
    	if($usertransfer->load(Yii::$app->request->post())){
    		
    		$post = Yii::$app->request->post();
    
    		$getuser = User::findByUsername($post['Usertransfer']['to_user_id']);
    		if(!$getuser){
	            $newuser = new User();
	            $newuser->username = $post['Usertransfer']['to_user_id'];
	            $newuser->balance = $post['Usertransfer']['summa'];
	            $newuser->save();
	            $user->balance = $user->balance - $post['Usertransfer']['summa'];
	            $user->save();
	            $usertransfer->from_username = $user->username;
	            $usertransfer->to_username = $newuser->username;
	            $usertransfer->to_user_id = $newuser->id;
	            $usertransfer->created_at = time();
	            $usertransfer->updated_at = time();
	            if($usertransfer->save()){
	            	Yii::$app->session->setFlash('success', 'Transfer was successfully completed! New user successfully created!');
	            }else{
	            	Yii::$app->session->setFlash('error_toself', 'Transfer was error!');
	            }       
	            return $this->refresh();
	        }else{
	        	if($getuser->id != Yii::$app->user->id){
	        		$getuser->balance = $getuser->balance + $post['Usertransfer']['summa'];
	        		$getuser->save();
	        		$user->balance = $user->balance - $post['Usertransfer']['summa'];
	            	$user->save();
	            	$usertransfer->from_username = $user->username;
	           		$usertransfer->to_username = $getuser->username;
	            	$usertransfer->to_user_id = $getuser->id;
		            $usertransfer->created_at = time();
		            $usertransfer->updated_at = time();
		            if($usertransfer->save()){
		            	Yii::$app->session->setFlash('success', 'Transfer was successfully completed!');
		            }else{
		            	Yii::$app->session->setFlash('error_toself', 'Transfer was error!');
		            }
	            	return $this->refresh();
	        	}else{
	        		Yii::$app->session->setFlash('error_toself', 'You can not transfer to yourself!');
	        		return $this->refresh();
	        	}
	        }
    	}
    	
    	//print_r($user->username);exit;
        return $this->render('index',['user'=>$user, 'usertransfer'=>$usertransfer, 'alltransfers'=>$alltransfers]);
    }

    // public function actionAdd(){

    // }

}
