<?php


error_reporting(0);
date_default_timezone_set('Asia/Tehran');
$fonts = [["𝟎","𝟏","𝟐","𝟑","𝟒","𝟓","𝟔","𝟕","𝟖","𝟗"]]; //fonts
$time = str_replace(range(0,9),$fonts[array_rand($fonts)],date("H:i"));
$load = sys_getloadavg();
$mem = memory_get_usage();
$ver = phpversion();
$mem_using = round(memory_get_usage() / 1024 / 1024,1);
// bot token ( @MrDevTz ) 

$token = '5183729379:AAFCa4JXOpSmsXywDq1Wc09DLnbE8aA-TBU';
$MrDevTz = ["1660834081","1660834081"];

// start function ( @MrDevTz )
define('API_KEY',$token);
function bot($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}
function SendMessage($chat_id,$text,$mode,$keyboard,$reply,$disable='true'){
return bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>$text,
'parse_mode'=>$mode,
'reply_to_message_id'=>$reply,
'disable_web_page_preview'=>$disable,
'reply_markup'=>$keyboard
]);
}
function EditMessageText($chat_id,$message_id,$text,$parse_mode,$disable_web_page_preview,$keyboard){
bot('editMessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>$text,
'parse_mode'=>$parse_mode,
'disable_web_page_preview'=>$disable_web_page_preview,
'reply_markup'=>$keyboard
]);
}

function AnswerCallbackQuery($callback_query_id,$text,$show_alert){
  bot('answerCallbackQuery',[
        'callback_query_id'=>$callback_query_id,
        'text'=>$text,
    'show_alert'=>$show_alert
    ]);
  }


function save($filename,$TXTdata){
$myfile = fopen($filename,"w") or die("Unable to open file!");
fwrite($myfile,"$TXTdata");
fclose($myfile);
}
  function save2($data, $dir){
       $f = fopen("media/$dir","a") or die("Error to open file!");
       fwrite($f, "$data,");
       fclose($f);
  }
function KickChatMember($chatid,$user_id){
	bot('kickChatMember',[
	'chat_id'=>$chatid,
	'user_id'=>$user_id
	]);
	}
// End function ( @MrDevTz )
$update = json_decode(file_get_contents('php://input'));
if(isset($update->message)){
    $message = $update->message; 
    $chat_id = $message->chat->id;
    $text = $message->text;
    $message_id = $message->message_id;
    $from_id = $message->from->id;
    $tc = $message->chat->type;
    $first_name = $message->from->first_name;
    $last_name = $message->from->last_name;
    $username = $message->from->username;
    $caption = $message->caption;
    $reply = $message->reply_to_message->forward_from->id;
    $reply_id = $message->reply_to_message->from->id;
}
$data = $update->callback_query->data;
$inid = $update->callback_query->from->id;
$msg_id = $update->callback_query->message->message_id;
$inmsgid = $update->callback_query->inline_message_id;
$db = file_get_contents(json_decode('data.json',true));
$chbio = file_get_contents("data/chbio.txt");
$chname = file_get_contents("data/chname.txt");
$chpost = file_get_contents("data/chpost.txt");
$gap = file_get_contents("data/gap.txt");
$matn = file_get_contents("data/matn.txt");
$post = file_get_contents("data/post.txt");
$bio = file_get_contents("data/bio.txt");
$name = file_get_contents("data/name.txt");
$tc = $update->message->chat->type;
$tch = $truechannel->result->status;
$bot_date = date('Ymd');
$step = file_get_contents("step.txt");
mkdir("data");

// start code ( @MrDevTz )
$statbot = json_encode([
'inline_keyboard' => [
[['text'=>"• ┅┅━━━━━━ 𖣫 ━━━━━━┅┅ •",'callback_data'=>'ping']],
[['text'=>"• Bio",'callback_data'=>'ping'],['text'=>"$bio",'callback_data'=>'ping']],
[['text'=>"• Post",'callback_data'=>'ping'],['text'=>"$post",'callback_data'=>'ping']],
[['text'=>"• Name",'callback_data'=>'ping'],['text'=>"$name",'callback_data'=>'ping']],
[['text'=>"• Matn Post",'callback_data'=>'ping'],['text'=>"$matn",'callback_data'=>'ping']],
[['text'=>"• ┅┅━━━━━━ 𖣫 ━━━━━━┅┅ •",'callback_data'=>'ping']],
[['text'=>" • Dev",'url'=>'https://t.me/SiR_Tz']],
[['text'=>"• ┅┅━━━━━━ 𖣫 ━━━━━━┅┅ •",'callback_data'=>'ping']],
]
]);
$tt = json_encode([
'inline_keyboard' => [
[['text'=>"• $time",'callback_data'=>"tz"]],
]
]);
$statch = json_encode([
'inline_keyboard' => [
[['text'=>"• ┅┅━━━━━━ 𖣫 ━━━━━━┅┅ •",'callback_data'=>'ping']],
[['text'=>"• Channel Bio",'callback_data'=>'ping'],['text'=>"$chbio",'callback_data'=>'ping']],
[['text'=>"• Channel Post",'callback_data'=>'ping'],['text'=>"$chpost",'callback_data'=>'ping']],
[['text'=>"• Channel Name",'callback_data'=>'ping'],['text'=>"$chname",'callback_data'=>'ping']],
[['text'=>"• ┅┅━━━━━━ 𖣫 ━━━━━━┅┅ •",'callback_data'=>'ping']],
[['text'=>" • Dev",'url'=>'https://t.me/SiR_Tz']],
[['text'=>"• ┅┅━━━━━━ 𖣫 ━━━━━━┅┅ •",'callback_data'=>'ping']],
]
]);
$status = json_encode([
'inline_keyboard' => [
[['text'=>"• ┅┅━━━━━━ 𖣫 ━━━━━━┅┅ •",'callback_data'=>'ping']],
[['text'=>"• 𝐏𝐢𝐍𝐆",'callback_data'=>'ping'],['text'=>"$load[0]",'callback_data'=>'ping']],
[['text'=>"• 𝐌𝐞𝐌",'callback_data'=>'ping'],['text'=>"$mem_using 𝐦𝐠",'callback_data'=>'ping']],
[['text'=>"• 𝐌𝐞𝐌",'callback_data'=>'ping'],['text'=>"$mem 𝐤𝐛",'callback_data'=>'ping']],
[['text'=>"• 𝐩𝐡𝐩 𝐯𝐞𝐫",'callback_data'=>'ping'],['text'=>"$ver",'callback_data'=>'ping']],
[['text'=>"• 𝐓𝐢𝐦𝐞",'callback_data'=>'ping'],['text'=>"$time",'callback_data'=>'ping']],
[['text'=>"• ┅┅━━━━━━ 𖣫 ━━━━━━┅┅ •",'callback_data'=>'ping']],
[['text'=>" • 𝐂𝐑",'url'=>'https://t.me/MrDevTz_Tz'],['text'=>"𝐏𝐯 - 𝐒𝐢𝐍𝐨",'url'=>'https://t.me/SiR_Tz']],
[['text'=>"• ┅┅━━━━━━ 𖣫 ━━━━━━┅┅ •",'callback_data'=>'ping']],
]
]);
$panel = json_encode([
      'keyboard'=> [
      [['text'=> '⚙ تنظیمات ربات'],['text'=> '🌐 تنظیمات چنل']],
                  [['text'=> '🗂 دیتابیس']]
      ],'resize_keyboard'=> true
]);
$setch = json_encode([
      'keyboard'=> [
      [['text'=> '📢 تایم رو بیو'],['text'=> '📢 تایم رو اسم']],
      [['text'=> '📢 تایم در پست'],['text'=> '📢 تایم رو اسم    ( مخصوص گپ )']],
      [['text'=>'🔙 بازگشت']]
      ],'resize_keyboard'=> true
]);
$setbot = json_encode([
      'keyboard'=> [
      [['text'=> '💠 تنظیم متن پست'],['text'=> '💠 تنظیم پست']],
      [['text'=> '💠 تنظیم نام چنل'],['text'=>'💠 تنظیم بیو چنل']],
      [['text'=> '🔙 بازگشت']]
      ],'resize_keyboard'=> true
]);
$stat = json_encode([
      'keyboard'=> [
      [['text'=> ' 📣 چنل ها'],['text'=> '💬 متن ها']],
                  [['text'=> '🤖 وضعیت ربات']],
                  [['text'=> '🔙 بازگشت']]
      ],'resize_keyboard'=> true
]);
$backch = json_encode([
      'keyboard'=> [
      [['text'=> '🔙']]
      ],'resize_keyboard'=> true
]);
$backbot = json_encode([
      'keyboard'=> [
      [['text'=> '🔙 منوی قبلی']]
      ],'resize_keyboard'=> true
]);
$keyRemove = json_encode([
      'ReplyKeyboardRemove'=>[
       []
      ],'remove_keyboard'=> true
]);
if(preg_match('/^\/start$/i',$text)){
    bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
Hi ,
Code by @Sir_Tz.",
'parse_mode'=>'HTML',
]);
}
//_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-
 elseif($text == "/panel" || $text == "پنل"){
if(in_array($from_id , $MrDevTz)){
      save("step.txt",'none');
  bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>'🤖به پنل مدیریت خوش اومدید

🔖 @SiNo_Tz',
	   'parse_mode'=>'HTML',
	   'reply_markup'=>$panel
	   ]);
}}
 elseif($text == "🔙 منوی قبلی" || $text == "⚙ تنظیمات ربات"){
if(in_array($from_id , $MrDevTz)){
      save("step.txt",'none');
  bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>'⚙ به پنل تنظیم ربات خوش آمدید.

🔖 @SiNo_Tz',
	   'parse_mode'=>'HTML',
	   'reply_markup'=>$setbot
	   ]);
}}
 elseif($text == "🔙" || $text == "🌐 تنظیمات چنل"){
if(in_array($from_id , $MrDevTz)){
      save("step.txt",'none');
  bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>'🌐 لطفا انتخاب کنید که تایم در کجای گروه یا چنل شما نمایش داده شود. 

🔖 @SiNo_Tz',
	   'parse_mode'=>'HTML',
	   'reply_markup'=>$setch
	   ]);
}}
 elseif($text == "🔙 منوی قبلی" || $text == "⚙ تنظیمات ربات"){
if(in_array($from_id , $MrDevTz)){
      save("step.txt",'none');
  bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>'⚙ به پنل تنظیم ربات خوش آمدید.',
	   'parse_mode'=>'HTML',
	   'reply_markup'=>$setbot
	   ]);
}}
 elseif($text == "🗂 دیتابیس"){
if(in_array($from_id , $MrDevTz)){
      save("step.txt",'none');
  bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>'🗂 به بخش دیتابیس خوش آمدید.

🔖 @SiNo_Tz',
	   'parse_mode'=>'HTML',
	   'reply_markup'=>$stat
	   ]);
}}
 elseif($text == "📣 چنل ها"){
if(in_array($from_id , $MrDevTz)){
      save("step.txt",'none');
  bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>'📣 چنل های سیو شده در دیتابیس :',
	   'parse_mode'=>'HTML',
	   'reply_markup'=>$statch
	   ]);
}}
 elseif($text == "💬 متن ها"){
if(in_array($from_id , $MrDevTz)){
      save("step.txt",'none');
  bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>'💬 متن های سیو شده در دیتابیس :',
	   'parse_mode'=>'HTML',
	   'reply_markup'=>$statbot
	   ]);
}}
 elseif($text == "🤖 وضعیت ربات"){
if(in_array($from_id , $MrDevTz)){
      save("step.txt",'none');
  bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>'🤖 وضعیت ربات شما :',
	   'parse_mode'=>'HTML',
	   'reply_markup'=>$status
	   ]);
}}
// ( ( @MrDevTz - @SiNo_Tz ) )
elseif($text == "🔙 بازگشت" or $text == "انصراف"){
save("step.txt",'none');
SendMessage($chat_id,"✅ به منوی اصلی بازگشتید !
◀️لطفا یکی از قسمت های زیر را جهت ورود انتخاب نمایید.

🔖 @SiNo_Tz",'HTML',$panel,$message_id);
}
// ( ( @MrDevTz - @SiNo_Tz ) )
elseif($text == "📢 تایم رو بیو" && in_array($from_id , $MrDevTz)){
save("step.txt","set bio ch");
SendMessage($chat_id,"
💠 لطفا آیدی کانال مورد نظر را ارسال کنید

👈🏻 توجه : ربات باید مدیر کانال مورد نظر باشد!
‼️ کانال فعلی : $chbio",'HTML',$backch,$message_id);
}
elseif($step == "set bio ch"){
file_put_contents("data/chbio.txt","$text");
save("step.txt",'none');
SendMessage($chat_id,"با موفقیت تنظیم شد👌",'HTML',$backch,$message_id);
}
elseif($text == "📢 تایم رو اسم" && in_array($from_id , $MrDevTz)){
save("step.txt","set name ch");
SendMessage($chat_id,"
💠 لطفا آیدی کانال مورد نظر را ارسال کنید

👈🏻 توجه : ربات باید مدیر کانال مورد نظر باشد!
‼️ کانال فعلی : $chname",'HTML',$backch,$message_id);
}
elseif($step == "set name ch"){
file_put_contents("data/chname.txt","$text");
save("step.txt",'none');
SendMessage($chat_id,"با موفقیت تنظیم شد👌",'HTML',$backch,$message_id);
}
elseif($text == "📢 تایم در پست" && in_array($from_id , $MrDevTz)){
save("step.txt","set post ch");
SendMessage($chat_id,"
💠 لطفا آیدی کانال مورد نظر را ارسال کنید

👈🏻 توجه : ربات باید مدیر کانال مورد نظر باشد!
‼️ کانال فعلی : $chpost",'HTML',$backch,$message_id);
}
elseif($step == "set post ch"){
file_put_contents("data/chpost.txt","$text");
save("step.txt",'none');
SendMessage($chat_id,"با موفقیت تنظیم شد👌",'HTML',$backch,$message_id);
}
elseif($text == "📢 تایم رو اسم    ( مخصوص گپ )" && in_array($from_id , $MrDevTz)){
save("step.txt","set bio ch");
SendMessage($chat_id,"
💠 لطفا آیدی کانال مورد نظر را ارسال کنید

👈🏻 توجه : ربات باید مدیر کانال مورد نظر باشد!
‼️ کانال فعلی : $gap",'HTML',$backch,$message_id);
}
elseif($step == "set gap ch"){
file_put_contents("data/gap.txt","$text");
save("step.txt",'none');
SendMessage($chat_id,"با موفقیت تنظیم شد👌",'HTML',$backch,$message_id);
}
// ( ( @MrDevTz - @SiNo_Tz ) )
elseif($text == "💠 تنظیم نام چنل" && in_array($from_id , $MrDevTz)){
save("step.txt","set font");
SendMessage($chat_id,"
💠 لطفا متن دلخواه خود را ارسال کنید.
‼️ متن فعلی : $name ",'HTML',$backbot,$message_id);
}
elseif($step == "set font"){
file_put_contents("data/name.txt","$text");
save("step.txt",'none');
SendMessage($chat_id,"با موفقیت تنظیم شد👌",'HTML',$backbot,$message_id);
}
elseif($text == "💠 تنظیم متن پست" && in_array($from_id , $MrDevTz)){
save("step.txt","set matn");
SendMessage($chat_id,"
💠 لطفا متن دلخواه خود را ارسال کنید.
‼️ متن فعلی : $matn ",'HTML',$backbot,$message_id);
}
elseif($step == "set matn"){
file_put_contents("data/matn.txt","$text");
save("step.txt",'none');
SendMessage($chat_id,"با موفقیت تنظیم شد👌",'HTML',$backbot,$message_id);
}
elseif($text == "💠 تنظیم پست" && in_array($from_id , $MrDevTz)){
save("step.txt","set post");
SendMessage($chat_id,"
💠 لطفا ایدی پست خود را ارسال کنید.
‼️ پست فعلی : $post",'HTML',$backbot,$message_id);
}
elseif($step == "set post"){
file_put_contents("data/post.txt","$text");
save("step.txt",'none');
SendMessage($chat_id,"با موفقیت تنظیم شد👌",'HTML',$backbot,$message_id);
}
elseif($text == "💠 تنظیم بیو چنل" && in_array($from_id , $MrDevTz)){
save("step.txt","set bio");
SendMessage($chat_id,"
💠 لطفا متن دلخواه خود را ارسال کنید.
‼️ متن فعلی : $bio",'HTML',$backbot,$message_id);
}
elseif($step == "set bio"){
file_put_contents("data/bio.txt","$text");
save("step.txt",'none');
SendMessage($chat_id,"با موفقیت تنظیم شد👌",'HTML',$backbot,$message_id);
}
if($data == "tz"){
bot("answerCallbackQuery",[
"callback_query_id"=>$update->callback_query->id,
"text"=>"Code By @MrDevTz",
'parse_mode'=>'HTML',
'show_allert' => false
]);
}
// ( ( @MrDevTz - @SiNo_Tz ) )
bot('setChatTitle',[
    'chat_id'=>$gap,
    'title'=>"$name | $time",
      ]);
bot('setChatTitle',[
    'chat_id'=>$chname,
    'title'=>"$name | $time",
      ]);
bot('setChatDescription',[
'chat_id'=>$chbio,
'description'=>"$bio $time"
]);
if(isset($update->message->new_chat_title)){
bot('deletemessage',[
'chat_id'=>$chat_id,
'message_id' =>$message_id,
]);
}
if(isset($update->channel_post->new_chat_title)){
bot('deletemessage',[
'chat_id'=>$update->channel_post->chat->id,
'message_id' =>$update->channel_post->message_id
]);
}
bot('editMessagetext',[
'chat_id'=>$chpost,
'message_id'=>$post,
"text" => "
$matn",
'reply_markup' =>$tt
]);

// End code ( Code By @MrDevTz )
?>
