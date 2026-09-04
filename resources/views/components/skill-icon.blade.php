@props(['name'])
@php
    $key = strtolower(trim($name));
    $map = [
        'html'        => ['bg' => '#E44D26', 'label' => 'HTML'],
        'html5'       => ['bg' => '#E44D26', 'label' => 'HTML'],
        'css'         => ['bg' => '#2965F1', 'label' => 'CSS'],
        'css3'        => ['bg' => '#2965F1', 'label' => 'CSS'],
        'javascript'  => ['bg' => '#F0DB4F', 'label' => 'JS', 'dark' => true],
        'js'          => ['bg' => '#F0DB4F', 'label' => 'JS', 'dark' => true],
        'typescript'  => ['bg' => '#3178C6', 'label' => 'TS'],
        'php'         => ['bg' => '#777BB4', 'label' => 'PHP'],
        'laravel'     => ['bg' => '#FF2D20', 'label' => 'Lv'],
        'mysql'       => ['bg' => '#00758F', 'label' => 'SQL'],
        'postgresql'  => ['bg' => '#336791', 'label' => 'PG'],
        'python'      => ['bg' => '#3776AB', 'label' => 'Py'],
        'vue'         => ['bg' => '#42B883', 'label' => 'Vue'],
        'vuejs'       => ['bg' => '#42B883', 'label' => 'Vue'],
        'react'       => ['bg' => '#149ECA', 'label' => 'Re'],
        'tailwind'    => ['bg' => '#38BDF8', 'label' => 'Tw'],
        'tailwindcss' => ['bg' => '#38BDF8', 'label' => 'Tw'],
        'node'        => ['bg' => '#3C873A', 'label' => 'Nd'],
        'nodejs'      => ['bg' => '#3C873A', 'label' => 'Nd'],
        'git'         => ['bg' => '#F1502F', 'label' => 'Git'],
        'figma'       => ['bg' => '#A259FF', 'label' => 'Fg'],
        'java'        => ['bg' => '#5382A1', 'label' => 'Jv'],
        'c#'          => ['bg' => '#178600', 'label' => 'C#'],
        'flutter'     => ['bg' => '#02569B', 'label' => 'Fl'],
    ];
    $data = $map[$key] ?? ['bg' => '#3B82F6', 'label' => strtoupper(substr($name, 0, 2))];
@endphp

<div {{ $attributes->merge(['class' => 'w-14 h-14 rounded-xl flex items-center justify-center font-display font-bold text-sm']) }}
     style="background-color: {{ $data['bg'] }}; color: {{ !empty($data['dark']) ? '#1a1a1a' : '#fff' }};">
    {{ $data['label'] }}
</div>
