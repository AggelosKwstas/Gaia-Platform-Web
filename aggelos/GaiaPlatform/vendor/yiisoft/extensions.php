<?php

$vendorDir = dirname(__DIR__);

return array (
  'yiisoft/yii2-faker' => 
  array (
    'name' => 'yiisoft/yii2-faker',
    'version' => '2.0.5.0',
    'alias' => 
    array (
      '@yii/faker' => $vendorDir . '/yiisoft/yii2-faker/src',
    ),
  ),
  'yiisoft/yii2-symfonymailer' => 
  array (
    'name' => 'yiisoft/yii2-symfonymailer',
    'version' => '2.0.4.0',
    'alias' => 
    array (
      '@yii/symfonymailer' => $vendorDir . '/yiisoft/yii2-symfonymailer/src',
    ),
  ),
  'yiisoft/yii2-bootstrap5' => 
  array (
    'name' => 'yiisoft/yii2-bootstrap5',
    'version' => '2.0.4.0',
    'alias' => 
    array (
      '@yii/bootstrap5' => $vendorDir . '/yiisoft/yii2-bootstrap5/src',
    ),
    'bootstrap' => 'yii\\bootstrap5\\i18n\\TranslationBootstrap',
  ),
  'yiisoft/yii2-debug' => 
  array (
    'name' => 'yiisoft/yii2-debug',
    'version' => '2.1.22.0',
    'alias' => 
    array (
      '@yii/debug' => $vendorDir . '/yiisoft/yii2-debug/src',
    ),
  ),
  'yiisoft/yii2-gii' => 
  array (
    'name' => 'yiisoft/yii2-gii',
    'version' => '2.2.5.0',
    'alias' => 
    array (
      '@yii/gii' => $vendorDir . '/yiisoft/yii2-gii/src',
    ),
  ),
  'himiklab/yii2-recaptcha-widget' => 
  array (
    'name' => 'himiklab/yii2-recaptcha-widget',
    'version' => '2.1.1.0',
    'alias' => 
    array (
      '@himiklab/yii2/recaptcha' => $vendorDir . '/himiklab/yii2-recaptcha-widget/src',
      '@himiklab/yii2/recaptcha/tests' => $vendorDir . '/himiklab/yii2-recaptcha-widget/tests',
    ),
  ),
  'yiisoft/yii2-httpclient' => 
  array (
    'name' => 'yiisoft/yii2-httpclient',
    'version' => '2.0.14.0',
    'alias' => 
    array (
      '@yii/httpclient' => $vendorDir . '/yiisoft/yii2-httpclient/src',
    ),
  ),
  'kekaadrenalin/yii2-module-recaptcha-v3' => 
  array (
    'name' => 'kekaadrenalin/yii2-module-recaptcha-v3',
    'version' => '1.4.0.0',
    'alias' => 
    array (
      '@kekaadrenalin/recaptcha3' => $vendorDir . '/kekaadrenalin/yii2-module-recaptcha-v3/src',
    ),
  ),
);
