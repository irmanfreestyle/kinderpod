<?php
    require_once('vendor/autoload.php');    
    use \Firebase\JWT\JWT;

    class JwtAuth {        

        public function generateToken() {            
            $issuedAt = time();
            $expirationTime = $issuedAt + 604800;  // VALID FOR 7 DAY
            $payload = array(
              'userid' => '1930903bjsbds',
              'iat' => $issuedAt,
              'exp' => $expirationTime
            );            
            $alg = 'HS256';
            $jwt = JWT::encode($payload, '$this->key', $alg);                                

            return $jwt;
        }

        public function DecodeToken($token) {
            $decoded = JWT::decode($token, '$this->key', array('HS256'));

            return $decoded;
        }
    }