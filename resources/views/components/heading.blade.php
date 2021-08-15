<h{{ $level ?? '3'}}
  {{ $attributes->merge(['class' => 'font-bold no-underline font-serif ' . 'text-' . (isset($size) ? $size : 2) . 'xl' ])}}>
  {!! $slot !!}</h{{ $level ?? '3'}}>