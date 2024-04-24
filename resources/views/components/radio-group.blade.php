<div>
    @if ($allOption)
        <label for="{{ $name }}" class="mb-1 flex items-center">
            <input type="radio" name="{{ $name }}" value="" @checked(!request($name)) class="dark:text-green-500 dark:ring-2 dark:ring-green-300"/>
            <span class="ml-2">All</span>
        </label>
    @endif

    @foreach ($optionsWithLabels as $lable => $option)
        <label for="{{ $name }}" class="mb-1 flex items-center">
            <input type="radio" name="{{ $name }}" value="{{ $option }}" @checked($option === ($value ?? request($name))) class="dark:text-green-500 dark:ring-2 dark:ring-green-300" />
            <span class="ml-2">{{ $lable }}</span>
        </label>
    @endforeach

    @error($name)
        <div class="mt-1 text-xs font-medium text-red-600 dark:text-red-500">
            {{ $message }}
        </div>
    @enderror
</div>
