# php-bitexen-api

bitexen.com kripto para borsası php api sınıfı

örnek:

$Bit = new Bitexen();

$result=json_decode($Bit->getBalance());

print_r($result);
