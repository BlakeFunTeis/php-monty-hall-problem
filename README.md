**蒙提霍爾問題**，亦稱為**蒙特霍問題**或**三門問題**（英文：Monty Hall problem），是一個源自博弈論的數學遊戲問題。
問題的名字來自該節目的主持人[蒙蒂·霍爾](https://zh.wikipedia.org/wiki/%E8%92%99%E8%92%82%C2%B7%E9%9C%8D%E5%B0%94 "蒙蒂·霍爾")。

## Rules

這個遊戲的玩法是：參賽者會看見三扇關閉了的門，其中一扇的後面有一輛汽車或者是獎品，選中後面有車的那扇門就可以贏得該汽車或獎品，而另外兩扇門後面則各藏有一隻山羊。

當參賽者選定了一扇門，但未去開啟它的時候，知道門後情形的節目主持人會開啟剩下兩扇門的其中一扇，露出其中一隻山羊。主持人其後會問參賽者要不要換另一扇仍然關上的門。

問題是：換另一扇門會否增加參賽者贏得汽車的機率？如果嚴格按照上述的條件的話，答案是**會**。換門的話，贏得汽車的機率是2/3。

## Code
建立一個類別 **ThreeDoor**，宣告玩家數 **10000**，並且實作Function **run**。

	class ThreeDoor
	{
			private $max_player = 100000;

    		public function run
    		{
    			//TODO: 實作模擬蒙提霍爾問題
    		}
	}

宣告成功與失敗的變數

	public function run
	{
    	$yes = 0;
    	$no = 0;
	}

執行迴圈，讓玩家選擇三門中的一門。<br>
依照遊戲規則，如果玩家選擇的是汽車，那麼主持人就隨意開啟一扇門給他，如果玩家開啟的不是汽車則主持人**必須開啟另外一扇不是汽車的門**給他。

	// 答案
	$answer = rand(1, 3);
	// 選擇
	$choice = rand(1, 3);
	// 排除選擇後的選擇
	$other = [1, 2, 3];
	unset($other[$choice - 1]);
	// 如果 選擇等於答案 那麼就任意開一扇門給他
	if ($choice === $answer) {
		$point = array_rand($other) + 1;
	} else {
	   	//否則 就排除答案的門 開另一扇門給他
    	$temp = $other;
    	unset($temp[$answer - 1]);
    	$temp = array_values($temp);
    	$point = $temp[0];
	}

開始計算玩家換門的話的成功與失敗機率

	// 取得剩餘的那道門，玩家換的話的門
	$temp = $other;
	unset($temp[$point - 1]);
	$temp = array_values($temp);
	$player_change2 = $temp[0];
	if ($answer === $player_change2) {
		$yes += 1;
	} elseif ($answer === $choice) {
		$no += 1;
	}


	echo "換的話，中獎的機率:" . $yes / $this->max_player . "<br>";
	echo "不換的話，中獎的機率:" . $no / $this->max_player . "<br>";

## Conclusion
程式執行結果

	換的話，中獎的機率:0.66475
	不換的話，中獎的機率:0.33525

複雜度為 **O(10000)**。

## Reference
[使用PHP模擬蒙提霍爾問題（GitHub）](https://github.com/BlakeFunTeis/ThreeDoor-PHP/ "使用PHP模擬蒙提霍爾問題（GitHub")
[蒙提霍爾問題](https://zh.wikipedia.org/wiki/%E8%92%99%E6%8F%90%E9%9C%8D%E7%88%BE%E5%95%8F%E9%A1%8C "蒙提霍爾問題")
