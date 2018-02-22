<?php
class MarkovChainSummarizer {

function summarize($text) {
 return $this->summarize_2($text);
}


function summarize_2($text, $chain_max=100) {
 $dic = array();
 $sentences = array();
 if (is_string($text)) {
  $sentence_end = '。';
  foreach (explode($sentence_end, $text) as $sentence) {
   $sentences[] = $this->sloppy_analysis($sentence . $sentence_end);
  }
 }
 elseif (is_array($text)) $sentences[] = $text;
 else return false;
 foreach($sentences as $token) {
  array_splice($token, 0, 0, '_START_');
  $token[] ='_END_';
  while ($token[1]) {
   if ($dic[$token[0]]) {
    $dic[$token[0]][] = $token[1];
   }
   else {
    $dic[$token[0]] = array($token[1]);
   }
   array_shift($token);
  }
 }

 $w1 = $dic['_START_'][rand(0,count($dic['_START_'])-1)];
 $w2 = '';
 $sentence = $w1;
 while ($chain_max) {
  $w2 = $dic[$w1][rand(0, count($dic[$w1])-1)];
  if ($w2 == '_END_') { break; }
  $sentence .= $w2;
  $w3 = $w1;
  $w1 = $w2;
  $w2 = $w3;
  $chain_max--;
 }
 return $sentence;
}

function sloppy_analysis($text) {
 $re = '/[一-龠]+|[ぁ-ん]+|[ァ-ヴー]+|[a-zA-Z0-9]+|[ａ-ｚＡ-Ｚ０-９]+|[、。！!？?() ]+/u';
 preg_match_all($re, $text, $m);
 return $m[0];
}
}

?>
