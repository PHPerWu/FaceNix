<?PHP
//����PHPMailer�ĺ����ļ� ʹ��require_once�����������PHPMailer���ظ�����ľ���
require_once("class.phpmailer.php"); 
require_once("class.smtp.php");

//ʾ����PHPMailer������
$mail = new PHPMailer();
 
//�Ƿ�����smtp��debug���е��� �����������鿪�� ��������ע�͵����� Ĭ�Ϲر�debug����ģʽ
$mail->SMTPDebug = 1;
 
//ʹ��smtp��Ȩ��ʽ�����ʼ�����Ȼ�����ѡ��pop��ʽ sendmail��ʽ�� ���Ĳ������
//���Բο�http://phpmailer.github.io/PHPMailer/���е���ϸ����
$mail->isSMTP();
//smtp��Ҫ��Ȩ ���������true
$mail->SMTPAuth=true;
//����qq��������ķ�������ַ
$mail->Host = 'smtp.qq.com';
//����ʹ��ssl���ܷ�ʽ��¼��Ȩ
$mail->SMTPSecure = 'ssl';
//����ssl����smtp��������Զ�̷������˿ں� ��ѡ465��587
$mail->Port = 465;
//����smtp��helo��Ϣͷ ������п��� ��������
$mail->Helo = 'Hello smtp.qq.com Server';
//���÷����˵������� ���п��� Ĭ��Ϊlocalhost �������⣬����ʹ���������
$mail->Hostname = 'facenix.com';
//���÷��͵��ʼ��ı��� ��ѡGB2312 ��ϲ��utf-8 ��˵utf8��ĳЩ�ͻ��������»�����
$mail->CharSet = 'utf-8';
//���÷������������ǳƣ� �������ݣ���ʾ���ռ����ʼ��ķ����������ַǰ�ķ���������
$mail->FromName = '������ӿƼ�����';
//smtp��¼���˺� ���������ַ�����ʽ��qq�ż���
$mail->Username ='2375037953';
//smtp��¼������ �������롰�������롱 ��Ϊ���á��������롱�������¼qq������ �������á��������롱
$mail->Password = 'teghhfebaadldjfi';
//���÷����������ַ �������������ᵽ�ġ����������䡱
$mail->From = '2375037953@qq.com';
//�ʼ������Ƿ�Ϊhtml���� ע��˴���һ������ ���������� true��false
$mail->isHTML(true); 
//�����ռ��������ַ �÷������������� ��һ������Ϊ�ռ��������ַ �ڶ�����Ϊ���õ�ַ���õ��ǳ� ��ͬ������ϵͳ���Զ����д���䶯 ����ڶ������������岻��
$mail->addAddress('443552864@qq.com','phper@facenix.com');
//��Ӷ���ռ��� ���ε��÷�������
$mail->addAddress('phper@facenix.com');
//��Ӹ��ʼ�������
$mail->Subject = 'From FaceNix.com';
//����ʼ����� �Ϸ���isHTML���ó���true���������������html�ַ��� �磺ʹ��file_get_contents������ȡ���ص�html�ļ�
$content='name��'.$_POST['Name'].'</br>tel��'.$_POST['Phone'].'</br>'.$_POST['Message'].'</br>Email��'.$_POST['Email'];
$mail->Body = $content;

 
 
//�������� ���ز���ֵ 
//PS���������ԣ�Ҫ���ռ��˲����ڣ��������ִ�����Ȼ����true Ҳ����˵�ڷ���֮ǰ �Լ���ҪЩ����ʵ�ּ��������Ƿ���ʵ��Ч
$status = $mail->send();
//$status='ok';

//�򵥵��ж�����ʾ��Ϣ
if($status) {
 echo '�����ʼ��ɹ�'+$_POST['name']+' age:'+$_POST['age'];
}else{
 echo '�����ʼ�ʧ�ܣ�������Ϣδ��'.$mail->ErrorInfo;
}
?>