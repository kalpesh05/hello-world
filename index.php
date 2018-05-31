<?php

function tweet($message,$image) {

// add the codebird library
require_once('src/codebird.php');

// note: consumerKey, consumerSecret, accessToken, and accessTokenSecret all come from your twitter app at https://apps.twitter.com/
\Codebird\Codebird::setConsumerKey("kPYXwdBXgTBCEvrjVvsouMkzy", "L3soQeI2q2Uzls62foSVTjNz23WspViKdp9GwwD8pDPjfjVZJX");
$cb = \Codebird\Codebird::getInstance();
$cb->setToken("823557664126930944-lZekvRImGEObSR90QUiYtzGA6IsENFj", "zyB5zkzpKeuuQSgUHtWGceZE9ENb7Qn7h713NDU0Ic8l9");

//build an array of images to send to twitter
$reply = $cb->media_upload(array(
    'media' => $image
));

//upload the file to your twitter account
$mediaID = $reply->media_id_string;

//build the data needed to send to twitter, including the tweet and the image id
$params = array(
    'status' => $message,
    'media_ids' => $mediaID
);
//post the tweet with codebird
$reply = $cb->statuses_update($params);

}

tweet('This is my sample tweet message','http://34.215.40.163/Admin/uploads/quote/quote1.png');
