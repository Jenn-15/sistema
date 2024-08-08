<?php

return [
    'default_font' => 'sans-serif',
    'font_path' => base_path('resources/fonts/'),
    'font_cache' => storage_path('app/fonts/'),
    'auto_language_detection' => true,
    'auto_script_detection' => true,
    'enable_html5_parser' => true,
    'pdf_backend' => 'gd', // O 'cairo', dependiendo de tu configuración
    'pdf_lib' => 'dompdf',
    'chroot' => realpath(base_path()),
    'log_output_file' => storage_path('logs/dompdf_output.log'),
];
