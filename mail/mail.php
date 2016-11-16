<?PHP
//引入PHPMailer的核心文件 使用require_once包含避免出现PHPMailer类重复定义的警告
require_once("class.phpmailer.php"); 
require_once("class.smtp.php");

//示例化PHPMailer核心类
$mail = new PHPMailer();
 
//是否启用smtp的debug进行调试 开发环境建议开启 生产环境注释掉即可 默认关闭debug调试模式
$mail->SMTPDebug = 1;
 
//使用smtp鉴权方式发送邮件，当然你可以选择pop方式 sendmail方式等 本文不做详解
//可以参考http://phpmailer.github.io/PHPMailer/当中的详细介绍
$mail->isSMTP();
//smtp需要鉴权 这个必须是true
$mail->SMTPAuth=true;
//链接qq域名邮箱的服务器地址
$mail->Host = 'smtp.qq.com';
//设置使用ssl加密方式登录鉴权
$mail->SMTPSecure = 'ssl';
//设置ssl连接smtp服务器的远程服务器端口号 可选465或587
$mail->Port = 465;
//设置smtp的helo消息头 这个可有可无 内容任意
$mail->Helo = 'Hello smtp.qq.com Server';
//设置发件人的主机域 可有可无 默认为localhost 内容任意，建议使用你的域名
$mail->Hostname = 'facenix.com';
//设置发送的邮件的编码 可选GB2312 我喜欢utf-8 据说utf8在某些客户端收信下会乱码
$mail->CharSet = 'utf-8';
//设置发件人姓名（昵称） 任意内容，显示在收件人邮件的发件人邮箱地址前的发件人姓名
$mail->FromName = '深圳斐视科技官网';
//smtp登录的账号 这里填入字符串格式的qq号即可
$mail->Username ='2375037953';
//smtp登录的密码 这里填入“独立密码” 若为设置“独立密码”则填入登录qq的密码 建议设置“独立密码”
$mail->Password = 'teghhfebaadldjfi';
//设置发件人邮箱地址 这里填入上述提到的“发件人邮箱”
$mail->From = '2375037953@qq.com';
//邮件正文是否为html编码 注意此处是一个方法 不再是属性 true或false
$mail->isHTML(true); 
//设置收件人邮箱地址 该方法有两个参数 第一个参数为收件人邮箱地址 第二参数为给该地址设置的昵称 不同的邮箱系统会自动进行处理变动 这里第二个参数的意义不大
$mail->addAddress('443552864@qq.com','phper@facenix.com');
//添加多个收件人 则多次调用方法即可
$mail->addAddress('phper@facenix.com');
//添加该邮件的主题
$mail->Subject = 'From FaceNix.com';
//添加邮件正文 上方将isHTML设置成了true，则可以是完整的html字符串 如：使用file_get_contents函数读取本地的html文件
$content='name：'.$_POST['Name'].'</br>tel：'.$_POST['Phone'].'</br>'.$_POST['Message'].'</br>Email：'.$_POST['Email'];
$mail->Body = $content;

 
 
//发送命令 返回布尔值 
//PS：经过测试，要是收件人不存在，若不出现错误依然返回true 也就是说在发送之前 自己需要些方法实现检测该邮箱是否真实有效
$status = $mail->send();
//$status='ok';

//简单的判断与提示信息
if($status) {
 header("Location: http://www.facenix.com/contact.html?status=1"); 
}else{
 header("Location: http://www.facenix.com/contact.html?status=0"); 
}

?>