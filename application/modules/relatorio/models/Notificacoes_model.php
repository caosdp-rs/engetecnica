<?php 
require_once(__DIR__."/Relatorio_model_base.php");
use \GuzzleHttp\Client;
use \SendGrid\Mail\Mail;
use \SendGrid as SendGridClass;


class Notificacoes_model extends MY_model {

  private $client, $push_headers, $email_headers;

  public function __construct() {
      parent::__construct();
      $this->setApi();
  }

  private function setApi(){
    $this->client = new Client([
        'base_uri' => $this->config->item('one_signal_apiurl')
    ]);

    $this->push_headers = [
        "Content-Type" => "application/json; charset=utf-8",
        "Authorization" => "Basic {$this->config->item('one_signal_apikey')}"
    ];

    $this->email_headers = [
      "Content-Type" => "application/json; charset=utf-8",
      "Authorization" => "Basic {$this->config->item('one_signal_apikey')}"
    ];
  }

  public function enviar_push($titulo, $texto, ...$opcoes){
    $body = [
        "app_id" => $this->config->item('one_signal_appid'),
        "headings" => ["en" => $titulo],
        "contents" => ["en" => $texto],
        "sound" => base_url("assets/media/mixkit-correct-answer-tone-2870.wav"),
        "ios_sound" => base_url("assets/media/mixkit-correct-answer-tone-2870.wav"),
        "android_sound" => base_url("assets/media/mixkit-correct-answer-tone-2870.wav"),
        "huawei_sound" => base_url("assets/media/mixkit-correct-answer-tone-2870.raw"),
        "adm_sound" => base_url("assets/media/mixkit-correct-answer-tone-2870.wav"),
        "wp_wns_sound" => base_url("assets/media/mixkit-correct-answer-tone-2870.wav"),
        "android_led_color" => "#fd7e14", 
        "huawei_led_color" => "#fd7e14",
        "android_accent_color" => "#ffffff",
        "huawei_accent_color" => "#ffffff",
        "icon" => base_url("assets/images/icon/logo2.png"),
        "chrome_web_icon" => base_url("assets/images/icon/logo2.png"),
        "chrome_icon" => base_url("assets/images/icon/logo2.png"),
        "firefox_icon" => base_url("assets/images/icon/logo2.png")
    ];

    if (isset($opcoes[0])) {
        $body = array_merge($body, $opcoes[0]);
        
        if (isset($body['url'])) {
            $body['url'] = base_url($body['url']);
        }
    }

    $response = $this->client->post("/api/v1/notifications", [
        'body' => json_encode($body),
        'headers' => $this->push_headers
    ]);

    return (object) [
        "status" => $response->getStatusCode(),
        "body" => json_decode($response->getBody()->getContents())
    ];
  }

  public function enviar_email($assunto, $mensagem, $destinos = []){
    $sgmail = new Mail(); 
    $sgmail->setSubject($assunto);
    $sgmail->setFrom($this->config->item('notifications_email'), "Engetecnica App");
    $sgmail->addContent("text/html", $mensagem);

    foreach ($destinos as $nome => $email){
      $sgmail->addTo($email, $nome);
    }

    $sendgrid = new SendGridClass($this->config->item('sendgrid_apikey'));

    try {
        $response = $sendgrid->send($sgmail);
        // if ($response->statusCode() != 200) {
        //   $log = $response->statusCode() . "\n".
        //         implode(', ', $response->headers()).
        //         $response->body() . "\n";
        //   log_message(1, $log);
        // }
  
        return $response->statusCode() == 200;
    } catch (Exception $e) {
        //log_message(1, 'Caught exception: '. $e->getMessage() ."\n");
        return false;
    }

    return true;
  }   
}