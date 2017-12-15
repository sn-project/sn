<?php
    class Code{
        public $width = 100;
        public $height = 38.5;
        public $letter = '3456789qwertyuopasdfghjkzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM';
        public $lineNum = 4;
        public $pxNum = 50;
        public $fontFile='ebrima.ttf';
        public $img;
        public $result;//验证码字符
        //创建图片
        function create(){
            $this->img = imagecreatetruecolor($this->width,$this->height);
            $arr = $this->bgColor();
            $color = imagecolorallocate($this->img,$arr[0],$arr[1],$arr[2]);
            imagefill($this->img,0,0,$color);
        }
        //画线
        function drawLine(){
            for($i=0;$i<$this->lineNum;$i++){
                $arr = $this->bgColor();
                $color = imagecolorallocate($this->img,$arr[0],$arr[1],$arr[2]);
                $x1 = mt_rand(0,$this->width/2);
                $y1 = mt_rand(0,$this->height/2);
                $x2 = mt_rand($this->width/2,$this->width);
                $y2 = mt_rand($this->height/2,$this->height);
                if($i>=$this->lineNum/2){
                    imageline($this->img,$x2,$y1,$x1,$y2,$color);
                }else{
                    imageline($this->img,$x1,$y1,$x2,$y2,$color);
                }

                for($i=0;$i<$this->pxNum;$i++){
                    $arr = $this->bgColor();
                    $color = imagecolorallocate($this->img,$arr[0],$arr[1],$arr[2]);
                    $x = mt_rand(0,$this->width);
                    $y = mt_rand(0,$this->height);
                    imagesetpixel($this->img,$x,$y,$color);
                }


            }
        }
        //画文字
        function drawText(){
            $x = $this->width/4;
            $y = $this->height/2;
            $result = $this->getChars();
            for($i=0;$i<4;$i++){
                $arr = $this->textColor();
                $color = imagecolorallocate($this->img,$arr[0],$arr[1],$arr[2]);
                imagettftext($this->img,mt_rand(14,20),mt_rand(-15,15),$x*$i+5,$y+10,$color,$this->fontFile,substr($result,$i,1));
            }
        }
        //产生验证码
        function getChars(){
            $len = strlen($this->letter)-1;
            $str = '';
            for($i=0;$i<4;$i++){
                $str .= substr($this->letter,mt_rand(0,$len),1);
            }
            $this->result = strtolower($str);
            return $str;

        }
        //背景图片
        function bgColor(){
            $arr = [];
            $arr[0] = mt_rand(0,107);
            $arr[1] = mt_rand(0,107);
            $arr[2] = mt_rand(0,107);
            return $arr;
        }
        //字体颜色
        function textColor(){
            $arr = [];
            $arr[0] = mt_rand(108,255);
            $arr[1] = mt_rand(108,255);
            $arr[2] = mt_rand(108,255);
            return $arr;
        }
        //输出
        function outPut(){
            header('Content-type:image/png');
            $this->create();
            $this->drawline();
            $this->drawText();
            imagepng($this->img);
            imagedestroy($this->img);
        }
    }
    $code = new Code();
    $code->outPut();
    session_start();
    $_SESSION['code'] = $code->result;