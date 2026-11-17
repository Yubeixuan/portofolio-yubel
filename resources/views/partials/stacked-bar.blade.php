{{--
    Bar bertumpuk interaktif.
    $segments: [[label, value, percent, 'accent'|'neutral'], ...]
    $default : teks bawaan di bawah bar
    $title   : label aksesibilitas
--}}
<div data-stack>
    <div class="grow-x overflow-hidden rounded-full bg-white/[0.07]">
        <div class="flex h-3.5 w-full" role="group" aria-label="{{ $title }}">
            @foreach($segments as [$label, $value, $pct, $tone])
            <button type="button" data-seg data-label="{{ $label }}" data-value="{{ $value }}"
                    aria-label="{{ $label }}: {{ $value }}"
                    style="width: {{ $pct }}%"
                    class="h-full min-w-[6px] transition-opacity duration-200 {{ $tone === 'accent' ? 'bg-accent' : 'bg-white/20' }} {{ ! $loop->first ? 'border-l border-bg' : '' }}"></button>
            @endforeach
        </div>
    </div>
    <p data-readout aria-live="polite" class="mt-3 min-h-[1.5rem] text-xs text-muted">{{ $default }}</p>
</div>
