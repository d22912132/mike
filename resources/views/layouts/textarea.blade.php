<textarea name="{{ $name }}" @isset($style) style="{{ $style }}" @endisset >
    @isset($value) 
    {{ $value }} 
    @endisset 
</textarea>
