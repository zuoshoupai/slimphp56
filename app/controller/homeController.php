<?php
namespace App\controller;
use Core\Db;
use Slim\Views\PhpRenderer;
use App\model\userModel;
class homeController
{
    public function home($req,$response,$args){ 
        $phpView = new PhpRenderer("./templates"); 
        $param=['title'=>99858,'content'=>'i love this'];
        return $phpView->render($response, "hello.php", $param);
    } 
	public function lists($req,$res,$args){
        echo 'This is list'; 
        $user=Db::table()->select("booking_class",'*');
        var_dump($user); 
		//$userModel=new userModel();
		//$list=$userModel->list();
		//var_dump($list);
		die;
    } 
	public function getOcr($req,$res,$args){
		require_once 'AipOcr.php'; 
		$APP_ID = '10286351';
		$API_KEY = 'H3INQEcD79APBTNcKK7vIAWK';
		$SECRET_KEY = 'b2FxWqWDRibv2cwK8NuGuymvPGHnDH5S'; 
		$client = new \AipOcrs($APP_ID, $API_KEY, $SECRET_KEY);
	    $file=ROOT_PATH.'/static/20191012112309.png'; 
		$image = file_get_contents($file); 
		$res=$client->basicGeneral($image);
		$word=''; 
		if(isset($res['words_result'])){
			foreach($res['words_result'] as $v){
				$word.="\n".$v['words'];
			}
		}
		echo $word=trim($word,"\n");
		
		die;
	}
}