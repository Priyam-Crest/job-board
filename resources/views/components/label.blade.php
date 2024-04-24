<label class="mb-2 block text-sm font-medium text-slate-900 dark:text-white"
  for="{{ $for }}">
  {{ $slot }} 
  @if ($required)
    <span class="text-red-600 font-bold -ml-0.5 dark:text-red-500">*</span>
  @endif
</label>