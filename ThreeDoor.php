<?php
class ThreeDoor
{
    private $max_player = 100000;

    public function run()
    {
        $yes = 0;
        for ($player = 1; $player <= $this->max_player; $player++) {
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
                // 否則 就排除答案的門 開另一扇門給他
                $temp = $other;
                unset($temp[$answer - 1]);
                $temp = array_values($temp);
                $point = $temp[0];
            }

            // 取得剩餘的那道門，玩家換的話的門
            $temp = $other;
            unset($temp[$point - 1]);
            $temp = array_values($temp);
            $player_change2 = $temp[0];

            if ($answer === $player_change2) {
                $yes += 1;
            }
        }

        echo "換的話答對的機率:" . $yes / $this->max_player;
    }
}

$game = new ThreeDoor();
$game->run();