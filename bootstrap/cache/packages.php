<?php return array (
  'fideloper/proxy' => 
  array (
    'providers' => 
    array (
      0 => 'Fideloper\\Proxy\\TrustedProxyServiceProvider',
    ),
  ),
  'laravel/tinker' => 
  array (
    'providers' => 
    array (
      0 => 'Laravel\\Tinker\\TinkerServiceProvider',
    ),
  ),
  'nunomaduro/collision' => 
  array (
    'providers' => 
    array (
      0 => 'NunoMaduro\\Collision\\Adapters\\Laravel\\CollisionServiceProvider',
    ),
  ),
  'spatie/laravel-newsletter' => 
  array (
    'providers' => 
    array (
      0 => 'Spatie\\Newsletter\\NewsletterServiceProvider',
    ),
    'aliases' => 
    array (
      'Newsletter' => 'Spatie\\Newsletter\\NewsletterFacade',
    ),
  ),
);