<?php

namespace App\Http\Controllers\Admin;

use App\Home\Album;

use App\Home\Diary;
use App\Home\Friend;
use App\Home\Photo;
use App\Http\Requests\UserRegisterRequest;
use App\Model\Home\Aboutme;
use App\Model\Home\Advert;
use App\Model\Home\Information;
use App\Model\Home\Lamp;
use App\Model\Home\Report;
use App\Model\Home\Say;
use App\Model\Home\Word;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class IndexController extends Controller
{
    // public function index(){
    //     return view('model.adminmodel');
    // }

    public function login()
    {
        return view('admin.login');
    }

    //后台图片的管理
    public function album()
    {
        $album=Album::orderBy('id','asc')->paginate(5);
        $result=Album::all()->toArray();
        if($result==[]){
            return view('admin\album')->with('album',$album)->withErrors('暂无数据');
        }
        return view('admin.album')->with('album',$album);
    }
    //添加相册
    public function albumadd()
    {
        return view('admin.albumadd');
    }
    //处理添加相册
    public function doalbumadd(Request $request)
    {
        $r=$request->all();
        //判断用户有无数据上传
        if($r['uid']=='' || $r['pname']=='' ){
            return back()->withErrors('请输入数据');
        }
        $uid=$r['uid'];
        $pname=$r['pname'];
        if(preg_match("/^[1-9]+$/",$uid)!=1){
            return back()->withErrors('请输入正确的用户id');
        }
        if(! User::find($uid)){
            return back()->withErrors('此用户不存在');
        }
        $result=Album::where('uid',$uid)->get()->toArray();
        foreach($result as $v){
            if($pname==$v['pname']){
                return back()->withErrors('此相册已存在');
            }
        }
        //去掉token
        array_pop($r);
        $time=time();
        $r=array_merge($r,['time'=>$time]);
        if(Album::insert($r)){
            return back()->withErrors('添加相册成功');
        }
        return back();
    }
    //删除相册
    public function doalbumdel($id)
    {

        $r=Album::where('id',$id)->delete();
        if($r){
            return back()->withErrors('此相册已被删除');
        }    
        $result=Album::where('id',$id)->get()->toArray();
        $uid=$result[0]['uid'];
        if(Photo::where('aid',$id)->get()->toArray()!=[]){
        //递归删除
        $path='img/'.$uid.'_'.$id;
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
        $r=Album::where('id',$id)->delete();
        if($r){
            return back()->withErrors('删除成功');

        }
        return back();
    }

    //更新相册表
    public function albumup(Request $request,$id)
    {
        if($request->all()){
            $r=$request->all();//拿出传过来的数据
            array_pop($r);//去掉token

            $result=Album::find($id);
            //查出值看是否重名了
            $uid=$result->uid;
            $pname=$request->all()['pname'];
            $result1=Album::where('uid',$uid)->get()->toArray();
            foreach($result1 as $v){
                if($id != $v['id'] ){
                    if($pname==$v['pname']){
                        return back()->withErrors('此相册已存在');
                    }
                }
            }

            //更新
            $result->uid=$r['uid'];
            $result->pname=$r['pname'];
            $result->status=$r['status'];
            $save=$result->save();

            if($save){
                return back()->withErrors('更新成功');
            }else{
                return back()->withErrors('更新失败');
            }
        }else{
            $r=Album::where('id',$id)->get()->toArray()[0];
            return view('admin/albumup')->with('arr',$r);
        }

    }
    //查看相册表
    public function albumlook($id)
    {

        if(! $id){
            return redirect('admin.album');
        }
        $r=Photo::where('aid',$id)->orderBy('id','asc')->paginate(2);
        if(! $r[0]['id']){
            return view('admin/albumlook')->with('arr',$r)->withErrors('此相册无数据')->with('aid',$id);
        }
        return view('admin/albumlook')->with('arr',$r)->with('aid',$id);
    }
    //删除图片
    public function photodel($id)
    {
       $r=Photo::where('id',$id)->get()->toArray();
       //判断有无数据
       if($r==[]){
           return back()->withErrors('此图片已被删除');
       }
       //有的话拼接路劲名
       $photoname=$r[0]['savepath'].'/'.$r[0]['pho_name'];
       $r=Photo::find($id)->delete();
       if($r){
           if(file_exists($photoname)){
               unlink($photoname);
               return back()->withErrors('删除成功');
           }
       }
       //没有的话就删除数据库的数据
       return back()->withErrors('删除成功');
    }

    //查看图片
    public  function photolook($id)
    {
        $r=Photo::where('id',$id)->get()->toArray();
        if($r==[]){
            return back()->withErrors('此图片已被删除');
        }
        $aid=$r[0]['aid'];
        $photoname=$r[0]['savepath'].'/'.$r[0]['pho_name'];
        if(file_exists($photoname)){
            return view('admin.photolook')->with('arr',$photoname)->with('aid',$aid)->with('id',$id);
        }else{
            return back()->withErrors('图片已被损坏');
        }
    }

    //新增图片的页面显示
    public function photoadd($id)
    {
        return view('admin.photoadd')->with('aid',$id);
    }
    //新增图片的处理
    public function dophotoadd(Request $request)
    {
       $r = $request->all();
//       array_shift($r);
       $aid=$r['aid'];
       $pho_name=str_random(10);
       $uid=Album::where('id',$aid)->get()->toArray()[0]['uid'];
       $save_path='img/'.$uid.'_'.$aid;
       $time=time();
       $lastname = substr($_FILES['pic']['name'], strrpos($_FILES['pic']['name'], '.'), 5);
       $pho_name=$pho_name.$lastname;
       $a=array(
           'aid'=>$aid,
           'time'=>$time,
           'pho_name'=>$pho_name,
           'savepath'=>$save_path
       );
       $pic=$request->file('pic')->move($save_path,$pho_name);
       $result=Photo::insert($a);
       if($result){
           return back()->withErrors('添加成功');
       }else{
           return back()->withErrors('添加失败,稍后再试');
       }
    }
    //修改图片
    public function photoup(Request $request,$id)
    {
        //判断有无文件上传
        if($_FILES['pic']['name']==''){
            return back()->withErrors('请选择上传的图片');
        }
        //查出数据
        $name=Photo::where('id',$id)->get()->toArray()[0];
        //储存路径
        $save_path=$name['savepath'];
        //路径+名字
        $pathname=$name['savepath'].'/'.$name['pho_name'];
        //如果存在则删除
        if(file_exists($pathname)){
            unlink($pathname);
        }
        //拼接名字
        $pho_name=str_random(10);
        $lastname = substr($_FILES['pic']['name'], strrpos($_FILES['pic']['name'], '.'), 5);
        $pho_name=$pho_name.$lastname;
        //移到指定路劲
        $pic=$request->file('pic')->move($save_path,$pho_name);
        //更新
        $result=Photo::find($id);
        $result->pho_name=$pho_name;
        $r=$result->update();
        if($r){
            return back()->withErrors('更新成功');
        }else{
            return back()->withErrors('更新失败稍后再试');
        }


    }


//----------------------------------------------好友
    //好友管理
    public function friends()
    {
        $result=Friend::all()->toArray();
        if($result==[]){
            return view('admin.friends')->with('arr','')->withErrors('暂无好友信息');
        }
        foreach ($result as $k=> $v) {
            //判断user是否存在 不存在就删除
            if (User::where('id', $v['user1id'])->get()->toArray() == []) {
                Friend::where('user1id', $v['user1id'])->delete();
                Friend::where('user2id', $v['user1id'])->delete();

            }
            if (User::where('id', $v['user2id'])->get()->toArray() == []) {
                Friend::where('user1id', $v['user2id'])->delete();
                Friend::where('user2id', $v['user2id'])->delete();

            }
        }
        //等删完了判断是否还有数据
        $result=Friend::all()->toArray();
        if($result==[]){
            return view('admin.friends')->with('arr','')->withErrors('暂无好友信息');
        }
        //分页
        $friends=Friend::orderBy('id','asc')->paginate(5);

        foreach ($friends as $k=>$v){
            $u1name=User::where('id',$v['user1id'])->get()->toArray()[0]['name'];
            $u2name=User::where('id',$v['user2id'])->get()->toArray()[0]['name'];
            $friends[$k]['u1name']=$u1name;
            $friends[$k]['u2name']=$u2name;
        }


        return view('admin.friends')->with('arr',$friends);
    }
    //删除好友关系
    public function friendsdel($id)
    {
       $r= Friend::where('id',$id)->get()->toArray();
       if($r==[]){
           return back()->withErrors('此关系已被删除');
       }
       $result=Friend::find($id)->delete();
       if($result){
           return back()->withErrors('删除成功');
       }else{
           return back()->withErrors('删除失败稍后再试');
       }
    }
    //增加好友关系的页面
    public function friendsadd()
    {
        return view('admin.friendsadd');
    }
    //增加好友关系的处理
    public function friendsdoadd(Request $request)
    {
        $r=$request->all();
        array_shift($r);
        $status=$r['status'];
        //判断状态码是否正常
        if($status != 1 && $status!=3 ){
            return back()->withErrors('请不要恶搞');
        }
        //判断有无 信息上传
        if($r['user1id']=='' || $r['user2id']==''){
            return back()->withErrors('信息不能为空');
        }
        //判断1 和2的id是否一致
        if($r['user1id']==$r['user2id']){
            return back()->withErrors('用户1和用户2信息不能一样');
        }
        //判断1和2 用户是否存在
        if(User::where('id',$r['user1id'])->get()->toArray() ==[]){
            return back()->withErrors('用户1不存在');
        }
        if(User::where('id',$r['user2id'])->get()->toArray() ==[]){
            return back()->withErrors('用户2不存在');
        }
        //判断用户1和用户2是否有关系
        $r1=Friend::where('user1id',$r['user1id'])->where('user2id',$r['user2id'])->get()->toArray();
        $r2=Friend::where('user1id',$r['user2id'])->where('user2id',$r['user1id'])->get()->toArray();
        if($r1 ==[] && $r2==[]){
            if(Friend::insert($r)){
                return back()->withErrors('创建关系成功');
            }else{
                return back()->withErrors('新建关系失败,稍后再试');
            }
        }else{
            return back()->withErrors('用户1和用户2已经存在关系');
        }


    }
    //修改好友关系的页面
    public function friendsup($id)
    {
        $r=Friend::where('id',$id)->get()->toArray();
        //判断关系是否存在
        if($r==[]){
            return back()->withErrors('此关系不存在');
        }
        $r=$r[0];
        //查出用户1和2的信息
        $user1=User::select('name')->where('id',$r['user1id'])->get()->toArray();
        $user2=User::select('.name')->where('id',$r['user2id'])->get()->toArray();
        if($user1==[] || $user2==[]){
            return back()->withErrors('用户1或者2 不存在');
        }
        $u1name=$user1[0]['name'];
        $u2name=$user2[0]['name'];
        $r['u1name']=$u1name;
        $r['u2name']=$u2name;
        return view('admin.friendsup')->with('arr',$r);
    }
    //修改好友关系的处理
    public function friendsdoup(Request $request,$id)
    {
        $r=$request->all();
        //判断有无数据上传
        if(! $r){
            return back()->withErrors('请不要乱搞');
        }
        if( (!$r['status']) || ($r['status'] != 1 && $r['status'] != 3)){
            return back()->withErrors('请不要乱搞1');
        }
        //判断数据是否正常
        $status=$r['status'];
        $friends=Friend::find($id);
        $friends->status=$status;
        $result=$friends->save();
        if($result){
            return back()->withErrors('更新成功');
        }else{
            return back()->withErrors('更新失败,稍后再试');
        }
    }
    //查看好友信息
    public function friendslook($id)
    {
        $r=Friend::where('id',$id)->get()->toArray();
        //判断关系是否存在
        if($r==[]){
            return back()->withErrors('此关系不存在');
        }
        $r=$r[0];
        //查出用户1和2的信息
        $user1=User::select('name')->where('id',$r['user1id'])->get()->toArray();
        $user2=User::select('.name')->where('id',$r['user2id'])->get()->toArray();
        if($user1==[] || $user2==[]){
            return back()->withErrors('用户1或者2 不存在');
        }
        $u1name=$user1[0]['name'];
        $u2name=$user2[0]['name'];
        $r['u1name']=$u1name;
        $r['u2name']=$u2name;
        return view('admin.friendslook')->with('arr',$r);
    }


//----------------------------------------------广告
    //广告表
    public function advert()
    {
        $result=Advert::all()->toArray();
        if($result==[]){
            return view('admin/advert')->with('arr',$result)->withErrors('暂无数据');
        }
        $r=Advert::paginate(2);
        return view('admin/advert')->with('arr',$r);
    }
    //删除广告
    public function advertdel($id)
    {
        $r=Advert::where('id',$id)->get()->toArray();
        if($r==[]){
            return back()->withErrors('此数据不存在');
        }
        $path=$r[0]['photo_path'];

        //递归删除数据
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

        $result=Advert::find($id)->delete();
        if($result){
            return redirect('admin/advert')->withErrors('删除成功');
        }else{
            return back()->withErrors('删除失败');
        }
    }
    //添加广告
    public function advertadd()
    {
        //判断广告最多只能3个
        $r=Advert::all()->toArray();
        if(count($r)>=3){
            return back()->withErrors('广告数已达三个,请删除后再试');
        }
        return view('admin/advertadd');
    }
    //添加广告的处理
    public function advertdoadd(Request $request)
    {

        //判断广告最多只能3个
        $re=Advert::all()->toArray();
        if(count($re)>=3){
            return redirect('/admin/advert')->withErrors('广告数已达三个,请删除后再试');
        }
        $r=$request->all();
        array_shift($r);//去token
        //判断信息有无重复
        //判断公司名
        $company=Advert::where('company',$r['company'])->get()->toArray();
        if($company !=[]){
            return redirect('/admin/advert')->withErrors($r['company']."的公司已经存在");
        }
        //判断英文公司名
        $englishcompany=Advert::where('englishcompany',$r['englishcompany'])->get()->toArray();
        if($englishcompany !=[]){
            return redirect('/admin/advert')->withErrors("英文".$r['englishcompany']."的公司已经存在");
        }
        //判断标题
        $title=Advert::where('title',$r['title'])->get()->toArray();
        if($title !=[]){
            return redirect('/admin/advert')->withErrors($r['title']."的标题已经存在");
        }
        //判断链接
        $link=Advert::where('link',$r['link'])->get()->toArray();
        if($link !=[]){
            return redirect('/admin/advert')->withErrors($r['link']."的链接已经存在");
        }
        //判断标题
        $status=Advert::where('status',$r['status'])->get()->toArray();
        if($status !=[] && $r['status']==1){
            return redirect('/admin/advert')->withErrors('大广告只能存在一个');
        }
        //判断有无上传图片
        if(!$request->hasFile('pic')){
            return back()->withErrors('请上传图片');
        }

        //判断链接的正则
        $links=$r['link'];
        if(!preg_match( "/^http:\/\/[_a-zA-Z0-9-]+(.[_a-zA-Z0-9-]+)*$/",$links)){
            return redirect('/admin/advert')->withErrors($r['link']."的链接不标准化");
        }
        //拼接路径储存图片
        $englishcompany=$r['englishcompany'];
        $path='public/advert/'.$englishcompany;
        $lastname = substr($_FILES['pic']['name'], strrpos($_FILES['pic']['name'], '.'), 5);
        $photoname=$englishcompany.$lastname;
        $request->file('pic')->move($path,$photoname);
        array_pop($r);
        $r['photo_name']=$photoname;
        $r['photo_path']=$path;

        //添加到数据库
        $r=Advert::insert($r);
        if($r){
            return redirect('admin/advert')->withErrors('添加成功');
        }else{
            return redirect('admin/advert')->withErrors('添加失败');
        }

    }
    //查看广告
    public function advertlook($id)
    {
        if(! $id){
            return back()->withErrors('没有ID值');
        }
        $r=Advert::where('id',$id)->get()->toArray();
        if($r==[]){
            return back()->withErrors('没有此条数据');
        }
        $r=$r[0];
        return view('admin/advertlook')->with('arr',$r);
    }
    //更新广告页面
    public function advertup($id){
        if(! $id){
            return back()->withErrors('没有ID值');
        }
        $r=Advert::where('id',$id)->get()->toArray();
        if($r==[]){
            return back()->withErrors('没有此条数据');
        }
        $r=$r[0];
        return view('admin/advertup')->with('arr',$r);
    }
    //更新广告功能
    public function advertdoup(Request $request,$id){

        $r=$request->all();
        $link=$r['link'];
        $title=$r['title'];
        $status=$r['status'];
        //判断是否存在相同链接标题状态
        $checklink=Advert::where('link',$link)->where('id','<>',$id)->get()->toArray();
        if($checklink !=[] ){
            return back()->withErrors('链接已被其他公司使用');
        }
        //判断标题是否正常
        $checktitle=Advert::where('title',$title)->where('id','<>',$id)->get()->toArray();
        if($checktitle !=[] ){
            return back()->withErrors('标题已被其他公司使用');
        }
        //判断广告
        $checkstatus=Advert::where('status',$status)->where('id','<>',$id)->get()->toArray();
        if($checkstatus !=[] && $checkstatus[0]['status']==1){
            return back()->withErrors('大广告只有一个');
        }
        //拿出路径和名字去移文件
        $result=Advert::where('id',$id)->get()->toArray();
        $path=$result[0]['photo_path'];
        $name=$result[0]['photo_name'];
        if($request->hasFile('pic')){
            $request->file('pic')->move($path,$name);
        }
        //拿出数据去跟新
        $advert=Advert::find($id);
        $advert->status=$status;
        $advert->link=$link;
        $advert->title=$title;
        $save=$advert->save();
        if($save){
            return back()->withErrors('更新成功');
        }else{
            return back()->withErrors('更新失败');
        }
    }

//----------------------------------------------日志
    //查看日志页
    public function diary()
    {
        $result=Diary::all()->toArray();
        if($result==[]){
            return view('admin/diary')->with('arr',$result)->withErrors('暂无数据');
        }
        $r=Diary::paginate(6);
        return view('admin.diary')->with('arr',$r);
    }
    //查看日志的某一条数据
    public function diarylook($id)
    {
        //判断有无ID值传过来
        if(! $id){
            return back()->withErrors('请正确查询');
        }
        //查询有无日志信息
        $r=Diary::where('id',$id)->get()->toArray();
        if($r==[]){
            return back()->withErrors('暂无此条日志信息');
        }else{
            $r=$r[0];
            return view('admin/diarylook')->with('arr',$r);
        }
    }
    //修改日志的页面
    public function diaryup($id)
    {
        //判断有无ID值传过来
        if(! $id){
            return back()->withErrors('请正确查询');
        }
        //查询有无日志信息
        $r=Diary::where('id',$id)->get()->toArray();
        if($r==[]){
            return back()->withErrors('暂无此条日志信息');
        }else{
            $r=$r[0];
            return view('admin/diaryup')->with('arr',$r);
        }
    }
    //修改日志的处理
    public function diarydoup(Request $request,$id)
    {
        $r=$request->all();
        if(! $r){
            return back()->withErrors('请正确输入值');
        }
        $title=$r['title'];
        $content=$r['content'];
        $cstate=$r['cstate'];
        if(!( $title && $content && $cstate )){
            return back()->withErrors('标题或内容或状态不能为空');
        }
        //更新
        $result=Diary::find($id);
        $result->title=$title;
        $result->content=$content;
        $result->cstate=$cstate;
        $a=$result->save();
        if($a){
            return back()->withErrors('更新成功');
        }else{
            return back()->withErrors('更新失败');
        }
    }
    //添加日志的页面
    public function diaryadd()
    {
        return view('admin/diaryaddd');
    }
    //添加日志的页面处理
    public function diarydoadd(Request $request)
    {
        $r=$request->all();
        if(! $r){
            return back();
        }
        $title=$r['title'];
        $content=$r['content'];
        $cstate=$r['cstate'];
        $uid=$r['uid'];
        $utime=time();
        if(!( $uid && $title && $content && $cstate )){
            return back()->withErrors('用户ID或者标题或内容或状态不能为空');
        }
        //判断用户存不存在
        $user=User::where('id',$uid)->get()->toArray();
        if($user == []){
            return back()->withErrors('用户不存在');
        }
        if($request->photoname) {
            $a=1;
            if(count($request->all()['photoname'])>9 ){
                return back()->withErrors('最多9张jpg图片');
            }
            foreach($request->file('photoname') as $file) {
                if($a>9){
                    break;
                }
                $file->move('img/'.$uid.'_'.$utime, $a .'.jpg');
                $a++;
            }
        }
        $arr=array(
            'title'=>$title,
            'content'=>$content,
            'photoname'=>$a,
            'utime'=>$utime,
            'uid'=>$uid,
            'cstate'=>$cstate,
            'likenum'=>0
        );
        $r=Diary::insert($arr);
        if($r){
            return back()->withErrors('添加日志成功');
        }else{
            return back()->withErrors('添加日志失败');
        }

    }
    //日志删除
    public function diarydel($id)
    {
        $r=Diary::where('id',$id)->get()->toArray();
        if($r==[]){
            return back('此日志不存在');
        }
        $path=$r[0]['uid'].'_'.$r[0]['utime'];

        $path='img/'.$path;
        //存在就删除
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
        if(Diary::find($id)->delete()){
            return back()->withErrors('删除成功');
        }else{
            return back()->withErrors('删除失败');

        }

    }
//----------------------------------------------留言管理
    //查看多条留言
    public function words()
    {
        $r=Word::paginate(6);
        $re=Word::all()->toArray();
//        dd($re);
        if($re==[]){
            return view('admin.words')->with('arr',$re)->withErrors('无数据');
        }
        return view('admin.words')->with('arr',$r);
    }
    //查看单条信息
    public function wordslook($id){
        $r=Word::where('id',$id)->get()->toArray();
//        dd($r);
        if($r==[]){
            return back()->withErrors('此条信息不存在');
        }
        $r=$r[0];
        return view('admin/wordslook')->with('arr',$r);
    }
    //删除留言
    public function wordsdel($id)
    {
        $r=Word::where('id',$id)->get()->toArray();
        if($r==[]){
            return back()->withErrors('找不到此条数据');
        }
        $r=Word::find($id)->delete();
        if($r){
            return back()->withErrors('删除成功');
        }else{
            return back()->withErrors('删除是失败');
        }
    }
//----------------------------------------------关于我们管理
    //关于我们页面
    public function aboutme()
    {
        $a=Aboutme::paginate(5);
        return view('admin.aboutme')->with('arr',$a);
    }
    //关于我们新增页面
    public function aboutmeadd()
    {
        return view('admin/aboutmeadd');
    }
    //关于我们新增页面的处理
    public function aboutmedoadd(Request $request)
    {
        $r=$request->all();
        //判断数据是否全部上传
        if(count($r)<5){
            return back()->withErrors('要全部填写');
        }

        //判断是否是jpg或者png的
        $lastname = substr($_FILES['iconpath']['name'], strrpos($_FILES['iconpath']['name'], '.'), 5);
//        dd($lastname);
        if($lastname!='.jpg' && $lastname!='.png'){
            return back()->withErrors('请选择jpg或者png的图片上传');
        }
        $lastname1 = substr($_FILES['imgpath']['name'], strrpos($_FILES['imgpath']['name'], '.'), 5);
        if($lastname1!='.jpg' && $lastname1!='.png'){
            return back()->withErrors('请选择jpg或者png的图片上传');
        }
        $re=str_random(4);
        $title=$request->input('title');
        $content=$request->input('content');
        if($title==''&&$content==''){
            return back()->withErrors('请填写数据');
        }
        $m1=$request->iconpath->move('home/img/aboutme/icon/',$re.$lastname);
        $m2=$request->imgpath->move('home/img/aboutme/img/',$re.$lastname1);
        if($m1 && $m2){
            $p1='home/img/aboutme/icon/'.$re.$lastname;
            $p2='home/img/aboutme/img/'.$re.$lastname1;
        }else{
            return back()->withErrors('上传失败');
        }

        $arr=array(
            'title'=>$title,
            'content'=>$content,
            'imgpath'=>$p2,
            'iconpath'=>$p1
        );
        $r=Aboutme::insert($arr);
        if($r){
            return back()->withErrors('新增成功');
        }else{
            return back()->withErrors('新增失败');
        }

    }
    //关于我们管理页面的查看
    public function aboutmelook($id)
    {
        $r=Aboutme::where('id',$id)->get()->toArray();
        if($r==[]){
            return back()->withErrors('此数据不存在');
        }
        $r=$r[0];
        return view('admin.aboutmelook')->with('arr',$r);
    }
    //关于我们管理页面的删除
    public function aboutmedel($id)
    {
//        dd($id);
        $r=Aboutme::where('id',$id)->get()->toArray();
        if($r==[]){
            return back()->withErrors('此数据不存在');
        }
        $p1=$r[0]['iconpath'];
        $p2=$r[0]['imgpath'];

        $r=Aboutme::find($id)->delete();
        if($r){
            if(file_exists($p1)){
                unlink($p1);
            }
            if(file_exists($p2)){
                unlink($p2);
            }
            return back()->withErrors('删除成功');
        }else{
            return back()->withErrors('删除失败');
        }
    }
    //关于我们管理页面的更新页面
    public function aboutmeup($id)
    {
        $r=Aboutme::where('id',$id)->get()->toArray();
        if($r==[]){
            return back()->withErrors('此数据不存在');
        }
        $r=$r[0];
        return view('admin.aboutmeup')->with('arr',$r);
    }
    //关于我们管理页面的更新页面的处理
    public function aboutmedoup(Request $request,$id)
    {
        $title=$request->input('title');
        $content=$request->input('content');
        //查询数据库的数据
        $result=Aboutme::where('id',$id)->get()->toArray();
        if($result==[]){
            return back()->withErrors('数据可能已经删除');
        }
        //若是没有图片改变则用来的;
        $m1=$result[0]['iconpath'];
        $m2=$result[0]['imgpath'];

        if($title==''&&$content==''){
            return back()->withErrors('标题内容不能为空');
        }
        $code=str_random(4);
        //判断有无文件上传
        if($request->hasFile('imgpath')){
            $lastname1 = substr($_FILES['imgpath']['name'], strrpos($_FILES['imgpath']['name'], '.'), 5);
            //如果文件不是jpg或者png格式就返回
            if($lastname1!='.jpg' && $lastname1!='.png'){
                return back()->withErrors('请选择jpg或者png的图片上传');
            }
            if(file_exists($m2)){
                unlink($m2);
            }
            //拼接放到数据库
            $m2='home/img/aboutme/img/'.$code.$lastname1;
            //移动文件到指定位置
            $last2=$request->imgpath->move('home/img/aboutme/img/',$code.$lastname1);
            if(!$last2){
                return back()->withErrors('img上传失败');
            }
        }

        if($request->hasFile('iconpath')){
            $lastname = substr($_FILES['iconpath']['name'], strrpos($_FILES['iconpath']['name'], '.'), 5);
            if($lastname!='.jpg' && $lastname!='.png'){
                return back()->withErrors('请选择jpg或者png的图片上传');
            }
            if(file_exists($m1)){
                unlink($m1);
            }
            $m1='home/img/aboutme/icon/'.$code.$lastname;
            $last1=$request->iconpath->move('home/img/aboutme/icon/',$code.$lastname);
            if(!$last1){
                return back()->withErrors('icon上传失败');
            }
        }
        $ar=Aboutme::find($id);
        $ar->title=$title;
        $ar->content=$content;
        $ar->imgpath=$m2;
        $ar->iconpath=$m1;
        $arr=$ar->save();
        if($arr){
            return back()->withErrors('更新成功');
        }else{
            return back()->withErrors('更新成功');
        }

        dd($id);
    }


//-------------------------------------------------举报管理
    public function report()
    {
        $a=Report::paginate(5);
        $ae=Report::all()->toArray();
        return view('admin.report')->with('as',$a)->with('arr',$ae);
    }
    //删除举报
    public function reportdel($id)
    {
        $r=Report::where('id',$id)->get()->toArray();
        if($r==[]){
            return back()->withErrors('此条数据不存在');
        }
        $r=Report::find($id)->delete();
        if($r){
            return back()->withErrors('删除成功');
        }else{
            return back()->withErrors('删除失败');
        }
    }
    //查看举报
    public function reportlook($id){
        $a=Report::where('id',$id)->get()->toArray();
        if($a==[]){
            return  back()->withErrors('此条数据不存在');
        }
        $a=$a[0];
        return view('admin.reportlook')->with('arr',$a);
    }
//----------------------------------------------个人中心
    public function index()
    {
        return view('admin.index');
    }
    //显示用户信息
    public function lists()
    {
         $result = DB::table('users')->paginate(5);
        return view('admin.index')->with('users',$result);
    }
     //删除用户
    public function delete($id)
    {
        $user = User::find($id);
        $information = Information::find($id);
        $result = $user->delete();
        if ($result){
            $information->delete();
        }
        return redirect('admin/index');
    }

    //显示添加用户的页面
    public function showadd()
    {
        return view('admin.adduser');
    }
    //添加用户
     public function add(UserRegisterRequest $request)
    {
        $confirmed_code = str_random(10);
        $data = [
            'avatar'=>'Home/img/default.jpg',
            'confirmed_code' => $confirmed_code,
        ];
        $result = User::create(array_merge($request->all(),$data));
        $uid = $result->toArray();
        $uid = $uid['id'];
        $data = [
            'uid'=> $uid,
        ];
        //        添加默认封面
        $cover = [
            'uid'=> $uid,
            'img'=>'cover_guide2.png',
        ];
        if ($result){
            DB::table('information')->insert($data);
            DB::table('cover')->insert($cover);
            return redirect('admin/index');
        }else{
            return back();
        }
    }

   //显示用户学校信息
    public function showschool($uid)
    {
        $r=Information::where('uid',$uid)->get()->toArray();
        if($r==[]){
            return back();
        }
        $result = Information::find($uid)->toArray();
        return view('admin.school')->with('school',$result)->with('uid',$uid);

    }
    //修改用户学校信息
    public function school(Request $request,$uid )
    {
        $school = Information::find($uid);
        $school->school = $request->input('school','');
        $school->identity = $request->input('identity','');
        $school->counts = $request->input('counts','');
        $result = $school->save();
        if ($result){
            return redirect('/showschool/'.$uid);
        }else{
            return back();
        }
    }

    //显示用户工作信息
    public function showwork($uid)
    {
        $r=Information::where('uid',$uid)->get()->toArray();
        if($r==[]){
            return back();
        }
        $result = Information::find($uid)->toArray();
        return view('admin.work')->with('work',$result)->with('uid',$uid);

    }

    //修改用户工作信息
    public function work(Request $request,$uid )
    {
        $work = Information::find($uid);
        $work->company = $request->input('company','');
        $work->indutry = $request->input('indutry','');
        $work->position = $request->input('position','');
        $result = $work->save();
        if ($result){
            return redirect('/showwork'.$uid);
        }else{
            return back();
        }
    }


    //显示用户喜欢信息
    public function showlike($uid)
    {
        $r=Information::where('uid',$uid)->get()->toArray();
        if($r==[]){
            return back();
        }
        $result = Information::find($uid)->toArray();
        return view('admin.like')->with('like',$result)->with('uid',$uid);
    }

    //修改用户喜欢信息
    public function like(Request $request,$uid )
    {
        $like = Information::find($uid);
        $like->music = $request->input('music','');
        $like->book = $request->input('book','');
        $like->movie = $request->input('movie','');
        $like->game = $request->input('game','');
        $result = $like->save();
        if ($result){
            return redirect('/showlike/'.$uid);
        }else{
            return back();
        }
    }


    //显示用户基本信息
    public function showinformation($id)
    {
        $r=Information::where('uid',$id)->get()->toArray();
        if($r==[]){
            return back();
        }
        $result = User::find($id)->toArray();
        return view('admin.information')->with('users',$result)->with('id',$id);
    }

    //修改用户基本信息
    public function information(Request $request,$id)
    {
        $personal = User::find($id);
        
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
        $result = $personal->save();
        //判断是否修改成功
        if ($result){
            return redirect('/showinformation/'.$id);
        }else{
            return back();
        }
    }

    //管理说说
    public function showsay()
    {
        $result = Say::all()->toArray();
        return view('admin.say')->with('say',$result);
    }

    //显示添加说说页面
    public function addsay()
    {
        return view('admin.addsay');
    }
    //添加说说
    public function doaddsay(Request $request)
    {
        $say = new Say();
        $say->content = $request->input('content');
        $result = $say->save();
        if ($result){
            return redirect('admin/say');
        }else{
            return back();
        }
    }

    //删除说说
    public function deletesay($id)
    {
        $say = Say::find($id);
        $say->delete();
        return redirect('admin/say');
    }

    //显示更新说说
    public function updatesay($id)
    {
        $say = Say::find($id);
        return view('admin/updatesay',compact('say','id'));
    }

    //修改说说
    public function doupdatesay(Request $request,$id)
    {
        $say = Say::find($id);

        $say->content = $request->input('content','');
        $result = $say->save();
        if ($result){
            return redirect('admin/say');
        }else{
            return back();
        }

    }
    //显示管理意见
    public function showview()
    {
        $views = DB::table('views')->paginate(4);
        return view('admin.view',compact('views'));
    }

    //删除意见
    public function deleteview($id)
    {
        $view = view::find($id);
        $result = $view->delete();
        if ($result){
            return redirect('admin/view');
        }
    }


    //显示管理封面
    public function cover()
    {
        $cover = DB::table('cover')->paginate(4);
        return view('admin.cover',compact('cover'));
    }

    //删除封面
    public function deletecover($uid)
    {
        $cover = Cover::find($uid);
        $reimg = $cover->toArray();
        $reimg = $reimg['img'];
        $cover->img = 'cover_guide2.png';
        $result = $cover->save();
        if ($result){
            unlink('img/home/'.$reimg);
            return redirect('admin/cover');
        }
    }






}
