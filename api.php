<?php
// deve ser removido em ambiente de produção
sleep(2);


if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST') {

      $data= json_decode(file_get_contents("php://input", true));

  /** LISTA GENÉRICA PODENDO SER IMPLEMENTADA COM FONTES EXTERNAS **/

      $filmes = [
        ['titulo'=>'homem aranha','autor'=>'jack sparrow','ano'=>'2002','src'=>'https://www.pngplay.com/wp-content/uploads/12/The-Amazing-Spider-Man-2-PNG-Images-HD.png'],
        ['titulo'=>'homem de ferro','autor'=>'jack sparrow','ano'=>'2002','src'=>'https://www.pngplay.com/pt/image/361638'],
        ['titulo'=>'homem elastico','autor'=>'jack sparrow','ano'=>'2002','src'=>''],
        ['titulo'=>'homem aranha1','autor'=>'jack sparrow','ano'=>'2002','src'=>''],
        ['titulo'=>'homem aranha2','autor'=>'jack sparrow','ano'=>'2002','src'=>''],
        ['titulo'=>'vingadores','autor'=>'jack sparrow','ano'=>'2002','src'=>'https://www.pngplay.com/wp-content/uploads/8/Wonder-Woman-PNG-Background.png'],
        ['titulo'=>'mulher maravilha','autor'=>'joana darc','ano'=>'1994','src'=>'https://www.pngplay.com/wp-content/uploads/8/Wonder-Woman-Download-Free-PNG.png']
       
    
      ];
      if (!function_exists('str_contains')) {
        function str_contains( $haystack, $needle)
        {
            return $needle !== '' && mb_strpos($haystack, $needle) !== false;
      
    }}
      $results = [];
      $data_result = explode(" ",$data->search);
    
      foreach($data_result as $str) {
      foreach($filmes as $key => $value){
            if(str_contains(strtolower($value['titulo']),strtolower($str))){
                $results[] = $value;
            }
        }
      }

      if(count($results) > 0){
   
        $json =  json_encode(array(
          'status'=> '200',
          'body'=> $results
      ),JSON_UNESCAPED_UNICODE);
        echo $json;
      }else {

        $json = json_encode(array(
          'status'=> '404'
       ),JSON_UNESCAPED_UNICODE);
        echo  $json;
      }
}
