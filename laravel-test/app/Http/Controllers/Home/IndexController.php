<?php

namespace App\Http\Controllers\Home;

use App\Model\Admin\Friendlylink;
use App\Model\Admin\Game;
use App\Model\Home\Advert;
use App\Model\Home\Cover;
use App\Model\Home\Aboutme;
use App\Model\Home\Say;
use App\Model\Home\view;
use App\Model\Home\Comment;
use App\Model\home\CommentLikes;
use App\Model\Home\integrade;
use App\Model\Home\integradeDo;
use App\Home\Album;
use App\Home\Diary;
use App\Home\Friend;
use App\Home\Photo;
use App\Model\Home\Information;
use App\Model\Home\Lamp;
use App\Model\Home\Report;
use App\Model\Home\Word;
use App\Tool\Result;
use App\User;
use App\Tool\SMS\SendTemplateSMS;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    //主页
        public function index()
    {
        $uid=Auth::user()->id;
        $icon=User::find($uid)->avatar;
        $allfriend=DB::table('users')->join('friends','users.id','friends.user1id')->where('users.id',$uid)->get()->toarray();
        $uf[]=$uid;
        if(count($allfriend) != 0) {
            foreach ($allfriend as $v) {
                $uf[] = $v->user2id;
            }
        }
        $comment=DB::table('diarys')->select('diarys.id as id_d','diarys.uid','content','likenum','utime','cstate','users.id as id_u','name','sex','birthday','email','avatar','confirmed_code','is_confirmed')->whereIn('uid',$uf)->join('users','diarys.uid','users.id')->get();
//        表情

        $preg = array(
            '/\[织\]/',
            '/神马\]/',
            '/\[浮云\]/',
            '/\[给力\]/',
            '/\[围观\]/',
            '/\[威武\]/',
            '/\[熊猫\]/',
            '/兔子\]/',
            '/\[奥特曼\]/',
            '/\[囧\]/',
            '/\[互粉\]/',
            '/\[礼物\]/',
            '/呵呵\]/',
            '/嘻嘻\]/',
            '/\[哈哈\]/',
            '/\[可爱\]/',
            '/\[可怜\]/',
            '/\[挖鼻屎\]/',
            '/\[吃惊\]/',
            '/\[害羞\]/',
            '/\[挤眼\]/',
            '/\[闭嘴\]/',
            '/\[鄙视\]/',
            '/\[爱你\]/',
            '/\[泪\]/',
            '/\[偷笑\]/',
            '/\[亲亲\]/',
            '/\[生病\]/',
            '/\[太开心\]/',
            '/\[懒得理你\]/',
            '/\[右哼哼\]/',
            '/\[左哼哼\]/',
            '/\[嘘\]/',
            '/\[衰\]/',
            '/\[委屈\]/',
            '/\[吐\]/',
            '/\[打哈气\]/',
            '/\[抱抱\]/',
            '/\[怒\]/',
            '/\[疑问\]/',
            '/\[馋嘴\]/',
            '/\[拜拜\]/',
            '/\[思考\]/',
            '/\[汗\]/',
            '/\[困\]/',
            '/\[睡觉\]/',
            '/\[钱\]/',
            '/\[失望\]/',
            '/\[酷\]/',
            '/\[花心\]/',
            '/\[哼\]/',
            '/\[鼓掌\]/',
            '/\[晕\]/',
            '/\[悲伤\]/',
            '/\[抓狂\]/',
            '/\[黑线\]/',
            '/\[阴险\]/',
            '/\[怒骂\]/',
            '/\[心\]/',
            '/\[伤心\]/',
            '/\[猪头\]/',
            '/\[ok\]/',
            '/\[耶\]/',
            '/\[good\]/',
            '/\[不要\]/',
            '/\[赞\]/',
            '/\[来\]/',
            '/\[弱\]/',
            '/\[蜡烛\]/',
            '/\[钟\]/',
            '/\[蛋糕\]/',
            '/\[话筒\]/',
            '/\[围脖\]/',
            '/\[转发\]/',
            '/\[路过这儿\]/',
            '/\[bofu变脸\]/',
            '/\[gbz困\]/',
            '/\[生闷气\]/',
            '/\[不要啊\]/',
            '/\[dx泪奔\]/',
            '/\[运气中\]/',
            '/\[有钱\]/',
            '/\[冲锋\]/',
            '/\[照相机\]/'
        );
        $replace = array(
            '<img src="/home/img/images/zz2_thumb.gif" >',
            '<img src="/home/img/images/horse2_thumb.gif" >',
            '<img src="/home/img/images/fuyun_thumb.gif" >',
            '<img src="/home/img/images/geili_thumb.gif" >',
            '<img src="/home/img/images/wg_thumb.gif" >',
            '<img src="/home/img/images/vw_thumb.gif" >',
            '<img src="/home/img/images/panda_thumb.gif" >',
            '<img src="/home/img/images/rabbit_thumb.gif" >',
            '<img src="/home/img/images/otm_thumb.gif" >',
            '<img src="/home/img/images/j_thumb.gif" >',
            '<img src="/home/img/images/hufen_thumb.gif" >',
            '<img src="/home/img/images/liwu_thumb.gif" >',
            '<img src="/home/img/images/smilea_thumb.gif" >',
            '<img src="/home/img/images/tootha_thumb.gif" >',
            '<img src="/home/img/images/laugh.gif" >',
            '<img src="/home/img/images/tza_thumb.gif" >',
            '<img src="/home/img/images/kl_thumb.gif" >',
            '<img src="/home/img/images/kbsa_thumb.gif" >',
            '<img src="/home/img/images/cj_thumb.gif" >',
            '<img src="/home/img/images/shamea_thumb.gif" >',
            '<img src="/home/img/images/zy_thumb.gif" >',
            '<img src="/home/img/images/bz_thumb.gif" >',
            '<img src="/home/img/images/bs2_thumb.gif" >',
            '<img src="/home/img/images/lovea_thumb.gif" >',
            '<img src="/home/img/images/sada_thumb.gif" >',
            '<img src="/home/img/images/heia_thumb.gif" >',
            '<img src="/home/img/images/qq_thumb.gif" >',
            '<img src="/home/img/images/sb_thumb.gif" >',
            '<img src="/home/img/images/mb_thumb.gif" >',
            '<img src="/home/img/images/ldln_thumb.gif" >',
            '<img src="/home/img/images/yhh_thumb.gif" >',
            '<img src="/home/img/images/zhh_thumb.gif" >',
            '<img src="/home/img/images/x_thumb.gif" >',
            '<img src="/home/img/images/cry.gif" >',
            '<img src="/home/img/images/wq_thumb.gif" >',
            '<img src="/home/img/images/t_thumb.gif" >',
            '<img src="/home/img/images/k_thumb.gif" >',
            '<img src="/home/img/images/bba_thumb.gif" >',
            '<img src="/home/img/images/angrya_thumb.gif" >',
            '<img src="/home/img/images/yw_thumb.gif" >',
            '<img src="/home/img/images/cza_thumb.gif" >',
            '<img src="/home/img/images/88_thumb.gif" >',
            '<img src="/home/img/images/sk_thumb.gif" >',
            '<img src="/home/img/images/sweata_thumb.gif" >',
            '<img src="/home/img/images/sleepya_thumb.gif" >',
            '<img src="/home/img/images/sleepa_thumb.gif" >',
            '<img src="/home/img/images/money_thumb.gif" >',
            '<img src="/home/img/images/sw_thumb.gif" >',
            '<img src="/home/img/images/cool_thumb.gif" >',
            '<img src="/home/img/images/hsa_thumb.gif" >',
            '<img src="/home/img/images/hatea_thumb.gif" >',
            '<img src="/home/img/images/gza_thumb.gif" >',
            '<img src="/home/img/images/dizzya_thumb.gif" >',
            '<img src="/home/img/images/bs_thumb.gif" >',
            '<img src="/home/img/images/crazya_thumb.gif" >',
            '<img src="/home/img/images/h_thumb.gif" >',
            '<img src="/home/img/images/yx_thumb.gif" >',
            '<img src="/home/img/images/nm_thumb.gif" >',
            '<img src="/home/img/images/hearta_thumb.gif" >',
            '<img src="/home/img/images/unheart.gif" >',
            '<img src="/home/img/images/pig.gif" >',
            '<img src="/home/img/images/ok_thumb.gif" >',
            '<img src="/home/img/images/ye_thumb.gif" >',
            '<img src="/home/img/images/good_thumb.gif" >',
            '<img src="/home/img/images/no_thumb.gif" >',
            '<img src="/home/img/images/z2_thumb.gif" >',
            '<img src="/home/img/images/come_thumb.gif" >',
            '<img src="/home/img/images/sad_thumb.gif" >',
            '<img src="/home/img/images/lazu_thumb.gif" >',
            '<img src="/home/img/images/clock_thumb.gif" >',
            '<img src="/home/img/images/cake.gif" >',
            '<img src="/home/img/images/m_thumb.gif" >',
            '<img src="/home/img/images/weijin_thumb.gif" >',
            '<img src="/home/img/images/lxhzhuanfa_thumb.gif" >',
            '<img src="/home/img/images/lxhluguo_thumb.gif" >',
            '<img src="/home/img/images/bofubianlian_thumb.gif" >',
            '<img src="/home/img/images/gbzkun_thumb.gif" >',
            '<img src="/home/img/images/boboshengmenqi_thumb.gif" >',
            '<img src="/home/img/images/chn_buyaoya_thumb.gif" >',
            '<img src="/home/img/images/daxiongleibenxiong_thumb.gif" >',
            '<img src="/home/img/images/cat_yunqizhong_thumb.gif" >',
            '<img src="/home/img/images/youqian_thumb.gif" >',
            '<img src="/home/img/images/cf_thumb.gif" >',
            '<img src="/home/img/images/camera_thumb.gif" >'
        );
//        dd($comment);
        foreach ($comment as $a){
            $commentnum=DB::table('comments')->where('tid', $a->id_d )->get();
            $a->count=DB::table('comments')->where('tid', $a->id_d )->count();
            $a->comment=[];
            foreach($commentnum as $vv ){
                $bb=DB::table('users')->where('id',$vv->uid)->get()->toArray();
//                dd($vv);
                $bb[0]->uid=$bb[0]->id;
                $bb[0]->id_c=$vv->id_c;
                $bb[0]->utime_c=$vv->utime_c;
                $vv->content_c = preg_replace($preg, $replace, $vv->content_c);
                $bb[0]->content_c = $vv->content_c;

                    $bb[0]->num = CommentLikes::where('rid', $vv->id_c)->count();

                $a->comment = array_merge($a->comment,$bb );
            }
        }
//        dd(count($a->comment) > 2);

//
//        foreach ($comment->comment as $k ) {
//           $v->content_c = preg_replace($preg, $replace, $v->content_c);
//        }
//        根据用户的id查找出好友的id 用 orwhere 查出好友的comment遍历出来；
//======================================================================================
//        积分判断
//        $uid=Auth::user()->id;
        $result=integrade::where('uid',$uid)->get();
        if(count($result) == 0){
            $data=array(
                'uid'=>$uid,
            );
            $eid=DB::table('integrade')->insertGetId($data);
            $jf=integradeDo::create([
                'eid'=>$eid,
                'time_d'=>date('Y/m/d',time()),
                'time_m'=>date('h:i:s',time()),
            ]);
            $result=integrade::where('id_e',$eid)->get();
            $t=0;
            $sub=date('i分:s秒',1800);
            $jf=integradeDo::where('eid',$eid)->get()[0];
            $jf->rp_f=1;
//            dd($result);
        }else{
            $eid=$result[0]->id_e;
            $jf=integradeDo::where('eid',$eid)->get()[0];
            $t=strtotime(date('Y/m/d',time()))-strtotime($jf->time_d);
            if(abs($t) >= 86400) {
                $result[0]->rp_z += $result[0]->rp_d;
                $result[0]->rp_d=0;
                $result[0]->save();
                $jf->rp_f=0;
                $jf->save();
            }
            $sub=strtotime(date('h:i:s',time())) - strtotime($jf->time_m);
            if(abs($sub) >= 1800)
            {
                $jf->rp_f += 1;
                $result[0]->rp_d += 1;
                $result[0]->save();
                $jf->time_m=date('h:i:s',time());
                $jf->save();
            }
        }
        $rpd=$result[0]->rp_d;
        $rpz=$result[0]->rp_z;
        $rpf=$jf->rp_f;
        $untime=abs(1800-abs($sub));
        $sub=date('i分:s秒',$untime);
//        遍历可能认识的人
//        学校 地址
//        生日提醒
        $friends=Friend::where('user1id',$uid)->where('status',3)->get()->toarray();
        if(count($friends) > 0) {
            foreach ($friends as $va) {
                $fuid[] = $va['user2id'];
            }

            $userfriend = User::find($fuid)->toarray();
            $str = implode("','", $fuid);
            $ufriend = DB::select("select id,name,avatar,birthday from users where date_format(birthday,'%m%d') between date_format(curdate()-interval 7 day,'%m%d') and
        date_format(curdate()+interval 7 day,'%m%d') and id in ('$str') limit 0,7 ");
//        dd($ufriend);
        }
//-------------------------------------------------------------------------------------
        // dd($comment);
        //广告
        $bigadvert=Advert::where('status','1')->get()->toArray();
        $smalladvert=Advert::where('status','2')->get()->toArray();
        $links = Friendlylink::all()->toArray();//前台链接查询
        return view('home.index',compact('friends','comment','icon','faceImg','rpd','rpz','rpf','sub','friends','ufriend','uid','t','bigadvert','smalladvert','links'));

    }
    
    
    //登录
    public function login()
    {
        return view('home.login');
    }
    //照片集
    public function photo()
    {
        $id=Auth::user()->id;
        $arr=Album::all()->where('uid',$id)->toArray();
        if($arr==[]){
            return view('home/photo')->with('arr',[]);
        }
        $arr=array_merge($arr);
        $spaths=Album::where('uid',$id)->pluck('id')->toArray();
        $s=[];
        $count=count($spaths);
        foreach ($spaths as $k=> $spath){
            $spathes=Photo::select('pho_name','savepath')->where('aid',$spath)->limit(1)->get()->toArray();
            if(count($spathes)){
                $spathe[]=$spathes[0];
            }else{
                $spathes=array(
                    "pho_name" => "default_icon.png",
                    "savepath" => "home/img"
                );
                $spathe[]=$spathes;
            }
        }
        for($i=0;$i<$count;$i++){
            $s[$i]=array_merge($arr[$i],$spathe[$i]);
        }
        return view('home.photo')->with('arr',$s);

    }
    //写日志
    public function writediary()
    {
        return view('home.writediary');
    }
    //日志
    public function diary()
    {

        $uid=Auth::user()->id;
        $result=Diary::all()->where('uid',$uid)->toArray();
        return view('home.diary')->with('arr',$result);
    }
    //把日志写进数据库
    public function dophoto(Request $request)
    {

        //接收前台传过来的数据
        $token=$request->input('_token'); //token
        $title=$request->input('title');  //题目
        $content=$request->input('content'); //文章
        $id=$request->input('id'); //用户id
        $utime=time();              //创建时间
        $url=$id.'_'.$utime;        //保存路径
        $cstate=$request->input('cstate');//1公开2不公开
        $photoname='';
        if($title=="" || $content==""){
            return redirect('/home/writediary')->withErrors('题目或者内容不能为空');
        }
        $a=1;
        //如果有图片就保存
        if($request->pic){
            if(count($request->all()['pic'])>9 ){
                return back()->withErrors('最多9张jpg图片');
            }
            foreach($request->file('pic') as $file) {
                $lastname = substr($_FILES['pic']['name'][0], strrpos($_FILES['pic']['name'][0], '.'), 5);
                if($lastname!='.jpg'){
                    return back()->withErrors('请选择jpg图片');
                }
            }

            foreach($request->file('pic') as $file) {
                if($a>9){
                    break;
                }
                $file->move('img/'.$url, $a .'.jpg');
                $a++;
            }
        }

        if(DB::table('diarys')->where('uid',$id)->where('title',$title)->where('content',$content)->first()){
            return redirect('/home/writediary')->withErrors('你应经发表过这篇日志了');
        }
        $arr=array(
            'uid'=>$id,
            'title'=>$title,
            'content'=>$content,
            'likenum'=>0,
            'cstate'=>0,
            'utime'=>$utime,
            'photoname'=>$a-1,
            'cstate'=>$cstate,
            'remember_token'=>$token
        );
        if(DB::table('diarys')->insert($arr)){
            return redirect('/home/writediary')->withErrors('发表成功');
        }else{
            return redirect('/home/writediary')->withErrors('发表失败');
        }
    }

    //个人中心
    public function center(){
        return view('home.myself');
    }

    //创建相册
    public function doalbum(Request $request)
    {
        $aa=$request->all();
        $name=$aa['pname'];
        $uid=$aa['uid'];

        //判断有没有原来的数据 有的话就返回原来的网页
        if(count(Album::all()->where('pname',$name)->where('uid',$uid)) || $name==null){
            return back()->withErrors('此相册已经创建过');
        }

        $bb=array_shift($aa);
        $time=array(
            'time'=>time(),
        );
        $aa=array_merge($aa,$time);
        $r=Album::insert($aa);
        if($r){
            return back()->withErrors('创建成功');
        }else{
            return back()->withErrors('创建失败');
        }

    }
    //更新图片
    public function upphoto(Request $request)
    {
        $array=$request->all();
        if(count($array)<3){
            return back()->withErrors('请先创建相册或者上传图片');
        }

        $aid=$array['myphoto'];
        $time=time();
        $a=array(
            'aid'=>$aid,
            'time'=>$time
        );
        $id=Auth::user()->id;
        $arr=Album::all()->where('uid',$id)->toArray();
        //循环遍历图片路径
        $spath=Album::where('uid',$id)->pluck('id')->toArray();
        if($spath==[]){
            return back()->withErrors('此相册不存在');
        }
        foreach ($spath as $spa){
            $spaths[]=Photo::where('aid',$spa)->first();
        }
        $arr=array_merge($arr,$spaths);
        if( ! $request->pic){
            return redirect('home/photo')->withErrors('请上传图片');
        }
        $aass=Album::find($aid);
        $uid=$aass['uid'];
        $pname=$aass['pname'];
        //存放路径 img/xxx_Xxx
        $str=$uid.'_'.$pname;
        foreach($request->file('pic') as $file) {
            $lastname = substr($_FILES['pic']['name'][0], strrpos($_FILES['pic']['name'][0], '.'), 5);
            if($lastname!='.jpg'){
                return back()->withErrors('请选择jpg的图片上传');
            }
        }
        foreach($request->file('pic') as $file) {
            $lastname = substr($_FILES['pic']['name'][0], strrpos($_FILES['pic']['name'][0], '.'), 5);
            $e=str_random(10);
            $e=$e.$lastname;
            $savepath='img/'.$str;
            $file->move($savepath ,$e);
            $ae=array_merge($a,['pho_name'=>$e,'savepath'=>$savepath]);
            Photo::insert($ae);
            $a++;
        }
        return redirect('/home/photo')->withErrors('上传成功');
    }
    //删除相册
    public function delpho($id)
    {
        $uid=Auth::user()->id;
        if(! $id){
            return back()->withErrors('相册ID不存在');
        }
        //相册名
        $pname=Album::select('pname')->where('id',$id)->get();
        if($pname->toArray() ==[]){
            return back()->withErrors('相册不存在');
        }
        $result=Photo::where('aid',$id)->get()->toArray();
        if($result){
            foreach ($result as $r) {
                if (file_exists($r['savepath'] . '/' . $r['pho_name'])){
                    unlink($r['savepath'] . '/' . $r['pho_name']);
                }
            }
        }
        $pname=$pname[0]['pname'];
        if (file_exists('img/'.$uid.'_'.$pname)){
            rmdir('img/'.$uid.'_'.$pname);
        }
        //删除相册中的数据
        $r1=Album::where('id',$id)->delete();
        //删除图片中的数据 没有值就默认成功
        $r2=1;
        $countphoto=count(Photo::where('aid',$id)->get()->toArray());
        if($countphoto!=0){
            $r2=Photo::where('aid',$id)->delete();
        }
        if($r1 && $r2){
            return back()->withErrors('删除成功');
        }else{
            return back()->withErrors('删除失败,稍后再试');
        }

    }
    //图片页
    public function photos($id)
    {
        $aid=$id;
        $uid=Auth::user()->id;
        $r=Album::where('id',$aid)->where('uid',$uid)->get()->toArray();
        if($r==[]){
            return redirect('home/photo')->withErrors('没有这条相册');
        }
        $status=$r[0]['status'];
        $result=Photo::select()->where('aid',$aid)->get();
        if($result->toArray() !=[]){
//            foreach ($result->toArray() as $res){
//                $res['status']=$status;
//            }
//            dd($result->toArray());
            return view('home/photos')->with('arr',$result)->with('aid',$id)->with('status',$status);
        }else{
            return view('home/photos')->with('arr',[])->with('aid',$id);
        }
    }
    //删除图片
    public function delphos($id)
    {
        $result=Photo::where('id',$id)->first();
        if($result==null){
            return back()->withErrors('此图片已被删除');
        }
        if($result){
            if(file_exists($result['savepath'].'/'.$result['pho_name'])){
                unlink($result['savepath'].'/'.$result['pho_name']);
            }
        }
        Photo::where('id',$id)->delete();
        return back()->withErrors('删除成功');
    }
    //更新日志页
    public function updatediary($id)
    {
        if(! $id){
            return back()->withErrors('id值不能为空');
        }
        $result=Diary::where('id',$id)->get()->toArray();
        if($result==[]){
            return back()->withErrors('此数据不存在');
        }
        $result=$result[0];
        if(empty($result)){
            return back()->withErrors('此文章可能不存在,请稍后再修改');
        }
        // dd($result);
        return view('home.updatediary')->with('arr',$result);
    }

    //处理更新日志
    public function doupdiary(Request $request)
    {
        $result=$request->all();
        //去掉token
        array_pop($result);
        //最后一个是id
        $id=array_pop($result);
        $r=Diary::where('id',$id)->get()->toArray();
        $r=$r[0];
        //判断跟原来的内容一致就返回
        if($result['title']==$r['title'] && $result['content']==$r['content'] && $result['cstate']==$r['cstate'] )
        {
            $result=Diary::where('id',$id)->get()->toArray();
            $result=$result[0];
            if(empty($result)){
                return back()->withErrors('此文章可能不存在,请稍后再修改');
            }
            return back()->withErrors('请修改信息');
        }

        if(Diary::where('id',$id)->update($result)){
            $uid=Auth::user()->id;
//            $result=Diary::all()->where('uid',$uid)->toArray();
            return back()->withErrors('修改成功');
        }else{
//            $result=Diary::where('id',$id)->get()->toArray();
//            $result=$result[0];
            if(empty($result)){
                return back()->withErrors('此文章可能不存在,请稍后再修改');
            }
            return back()->withErrors('修改失败,请稍后再试');
        }

    }

    //删除日志
    public function deldiary($id)
    {
        $time=Diary::select('utime')->where('id',$id)->get();
        $time=$time[0]['utime'];

        if(! $id){
            return back()->withErrors('id值不能为空');
        }
        if(Diary::where('id',$id)->delete()){
            $uid=Auth::user()->id;
            
            $path='img/'.$uid.'_'.$time;
            if(file_exists($path)){
            $fh = opendir($path);
            while(($row = readdir($fh)) !== false){
                //过滤掉虚拟目录
                if($row == '.' || $row == '..'){
                    continue;
                }

                if(!is_dir($path.'/'.$row)){
                    unlink($path.'/'.$row);
                }

            }
            closedir($fh);
            rmdir($path);
            }        
            return back()->withErrors('删除成功');
        }else{
            return back()->withErrors('删除失败');
        }

    }

//-------------------------------------------------------------------------留言
    //留言
    public function words()
    {
        $uid=Auth::user()->id;
        $arr=Word::where('user2id',$uid)->where('status','1')->orderBy('time','desc')->paginate(10);
        $aw=Word::where('user2id',$uid)->where('status','1')->orderBy('time','desc')->get()->toArray();
        if($aw==[]){
            return view('home.words')->with('arr',$aw);
        }
        //循环遍历出名字
        foreach ($arr as $k=>$v){
            $r=User::select('name','avatar')->where('id',$v['user1id'])->get()->toArray();
            if($r==[]){
                $arr[$k]['user1id']='无此用户';
                continue;
            }
            $arr[$k]['user1id']=$r[0]['name'];
            $arr[$k]['pic']=$r[0]['avatar'];
        }
        return view('home.words')->with('arr',$arr);
    }
    //自己删除留言,对自己不可见
    public function wordsmydel($id){
        $r=Word::where('id',$id)->where('status',1)->get()->toArray();
        if($r==[]){
            return back()->withErrors('此留言不存在');
        }
        $result=Word::find($id);
        $result->status=2;
        $check=$result->save();
        if($check){
            return back()->withErrors('删除成功');
        }else{
            return back()->withErrors('删除失败');
        }
    }
    //查看我给好友的留言
    public function wordstofriends(){
//        dd(3);
        $uid=Auth::user()->id;
        $arr=Word::where('user1id',$uid)->where('status','1')->orderBy('time','desc')->paginate(10);
        $aw=Word::where('user1id',$uid)->where('status','1')->orderBy('time','desc')->get()->toArray();
        if($aw==[]){
            return view('home.wordstofriends')->with('arr',$aw);
        }
        //循环遍历出名字
        foreach ($arr as $k=>$v){
            $r=User::select('name','avatar')->where('id',$v['user2id'])->get()->toArray();
            if($r==[]){
                $arr[$k]['user2id']='无此用户';
                continue;
            }
            $arr[$k]['user2id']=$r[0]['name'];
            $arr[$k]['pic']=$r[0]['avatar'];
            // dd($r);
        }
        // dd($arr->toArray());
        return view('home.wordstofriends')->with('arr',$arr);
    }
    //删除自己给别人的留言
    public function wordsdel($id)
    {
        $r=Word::where('id',$id)->get()->toArray();
        if($r==[]){
            return back()->withErrors('此留言不存在');
        }
        $result=Word::find($id)->delete();
        if($result){
            return back()->withErrors('删除成功');
        }else{
            return back()->withErrors('删除失败');
        }
    }
    //给别人留言页面
    public function wtf(){
        $id=Auth::user()->id;
        $result=Friend::select('user1id','user2id')->where('status',3)->where('user1id',$id)->orwhere('user2id',$id)->where('status',3)->get()->toArray();
//        $arr=Friend::select('user1id','user2id')->where('status',3)->where('user1id',$id)->orwhere('user2id',$id)->where('status',3)->paginate(1);
        $userinfo=[];
        //把查出来的数据id去查用户信息 储存在一个数组中 然后传到friends
        foreach($result as $r){
            if($r['user1id'] != $id ){
                $userinfo[]=User::where('id',$r['user1id'])->get()->toArray()[0];
            }
            if($r['user2id'] != $id ){
                $userinfo[]=User::where('id',$r['user2id'])->get()->toArray()[0];
            }
        }
        return view('/home/wordswtf')->with('arr',$userinfo);
    }
    //处理留言
    public function wordsdo(Request $request,$id)
    {
//        dd($request->all());
        $r=User::where('id',$id)->get()->toArray();
        if($r==[]){
            return back()->withErrors('此好友不存在');
        }
        $uid=Auth::user()->id;
        //判断是否有好友关系
        $r1=Friend::where('user1id',$id)->where('user2id',$uid)->where('status',3)->get()->toArray();
        $r2=Friend::where('user2id',$id)->where('user1id',$uid)->where('status',3)->get()->toArray();
        if( ($r1 ==[]) && ($r2 == [])){
            return back()->withErrors('你们不是好友关系');
        }
        $arr=$request->all();
        if(count($arr)<2){
            return back()->withErrors('请输入留言内容');
        }
        if($arr['content']==''){
            return back()->withErrors('请输入留言内容');
        }
        $content=$arr['content'];
        $a=array(
            'user1id'=>$uid,
            'user2id'=>$id,
            'content'=>$content,
            'time'=>time()
        );
        $r=Word::insert($a);
        if($r){
            return back()->withErrors('留言成功');
        }else{
            return back()->withErrors('留言失败');
        }
//        dd($arr);

    }
//---------------------------------------------------------------关于我们
    public function aboutme()
    {
        $r=Aboutme::all()->toArray();
        return view('home/aboutme')->with('arr',$r);
    }
//---------------------------------------------------------------举报管理
    public function report(Request $request){

        if($request->all()){
//            dd($request->all());
            //用户ID
            $uid=Auth::user()->id;
            //用户验证码
            $code=$request->input('code');
            if(strtolower($code) != strtolower(session('code'))) {
                return back()->withErrors('验证码错误');
            }
            $request->session()->forget('code');
            $u1name=$request->input('u1name');
            $u1phone=$request->input('u1phone');
            $u2name=$request->input('username');
            $u2info=$request->input('userinfo');
            if(!($u1name && $u1phone && $u2name && $u2info)){
                return back()->withErrors('必须全填');
            }
            $a=array(
                'u1name'=>$u1name,
                'u2name'=>$u2name,
                'u1phone'=>$u1phone,
                'u2info'=>$u2info
            );
            $r=Report::insert($a);
            if($r){
                return back()->withErrors('举报成功');
            }else{
                return back()->withErrors('举报失败');
            }

            }else{
                return view('home.report');
            }
    }
    //------------------------------------------------举报发送短信
    public function sendcode(Request $request)
    {
        //用户ID
        $uid=Auth::user()->id;
        //字符串验证码
        $str=str_random(4);
        //接收过来的电话号码
        $phone=$request->input('u1phone');
        if(! preg_match("/^1[34578]{1}\d{9}$/",$phone)){
            return "请输入正确的手机号码";
        }
        session(['code'=>$str]);
        $str=strtolower($str);

        $sms=new SendTemplateSMS();
        $result=$sms->sendSMS($phone,array($str,5),1);
        if($result->status!=0){
            return '发送失败';
        }else{
            return '发送成功';
        }

    }


    //好友页
    public function friends()
    {
        $id=Auth::user()->id;
        $result=Friend::select('user1id','user2id')->where('status',3)->where('user1id',$id)->orwhere('user2id',$id)->where('status',3)->get()->toArray();
        $userinfo=[];
        //把查出来的数据id去查用户信息 储存在一个数组中 然后传到friends
        foreach($result as $r){
            if($r['user1id'] != $id ){
                $userinfo[]=User::where('id',$r['user1id'])->get()->toArray()[0];
            }
            if($r['user2id'] != $id ){
                $userinfo[]=User::where('id',$r['user2id'])->get()->toArray()[0];
            }
        }
        return view('/home/friends')->with('arr',$userinfo);
    }
    //删除我的好友
    public function delfriends($id)
    {
        $myid=Auth::user()->id;
        $result=Friend::where('user1id',$id)->where('user2id',$myid)->orwhere('user2id',$id)->where('user1id',$myid)->delete();
        return redirect('home/friends');
    }

    //显示我关注的好友
    public function myfriends()
    {
        $id=Auth::user()->id;
        $result=Friend::where('user1id',$id)->where('status',1)->orderBy('user2id','asc')->get()->toArray();

        $useridinfo=[];
        foreach($result as $user2 ){
            $useridinfo[]=$user2['user2id'];
        }
        $r=User::whereIn('id',$useridinfo)->get()->toArray();
        return view('home/myfriends')->with('arr',$r);
    }
    //删除我关注的好友
    public function delmyfriends($id)
    {
        $myid=Auth::user()->id;
        $result=Friend::select('id')->where('user1id',$myid)->where('user2id',$id)->where('status','1')->get()->toArray();
        if($result != []){
            $fid=$result[0]['id'];
            $r=Friend::where('id',$fid)->delete();
            if($r){
                return back()->withErrors('取关成功');
            }
            return back()->withErrors('删除失败,稍后再试');
        }
        return back()->withErrors('目前你没有关注该好友');

    }
    //显示关注我的好友
    public function friendsmy()
    {
        $myid=Auth::user()->id;
        $result=Friend::where('user2id',$myid)->where('status',1)->orderBy('user1id','asc')->get()->toArray();
//        dd($result);
        $userinfo=[];
        foreach ($result as $v){
            $userinfo[]=$v['user1id'];
        }
//        dd($userinfo);
        $r=User::whereIn('id',$userinfo)->get()->toArray();
        return view('home/friendsmy')->with('arr',$r);
    }
    //显示查询
    public function addfriends()
    {
        return view('home/addfriends');
    }
    //显示查询好友页
    public function searchfriends(Request $request)
    {
        if($request->all()==[]){
            return redirect('home/addfriends');
        }
        $name=$request->all()['name'];
        if((preg_match_all("/[^\s　]+/s",$name))!=1 || $name=="" ){
            $arr='';
            return view('home/searchfriends')->with('result',$arr)->withErrors('请输入正确的内容');
        }

        //查出id并取消当前用户id
        $id=Auth::user()->id;
        //清除name的两边的值
        $name=trim($name," ");
        //判断name有无值
        if($name){
            $result=User::select('id')->where('username','like','%'.$name.'%')->where('id','<>',$id)->get()->toArray();
        }else{
            $result="";
        }
//        dd($result);

        //查不出数据就烦返回无数据
        if($result==[]){
            return view('home/searchfriends')->with('result',$result)->withErrors('无此搜索信息');
        }else{
            $ids=[];
            //判断是否是好友或者有关系de id
            foreach ($result as $v ){
                $r1=Friend::select('user2id')->where('user1id',$id)->where('user2id',$v['id'])->get()->toArray();
                $r2=Friend::select('user1id')->where('user2id',$id)->where('user1id',$v['id'])->get()->toArray();
                if($r1!=[]){
                    $ids[]=$r1[0]['user2id'];
                }
                if($r2!=[]){
                    $ids[]=$r2[0]['user1id'];
                }
            }
            //如果有关系的ID不为空则排除掉
            $lastids=[];
            if($ids!=[]){
                foreach($result as $v){
                    if(in_array($v['id'],$ids)==true){
                        continue;
                    }
                    $lastids[]=$v['id'];
                }
//                dd($ids);
                $result=User::whereIn('id',$lastids)->get()->toArray();
            }
            return view('home/searchfriends',compact('result'));
        }
    }
    //关注好友
    public function doattention($id)
    {
        //用户1的ID
        $myid=Auth::user()->id;
        //用户2的ID
        $user2id=$id;
        //查询有没有关注和被关注
        $result=Friend::select('status')->where('user1id',$myid)->where('user2id',$user2id)->get()->toArray();
        $result1=Friend::select('status')->where('user2id',$myid)->where('user1id',$user2id)->get()->toArray();
//        dd($result1);
        //如果都没有则添加关系
        if($result==[] && $result1==[] ){
            $arr=array(
                'user1id'=>$myid,
                'user2id'=>$user2id,
                'status'=>1
            );
            if(Friend::insert($arr)){
                  redirect('home/myfriends')->withErrors('关注成功');
            }
            //我关注别人,我再点跳到我的好友页
        }elseif($result1==[] && $result[0]['status']==1){
            return redirect('home/friends')->withErrors('此用户已被关注');
            //别人关注我,我点关注就是好友
        }elseif($result==[] && $result1[0]['status']==1){
            //更新数据
            $re=Friend::where('user2id',$myid)->where('user1id',$user2id)->get();
            $id=$re[0]->id;
            $user=Friend::find($id);
            $user->status=3;
            $u=$user->save();
            return redirect('home/friends')->withErrors('你们成为了好友');
        }
        return redirect('home/friends');
    }

    //显示个人主页
    public function myindex()
    {
        $uid=Auth::user()->id;
        $user=User::find($uid);
        $cover=Cover::find($uid);
        $say = DB::table('say')->where('uid',$uid)->get()->toArray();
        return view('home.myindex')->with('user',$user)->with('cover',$cover)->with('say',$say);
    }
    //更换封面
    public function updatecover(Request $request)
    {
        $id = Auth::user()->id;
        $cover = Cover::find($id);
        $reimg = $cover->toArray();
        $reimg = $reimg['img'];
            if ($request->hasFile('img')){
            $imgname = md5(time()).'.jpg';
            $request->file('img')->move('img/home',$imgname);
            $cover->img = $imgname;
            if ( !($reimg == 'cover_guide2.png')){
                unlink('img/home/'.$reimg);
            }
        }
        $result = $cover->save();
        if ($result){
            return back();
        }
        return back();
    }
    //显示个人资料页
    public function information()
    {
        $user = User::find(Auth::user()->id);
        $information = Information::where('uid',Auth::user()->id)->get();
        $work = Information::where('uid',Auth::user()->id)->get();
        $like = Information::where('uid',Auth::user()->id)->get();
        return view('home.information',compact('user','information','work','like'));
    }
    //四级联动
    public function four($upid=0)
    {
        if($_GET['upid']){
            $upid=$_GET['upid'];
        }else{
            $upid=0;
        }
//        $upid = empty($_GET['upid'])?0:$_GET['upid'];
        $data = Lamp::where('upid',$upid)->get();
//        echo json_encode($data);
        return $data;
    }

     //修改个人信息
    public function doinformation(Request $request)
    {
       $personal = User::find(Auth::user()->id);
       $icon = User::where('id',Auth::user()->id)->get()->toArray();
       $icons = $icon[0]['avatar'];
       $personal->username = $request->input('username','');
       $personal->sex = $request->input('sex','');
        $prov = Lamp::select('name')->where('id',$request->input('prov'))->get()->toArray();
        $city = Lamp::select('name')->where('id',$request->input('city'))->get()->toArray();
        $area = Lamp::select('name')->where('id',$request->input('area'))->get()->toArray();
        $street = Lamp::select('name')->where('id',$request->input('street'))->get()->toArray();
       if (!empty($prov)){
           $prov = $prov[0]['name'];
           $personal->prov = $prov;
           $city = $city[0]['name'];
           $personal->city = $city;
           $area = $area[0]['name'];
           $personal->area = $area;
           $street = $street[0]['name'];
           $personal->street = $street;
       }
       $personal->birthday = $request->input('birthday','');
       if ($request->hasFile('pic')){
           $iconname = md5(time()).'.jpg';
           $request->file('pic')->move('img/home',$iconname);
           $personal->avatar = $iconname;
           if ( !($icons == 'Home/img/default.jpg')){
               unlink('img/home/'.$icons);
           }
       }
       $result = $personal->save();
       //判断是否修改成功
        if ($result){
            return back();
        }else{
            return back();
        }
    }


    //修改学校信息
    public function doschool(Request $request)
    {
        $uid = Information::where('uid',Auth::user()->id)->get()->toArray();
        if (empty($uid)){
            $school = new Information();
            $school->uid = Auth::user()->id;
            $school->school = $request->input('school');
            $school->identity = $request->input('identity');
            $school->counts = $request->input('counts');
            $result = $school->save();
        }else{
            $id = Information::where('uid',Auth::user()->id)->get()->toArray();
            $school = Information::find($id[0]['uid']);
            $school->school = $request->input('school','');
            $school->identity = $request->input('identity','');
            $school->counts = $request->input('counts','');
            $result = $school->save();
        }

        if ($result){
            return redirect('home/information');
        }else{
            return back();
        }
    }

    //修改公司信息
    public function dowork(Request $request)
    {
        $uid = Information::where('uid',Auth::user()->id)->get()->toArray();
        if (empty($uid)){
            $work = new Information();
            $work->uid = Auth::user()->id;
            $work->company = $request->input('company');
            $work->indutry = $request->input('indutry');
            $work->position = $request->input('position');
            $result = $work->save();
        }else {
            $id = Information::where('uid', Auth::user()->id)->get()->toArray();
            $work = Information::find($id[0]['uid']);
            $work->company = $request->input('company', '');
            $work->indutry = $request->input('indutry', '');
            $work->position = $request->input('position', '');
            $result = $work->save();
        }
        if ($result){
            return back();
        }else{
            return back();
        }
    }

    //修改喜欢的信息
    public function dolike(Request $request)
    {
        $uid = Information::where('uid',Auth::user()->id)->get()->toArray();
        if (empty($uid)){
            $like = new Information();
            $like->uid = Auth::user()->id;
            $like->music = $request->input('music');
            $like->book = $request->input('book');
            $like->movie = $request->input('movie');
            $like->game = $request->input('game');
            $result = $like->save();
        }else {
            $id = Information::where('uid', Auth::user()->id)->get()->toArray();
            $like = Information::find($id[0]['uid']);
            $like->music = $request->input('music', '');
            $like->book = $request->input('book', '');
            $like->movie = $request->input('movie', '');
            $like->game = $request->input('game','');
            $result = $like->save();
        }
        if ($result){
            return back();
        }else{
            return back();
        }
    }
    //显示说说页面
    public function say()
    {
        $id = Auth::user()->id;
        $say = DB::table('say')->where('uid',$id)->get()->toArray();
        return view('home.say',compact('say'));
    }

    //写说说
    public function dosay(Request $request)
    {
        $say = new Say();
        $id =Auth::user()->id;
        $say->uid = $id;
        $say->content = $request->input('content');
        $result = $say->save();
        if ($result){
            return back();
        }else{
            return back();
        }
    }

    //删除说说
    public function deletesay($id)
    {
        $say = Say::find($id);
        $say->delete();
        return redirect('home/say');
    }


    //显示游戏
    public function game()
    {
        $game = Game::all()->toArray();
        return view('home.game',compact('game'));
    }

    //意见反馈
    public function view(Request $request)
    {
        $id = Auth::user()->id;
        $view = new view();
        $view->uid = $id;
        $view->content = $request->input('content');
        if (empty($request->input('content'))){
           return redirect('home/index')->withErrors('发表不能为空!');
        }
        $result = $view->save();
        if ($result){
            return redirect('home/index')->withErrors('意见反馈成功,请等待回复');
        }
    }


    //天气
    public function date()
    {
        return view('/port/weather');
    }
    //新闻
    public function news()
    {
        return view('/port/news');
    }
}
