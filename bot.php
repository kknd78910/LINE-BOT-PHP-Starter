<?php
$access_token = 'RTHZoEvbdM/jqZn3glwyUAGPN/+PhfJo0EaP3S+9VCpvQtY5H94knQM1BaM8w7lWShj5UJCf3ul55GMyuWSl//wINpGJLoPqou8D7pYADBBdYot9gxMlgawDjkmyqvCiEH0esF7SHQwlX3zYOEumXwdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['message']['text'];
			// Get replyToken
			$replyToken = $event['replyToken'];
			$messages = [
				'type' => 'text',
				'text' => $text
			];
				if($text == 'สวัสดี'){
					$messages = [
				'type' => 'text',
				'text' => 'สวัสดีเราชื่อแบกะโต๊ะ'
			];
				}else if($text == 'หิว'){
					$messages = [
				'type' => 'text',
				'text' => 'กินข้าวไหมละ'
			];
				}
			else if($text == 'กิน'){
					$messages = [
				'type' => 'text',
				'text' => 'สั่งอาหารกับเราสิ อร่อยทุกอย่าง'
			];
				}
			else if($text == 'ไม่กิน'){
					$messages = [
				'type' => 'text',
				'text' => 'พ่องมึงตาย fuck'
			];
				}
			// Build message to reply back
			

			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
			];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);

			echo $result . "\r\n";
		}
	}
}
echo "OK";
