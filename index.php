<?php 

include __DIR__ . '/src/getbrowser.php';

Kirby::plugin('Netzwerk/checkBrowser', [
  'components' => [
    'css' => function ($kirby, $url, $options) {
        $relative_url = Url::path($url, false);
        $file_root = $kirby->root('index') . DS . $relative_url;

        if (F::exists($file_root)) {
            return url($relative_url . '?' . F::modified($file_root));
        }

        return $url;
    }
  ],
  'blueprints'  => [
    'fields/browserpopup'    => __DIR__ . '/blueprints/fields/browserpopup.yml'
  ],
  'snippets'    => [
    'browserpopup'         => __DIR__ . '/snippets/browserpopup.php',
  ],
]);